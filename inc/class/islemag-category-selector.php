<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

class IseleMagCategorySelector extends WP_Customize_Control {


        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {
            $categories = get_categories();
?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?>>
                <option value="all"><?php esc_html_e( 'All', 'islemag' );?></option>
                <?php
                    foreach( $categories as $cat ){
                        if( $cat->count > 0 ){
                          echo '<option value="'. esc_attr( $cat->slug ) . '" ' . selected( $this->value(), $cat->slug ) . '>' . esc_attr( $cat->cat_name ) . '</option>';
                        }
                    }
                ?>
            </select>
    <?php
        }
}
