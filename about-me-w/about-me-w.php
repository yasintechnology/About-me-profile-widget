<?php
/**
 *
 * Plugin Name: about-me-w
 * Plugin URI: https://atbox.io/yasindev
 * Description: This Plugin To Show Your Profile in widget.
 * Version: 1.0
 * Author: Yasin Ti
 * Author URI: https://atbox.io/yasintechnology
 * License: GPLv2 or later
 *
 * @package   About-me-w
 * @author    Yasin Ti <yasin.coding@gmail.com>
 * @copyright Copyright (c) 2018, atbox.io/yasintechnology.
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( 'dont access!' );
}

natio_aboutme_class::init();

CLASS natio_aboutme_class {
	
	
		public static function init(){
		
			// add widget
			add_action('widgets_init',function(){register_widget('natio_about_me');});
		    // add admin ajax file
            add_action('admin_enqueue_scripts', array(__CLASS__, 'natio_widget_script_file'));
			// user style
			add_action('wp_enqueue_scripts',array(__CLASS__,'na_widget_user_style'));
		
		}
		
		
		public static function na_widget_user_style() {
		
		wp_enqueue_style('na_w_style', plugins_url('style/style.css',__FILE__));
		
		}
		
				public static function natio_widget_script_file() {
					
					wp_enqueue_media();
					wp_enqueue_script('natio_about_media',plugins_url('/js/media-widget.js',__FILE__),array('jquery'),null);
					wp_enqueue_script('media-uploader');
		
		}
		
	}
		

// widget class
class natio_about_me extends WP_Widget {

	 function __construct() {
		parent::__construct(
			'natio_about_me', 
			esc_html__( 'about me'), 
			array( 'description' => esc_html__( 'natio about me' ), ) 
		);
	}
	


    function form($instance) {
	
	$text     = esc_attr($instance['text']);
	//$text2     = esc_attr($instance['text2']);
	$img      = esc_url($instance['image_uri']);
	$textarea = esc_textarea($instance['textarea']);

		
		ob_start();	
		require "form.php";
		echo ob_get_clean();
    }
	
	
	
		// update widget entry
	public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['text'] = strip_tags( $new_instance['text'] );
       // $instance['text2'] = strip_tags( $new_instance['text2'] );
		$instance['textarea'] = strip_tags($new_instance['textarea']);
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        return $instance;
    }
	
	
            // display widget value
     public function widget($args, $instance) {
       extract( $args );
          $text = esc_attr($instance['text']);
         // $text2 = esc_attr($instance['text2']);
          $textarea = esc_textarea($instance['textarea']);
          $image_uri = esc_url($instance['image_uri']);
          echo $before_widget;
          echo '<div class="widget-text wp_widget_plugin_box">';
          // Conditional check
		  if( $image_uri ) {
            echo '<div class="na-img-box"><img src='.$image_uri.' style="width:100%;height:auto;"></div>';
          } 
          if( $text ) {
             echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
            // echo '<p class="wp_widget_plugin_text">'.$text2.'</p>';
          }
		  if( $textarea) {
             echo '<p class="wp_widget_plugin_text">'.$textarea.'</p>';
          }
			echo '</div>';
			echo $after_widget;
        }
	
	
}




?>