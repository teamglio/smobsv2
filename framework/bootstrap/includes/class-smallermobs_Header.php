<?php


if ( ! class_exists( 'smallermobs_Header' ) ) {

	/**
	* The Header module
	*/
	class smallermobs_Header {

		function __construct() {
			add_action( 'widgets_init',       array( $this, 'header_widgets_init' ), 30 );
			add_action( 'smallermobs_pre_wrap', array( $this, 'branding' ), 3 );
			add_action( 'wp_enqueue_scripts', array( $this, 'css' ), 101 );

		}

		/**
		 * Register sidebars and widgets
		 */
		function header_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Header Area', 'smallermobs' ),
				'id'            => 'header-area',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h1>',
				'after_title'   => '</h1>',
			) );
		}

		/*
		 * The Header template
		 */
		function branding() {
			global $ss_settings;
			global $woocommerce;

			if ( $ss_settings['header_toggle'] == 1 ) {
				echo '<div class="before-main-wrapper">';

				if ( $ss_settings['site_style'] == 'boxed' ) {
					echo '<div class="container header-boxed">';
				}

				echo '<div class="header-wrapper">';

				if ( $ss_settings['site_style'] == 'wide' ) {
					echo '<div class="container">';
				}

				if ( $ss_settings['header_branding'] == 1 ) {
					echo '<div class="row">';
					echo '<a class="col-sm-6 brand-logo" href="' . home_url() . '/"><h1 class="no-margins">' . smallermobs_Branding::logo() . '</h1></a>';
					//add to options
					echo '<div class="col-sm-6 header-buttons">';
					echo '<div class="btn-group pull-right">';
  					echo '<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Register or sign in</a>';
  					if (woocommerce_is_active()) {
  					echo '<a class="btn btn-default cart-content" href="';
  					echo $woocommerce->cart->get_cart_url();
  					echo '"><span class="glyphicon glyphicon-shopping-cart"></span> Basket <span class="badge">';
  					echo $woocommerce->cart->get_cart_total();
  					echo '</span></a>';
					};
					echo '<a href="#" class="btn btn-link header-search"><span class="glyphicon glyphicon-search"></span></a>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}

				if ( $ss_settings['header_branding'] == 1 ) {
					$pullclass = ' class="pull-right"';
				} else {
					$pullclass = null;
				}

				echo '<div' . $pullclass . '>';
				dynamic_sidebar( 'header-area' );
				echo '</div >';

				if ( $ss_settings['site_style'] == 'wide' ) {
					echo '</div >';
				}

				echo '</div >';

				if ( $ss_settings['site_style'] == 'boxed' ) {
					echo '</div >';
				}

				echo '</div >';
			}
		}

		/*
		 * Any necessary extra CSS is generated here
		 */
		function css() {
			global $ss_settings;

			if ( is_array( $ss_settings['header_bg'] ) ) {
				$bg = smallermobs_Color::sanitize_hex( $ss_settings['header_bg']['background-color'] );
			} else {
				$bg = smallermobs_Color::sanitize_hex( $ss_settings['header_bg'] );
			}
			$cl = smallermobs_Color::sanitize_hex( $ss_settings['header_color'] );

			$header_margin_top    = $ss_settings['header_margin_top'];
			$header_margin_bottom = $ss_settings['header_margin_bottom'];

			$opacity  = ( intval( $ss_settings['header_bg_opacity'] ) ) / 100;

			$rgb      = smallermobs_Color::get_rgb( $bg, true );

			if ( $ss_settings['site_style'] == 'boxed' ) {
				$element = 'body .before-main-wrapper .header-boxed';
			} else {
				$element = 'body .before-main-wrapper .header-wrapper';
			}

			if ( $ss_settings['header_toggle'] == 1 ) {
				$style  = $element . ' a, ' . $element . ' h1, ' . $element . ' h2, ' . $element . ' h3, ' . $element . ' h4, ' . $element . ' h5, ' . $element . ' h6  { color: ' . $cl . '; }';
				$style .= $element . '{ color: ' . $cl . ';';

				if ( $opacity < 1 && ! $ss_settings['header_bg']['background-image'] ) {
					$style .= 'background: rgb(' . $rgb . '); background: rgba(' . $rgb . ', ' . $opacity . ');';
				}

				if ( $header_margin_top > 0 ) {
					$style .= 'margin-top:' . $header_margin_top . 'px;';
				}

				if ( $header_margin_bottom > 0 ) {
					$style .= 'margin-bottom:' . $header_margin_bottom . 'px;';
				}

				$style .= '}';

				wp_add_inline_style( 'smallermobs_css', $style );
			}
		}
	}
}
