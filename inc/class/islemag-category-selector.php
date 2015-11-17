<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

class IseleMagCategorySelector extends WP_Customize_Control {


        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {
            $args = array(
                'hide_empty'               => 0
            );
            $categories = get_categories( $args );
?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?>>
                <option value="all"><?php esc_html_e('All','islemag');?></option>
                <option value="popular"><?php esc_html_e('Popular Posts','islemag');?></option>
                <?php
                    if(!empty($categories)){
                        foreach($categories as $cat){
                            echo '<option value="'.$cat->slug.'" '.selected( $this->value(),$cat->slug ).'>'.$cat->cat_name.'</option>';
                        }
                    }
                ?>
            </select>
    <?php

        }

}