
	<p>
        <label for="<?php echo $this->get_field_id('text'); ?>">Text</label><br />
        <input type="text" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $text; ?>" class="widefat" />
      <!--  <input type="text" name="<?php echo $this->get_field_name('text2'); ?>" id="<?php echo $this->get_field_id('text2'); ?>" value="<?php echo $text2; ?>" class="widefat" /> -->
    </p>
	
	<p>
   <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
   <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
   </p>
   
    <p>
        <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />

        <?php
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image_preview" src="' . $img . '" style="margin:0;padding:0;max-width:100%;float:left;display:inline-block" /><br />';
            endif;
        ?>

        <input type="hidden" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $img; ?>" style="margin-top:5px;">
        <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
    </p>