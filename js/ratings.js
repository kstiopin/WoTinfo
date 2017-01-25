(function($, window, document, ko, wot_hl, amplify, _, wgsdk, tooltipReset, undefined) {

'use strict';

var ProfileRating = function(initialSearchValues) {

    var CACHE_ENABLED = 1,
        TOMORROW_BATTLES_COUNT_CACHE_ENABLED = true,
        CACHE_INVALIDATE_PERIOD = 3 * 60 * 60 * 1000, // 3 hours in milliseconds
        CACHE_DATA_FORMAT_VERSION = 'v2',
        MILLISECONDS_IN_ONE_SECOND = 1000,
        TOMORROW_BATTLES_COUNT_CACHE_INVALIDATE_PERIOD = 10 * 60 * MILLISECONDS_IN_ONE_SECOND, // 10 minutes in miliseconds
        SOCIAL_GROUP_ALL = 'all',
        SOCIAL_GROUP_FRIENDS = 'friends',
        SOCIAL_GROUP_CLAN = 'clan',
        SOCIAL_GROUP_POPUP_SELECTOR = '.js-socialgroup-popup',
        SOCIAL_GROUP_LINK_SELECTOR = '.js-socialgroup-link',
        STATUS_OK = 'ok',
        STATUS_ERROR = 'error',
        TIME_RANGE_ALL_TIME = 'all',
        TIME_RANGE_4WEEKS = '28',
        TIME_RANGE_7DAYS = '7',
        TIME_RANGE_1DAY = '1',
        TIME_RANGE_POPUP_SELECTOR = '.js-timerange-popup',
        TIME_RANGE_LINK_SELECTOR = '.js-timerange-link',
        ERROR_CLANS_NOT_AVAILABLE = 100,
        ERROR_INPUT = 200,
        ERROR_NO_CLAN = 301,
        ERROR_NO_FRIENDS = 302,
        ERROR_USER_NOT_FOUND = 303,
        ERROR_NOT_AUTHORIZED = 401,
        ERROR_DATE_EXPIRED = 404,
        ERROR_NO_DATA = 999,
        AVAILABLE_SOCIAL_GROUPS = [SOCIAL_GROUP_ALL, SOCIAL_GROUP_FRIENDS, SOCIAL_GROUP_CLAN],
        DEFAULT_SOCIAL_GROUP = SOCIAL_GROUP_ALL,
        DEFAULT_TIME_RANGE = TIME_RANGE_ALL_TIME,
        FRACTIONAL_COLUMNS = ['wins_ratio', 'hits_ratio', 'xp_avg', 'damage_avg', 'survived_ratio', 'frags_avg', 'spotted_avg'],
        TIMERANGE_CONSTS = { 
            // Available date filters (all days, 28 days, 7 days, 1 day)
            'all': {
                allowedColumns:  ['global_rating', 'battles_count', 'frags_count', 'damage_dealt', 'xp_max', 'wins_ratio', 'hits_ratio', 'xp_avg'],
                defaultSort:     'battles_count',
                minBattlesCount: 1000
            },
            '28': {
                allowedColumns:  ['frags_count', 'wins_ratio', 'hits_ratio', 'xp_avg', 'damage_avg', 'survived_ratio', 'frags_avg', 'spotted_avg'],
                defaultSort:     'xp_avg',
                minBattlesCount: 100
            },
            '7': {
                allowedColumns:  ['hits_ratio', 'xp_amount', 'frags_count', 'damage_dealt', 'spotted_count', 'xp_avg', 'frags_avg'],
                defaultSort:     'xp_avg',
                minBattlesCount: 20
            },
            '1': {
                allowedColumns:  ['hits_ratio', 'xp_amount', 'frags_count', 'damage_dealt', 'spotted_count'],
                defaultSort:     'xp_amount',
                minBattlesCount: 5
            }
        },
        ajaxRequestCounter = 0,
        ajaxTomorrowBattlesRequestCounter = 0,
        profileRatingModelObj;

    if (initialSearchValues === undefined) {
        initialSearchValues = {};
    }
        
    // Cleanup, deletes expired cache data
    amplify.store();

    // Helpers for incorrect values
    function correctTimeRange(newValue) {
        if (TIMERANGE_CONSTS[newValue] === undefined) {
            newValue = DEFAULT_TIME_RANGE;
        }
        return newValue;
    }

    function correctSocialGroup(newValue) {
        if (_.indexOf(AVAILABLE_SOCIAL_GROUPS, newValue) === -1) {
            newValue = DEFAULT_SOCIAL_GROUP;
        }
        return newValue;
    }

    var ProfileRatingModel = function() {
        var self = this;

        self.isLoading = ko.observable(false);
        self.error = ko.observable(false);
        self.errorCode = ko.observable(false);
        self.additionalInfo = ko.observable(false);
        self.authorizedUserId = ko.observable(window.AUTHORIZED_ACCOUNT_ID.toString());
        self.currentUser = ko.observable(false);


        self.searchTimeRange = ko.observable(correctTimeRange(initialSearchValues.searchTimeRange));
        self.searchSocialGroup = ko.observable(correctSocialGroup(initialSearchValues.searchSocialGroup));
        self.searchDate = ko.observable(parseInt(initialSearchValues.searchDate, 10));

        self.tomorrowBattlesLeftCache = ko.observable({'1': 0, '7':0, '28': 0, 'all': 0});
        self.forceTomorrowBattlesLeftUpdate = ko.observable();

        // Method called from ko template
        self.getMinimumBattlesCount = function() {

            return TIMERANGE_CONSTS[self.searchTimeRange()].minBattlesCount;

        };

        // Method called from ko template
        self.hideTimeRangePopup = function() {

            $(TIME_RANGE_POPUP_SELECTOR).hide();
            $(document).unbind('click.wgtimerangepopup');
            
        };
        
        // Method called from ko template
        self.toggleTimeRangePopup = function() {

            var $popup = $(TIME_RANGE_POPUP_SELECTOR),
                $link = $(TIME_RANGE_LINK_SELECTOR),
                linkPos = $link.position();
                
            if ($popup.is(':visible')) {
            
                self.hideTimeRangePopup();
                return;

            }

            $popup
                .show()
                .css({
                        'left': (linkPos.left + ($link.width() / 2)) - ($popup.width() / 2),
                        'top': linkPos.top + $link.outerHeight()
                     });

            $(document).bind('click.wgtimerangepopup', function(e) {

                var $target = $(e.target);
                if ($target.parents(TIME_RANGE_POPUP_SELECTOR).length === 0 && $target.closest(TIME_RANGE_LINK_SELECTOR).length === 0) {
                    self.hideTimeRangePopup();
                }
                
            });

            return false;
        };

        // Method called from ko template
        self.hideSocialGroupPopup = function() {

            $(SOCIAL_GROUP_POPUP_SELECTOR).hide();
            $(document).unbind('click.wgsocialgrouppopup');
            
        };
        
        // Method called from ko template
        self.toggleSocialGroupPopup = function() {

            var $popup = $(SOCIAL_GROUP_POPUP_SELECTOR),
                $link = $(SOCIAL_GROUP_LINK_SELECTOR),
                linkPos = $link.position();
                
            if ($popup.is(':visible')) {
            
                self.hideSocialGroupPopup();
                return;

            }

            $popup
                .show()
                .css({
                        'left': (linkPos.left + ($link.width() / 2)) - ($popup.width() / 2),
                        'top': linkPos.top + $link.outerHeight()
                     });

            $(document).bind('click.wgsocialgrouppopup', function(e) {

                var $target = $(e.target);
                if ($target.parents(SOCIAL_GROUP_POPUP_SELECTOR).length === 0 && $target.closest(SOCIAL_GROUP_LINK_SELECTOR).length === 0) {
                    self.hideSocialGroupPopup();
                }
                
            });

            return false;
        };

        // Method called from ko template
        self.clickTimeRange = function(newTimeRange) {

            self.searchTimeRange(newTimeRange);
            self.hideTimeRangePopup();
            return false;

        };

        // Method called from ko template
        self.clickSocialGroup = function(newSocialGroup) {
        
            self.searchSocialGroup(newSocialGroup);
            self.hideSocialGroupPopup();
            return false;

        };
        
        // Computed value for ko template
        self.formattedDate = ko.computed(function() {

            var date = new Date(self.searchDate() * MILLISECONDS_IN_ONE_SECOND);
            return date.wotUTCDateString();

        }, self);
        
        self.formattedDateDayNumber = ko.computed(function() {

            var date = new Date(self.searchDate() * MILLISECONDS_IN_ONE_SECOND);
            return date.getUTCDate();
            
        }, self);
        
        self.formattedDateMonthNameGenetive = ko.computed(function() {

            var date = new Date(self.searchDate() * MILLISECONDS_IN_ONE_SECOND);
            return window.MONTH_NAMES_GENETIVE[date.getUTCMonth()];
            
        }, self);
        
        
        // Method called from ko template
        self.getTimeRangeTextById = function(id) {

            return window.TIME_RANGE_I18N[id];

        };

        // Method called from ko template
        self.getSocialGroupTextById = function(id) {

            return window.SOCIAL_GROUP_I18N[id];

        };
        
        // Method called from ko template
        self.visibleTimeRangeText = ko.computed(function() {

            return self.getTimeRangeTextById(self.searchTimeRange());

        });

        // Method called from ko template
        self.visibleSocialGroupText = ko.computed(function() {

            return self.getSocialGroupTextById(self.searchSocialGroup());

        });

        // Method called from ko template
        self.isRatingVisible = function(rating, timeRange) {

            timeRange = timeRange || self.searchTimeRange();
                      
            return (_.indexOf(TIMERANGE_CONSTS[timeRange].allowedColumns, rating) !== -1) ? true : false;

        };

        self.thousands = function(value) {
            if (!isNaN(parseFloat(value)) && isFinite(value)) {
                value = wgsdk.thousands(value);
            }
            return value;
        };
        
        self.isUserAuthorized = function() {
            return (window.AUTHORIZED_ACCOUNT_ID !== '');
        };

        self.isAuthorizedUserIsViewed = function() {
            return (window.AUTHORIZED_ACCOUNT_ID !== '' && window.AUTHORIZED_ACCOUNT_ID === window.VIEWED_ACCOUNT_ID);
        };

        self.viewedUserNickname = function() {
            return window.VIEWED_ACCOUNT_NICKNAME;
        };

        self.getLeaderboardLink = ko.computed(function() {
            return window.LEADERBOARD_URL + 
                   '#wot&lb_tr=' + self.searchTimeRange() + 
                   '&lb_sg=' + self.searchSocialGroup() +
                   '&lb_nick=' + window.VIEWED_ACCOUNT_NICKNAME;
        }, self);

        self.processJSON = function(data, cacheKey) {

            var allowCache = true, ratingData;

            self.isLoading(false);
            self.currentUser(false);

            if (data && data.status && data.status === STATUS_ERROR) {

                self.error(true);
                self.errorCode(data.error_code);
                
            }

            if (data && data.status && data.status === STATUS_OK) {

                if (data.user_rating && data.user_rating.length > 0) {

                    ratingData = data.user_rating[0];
                    $.each(ratingData, function(key, value) {
                        if (!isNaN(parseFloat(value)) && isFinite(value)) {
                            if (_.indexOf(FRACTIONAL_COLUMNS, key) !== -1) {
                                ratingData[key] = Number(value).toFixed(2);
                            }
                        }
                    });
                    ratingData['is_banned'] = data.is_banned;
                    self.currentUser(ratingData);

                    self.forceTomorrowBattlesLeftUpdate(Math.random());

                } else {
                    self.error(true);
                    self.errorCode(ERROR_NO_DATA);
                }
 
                
                // Save JSON into localStorage
                if (CACHE_ENABLED && cacheKey && data && data.status === STATUS_OK && !self.error()) {
                
                    if (data.authorized_user_id.toString() !== self.authorizedUserId().toString()) {
                        self.authorizedUserId(data.authorized_user_id.toString());
                        allowCache = false;
                    } 

                    if (self.searchDate() !== parseInt(data.rating_date[1], 10)) {
                        self.searchDate(parseInt(data.rating_date[1], 10));
                        allowCache = false;
                    }
                    
                    if (allowCache) {
                        amplify.store(cacheKey, data, {expires: CACHE_INVALIDATE_PERIOD});
                    }

                }
                
            }

        };
        

        // Update table from cache/ajax if some params were changed 
        ko.computed(function() {
        
            var params, cacheKey, cacheKeyObj, cachedJSON, url;

            self.isLoading(true);
            self.error(false);
            self.additionalInfo(false);

            params = { 'timerange': self.searchTimeRange(), 
                       'group': self.searchSocialGroup()
                     };

                     
            cacheKeyObj = $.extend({}, params, {
                'version': CACHE_DATA_FORMAT_VERSION,
                'account_id': window.VIEWED_ACCOUNT_ID,
                'cached_object': 'profile_rating',
                'date': self.searchDate(),
                'logged_in_user_id': self.authorizedUserId()
            });
            cacheKey = JSON.stringify(cacheKeyObj);

            cachedJSON = amplify.store(cacheKey);
            
            ++ajaxRequestCounter;
            
            if (CACHE_ENABLED && cacheKey !== '' && cachedJSON) {

                self.processJSON(cachedJSON, undefined);

            } else {
            
                url = window.ACCOUNT_RATING_URL;

                (function(localRequestCounter) { 

                    $.ajax({
                        'url': url,
                        'data': params,
                        'dataType': 'json',
                        'success': function(data) {

                            if (localRequestCounter === ajaxRequestCounter) {
                                if (data) {
                                    self.processJSON(data, cacheKey);
                                } else {
                                    self.error(true);
                                    self.errorCode(ERROR_NO_DATA);
                                    self.isLoading(false);
                                }
                            }

                        },
                        'error': function() {

                            if (localRequestCounter === ajaxRequestCounter) {
                                self.error(true);
                                self.errorCode(ERROR_NO_DATA);
                                self.isLoading(false);
                            }

                        }
                    });

                })(ajaxRequestCounter);

            }
            
        }, self).extend({ throttle: 1 });

        // Update tomorrow battles left
        ko.computed(function() {
            var params, cacheKeyObj, cacheKey, cachedJSON;

            self.forceTomorrowBattlesLeftUpdate();

            params = {
                logged_in_user_id: self.authorizedUserId()
            };

            cacheKeyObj = $.extend({}, params, {
                'version': CACHE_DATA_FORMAT_VERSION,
                'cached_object': 'tomorrow_battles_left_profile'
            });
            cacheKey = JSON.stringify(cacheKeyObj);

            ++ajaxTomorrowBattlesRequestCounter;

            if (ajaxTomorrowBattlesRequestCounter == 1 || !self.authorizedUserId() || !self.isAuthorizedUserIsViewed()) {
                return;
            }

            cachedJSON = amplify.store(cacheKey);

            if (TOMORROW_BATTLES_COUNT_CACHE_ENABLED && cacheKey !== '' && cachedJSON && cachedJSON.battles_count_left) {

                self.tomorrowBattlesLeftCache(cachedJSON.battles_count_left);

            } else {

                (function(localRequestCounter) {

                    $.ajax({
                        'url': window.GET_TOMORROW_BATTLES_LEFT_URL,
                        'data': {r: Math.random()},
                        'dataType': 'json',
                        'success': function(data) {

                            if (localRequestCounter === ajaxTomorrowBattlesRequestCounter) {
                                if (data && data.battles_count_left) {
                                    self.tomorrowBattlesLeftCache(data.battles_count_left);
                                    if (TOMORROW_BATTLES_COUNT_CACHE_ENABLED) {
                                        amplify.store(cacheKey, data, {expires: TOMORROW_BATTLES_COUNT_CACHE_INVALIDATE_PERIOD});
                                    }
                                }
                            }

                        },
                        'error': function(){
                            console.log(window.GET_TOMORROW_BATTLES_LEFT_URL);
                        }
                    });

                })(ajaxTomorrowBattlesRequestCounter);

            }

        }, self);

        self.tomorrowBattlesLeft = ko.computed(function() {

            if (!self.authorizedUserId() || !self.tomorrowBattlesLeftCache()) {
                return 0;
            }

            return self.tomorrowBattlesLeftCache()[self.searchTimeRange()] || 0;
        }, self);

        self.tomorrowBattlesLeftMessage = ko.computed(function() {
            var object_dict = {
                    battles_left: wgsdk.thousands(self.tomorrowBattlesLeft()),
                    bold_start_tag: '<span class="b-ratings-hlight">',
                    bold_end_tag: '</span>'
                },
                fmts = ngettext("Чтобы попасть в этот рейтинг завтра, проведите %(bold_start_tag)s%(battles_left)s бой%(bold_end_tag)s.",
                                "Чтобы попасть в этот рейтинг завтра, проведите %(bold_start_tag)s%(battles_left)s боёв%(bold_end_tag)s.", object_dict.battles_left);
            return interpolate(fmts, object_dict, true);
        }, self).extend({ throttle: 1 });

    };
    
    profileRatingModelObj = new ProfileRatingModel();
    ko.applyBindings(profileRatingModelObj);
    
};
    
    
$(function() {

    new ProfileRating({
        searchDate: window.START_RATING_TIMESTAMP
    });

});
    

})(jQuery, window, document, ko, wot_hl, amplify, _, wgsdk, tooltipReset);
