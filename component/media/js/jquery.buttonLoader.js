/*A jQuery plugin which add loading indicators into buttons
* By Minoli Perera
* MIT Licensed.
*/
(function ($) {
    $('.popx-has-spinner').attr("disabled", false);
    $.fn.buttonLoader = function (action) {
        var self = $(this);
        if (action == 'start') {
            if ($(self).attr("disabled") == "disabled") {
                return false;
            }
            $('.popx-has-spinner').attr("disabled", true);
            $(self).attr('data-btn-text', $(self).text());
            var text = '&nbsp;';
            if($(self).attr('data-load-text') != undefined && $(self).attr('data-load-text') != ""){
                var text = $(self).attr('data-load-text');
            }
            $(self).html('<span class="spinner"></span> '+text);
            $(self).addClass('active');
        }
        if (action == 'stop') {
            $(self).html($(self).attr('data-btn-text'));
            $(self).removeClass('active');
            $('.popx-has-spinner').attr("disabled", false);
        }
    }
})(jQuery);