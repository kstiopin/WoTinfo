(function ($, window, document, wgsdk, WG, undefined) {

    'use strict';

    $.vehicleTable = function(element, options) {
        var self = this,
            defaultOptions = {
                vehicleDetailedStatisticsUrl: ''
            };
        
        self.$element = $(element);
        self.options = $.extend({}, defaultOptions, options);
        self.tableDropdownLinks = null;
        self.sorterEnabled = false;
        self.defaultSort = [[1, 1]];
        
        self.enableSorter = function() {
            if (!self.sorterEnabled)
            {
                self.$element.tablesorter({
                    sortList: self.defaultSort,
                    sortInitialOrder: 'desc',
                    textExtraction: {
                        0: function(node) {
                            return $(node).find('span').data('veh_level');
                        },
                        1: function(node) {
                            return $(node).data('battle_count');
                        },
                        3: function(node) {
                            return $(node).find('img').data('badge_code');
                        }
                    },
                    headers: {
                        4: {
                            sorter: false
                        }
                    }
                }).bind('sortEnd', function(sorter) {
                    self.defaultSort = sorter.target.config.sortList;
                });
                self.enableDropdownAll();
                self.sorterEnabled = true;
            }
        };

        self.disableSorter = function() {
            if (self.sorterEnabled) {
                self.$element.trigger('destroy').unbind('sortEnd');
                self.enableDropdownAll();
                self.sorterEnabled = false;
            }
        };

        self.setSorter = function(enable) {
            if (enable) {
                self.enableSorter();
            } else {
                self.disableSorter();
            }
        };

        self.enableDropdownAll = function() {
            var dropdown = self.$element.find('.js-table-dropdown-all');
            dropdown.closest('th').unbind().click(function() {
                var $this = dropdown, openedItemsCount;

                $this.toggleClass('js-open');

                if ($this.hasClass('js-open')) {

                    $this.parents('tr').addClass('js-open');
                    self.tableDropdownLinks.each(function() {
                        $(this)
                            .addClass('js-open')
                            .parents('tbody')
                                .next()
                                .fadeIn();
                    });

                    self.enableSorter();

                } else {
 
                    $this.parents('tr').removeClass('js-open');
                    self.tableDropdownLinks.each(function(){
                        $(this)
                            .removeClass('js-open')
                            .parents('tbody')
                                .next()
                                    .fadeOut()
                                    .find('.js-opened')
                                        .trigger('click');
                    });

                    openedItemsCount = self.$element.find('.js-table-dropdown-link.js-open').length;

                    self.setSorter(openedItemsCount !== 0);

                    // Sorter recreates a header, so we need to manually remove class
                    self.$element.find('.js-table-dropdown-all').removeClass('js-open');

                }

                return false;

            });
        };

        self._animateDetailedRow = function($detailedRow, selector) {
            if ($.browser.msie && parseInt($.browser.version, 10) <= 7) {
                $detailedRow.find('.js-wheel-death').hide();
                $detailedRow.find(selector).show();
            } else {
                $detailedRow
                    .find('.js-wheel-death')
                        .animate({opacity: 0}, 100)
                        .animate({height: 0}, 150);
        
                $detailedRow
                    .find(selector)
                        .css('opacity', 0)
                        .slideDown(function(){
                            $(this).animate({opacity: 1}, 200);
                        });
            }
        }
        
        self.init = function() {
            self.tableDropdownLinks = self.$element.find('.js-table-dropdown-link');
            self.detailsDropdownLinks = self.$element.find('.js-vehicle-dropdown-link');
            
            self.detailsDropdownLinks.each(function() {
                var $row = $(this),
                    $detailedRow = $row.next('tr');

                $detailedRow.slideUp();

                $row.on('click', function() {
                    var isOpened = $row.hasClass('js-opened'),
                        $detailsTemplate;

                    if ($detailedRow.find('.js-slide-animate').is(':animated')) {
                        return false;
                    }
                        
                    if (!$detailedRow.hasClass('js-cloned')) {
                        $detailsTemplate = $('#js-vehicle-details-template').clone();
                        $detailedRow.find('td').append($detailsTemplate.children());
                        $detailedRow.addClass('js-cloned');
                    }

                    if ($.browser.msie && parseInt($.browser.version, 10) <= 7) {
                        $row
                            .toggleClass('t-profile_tankstype__open')
                            .toggleClass('js-opened')
                            .next('tr')
                                .toggle();
                    } else {
                        if (isOpened) {
                            $row.removeClass('t-profile_tankstype__open')
                                .removeClass('js-opened')
                                .next('tr')
                                    .show()
                                    .find('.js-slide-animate')
                                        .slideUp(300, function() {
                                            var $this = $(this),
                                                slider = $this.find('.js-achievement_slider').data('slider');
                                            
                                            if (slider !== undefined) {
                                                slider.resetSlider();
                                            }

                                            $this.closest('tr').hide();
                                        });
                        } else {
                            $row.addClass('t-profile_tankstype__open')
                                .addClass('js-opened')
                                .next('tr')
                                    .show()
                                    .find('.js-slide-animate')
                                        .hide()
                                        .slideDown(300);
                        }
                    }
                    if (!$row.hasClass('js-loading') && !$row.hasClass('js-loaded')) {
                        $row.addClass('js-loading');
                        $.ajax({
                            url: self.options.vehicleDetailedStatisticsUrl,
                            data: {
                                vehicle_cd: $detailedRow.data('vehicleCd')
                            },
                            dataType: 'json',
                            error: function(data) {
                                self._animateDetailedRow($detailedRow, '.js-error-data');
                            },
                            success: function(data) {
                                var $ul, $template, vehicleUrl = $detailedRow.data('vehicleUrl');
                                if (data.status === 'ok') {
                                    
                                    if (vehicleUrl !== '') {

                                        $detailedRow
                                            .find('.js-vehicle-description-link')
                                                .find('.js-vehicle-url')
                                                    .prop('href', vehicleUrl)
                                                .end()
                                            .show();
                                    }

                                    $detailedRow.find('.js-data').each(function() {

                                        var $field = $(this),
                                            dataField = $field.data('field'),
                                            dataPostfix = $field.data('postfix') || '',
                                            value = data[dataField], 
                                            type = $field.data('type') || 'number';
                                        
                                        if (typeof value !== 'undefined') {
                                            $field.html(value + dataPostfix);
                                        }

                                    });

                                    $ul = $detailedRow.find('.js-minislider_list');
                                    $template = $ul.find('.js-minislider_item');
                                    
                                    if (data.achievements.length === 0) {
                                        $detailedRow.find('.js-achievement_slider').hide();
                                    }

                                    _.each(data.achievements, function(item, index) {
                                        var $cloned = $template.clone(),
                                            $img = $cloned.find('img'),
                                            imageName = item.name.toLowerCase();

                                        if (item.type === 'class') {
                                            imageName += item.count || 4;
                                        } else {
                                            if (item.count > 1) {
                                                $cloned.find('.js-count').html(item.count);
                                                $cloned.find('.js-count-wrapper').show();
                                            }
                                            if ((index + 1) === data.achievements.length) {
                                                $cloned.addClass('b-vehicle-slider_item__last');
                                            }
                                        }
                                            
                                        $cloned.attr('id', 'js-achivement-' + item.name);
                                        $img.attr('src', $img.data('prefix') + imageName + $img.data('postfix'));
                                        $cloned.appendTo($ul);

                                    });
                                    $template.remove();
                                    
                                    self._animateDetailedRow($detailedRow, '.js-loaded-data');

                                    WG.miniSlider(7, { selector: $detailedRow.find('.js-achievement_slider') });

                                } else {
                                    if (data.status === 'error' && data.code === 409) {
                                        self._animateDetailedRow($detailedRow, '.js-error-no-data');
                                    } else {
                                        self._animateDetailedRow($detailedRow, '.js-error-data');
                                    }
                                }
                            }
                        });
                    }
                    return false;
                });
            });

            self.tableDropdownLinks.each(function() {
                var $this = $(this);
                $this.parents('tbody').next().hide();
                $this.click(function() {
                    var openedItemsCount;

                    if ($this.hasClass('js-open')) {
                        $this
                            .parents('tbody')
                                .next()
                                    .find('.js-opened')
                                        .trigger('click');
                    }

                    $this
                        .toggleClass('js-open')
                        .parents('tbody')
                            .next()
                                .fadeToggle();
    
                    openedItemsCount = self.$element.find('.js-table-dropdown-link.js-open').length;
                    self.setSorter(openedItemsCount !== 0);

                    if (openedItemsCount === 0) {
                        self.$element
                                .find('.js-table-dropdown-all')
                                    .removeClass('js-open')
                                    .parents('tr')
                                        .removeClass('js-open');    
                    }
                    else if (openedItemsCount === self.$element.find('.js-table-dropdown-link').length) {
                        self.$element
                                .find('.js-table-dropdown-all')
                                    .addClass('js-open')
                                    .parents('tr')
                                        .addClass('js-open');    
                    }
                
                    return false;
                });
            });
            self.enableDropdownAll();
        };

        self.init();
    };
    
    $.fn.vehicleTable = function(options) {
        return this.each(function() {
            (new $.vehicleTable(this, options));
        });
    };

}(jQuery, window, document, wgsdk, WG));

