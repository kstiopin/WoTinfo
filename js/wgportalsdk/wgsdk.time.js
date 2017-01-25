wgsdk = window.wgsdk || {};
wgsdk.vars = window.wgsdk.vars || {};

wgsdk.time = {};
wgsdk.time.init = (function () {

    var obj = function(){
        var wotTimeDelimiter = wgsdk.vars.TIME_DELIMITER || ':';
        var wotDateDelimiter = wgsdk.vars.DATE_DELIMITER || '.';
        var wotDateFormat = wgsdk.vars.DATE_FORMAT || 'dmy';

        function PadZeros2(number){
            if(number === undefined) {
                return "00";
            }
            var str = number.toString();
            switch(str.length) {
            case 0: return "00";
            case 1: return "0"+str;
            default: return str;
            }
        }

        function FormatDate(day, month, year, delimiter) {
            var str = '';
            for (var i=0; i<wotDateFormat.length; ++i) {
                switch (wotDateFormat.charAt(i).toLowerCase()) {
                case 'y': {
                    str += year;
                    break;
                }
                case 'm': {
                    str += month;
                    break;
                }
                case 'd': {
                    str += day;
                    break;
                }
                }
                if (i != wotDateFormat.length - 1) {
                    str += delimiter;
                }
            }
            return str;
        }

        Date.prototype.wotGetDatepickerDateFormat = function() {
            var str = '';
            for (var i=0; i<wotDateFormat.length; ++i) {
                switch (wotDateFormat.charAt(i).toLowerCase()) {
                case 'y': {
                    str += 'yy';
                    break;
                }
                case 'm': {
                    str += 'mm';
                    break;
                }
                case 'd': {
                    str += 'dd';
                    break;
                }
                }
                if (i != wotDateFormat.length - 1) {
                    str += wotDateDelimiter;
                }
            }
            return str;
        };

        Date.prototype.wotGetDatepickerTimeFormat = function() {
            return 'hh'+wotTimeDelimiter+'mm'+wotTimeDelimiter+'ss';
        };

        Date.prototype.wotFormatTime = function(h, m, s) {
            var str =
                PadZeros2(h) + wotTimeDelimiter +
                PadZeros2(m) + wotTimeDelimiter +
                PadZeros2(s);
            return str;
        };

        Date.prototype.wotFormatTimeHM = function(h, m) {
            if (m === undefined) {
                if (h === undefined) {
                    h = this.getHours();
                    m = this.getMinutes();
                }
                else {
                    h = Math.floor(h / 1000);

                    m = Math.floor(h % (60*60) / 60);
                    h = Math.floor(h % (60*60*24) / (60*60));
                }
            }
            var str = PadZeros2(h) + wotTimeDelimiter + PadZeros2(m);
            return str;
        };

        Date.prototype.wotFormatTimeMS = function(m, s) {
            if (s === undefined) {
                if (m === undefined) {
                    m = this.getMinutes();
                    s = this.getSeconds();
                }
                else {
                    m = Math.floor(m / 1000);

                    s = m % 60;
                    m = Math.floor(m % (60*60) / 60);
                }
            }
            var str = PadZeros2(m) + wotTimeDelimiter + PadZeros2(s);
            return str;
        };

        Date.prototype.wotFormatDate = function(day, month, year) {
            if (day === undefined) day = this.getDate();
            if (month === undefined) month = this.getMonth();
            if (year === undefined) year = this.getFullYear();

            // universal big-endian format time
            day = PadZeros2(parseInt(day));
            month = PadZeros2(parseInt(month) + 1);

            var str = FormatDate(day, month, year, wotDateDelimiter);

            return str;
        };


        function FormatDateWithoutYear(day, month, delimiter) {
            date_array = [];
            for (var i=0; i<wotDateFormat.length; ++i) {
                var code = wotDateFormat.charAt(i).toLowerCase();
                if (code == 'm') {
                    date_array.push(month)
                }else if(code=='d'){
                    date_array.push(day)
                }
            }
            return date_array.join(delimiter)
        }

        Date.prototype.wotFormatDateWithoutYear = function(day, month) {
            if (day === undefined) day = this.getDate();
            if (month === undefined) month = this.getMonth();

            // universal big-endian format time
            day = PadZeros2(parseInt(day));
            month = PadZeros2(parseInt(month) + 1);
            var str = FormatDateWithoutYear(day, month, wotDateDelimiter);
            return str;
        };


        Date.prototype.wotUTCDateStringWithoutYear = function(){
            var str = this.wotFormatDateWithoutYear(this.getUTCDate(),
                                                    this.getUTCMonth());
            return str;
        };
        
        Date.prototype.wotTimeString = function(time){
            if (time !== undefined) {
                time = Math.floor(time / 1000);

                var s = time % 60;
                var m = ( (time - s) / 60) % 60;
                var h = (time - m * 60 - s) / (60*60) % 24;
                return this.wotFormatTime(h, m ,s);
            }

            return this.wotFormatTime(this.getHours(), this.getMinutes(), this.getSeconds());
        };

        Date.prototype.wotUTCTimeString = function(){
            var str =
                PadZeros2(this.getUTCHours()) + wotTimeDelimiter +
                PadZeros2(this.getUTCMinutes()) + wotTimeDelimiter +
                PadZeros2(this.getUTCSeconds());
            return str;
        };

        Date.prototype.wotDateString = function(){
            return this.wotFormatDate();
        };
        Date.prototype.wotUTCDateString = function(){
            var str = this.wotFormatDate(this.getUTCDate(),
                                        this.getUTCMonth(),
                                        this.getUTCFullYear());
            return str;
        };

        Date.prototype.wotDateTimeString = function(){
            return this.wotDateString()+' '+this.wotFormatTimeHM();
        };
        Date.prototype.wotUTCDateTimeString = function(){
            return this.wotUTCDateString()+' '+this.wotFormatTimeHM(this.getUTCHours(), this.getUTCMinutes());
        };

        // time in seconds
        // after converting, norm value to be in the same in [0h 0m 0s .. 23h 59m 59s]
        Date.prototype.wotTimeFromUTC = function(time) {
            time = Math.floor(time / 1000);

            var offset = -this.getTimezoneOffset() * 60;
            time += offset;

            var day = 24 * 60 * 60;

            time %= day;
            if (time < 0) {
                time += day;
            }
            return time * 1000;
        };

        Date.prototype.wotToLocaleDayOfWeek = function(dayNumber){

            if (dayNumber === undefined) dayNumber = this.getDay();

            switch(dayNumber) {
                case 0: return translate('TIME_SUNDAY');
                case 1: return translate('TIME_MONDAY');
                case 2: return translate('TIME_TUESDAY');
                case 3: return translate('TIME_WEDNESDAY');
                case 4: return translate('TIME_THURSDAY');
                case 5: return translate('TIME_FRIDAY');
                case 6: return translate('TIME_SATURDAY');
            }
            return this.getDay();
        };

        Date.prototype.wotToLocaleMonthName = function(monthNumber){

            if (monthNumber === undefined) monthNumber = this.getMonth();

            switch(monthNumber) {
                case 0: return translate('TIME_JANUARY');
                case 1: return translate('TIME_FEBRUARY');
                case 2: return translate('TIME_MARCH');
                case 3: return translate('TIME_APRIL');
                case 4: return translate('TIME_MAY');
                case 5: return translate('TIME_JUNE');
                case 6: return translate('TIME_JULY');
                case 7: return translate('TIME_AUGUST');
                case 8: return translate('TIME_SEPTEMBER');
                case 9: return translate('TIME_OCTOBER');
                case 10: return translate('TIME_NOVEMBER');
                case 11: return translate('TIME_DECEMBER');
            }

            return this.getMonth();
        };

        Date.prototype.wotToLocaleDateString = function(){
            var str = FormatDate(this.getDate(), this.wotToLocaleMonthName(), this.getFullYear(), ' ') + translate('TIME_YEAR_REDUCTION');
            return str;
        };

        Date.prototype.newUTCDate = function() {
            return new Date(
                this.getUTCFullYear(), this.getUTCMonth(), this.getUTCDate(),
                this.getUTCHours(), this.getUTCMinutes(), this.getUTCSeconds(),
                this.getUTCMilliseconds()
            );
        };
    };

    return obj

})();


