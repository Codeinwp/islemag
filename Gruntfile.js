// jshint node:true

module.exports = function( grunt ) {
    'use strict';

    var loader = require( 'load-project-config' ),
        config = require( 'grunt-theme-fleet' );
    config = config();
    config.files.php.push( '!inc/admin/**/*.php' );
    config.files.js.push( '!inc/admin/**/*.js' );
    config.files.js.push( '!inc/customizer-repeater/js/fontawesome-iconpicker.js' );
    config.files.js.push( '!inc/customizer-repeater/js/fontawesome-iconpicker.min.js' );
    config.files.js.push( '!js/owl.carousel.js' );
    config.files.js.push( '!js/owl.carousel.min.js' );
    config.files.js.push( '!js/script.all.js' );
    loader( grunt, config ).init();
};