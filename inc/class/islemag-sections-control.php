<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

class IseleMag_Sections extends WP_Customize_Control {


        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {
?>
    <div class="islemag-sections-container">
        <div class="islemag-repeater">
            <div class="islemag-section1">
            </div>
        </div>
                
                
        <div class="islemag-repeater">
            <div class="islemag-section2"></div>
        </div>
        <div class="islemag-repeater">
            <div class="islemag-section3"></div>
        </div>
        <div class="islemag-repeater">
            <div class="islemag-section4"></div>
        </div>
    </div>
    <?php

        }

}