function wotGetTimepickerDefaults() {
    var timeFormat = get_format('TIME_FORMAT');

    // 12-hour format strings from https://docs.djangoproject.com/en/dev/ref/templates/builtins/#date
    var timeTwelveHourFormats = ['A', 'a', 'f', 'g', 'h', 'P'];
    var timeTwelveHour = false;
    for (var i in timeTwelveHourFormats) {
        if (timeFormat.indexOf(timeTwelveHourFormats[i]) != -1)
            timeTwelveHour = true;
    }

    return {
        timeOnlyTitle: translate('TIME_DT_PICKER_CHOOSE_TIME'),
        timeText: translate('TIME_DT_PICKER_TIME'),
        hourText: translate('TIME_DT_PICKER_HOURS'),
        minuteText: translate('TIME_DT_PICKER_MINUTES'),
        secondText: translate('TIME_DT_PICKER_SECONDS'),
        currentText: translate('TIME_DT_PICKER_CURRENT'),
        closeText: translate('TIME_DT_PICKER_CLOSE'),
        cancelText: translate('TIME_DT_PICKER_CANCEL'),
        ampm: timeTwelveHour
    };
}

function wotGetDatepickerDefaults() {

    var date = new Date();

    return { closeText: translate('TIME_DT_PICKER_CLOSE'),
             prevText: translate('TIME_DT_PICKER_PREV'),
             nextText: translate('TIME_DT_PICKER_NEXT'),
             currentText: translate('TIME_DT_PICKER_TODAY'),
             monthNames: [ translate('TIME_JANUARY'),
                           translate('TIME_FEBRUARY'),
                           translate('TIME_MARCH'),
                           translate('TIME_APRIL'),
                           translate('TIME_MAY'),
                           translate('TIME_JUNE'),
                           translate('TIME_JULY'),
                           translate('TIME_AUGUST'),
                           translate('TIME_SEPTEMBER'),
                           translate('TIME_OCTOBER'),
                           translate('TIME_NOVEMBER'),
                           translate('TIME_DECEMBER')],
             monthNamesShort: [ translate('TIME_SHORT_JANUARY'),
                                translate('TIME_SHORT_FEBRUARY'),
                                translate('TIME_SHORT_MARCH'),
                                translate('TIME_SHORT_APRIL'),
                                translate('TIME_SHORT_MAY'),
                                translate('TIME_SHORT_JUNE'),
                                translate('TIME_SHORT_JULY'),
                                translate('TIME_SHORT_AUGUST'),
                                translate('TIME_SHORT_SEPTEMBER'),
                                translate('TIME_SHORT_OCTOBER'),
                                translate('TIME_SHORT_NOVEMBER'),
                                translate('TIME_SHORT_DECEMBER')],
             dayNames: [ translate('TIME_SUNDAY'),
                         translate('TIME_MONDAY'),
                         translate('TIME_TUESDAY'),
                         translate('TIME_WEDNESDAY'),
                         translate('TIME_THURSDAY'),
                         translate('TIME_FRIDAY'),
                         translate('TIME_SATURDAY')],
             dayNamesShort: [ translate('TIME_SHORT_SUNDAY'),
                              translate('TIME_SHORT_MONDAY'),
                              translate('TIME_SHORT_TUESDAY'),
                              translate('TIME_SHORT_WEDNESDAY'),
                              translate('TIME_SHORT_THURSDAY'),
                              translate('TIME_SHORT_FRIDAY'),
                              translate('TIME_SHORT_SATURDAY')],
             dayNamesMin: [ translate('TIME_MIN_SUNDAY'),
                            translate('TIME_MIN_MONDAY'),
                            translate('TIME_MIN_TUESDAY'),
                            translate('TIME_MIN_WEDNESDAY'),
                            translate('TIME_MIN_THURSDAY'),
                            translate('TIME_MIN_FRIDAY'),
                            translate('TIME_MIN_SATURDAY')],
             weekHeader: translate('TIME_DT_PICKER_WEEK_HEADER'),
             dateFormat: date.wotGetDatepickerDateFormat(),
             firstDay: 1,
             isRTL: false,
             showMonthAfterYear: false,
             yearSuffix: ''};
}


