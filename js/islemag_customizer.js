var entityMap = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    '\'': '&#39;',
    '/': '&#x2F;'
};


function islemag_escapeHtml(string) {
    'use strict';
    //noinspection JSUnresolvedFunction
    string = String(string).replace(new RegExp('\r?\n', 'g'), '<br />');
    string = String(string).replace(/\\/g, '&#92;');
    return String(string).replace(/[&<>"'\/]/g, function (s) {
        return entityMap[s];
    });

}

function islemag_refresh_banner_control() {
    'use strict';
    var values = {};
    var th = jQuery('.islemag-banner-settings-container');

    var banner_choice = th.find('.islemag-banner-select:checked').val();
    var banner_position = th.find('.islemag-banner-position:checked').val();
    var img_url = th.find('.custom_media_url').val();
    var link = th.find('.islemag-banner-link').val();
    var code = th.find('.islemag-banner-settings-text-control').val();
    if (( banner_choice === 'code' && code !== '' ) || ( banner_choice === 'image' && img_url !== '' ) || ( banner_position !== '' )) {
        values = {
            'choice': banner_choice,
            'position': banner_position,
            'image_url': img_url,
            'link': link,
            'code': islemag_escapeHtml(code)
        };
    }
    th.find('.islemag-banner-colector').val(JSON.stringify(values));
    th.find('.islemag-banner-colector').trigger('change');

}


jQuery(document).ready(function () {
    'use strict';
    /* Widget acordion */

    jQuery('#customize-theme-controls').on('click', '.islemag-ad-widget-top', function () {
        jQuery(this).next().slideToggle();
    });

    jQuery('#customize-theme-controls').on('change', '.islemag-small-ad-type', function () {
        var th = jQuery(this);
        if (th.is(':checked')) {

            if (th.val() === 'image') {
                th.parent().next().show();
                th.parent().next().next().hide();
            } else {
                th.parent().next().hide();
                th.parent().next().next().show();
            }
        }
    });

    jQuery('#customize-theme-controls').on('change', '.islemag-big-ad-type', function () {
        var th = jQuery(this);
        if (th.is(':checked')) {
            if (th.val() === 'image') {
                th.parent().parent().children('.islemag-big-ad-image').show();
                th.parent().parent().children('.islemag-big-ad-code').hide();
            } else {
                th.parent().parent().children('.islemag-big-ad-image').hide();
                th.parent().parent().children('.islemag-big-ad-code').show();
            }
        }
    });


    /* Banner control */

    jQuery('#customize-theme-controls').on('change', '.islemag-banner-select', function () {
        var value = jQuery(this).val();

        if (value === 'code') {
            jQuery(this).parent().children('.islemag-banner-choice-code').show();
            jQuery(this).parent().children('.islemag-banner-choice-image').hide();
        } else {
            jQuery(this).parent().children('.islemag-banner-choice-image').show();
            jQuery(this).parent().children('.islemag-banner-choice-code').hide();
        }
        islemag_refresh_banner_control();
        return false;
    });

    jQuery('#customize-theme-controls').on('change', '.islemag-banner-position', function () {
        islemag_refresh_banner_control();
        return false;
    });


    jQuery('#customize-theme-controls').on('change', '.custom_media_url', function () {
        islemag_refresh_banner_control();
        return false;
    });

    jQuery('#customize-theme-controls').on('keyup', '.islemag-banner-link', function () {
        islemag_refresh_banner_control();
        return false;
    });

    jQuery('#customize-theme-controls').on('keyup', '.islemag-banner-settings-text-control', function () {
        islemag_refresh_banner_control();
        return false;
    });


});
