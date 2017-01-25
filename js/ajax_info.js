function is_auth_user() {
    /* used in CMS content for tracking */
    var IS_AUTH_COOKIE_NAME = 'hlauth';
    var is_auth = $.cookie(IS_AUTH_COOKIE_NAME);
    return is_auth;
}

function get_lang() {
    return ($.cookie(wgsdk.vars.LANG_COOKIE_NAME)  ||
            wgsdk.vars.CURRENT_REQUEST_LANGUAGE ||
            wgsdk.vars.DEFAULT_LANGUAGE)
}


wgsdk.account_info = (function ($, base64) {
    var obj = function(cookie_name){
        cookie_name = cookie_name || wgsdk.vars.ACCOUNT_INFO_COOKIE_NAME;
        var data_from_cookie = null,
            data = $.cookie(cookie_name),
            instance = {},
            no_check_ajax_info_cookie_name = wgsdk.vars.NO_CHECK_AJAX_INFO_COOKIE_NAME;

        if (data) {
            data = data.replace(/\\"/g, "unique_tmp_str");
            data = data.replace(/"/g, "");
            data = data.replace(/unique_tmp_str/g, "\"");
            data = base64.decode(data);
            data_from_cookie = $.parseJSON(data);
        }

        instance.has_data = function () {
            if (data_from_cookie) {
                return true;
            }
            return false;
        };

        instance.get_by_key = function (key, default_value) {
            default_value = typeof default_value !== 'undefined' ? default_value : '';
            if (!data_from_cookie || !data_from_cookie[key]) {
                return default_value;
            }
            return data_from_cookie[key];
        };
        instance.get_spa_id = function () {
            return instance.get_by_key('spa_id') || 0;
        };
        instance.get_nickname = function () {
            return instance.get_by_key('nickname');
        };
        instance.is_staff = function () {
            return instance.get_by_key('is_staff', 0);
        };
        instance.get_game_ban = function () {
            return instance.get_by_key('game_ban');
        };
        instance.get_clan_ban = function () {
            return instance.get_by_key('clan_ban');
        };
        instance.get_unread_notification_count = function () {
            return instance.get_by_key('unread_notifications_count', 0);
        };
        instance.get_all_notification_count = function () {
            return instance.get_by_key('all_notifications_count', 0);
        };
        instance.is_kr_agreement_accepted = function() {
            return instance.get_by_key('is_kr_agreement_accepted', 0);
        };
        instance.set_extra_cookie_lifetime = function () {
            var date = new Date(),
                cookie_value = $.cookie(cookie_name),
                timeout;

            timeout = (wgsdk.vars.ACCOUNT_INFO_COOKIE_EXTRA_TIMEOUT_RATE
                       * wgsdk.vars.ACCOUNT_INFO_COOKIE_TIMEOUT_SECONDS * 1000);

            date.setTime(date.getTime() + timeout);

            $.removeCookie(cookie_name);
            var old_raw_value = $.cookie.raw;
            $.cookie.raw = true;
            $.cookie(cookie_name, cookie_value, {
                expires: date,
                path: '/',
                domain: wgsdk.vars.ACCOUNT_INFO_COOKIE_DOMAIN
            });
            $.cookie.raw = old_raw_value;
        };

        instance.set_no_check_ajax_info = function () {
            var date = new Date();
            timeout = (wgsdk.vars.ACCOUNT_INFO_COOKIE_EXTRA_TIMEOUT_RATE
                    * wgsdk.vars.ACCOUNT_INFO_COOKIE_TIMEOUT_SECONDS * 1000);

            date.setTime(date.getTime() + timeout);
            $.cookie(no_check_ajax_info_cookie_name, '1', {
                expires: date,
                path: '/',
                domain: wgsdk.vars.ACCOUNT_INFO_COOKIE_DOMAIN
            });
        };

        instance.get_no_check_ajax_info = function () {
            return $.cookie(no_check_ajax_info_cookie_name);
        };

        instance.update_cookie_from_server = function (callback) {
            if (wgsdk.vars.AJAX_ACCOUNT_INFO_REQUEST) {
                var intervalId = setInterval(function () {
                    if (!wgsdk.vars.AJAX_ACCOUNT_INFO_REQUEST) {
                        var account_info = wgsdk.account_info();
                        clearInterval(intervalId);
                        callback && callback(wgsdk.account_info());
                    }
                }, 300);
                return;
            }

            if (instance.get_no_check_ajax_info()) {
                return;
            }

            var start = new Date();
            wgsdk.vars.AJAX_ACCOUNT_INFO_REQUEST = $.ajax({
                url: wgsdk.vars.ACCOUNT_AJAX_INFO_URL,
                cache: false,
                type: "GET",
                data: {'referrer': '' + document.location.pathname},
                success: function () {
                    var end = new Date();

                    if (end.getTime() - start.getTime() > wgsdk.vars.GETTING_ACCOUNT_INFO_COOKIE_CRITICAL_TIME_MS) {
                        instance.set_extra_cookie_lifetime();
                    }
                    var account_info = wgsdk.account_info();
                    wgsdk.vars.AJAX_ACCOUNT_INFO_REQUEST = null;
                    callback && callback(account_info);
                },
                error: function(){
                    instance.set_no_check_ajax_info();
                }
            });
        };

        return instance;

    };
    return obj;
}(jQuery, wgsdk.base64));

wgsdk.ajax_info = (function ($) {
    var instance = {};

    instance.fadeIn_speed = 'slow';

    instance.show_login_link = function () {
        if (wgsdk.vars.REGISTRATION_URL) {
            $('.js-registration_url a')
                .attr('href',  wgsdk.vars.REGISTRATION_URL.replace('<lang>', get_lang()))
                .trigger('linkChanged');
            $('.js-registration_url').show();
        }
        $('#js-auth-wrapper').show();
    };

    instance.show_bonus_link = function () {
        $('.js-bonus').show();
    };

    instance.show_language_selector = function (current_lang, is_staff) {

        var count_languages = 0,
            available_languages;
        if (is_staff) {
            available_languages = wgsdk.vars.ALL_LANGUAGES;
        } else {
            available_languages = wgsdk.vars.FRONTEND_LANGUAGES;
        }

        $.each(available_languages, function () {
            ++count_languages;
        });

        if (count_languages < 2) {
            return;
        }

        var lang_wrapper = $("#js-lang-wrapper");

        var lang_item_text = $('<div>').append($('#js-lang-wrapper li').clone()).html();
        $('#js-lang-wrapper li').remove();

        var lang_selector_txt = $('<div>').append(lang_wrapper.clone()).html();
        lang_selector_txt = lang_selector_txt.replace(new RegExp(wgsdk.vars.LANG_CODE_KEY, "g"), current_lang);
        lang_selector_txt = lang_selector_txt.replace(new RegExp(wgsdk.vars.LANG_NAME_KEY, "g"), wgsdk.vars.ALL_LANGUAGES[current_lang]);

        lang_wrapper.replaceWith(lang_selector_txt);
        lang_wrapper = $("#js-lang-wrapper");

        $.each(available_languages, function (lang_key, lang_name) {
            if (lang_key != current_lang) {
                var lang_item_tmp = lang_item_text;
                lang_item_tmp = lang_item_tmp.replace(new RegExp(wgsdk.vars.LANG_CODE_KEY, "g"), lang_key);
                lang_item_tmp = lang_item_tmp.replace(new RegExp(wgsdk.vars.LANG_NAME_KEY, "g"), lang_name);
                $('ul', lang_wrapper).append(lang_item_tmp);
            }
        });

        $("#js-lang-wrapper .js-lang-icon").each(function () {
            $(this).attr('src', $(this).data('src'));
        })
        wgsdk.expandable_window('#js-lang-wrapper');
        lang_wrapper.fadeIn(instance.fadeIn_speed)
    };

    instance.set_ua_redirect_url = function (url) {
        var date = new Date();
        date.setTime(date.getTime() + 600000);
        $.cookie(wgsdk.vars.KR_UA_REDIRECT_URL_COOKIE_NAME, url, {
            expires: date,
            path: '/'
        });
    };

    instance.show_my_profile_link = function (nickname, spa_id) {
        $('#js-auth-wrapper-nickname').show();
        wgsdk.expandable_window('#js-auth-wrapper-nickname');
        nickname && $(".js-my_profile_nickname").html(nickname);

        if (nickname && spa_id) {
            if (!$(".js-my_profile_link").length) {
                return;
            }
            var link = $(".js-my_profile_link").data('full_link').replace(wgsdk.vars.SPA_ID_KEY, spa_id);
            var link = link.replace(wgsdk.vars.NICKNAME_KEY, nickname);
            $(".js-my_profile_link").attr('href', link);
        }
    };

    instance.show_notifications = function (unread_count, all_count) {
        if (!$("#js-notifications-wrapper").length) {
            return;
        }
        if (unread_count) {
            if (!$("#notifications-alert-link").hasClass('b-top-links__message-new')) {
                $("#notifications-alert-link").addClass('b-top-links__message-new');
            }
            $('.js-counter_unread_messages').html(unread_count).fadeIn(instance.fadeIn_speed);
        } else {
            if ($("#notifications-alert-link").hasClass('b-top-links__message-new')) {
                $("#notifications-alert-link").removeClass('b-top-links__message-new');
            }
            $('.js-counter_unread_messages').hide();
        }

        if (all_count) {
            $(".js-last_messages").show();
            $(".js-no_messages").hide();
        } else {
            $(".js-last_messages").hide();
            $(".js-no_messages").show();
        }

        if (unread_count == undefined && all_count == undefined) {
            $(".js-last_messages").show();
            $(".js-no_messages").hide();
        }

        $("#js-notifications-wrapper").show();
    };

    instance.show_ban = function (ban, container, target) {
        var ban_msg;

        if (!ban) {
            return;
        }

        if (ban.expiry_time) {
            $(container + ' .js-with-expiry_time').show();
            ban_msg = $(container).html();
            ban_msg = ban_msg.replace(new RegExp(wgsdk.vars.TIME_KEY, "g"), ban.expiry_time);
        } else {
            $(container + ' .js-without-expiry_time').show();
            ban_msg = $(container).html();
        }

        $(target).each(function () {
            var obj = $(this);
            obj.html(ban_msg);
            obj.removeClass('b-sidebar-widget-empty');
            if (!obj.hasClass('js-hidden')) {
               obj.show();
            }
        });

        wotUpdateDateTimeFields(target);
    };

    instance.show_game_ban = function (ban) {
        instance.show_ban(ban, '#account_game_ban_info_container', '.js-account_game_ban_info_msg')
    };

    instance.show_clan_ban = function (ban) {
        instance.show_ban(ban, '#account_clan_ban_info_container', '.js-account_clan_ban_info_msg')
    };

    return instance;
}(jQuery))