function wotUpdateDateTimeFields(selector_prefix) {
    if (selector_prefix){
        selector_prefix = selector_prefix + ' '
    }else{
        selector_prefix = ''
    }

    function GetDateObject(el) {
        var timestamp = parseInt(el.data('timestamp'), 10);

        if (!timestamp) return undefined;

        var date = new Date(timestamp * 1000);

        return date;
    }

    jQuery(selector_prefix + '.js-datetime-format').each(function(i, v) {
        var el = jQuery(v);
        var date = GetDateObject(el);
        if (date && date instanceof Date) {
            var str = date.wotDateTimeString();
            if (str) el.html(str);
        }
    });

    jQuery(selector_prefix + '.js-date-format').each(function(i, v) {
        var el = jQuery(v);
        var date = GetDateObject(el);
        if (date && date instanceof Date) {
            var str = date.wotDateString();
            if (str) el.html(str);
        }
    });

    jQuery(selector_prefix + '.js-date-format-utc').each(function(i, v) {
        var el = jQuery(v);
        var date = GetDateObject(el);
        if (date && date instanceof Date) {
            var str = date.wotUTCDateString();
            if (str) el.html(str);
        }
    });
    
    jQuery(selector_prefix + '.js-date-format-without-year').each(function(i, v) {
        var el = jQuery(v);
        var date = GetDateObject(el);
        if (date && date instanceof Date) {
            var str = date.wotFormatDateWithoutYear();
            if (str) el.html(str);
        }
    });

    jQuery(selector_prefix + '.js-time-format').each(function(i, v) {
        var el = jQuery(v);
        var date = GetDateObject(el);
        if (date && date instanceof Date) {
            var str = date.wotFormatTimeHM();
            if (str) el.html(str);
        }
    });
}