$(document).ready(function() {

    // Achivements link show/hide
    $('.js-achivements-showhide').click(function() {
        $(this).toggleClass('b-vertical-arrow__open');
        $('.js-full-achievements').toggle();
        $('.js-short-achievements').toggle();
        $('html, body').animate({
            scrollTop: $('.js-achievements-header').offset().top - 10
        }, 100);

        return false;
    });

    setTimeout(function() {
        // Table of tanks drop/down
        if ($('.js-table-dropdown-link').length) {
            $('.js-vehicle-table').vehicleTable({vehicleDetailedStatisticsUrl : window.VEHICLE_DETAILED_STATISTICS_URL});
        }
    }, 100);
 
    
});


$(function(){

    // For IE <= 8
    var IE='\v'=='v';

    //speedometr arrow for IE <=8
    if(IE){
        $(".b-speedometer-arrow").each(function(){
            var item = $(this),
                angle = item.data('deg');

            item.addClass('js-speedometer-arrow__old-ie');

            var sizeopt={
                w:item.width(),
                h:item.height()
            };
            var rad = (angle * Math.PI) / 180.0;
            cos = Math.cos(rad),
                sin = Math.sin(rad);

            var filter='progid:DXImageTransform.Microsoft.Matrix(sizingMethod="auto expand", M11 = ' + cos + ', M12 = ' + (-sin) + ', M21 = ' + sin + ', M22 = ' + cos + ')';
            var text="-ms-filter:"+filter+";filter:"+filter+";";
            //var text="-ms-filter:"+filter+";";
            //var text="filter:"+filter+";";

            item[0].style.cssText=text;

            var w=item.width();
            var h=item.height();
            item.css({'margin-left':-Math.round((w-sizeopt.w)/2),'margin-top':-Math.round((h-sizeopt.h)/2)});
        });
    }
});


