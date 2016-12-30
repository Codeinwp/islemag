/********************************************
 *** General Repeater ***
 *********************************************/

function islemag_uniqid(prefix, more_entropy) {
    'use strict';
    if (typeof prefix === 'undefined') {
        prefix = '';
    }

    var retId;
    var php_js;
    var formatSeed = function (seed, reqWidth) {
        seed = parseInt(seed, 10)
            .toString(16); // to hex str
        if (reqWidth < seed.length) { // so long we split
            return seed.slice(seed.length - reqWidth);
        }
        if (reqWidth > seed.length) { // so short we pad
            return new Array(1 + (reqWidth - seed.length))
                    .join('0') + seed;
        }
        return seed;
    };

    // BEGIN REDUNDANT
    if (!php_js) {
        php_js = {};
    }
    // END REDUNDANT
    if (!php_js.uniqidSeed) { // init seed with big random int
        php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
    }
    php_js.uniqidSeed++;

    retId = prefix; // start with prefix, add current milliseconds hex string
    retId += formatSeed(parseInt(new Date()
            .getTime() / 1000, 10), 8);
    retId += formatSeed(php_js.uniqidSeed, 5); // add seed hex string
    if (more_entropy) {
        // for more entropy we add a float lower to 10
        retId += (Math.random() * 10)
            .toFixed(8)
            .toString();
    }

    return retId;
}

function islemag_refresh_general_control_values(){
    'use strict';

    jQuery('.islemag_general_control_repeater').each(function(){
        var values = [];
        var th = jQuery(this);
        th.find('.islemag_general_control_repeater_container').each(function(){
            var icon_value = jQuery(this).find('.icp').val();
            var link = jQuery(this).find('.islemag_link_control').val();
            var id = jQuery(this).find('.islemag_box_id').val();
            if( link !== '' || icon_value !== '' ){
                values.push({
                    'icon_value' : icon_value,
                    'link' : link,
                    'id' : id
                });
            }
        });
        th.find('.islemag_repeater_colector').val(JSON.stringify(values));
        th.find('.islemag_repeater_colector').trigger('change');
    });
}

jQuery(document).ready(function(){
    'use strict';

    var theme_conrols = jQuery('#customize-theme-controls');

    /* Dropdown control */
    theme_conrols.on('click','.islemag-customize-control-title',function(){
        jQuery(this).next().slideToggle('medium', function() {
            if (jQuery(this).is(':visible')){
                jQuery(this).css('display','block');
            }
        });
    });

    jQuery('.islemag_general_control_new_field').on('click',function(){

        var th = jQuery(this).parent();
        var id = 'islemag_' + islemag_uniqid();
        if(typeof th !== 'undefined') {

            var field = th.find('.islemag_general_control_repeater_container:first').clone();
            if(typeof field !== 'undefined'){


                field.find('.islemag_general_control_remove_field').show();


                field.find('.islemag_box_id').val(id);
                field.find('.islemag_link_control').val('');
                /* Empty control for icon */
                field.find( '.icp' ).iconpicker().on( 'iconpickerUpdated', function() {
                    jQuery( this ).trigger( 'change' );
                } );
                field.find( '.input-group-addon' ).find('.fa').attr('class','fa');

                /*Remove value from icon field*/
                field.find('.icp').val('');

                th.find('.islemag_general_control_repeater_container:first').parent().append(field);
                islemag_refresh_general_control_values();
            }
        }
        return false;
    });

    theme_conrols.on('click', '.islemag_general_control_remove_field',function(){
        if( typeof	jQuery(this).parent() !== 'undefined'){
            jQuery(this).parent().parent().remove();
            islemag_refresh_general_control_values();
        }
        return false;
    });

    theme_conrols.on('keyup', '.islemag_link_control',function(){
        islemag_refresh_general_control_values();
    });

    jQuery('.icp').iconpicker().on( 'iconpickerUpdated', function() {
        islemag_refresh_general_control_values();
    } );

    theme_conrols.on('change', '.icp',function(){
        islemag_refresh_general_control_values();
        return false;
    });

    /*Drag and drop to change icons order*/
    jQuery('.islemag_general_control_droppable').sortable({
        update: function() {
            islemag_refresh_general_control_values();
        }
    });
});