// by default jQuery does not availbale in django admin
if (window.jQuery) {

    wgsdk.time.init();

    jQuery(document).ready(function(){
        wotUpdateDateTimeFields();
    });

    ( function ($) {

        function Datetime(elem, param)
        {
            var api = this;
            var text = $(elem).text();

            if ( param.timestamp != null )
                text = param.timestamp;

            else if ($(elem).data( 'timestamp' ) != null)
                text = $(elem).data( 'timestamp' );

            var local  = new Date();
            var source = new Date( parseInt(text) * 1000 );
            var value  = source.wotDateTimeString();

            if ( param.style == "relative" )
            {
                if ( param.HM == undefined || param.HM == null )
                    param.HM = true;

                var milliseconds = new Date( local.getTime() - source.getTime() ).getTime();
                var minute = 60 * 1000;
                var hour = minute * 60;
                var day = ( hour * local.getHours() ) + ( minute * local.getMinutes() );
                var yesterday = day + ( hour * 24 );

                if ( milliseconds < minute ){
                    value = translate('DATETIME_ONE_MINUTE_AGO');

                } else if ( milliseconds < hour ) {
                    value = translate('DATETIME_ONE_HOUR_AGO');

                } else if ( milliseconds < day ) {
                    value = ( param.HM ) ? translate('DATETIME_TODAY') + ', ' + source.wotFormatTimeHM() : translate('DATETIME_TODAY');

                } else if ( milliseconds < yesterday ) {
                    value = ( param.HM ) ? translate('DATETIME_YESTERDAY') + ', ' + source.wotFormatTimeHM() : translate('DATETIME_YESTERDAY');

                } else {
                    value = ( param.HM ) ? source.wotDateTimeString() : source.wotDateString();
                }
            }

            $(elem).text( value );
            return this;
        }

        $.fn.datetime = function(param){
            var ret;

            this.each( function() {
                var elem = $(this);
                elem.data('wg_datetime', new Datetime(elem, param));
                ret = ret ? ret.add(elem) : elem;
            });

            return ret;
        };

        // wotTimePickerInit wotDatePickerInit start
        function wotDateTimePickerInitParams(params) {
            if (params.onClose) {
                var callback = params.onClose;
                params.onClose = function() {
                    callback();
                    $(this).parent().parent().removeClass('js-calendar-open');
                }
            }
            else {
                params.onClose = function() {
                    $(this).parent().parent().removeClass('js-calendar-open');
                }
            }
        }
        function wotTimePickerInit(widgetSelector, params) {
            wotDateTimePickerInitParams(params);
            widgetSelector.datetimepicker(params);
        }
        window.wotTimePickerInit = wotTimePickerInit;

        function wotDatePickerInit(widgetSelector, params) {
            wotDateTimePickerInitParams(params);
            widgetSelector.datepicker(params);
        }
        window.wotDatePickerInit = wotDatePickerInit;

        $(document).on("click", '.js-calendar-button', function(){
            if ($(this).parent().hasClass('js-calendar-open') ) {
                $(this).parent().removeClass('js-calendar-open');
            } else {
                $(this).parent().find('input').focus();
            }
        });
        $(document).on("focus", '.js-calendar-input', function(){
            $(this).parent().parent().addClass('js-calendar-open');
        });
        // wotTimePickerInit wotDatePickerInit end

    })(jQuery);

}
