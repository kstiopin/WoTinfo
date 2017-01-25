// Requirements:
//     * jQuery
//     * Underscore.js
//     * URI.js
(function(globalSettings, $, _, window) {
    var EventDispatcher = window.Application || undefined;
    if (!_.isObject(EventDispatcher) || !_.isFunction(EventDispatcher.on)) {
        EventDispatcher = $('body');
    }

    var settings = globalSettings.AuthenticationConfirmation,
        getUtcNow = function() {
            var d = new Date();
            return parseInt(d.valueOf() / 1000, 10);
        },
        getExpiresAt = function() {
            var expiresAt = parseInt($.cookie(settings.expiresAtCookie.name), 10);
            return isNaN(expiresAt) ? 0 : expiresAt;
        },
        setExpiresAt = function(expiresAt) {
            var expiresAtCookie = settings.expiresAtCookie;
            $.cookie(expiresAtCookie.name, expiresAt, {path: expiresAtCookie.path});
        },
        isRequired = function() {
            return getExpiresAt() < getUtcNow();
        },
        getRedirectUrl = function(returnUrl) {
            var uri = URI(window.location.href).path(settings.path).query({'next': returnUrl});
            return uri.toString();
        },
        events = {
            'ConfirmationRequired': 'wginternal:contrib:authenticationconfirmation-confirmation-required'
        },
        handlerConfirmationRequired = function(options) {
            var defaultOptions = {
                'returnUrl': '',
                'onConfirmationRequired': null,
                'onAlreadyConfirmed': null
            };
            options = $.extend({}, defaultOptions, options);

            if (isRequired()) {
                if (options.onConfirmationRequired) {
                    var url = getRedirectUrl(options.returnUrl);
                    options.onConfirmationRequired(url);
                } else {
                    window.location.href = getRedirectUrl(options.returnUrl);
                }
                return false;
            }

            if (options.onAlreadyConfirmed) {
                options.onAlreadyConfirmed();
            }
        };

    globalSettings.AuthenticationConfirmation.Events = events;


    if ($().jquery < '1.7') {
        EventDispatcher.bind(events.ConfirmationRequired, handlerConfirmationRequired);
    } else {
        EventDispatcher.on(events.ConfirmationRequired, handlerConfirmationRequired);
    }

    setExpiresAt(getUtcNow() + settings.secondsLeft);
})(window.Settings || {}, jQuery, _, window);
