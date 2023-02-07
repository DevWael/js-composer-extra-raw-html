<?php
/**
 * Plugin Name: Custom Raw HTML Block
 * Plugin URI: http://wpbakery.com
 * Description: Create another RAW block
 * Version: 1.0
 * Author: Ahmad Wael
 * Author URI: http://bbioon.com
 * Text Domain: crhb
 */

if ( ! class_exists( 'Extra_Raw_Html_Widget' ) ) {
	class Extra_Raw_Html_Widget {

		public function __construct() {
			add_action( 'vc_before_init', array( $this, 'register_extra_raw_html_widget' ) );
			add_shortcode( 'extra_raw_html_widget', array( $this, 'extra_raw_html_widget_shortcode' ) );
		}

		public function register_extra_raw_html_widget() {
			vc_map(
				array(
					'name'          => esc_html__( 'Extra Raw HTML Widget', 'crhb' ),
					'base'          => 'extra_raw_html_widget',
					'icon'          => 'icon-wpb-raw-html',
					'wrapper_class' => 'clearfix',
					'category'      => esc_html__( 'Widgets', 'crhb' ),
					'description'   => esc_html__( 'Output Extra raw HTML code on your page', 'crhb' ),
					'params'        => array(
						array(
							'type'        => 'textarea_html',
							'holder'      => 'div',
							'class'       => '',
							'heading'     => esc_html__( 'HTML Code', 'crhb' ),
							'param_name'  => 'content',
                            // @codingStandardsIgnoreLine
                            'value'       => base64_encode( '<p>I am extra raw html block.<br/>Click edit button to change this html</p>' ),		
							'description' => esc_html__( 'Enter your HTML code here.', 'crhb' ),
						),
					),
				)
			);
		}

		public function extra_raw_html_widget_shortcode( $atts, $content = null ) {
			// return '<div class="extra-raw-html-widget">' . htmlentities( rawurldecode( base64_decode( wp_strip_all_tags( $content ) ) ) ) . '</div>';
			return '<div class="extra-raw-html-widget">' . $content . '</div>';
		}

	}
	new Extra_Raw_Html_Widget();
}

