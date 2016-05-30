jQuery(document).ready(function() {
    var islemag_aboutpage = islemagWelcomeScreenCustomizerObject.aboutpage;
    var islemag_nr_actions_required = islemagWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof islemag_aboutpage !== 'undefined') && (typeof islemag_nr_actions_required !== 'undefined') && (islemag_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + islemag_aboutpage + '"><span class="islemag-actions-count">' + islemag_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".islemag-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section islemag-upsells">');
    }
    if (typeof islemag_aboutpage !== 'undefined') {
        jQuery('.islemag-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + islemag_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', islemagWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".islemag-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});