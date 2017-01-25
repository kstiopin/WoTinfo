$(document).ready(function(e) {
    $('.js-auth-link').live("click", function() {
        wgsdk.forms.auth_dialog();
        return false;
    });

    $('.js-exit-link').live("click", function(e){
        e.preventDefault();
        var nextUrl = $('#js-next-url-value').text();
        $.ajax({
            type: 'post',
            url: "/auth/delete/?next="+nextUrl,
            success: function(data) {
                if (data && data.data && data.redirect_to) {
                    location.href = data.redirect_to;
                }
                else {
                    location.reload();
                }
            }
        });
    });

    wgsdk.expandable_window('#js-more-wrapper');
    wgsdk.expandable_window('#js-contr-wrapper');

    var searchPaths = {'clans': '/community/clans/?type=fast_search',
                       'accounts': '/community/accounts/fast_search/' };

    var searchForm = $('#js-menu-search-form');

    function InintSearchSwitcher(type) {
        var base = 'js-menu-search-'+type;
        var switcher = $('#'+base);
        var postUrl = searchPaths[type];
        $('#js-menu-search-switcher').change(function(e){
            searchForm.attr('action', postUrl);
            $('.js-menu-search-tooltip').toggleClass('js-hidden', true);
            $('.'+base+'-tooltip').toggleClass('js-hidden', false);
        });
    };

    InintSearchSwitcher('accounts');
    InintSearchSwitcher('clans');

	/* input[readonly] and Backspace in IE */
	function stopBackspace(windowEvent) {
		var code = windowEvent.keyCode;
		if(code==8) {
			//Backspace
			windowEvent.stopPropagation();
			windowEvent.preventDefault();
		}
	};
	$("input[readonly]").live('keydown', function(event) {
		stopBackspace(event);
	});

    var banners = $('.js-b4rs-left,.js-b4rs-right');
    function UpdateBannersVisibility(){
        if ($(window).width() < 1440){
            banners.hide();
        }else{
            banners.show();
        }
    };
    UpdateBannersVisibility();
    $(window).resize(UpdateBannersVisibility);
});

function ShowSpoiler(obj, id, hide_text, show_text){
    var spoiler_obj = $('#spoiler_'+id)
    var link_obj = $(obj);
    if( spoiler_obj.css('display') == 'none'){
        spoiler_obj.show();
        link_obj.text(hide_text);
    }else{
        spoiler_obj.hide();
        link_obj.text(show_text);
    }
}
