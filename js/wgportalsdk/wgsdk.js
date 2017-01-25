wgsdk.step = (function ($) {
    var obj = function (stepWrap) {

        var content = stepWrap.find('.js-step'),
            contentItem = content.find('.js-step-item'),
            contentItemLast = contentItem.last(),
            contentItemLength = contentItem.length,
            allItemsWidth = 0;

        contentItem.each(function () {
            allItemsWidth = allItemsWidth + $(this).width();
        });

        var indent = Math.floor((content.width() - allItemsWidth) / (contentItemLength - 1)) + 'px';
        contentItem.last().addClass('js-last');

        contentItem.each(function () {
            if (!$(this).hasClass('js-last')) {
                $(this).css('padding-right', indent);
                $(this).children('.js-step-arrow').show().css({
                    'width': indent
                });
            }
        });
    };
    return obj;
}(jQuery));

wgsdk.thousands = (function ($) {

    var obj = function(number, reduce, startFrom) {
        "use strict";

        var result,
            i = 0;

        if (reduce && startFrom <= number) {
            var suffix = '';

            if (number > 1000000) {
                number /= 1000000;
                suffix = ' M';
            }
            if (number > 1000) {
                number /= 1000;
                suffix = ' K';
            }
            result = number;
            if (suffix) {
                result = number.toFixed(2) + suffix;
            }
            return result;
        }

        var dotted = '';
        number = number.toString();
        var dotPosition = number.search(/\./);
        if (dotPosition > -1) {
            dotted = get_format('DECIMAL_SEPARATOR') || '.';
            dotted += number.substr(dotPosition + 1);
            number = number.substr(0, dotPosition);
        }

        result = '';

        var sign = '';
        if (number.substr(0, 1) === '-') {
            number = number.substr(1);
            sign = '-';
        }

        var len = number.length;
        for (i = 0; i < len; ++i) {

            if (i !== 0 && (len - i) !== 0 && (len - i) % 3 === 0) {
                result += wgsdk.vars.THOUSAND_SEPARATOR;
            }
            result += number.charAt(i);
        }
        return sign + result + dotted;
    };
    return obj;
}(jQuery));


wgsdk.uniqueid = (function () {
    /* UUID rfc4122 */

    var obj = function(){
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
           var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
           return v.toString(16);
        });
    };
    return obj;
}())


wgsdk.base64 = (function () {
    /* http://javascript.ru/php/base64_encode */

    var obj = {
        // private property
        _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

        // public method for encoding
        encode : function (input) {
            var output = "",
                chr1, chr2, chr3, enc1, enc2, enc3, enc4,
                i = 0;

            input = wgsdk.base64._utf8_encode(input);

            while (i < input.length) {

                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);

                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;

                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }

                output = output +
                this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
                this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

            }

            return output;
        },

        // public method for decoding
        decode : function (input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;

            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            while (i < input.length) {

                enc1 = this._keyStr.indexOf(input.charAt(i++));
                enc2 = this._keyStr.indexOf(input.charAt(i++));
                enc3 = this._keyStr.indexOf(input.charAt(i++));
                enc4 = this._keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

            }

            output = wgsdk.base64._utf8_decode(output);

            return output;

        },

        // private method for UTF-8 encoding
        _utf8_encode : function (string) {
            string = string.replace(/\r\n/g,"\n");
            var utftext = "", n;

            for (n = 0; n < string.length; n++) {

                var c = string.charCodeAt(n);

                if (c < 128) {
                    utftext += String.fromCharCode(c);
                }
                else if((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                }
                else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }

            }

            return utftext;
        },

        // private method for UTF-8 decoding
        _utf8_decode : function (utftext) {
            var string = "";
            var i = 0;
            var c = c1 = c2 = 0;

            while ( i < utftext.length ) {

                c = utftext.charCodeAt(i);

                if (c < 128) {
                    string += String.fromCharCode(c);
                    i++;
                }
                else if((c > 191) && (c < 224)) {
                    c2 = utftext.charCodeAt(i+1);
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                    i += 2;
                }
                else {
                    c2 = utftext.charCodeAt(i+1);
                    c3 = utftext.charCodeAt(i+2);
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    i += 3;
                }

            }

            return string;
        }
    };
    return obj;
}())

wgsdk.auth_confirm = function(next_url){
    if(wgsdk.vars.AUTH_CONFIRMATION_URL){
        var url = wgsdk.vars.AUTH_CONFIRMATION_URL+"?next="+escape(next_url);
        document.location = url;
    }else{
        wgsdk.forms.auth({
            success: function() {
                document.location = next_url;
            }
        });
    }
}
