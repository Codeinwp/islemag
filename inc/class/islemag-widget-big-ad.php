<?php

class islemag_big_ad extends WP_Widget {

	 /**
     * Constructor
     **/
    public function __construct() {
        $widget_ops = array( 'classname' => 'islemag_single_ad' );
        parent::__construct( 'islemag_single_ad-widget', 'Islemag - Single Advertisement widget', $widget_ops );
        add_action( 'admin_enqueue_scripts', array($this, 'upload_scripts') );
    }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/js/islemag-upload-media.js', array("jquery"),'1.0.0', true );
    }

    function widget( $args, $instance ) {
      extract( $args );
      echo $before_widget;

      $title = $instance['widget_title'];

      if( !empty( $title ) ){
        echo $before_title. esc_html( $title ) . $after_title;
      }

      $title_alt = 'title_ad';
      $link = 'link_ad';
      $url = 'image_uri_ad';

      if( !empty( $instance[$url] ) ){
        if( !empty( $instance[$link] ) ){
          echo '<a href="' . esc_url( $instance[$link] ) . '" target="'.( !empty( $instance['new_tab'] ) && $instance['new_tab'] == 'on' ? '_blank' : '' ).'"><img src="' . esc_attr( $instance[$url] ) . '" alt="' . ( !empty( $instance[$title_alt] ) ? $instance[$title_alt] : '' ) . '"/></a>';
        } else {
          echo '<img src="' . esc_url( $instance[$url] ) . '" alt="'.( !empty( $instance[$title_alt] ) ? esc_attr( $instance[$title_alt] ) : '' ).'"/>';
        }
      }

      echo $after_widget;

    }



    function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['new_tab'] = strip_tags( $new_instance['new_tab'] );
      $instance['widget_title'] = strip_tags( $new_instance['widget_title'] );
      $instance['title_ad'] = strip_tags( $new_instance['title_ad'] );
      $instance['link_ad'] = strip_tags( $new_instance['link_ad'] );
      $instance['image_uri_ad'] = strip_tags( $new_instance['image_uri_ad'] );
      return $instance;
    }



    function form($instance) { ?>

      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>"><?php _e( 'Title', 'islemag' ); ?></label><br/>
        <input type="text" name="<?php echo esc_attr( $this->get_field_name(' widget_title ') ); ?>" id="<?php echo esc_attr( $this->get_field_id('widget_title') ); ?>" value="<?php if( !empty( $instance['widget_title'] ) ): echo esc_attr( $instance['widget_title'] ); endif; ?>" class="widefat" />
      </p>

      <p>
        <input type="hidden" name="<?php echo esc_attr( $this->get_field_name('new_tab') ); ?>" value="0" />
        <input type="checkbox" <?php if( !empty( $instance['new_tab'] ) ): checked($instance['new_tab'], 'on'); endif; ?> id="<?php echo esc_attr( $this->get_field_id('new_tab') ); ?>" name="<?php echo esc_attr( $this->get_field_name('new_tab') ); ?>" />
        <label for="<?php echo esc_attr( $this->get_field_id('new_tab') ); ?>"><?php _e('Open in new tab','islemag'); ?></label>
      </p>

      <?php
        $title_alt = 'title_ad';
        $link = 'link_ad';
        $url = 'image_uri_ad';
      ?>
      <h3><?php esc_html_e( 'Advertisement ', 'islemag' );?></h3>
    	<p>
    		<label for="<?php echo esc_attr( $this->get_field_id($title_alt) ); ?>"><?php _e('Alt Title','islemag'); ?></label><br/>
    		<input type="text" name="<?php echo esc_attr( $this->get_field_name( $title_alt ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( $title_alt ) ); ?>" value="<?php if( !empty( $instance[$title_alt] ) ): echo esc_attr( $instance[$title_alt] ); endif; ?>" class="widefat" />
    	</p>

    	<p>
        <label for="<?php echo esc_attr( $this->get_field_id( $link ) ); ?>"><?php _e( 'Link', 'islemag' ); ?></label><br/>
        <input type="text" name="<?php echo esc_attr( $this->get_field_name( $link ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( $link ) ); ?>" value="<?php if( !empty( $instance[$link] ) ): echo esc_attr( $instance[$link] ); endif; ?>" class="widefat" />
      </p>

    	<p>
        <label for="<?php echo esc_attr( $this->get_field_name( $url ) ); ?>"><?php _e( 'Image:','islemag' ); ?></label>
        <input name="<?php echo esc_attr( $this->get_field_name( $url ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( $url ) ); ?>" class="widefat" type="text" size="36"  value="<?php if( !empty( $instance[$url] ) ): echo esc_url( $instance[$url] ); endif; ?>" />
        <input class="upload_image_button" type="button" value="Upload Image" id="" />
      </p>
<?php
    }
}
