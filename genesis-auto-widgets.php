<?php
/**
 * Plugin Name: Genesis Auto Widgets
 * Description: This library of automatically configured and styled widgets is the easiest way to get your new Genesis site to look like the theme demo.
 * Author: Carlo Manf
 * Author URI: http://carlomanf.id.au
 * Version: 1.3.0
 */

// Altitude Pro: front page widget
class AP_Front_Page extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ap_front_page',
			'Altitude Pro &ndash; Front Page',
			array( 'description' => 'Place instances of this auto widget in the Front Page areas.' )
		);
	}

	public function widget( $args, $instance ) {
		if ( 'altitude-pro' !== get_option( 'stylesheet' ) )
			return;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'dashicons_class' ] ) )
			printf( '<p class="%s"></p>', esc_attr( $instance[ 'dashicons_class' ] ) );

		if ( !empty( $instance[ 'pre_headline' ] ) )
			printf( '<h4 class="widget-title">%s</h4>', wptexturize( esc_attr( $instance[ 'pre_headline' ] ) ) );

		if ( !empty( $instance[ 'headline' ] ) )
			printf( '<h2>%s</h2>', wptexturize( esc_attr( $instance[ 'headline' ] ) ) );

		if ( !empty( $instance[ 'body' ] ) )
			printf( '<p>%s</p>', wptexturize( esc_attr( $instance[ 'body' ] ) ) );

		if ( !empty( $instance[ 'button_text' ] ) || !empty( $instance[ 'button_text_sec' ] ) ) {
			echo '<p>';

			if ( !empty( $instance[ 'button_text' ] ) )
				printf( '<a class="button" href="%s">%s</a>', empty( $instance[ 'url' ] ) ? '#' : esc_url( $instance[ 'url' ] ), wptexturize( esc_attr( $instance[ 'button_text' ] ) ) );

			if ( !empty( $instance[ 'button_text' ] ) && !empty( $instance[ 'button_text_sec' ] ) )
				echo ' ';

			if ( !empty( $instance[ 'button_text_sec' ] ) )
				printf( '<a class="button clear" href="%s">%s</a>', empty( $instance[ 'url_sec' ] ) ? '#' : esc_url( $instance[ 'url_sec' ] ), wptexturize( esc_attr( $instance[ 'button_text_sec' ] ) ) );

			echo '</p>';
		}

		if ( !empty( $instance[ 'small_print' ] ) )
			printf( '<p><span class="small-disclaimer">%s</span></p>', wptexturize( esc_attr( $instance[ 'small_print' ] ) ) );

		if ( !empty( $instance[ 'image_src' ] ) )
			printf( '<div class="bottom-image"><img src="%s" alt="%s"></div>', esc_url( $instance[ 'image_src' ] ), empty( $instance[ 'image_alt' ] ) ? '' : esc_attr( $instance[ 'image_alt' ] ) );

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		$text_format = '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>';
		$textarea_format = '<p><label for="%2$s">%1$s</label><br><textarea class="widefat" rows="8" id="%2$s" name="%3$s">%4$s</textarea></p>';

		printf( $text_format, 'Icon class (e.g. <strong>dashicons dashicons-info</strong>)<br><a href="https://developer.wordpress.org/resource/dashicons/" target="_blank">See all icons</a>', $this->get_field_id( 'dashicons_class' ), $this->get_field_name( 'dashicons_class' ), isset( $instance[ 'dashicons_class' ] ) ? esc_attr( $instance[ 'dashicons_class' ] ) : '' );
		printf( $text_format, 'Pre-headline', $this->get_field_id( 'pre_headline' ), $this->get_field_name( 'pre_headline' ), isset( $instance[ 'pre_headline' ] ) ? esc_attr( $instance[ 'pre_headline' ] ) : '' );
		printf( $textarea_format, 'Headline', $this->get_field_id( 'headline' ), $this->get_field_name( 'headline' ), isset( $instance[ 'headline' ] ) ? esc_attr( $instance[ 'headline' ] ) : '' );
		printf( $textarea_format, 'Body paragraph', $this->get_field_id( 'body' ), $this->get_field_name( 'body' ), isset( $instance[ 'body' ] ) ? esc_attr( $instance[ 'body' ] ) : '' );
		printf( $text_format, 'Primary button URL', $this->get_field_id( 'url' ), $this->get_field_name( 'url' ), isset( $instance[ 'url' ] ) ? esc_attr( $instance[ 'url' ] ) : '' );
		printf( $text_format, 'Primary button text', $this->get_field_id( 'button_text' ), $this->get_field_name( 'button_text' ), isset( $instance[ 'button_text' ] ) ? esc_attr( $instance[ 'button_text' ] ) : '' );
		printf( $text_format, 'Secondary button URL', $this->get_field_id( 'url_sec' ), $this->get_field_name( 'url_sec' ), isset( $instance[ 'url_sec' ] ) ? esc_attr( $instance[ 'url_sec' ] ) : '' );
		printf( $text_format, 'Secondary button text', $this->get_field_id( 'button_text_sec' ), $this->get_field_name( 'button_text_sec' ), isset( $instance[ 'button_text_sec' ] ) ? esc_attr( $instance[ 'button_text_sec' ] ) : '' );
		printf( $textarea_format, 'Small print', $this->get_field_id( 'small_print' ), $this->get_field_name( 'small_print' ), isset( $instance[ 'small_print' ] ) ? esc_attr( $instance[ 'small_print' ] ) : '' );
		printf( $text_format, 'Image source URL', $this->get_field_id( 'image_src' ), $this->get_field_name( 'image_src' ), isset( $instance[ 'image_src' ] ) ? esc_attr( $instance[ 'image_src' ] ) : '' );
		printf( $text_format, 'Image alt text', $this->get_field_id( 'image_alt' ), $this->get_field_name( 'image_alt' ), isset( $instance[ 'image_alt' ] ) ? esc_attr( $instance[ 'image_alt' ] ) : '' );
	}
}

// Altitude Pro: pricing table widget
class AP_Pricing_Table extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ap_pricing_table',
			'Altitude Pro &ndash; Pricing Table',
			array( 'description' => 'Place instances of this auto widget in the Front Page 4 area.' )
		);
	}

	public function widget( $args, $instance ) {
		if ( 'altitude-pro' !== get_option( 'stylesheet' ) )
			return;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'title' ] ) )
			printf( '<h4 class="widget-title">%s</h4>', wptexturize( esc_attr( $instance[ 'title' ] ) ) );

		if ( !empty( $instance[ 'price' ] ) )
			printf( '<h2><strong>%s</strong></h2>', wptexturize( esc_attr( $instance[ 'price' ] ) ) );

		$number_of_rows = array( 1, 2, 3, 4, 5 );

		$list_items = '';
		foreach ( $number_of_rows as $num )
			if ( !empty( $instance[ 'row_' . $num ] ) )
				$list_items .= sprintf( '<li>%s</li>', wptexturize( esc_attr( $instance[ 'row_' . $num ] ) ) );

		if ( !empty( $list_items ) )
			printf( '<ul>%s</ul>', $list_items );

		if ( !empty( $instance[ 'button_text' ] ) )
			printf( '<a class="button clear" href="%s">%s</a>', empty( $instance[ 'url' ] ) ? '#' : esc_url( $instance[ 'url' ] ), wptexturize( esc_attr( $instance[ 'button_text' ] ) ) );

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		$text_format = '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>';
		$textarea_format = '<p><label for="%2$s">%1$s</label><br><textarea class="widefat" rows="8" id="%2$s" name="%3$s">%4$s</textarea></p>';

		genesis_auto_widgets_simple_text_field( 'Title', 'title', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Price', 'price', $this, $instance );

		genesis_auto_widgets_simple_text_field( 'Row 1', 'row_1', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Row 2', 'row_2', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Row 3', 'row_3', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Row 4', 'row_4', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Row 5', 'row_5', $this, $instance );

		genesis_auto_widgets_simple_text_field( 'Button URL', 'url', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Button text', 'button_text', $this, $instance );
	}
}

// Altitude Pro: testimonial widget
class AP_Testimonial extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ap_testimonial',
			'Altitude Pro &ndash; Testimonial',
			array( 'description' => 'Place this auto widget in the Front Page 5 area.' )
		);
	}

	public function widget( $args, $instance ) {
		if ( 'altitude-pro' !== get_option( 'stylesheet' ) )
			return;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'title' ] ) )
			printf( '<h4 class="widget-title">%s</h4>', wptexturize( esc_attr( $instance[ 'title' ] ) ) );

		if ( !empty( $instance[ 'quotation' ] ) )
			printf( '<h2>%s</h2>', wptexturize( esc_attr( $instance[ 'quotation' ] ) ) );

		if ( !empty( $instance[ 'credit' ] ) )
			printf( '<h4>%s</h4>', wptexturize( esc_attr( $instance[ 'credit' ] ) ) );

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		$text_format = '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>';
		$textarea_format = '<p><label for="%2$s">%1$s</label><br><textarea class="widefat" rows="8" id="%2$s" name="%3$s">%4$s</textarea></p>';

		printf( $text_format, 'Title', $this->get_field_id( 'title' ), $this->get_field_name( 'title' ), isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '' );
		printf( $textarea_format, 'Quotation', $this->get_field_id( 'quotation' ), $this->get_field_name( 'quotation' ), isset( $instance[ 'quotation' ] ) ? esc_attr( $instance[ 'quotation' ] ) : '' );
		printf( $text_format, 'Credit', $this->get_field_id( 'credit' ), $this->get_field_name( 'credit' ), isset( $instance[ 'credit' ] ) ? esc_attr( $instance[ 'credit' ] ) : '' );
	}
}

// Education Pro: Home Middle icon widget
class EP_Home_Middle_Icon extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ep_home_middle_icon',
			'Education Pro &ndash; Home Middle Icon',
			array( 'description' => 'Place four of these auto widgets in the Home Middle area.' )
		);
	}

	public function widget( $args, $instance ) {
		if ( 'education-pro' !== get_option( 'stylesheet' ) )
			return;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'dashicons_class' ] ) )
			printf( '<p class="%s"></p>', esc_attr( $instance[ 'dashicons_class' ] ) );

		if ( !empty( $instance[ 'headline' ] ) )
			printf( '<h2>%s</h2>', wptexturize( esc_attr( $instance[ 'headline' ] ) ) );

		if ( !empty( $instance[ 'body' ] ) )
			printf( '<p>%s</p>', wptexturize( esc_attr( $instance[ 'body' ] ) ) );

		if ( !empty( $instance[ 'url' ] ) )
			printf( '<p><a class="button" href="%s">%s</a></p>', esc_url( $instance[ 'url' ] ), empty( $instance[ 'button_text' ] ) ? 'Read More' : wptexturize( esc_attr( $instance[ 'button_text' ] ) ) );

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		$text_format = '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>';
		$textarea_format = '<p><label for="%2$s">%1$s</label><br><textarea class="widefat" rows="8" id="%2$s" name="%3$s">%4$s</textarea></p>';

		printf( $text_format, 'Icon class (e.g. <strong>dashicons dashicons-info</strong>)<br><a href="https://developer.wordpress.org/resource/dashicons/" target="_blank">See all icons</a>', $this->get_field_id( 'dashicons_class' ), $this->get_field_name( 'dashicons_class' ), isset( $instance[ 'dashicons_class' ] ) ? esc_attr( $instance[ 'dashicons_class' ] ) : '' );
		printf( $text_format, 'Headline', $this->get_field_id( 'headline' ), $this->get_field_name( 'headline' ), isset( $instance[ 'headline' ] ) ? esc_attr( $instance[ 'headline' ] ) : '' );
		printf( $textarea_format, 'Body paragraph', $this->get_field_id( 'body' ), $this->get_field_name( 'body' ), isset( $instance[ 'body' ] ) ? esc_attr( $instance[ 'body' ] ) : '' );
		printf( $text_format, 'Button URL', $this->get_field_id( 'url' ), $this->get_field_name( 'url' ), isset( $instance[ 'url' ] ) ? esc_attr( $instance[ 'url' ] ) : '' );
		printf( $text_format, 'Button text', $this->get_field_id( 'button_text' ), $this->get_field_name( 'button_text' ), isset( $instance[ 'button_text' ] ) ? esc_attr( $instance[ 'button_text' ] ) : '' );
	}
}

// Education Pro: Footer 1 info widget
class EP_Footer_1_Info extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'ep_footer_1_info',
			'Education Pro &ndash; Footer 1 Info',
			array( 'description' => 'Place this auto widget in the Footer 1 area.' )
		);
	}

	public function widget( $args, $instance ) {
		if ( 'education-pro' !== get_option( 'stylesheet' ) )
			return;

		echo $args[ 'before_widget' ];

		$name = get_bloginfo( 'name' );
		$description = get_bloginfo( 'description' );

		if ( !empty( $name ) )
			printf( '<h1 class="site-title"><a href="%s">%s</a></h1>', home_url(), $name );

		if ( !empty( $description ) )
			printf( '<p>%s</p>', $description );

		if ( !empty( $instance[ 'address_1' ] ) || !empty( $instance[ 'phone' ] ) )
			echo '<p>';

		if ( !empty( $instance[ 'address_1' ] ) ) {
			echo wptexturize( esc_attr( $instance[ 'address_1' ] ) );

			if ( !empty( $instance[ 'address_2' ] ) )
				echo '<br>' . wptexturize( esc_attr( $instance[ 'address_2' ] ) );
		}

		if ( !empty( $instance[ 'address_1' ] ) && !empty( $instance[ 'phone' ] ) )
			echo '<br>';

		if ( !empty( $instance[ 'phone' ] ) )
			printf( '<a href="tel:%s">%s</a>', filter_var( $instance[ 'phone' ], FILTER_SANITIZE_NUMBER_INT ), esc_attr( $instance[ 'phone' ] ) );

		if ( !empty( $instance[ 'address_1' ] ) || !empty( $instance[ 'phone' ] ) )
			echo '</p>';

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		$format = '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>';

		printf( $format, 'Address line 1', $this->get_field_id( 'address_1' ), $this->get_field_name( 'address_1' ), isset( $instance[ 'address_1' ] ) ? esc_attr( $instance[ 'address_1' ] ) : '' );
		printf( $format, 'Address line 2', $this->get_field_id( 'address_2' ), $this->get_field_name( 'address_2' ), isset( $instance[ 'address_2' ] ) ? esc_attr( $instance[ 'address_2' ] ) : '' );
		printf( $format, 'Phone number', $this->get_field_id( 'phone' ), $this->get_field_name( 'phone' ), isset( $instance[ 'phone' ] ) ? esc_attr( $instance[ 'phone' ] ) : '' );
	}
}

// Parallax Pro: featured area widget
class PP_Featured_Area extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'pp_featured_area',
			'Parallax Pro &ndash; Featured Area',
			array( 'description' => 'Place this auto widget in a Home or Footer widget area.' )
		);
	}

	public function widget( $args, $instance ) {
		if ( 'parallax-pro' !== get_option( 'stylesheet' ) )
			return;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'headline' ] ) )
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'headline' ] ) . $args[ 'after_title' ];

		if ( !empty( $instance[ 'body' ] ) )
			printf( '<p>%s</p>', wptexturize( esc_attr( $instance[ 'body' ] ) ) );

		if ( !empty( $instance[ 'url' ] ) )
			printf( '<p><a class="button" href="%s">%s</a></p>', esc_url( $instance[ 'url' ] ), empty( $instance[ 'button_text' ] ) ? 'Read More' : wptexturize( esc_attr( $instance[ 'button_text' ] ) ) );

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		$text_format = '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>';
		$textarea_format = '<p><label for="%2$s">%1$s</label><br><textarea class="widefat" rows="8" id="%2$s" name="%3$s">%4$s</textarea></p>';

		printf( $text_format, 'Headline', $this->get_field_id( 'headline' ), $this->get_field_name( 'headline' ), isset( $instance[ 'headline' ] ) ? esc_attr( $instance[ 'headline' ] ) : '' );
		printf( $textarea_format, 'Body paragraph', $this->get_field_id( 'body' ), $this->get_field_name( 'body' ), isset( $instance[ 'body' ] ) ? esc_attr( $instance[ 'body' ] ) : '' );
		printf( $text_format, 'Button URL', $this->get_field_id( 'url' ), $this->get_field_name( 'url' ), isset( $instance[ 'url' ] ) ? esc_attr( $instance[ 'url' ] ) : '' );
		printf( $text_format, 'Button text', $this->get_field_id( 'button_text' ), $this->get_field_name( 'button_text' ), isset( $instance[ 'button_text' ] ) ? esc_attr( $instance[ 'button_text' ] ) : '' );
	}
}

// Parallax Pro: pricing table widget
class PP_Pricing_Table extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'pp_pricing_table',
			'Parallax Pro &ndash; Pricing Table',
			array( 'description' => 'Place this auto widget in a Home or Footer widget area.' )
		);
	}

	public function widget( $args, $instance ) {
		if ( 'parallax-pro' !== get_option( 'stylesheet' ) )
			return;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'headline' ] ) )
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'headline' ] ) . $args[ 'after_title' ];

		if ( !empty( $instance[ 'intro' ] ) )
			printf( '<p>%s</p>', wptexturize( esc_attr( $instance[ 'intro' ] ) ) );

		echo '<div class="pricing-table">';

		foreach ( array( 'left', 'middle', 'right' ) as $col ) {
			printf( '<div class="one-third%s">', 'left' === $col ? ' first' : '' );

			if ( !empty( $instance[ $col . '_title' ] ) )
				printf( '<h4>%s</h4>', wptexturize( esc_attr( $instance[ $col . '_title' ] ) ) );

			$number_of_rows = array( 1, 2, 3, 4, 5, 6 );
			if ( 'middle' === $col )
				$number_of_rows[] = 7;

			$list_items = '';
			foreach ( $number_of_rows as $num )
				if ( !empty( $instance[ $col . '_row_' . $num ] ) )
					$list_items .= sprintf( '<li>%s</li>', wptexturize( esc_attr( $instance[ $col . '_row_' . $num ] ) ) );

			if ( !empty( $list_items ) )
				printf( '<ul>%s</ul>', $list_items );

			if ( !empty( $instance[ $col . '_url' ] ) )
				printf( '<p><a class="button" href="%s">%s</a></p>', esc_url( $instance[ $col . '_url' ] ), empty( $instance[ $col . '_button_text' ] ) ? 'Purchase' : wptexturize( esc_attr( $instance[ $col . '_button_text' ] ) ) );

			echo '</div>';
		}

		echo '</div>';

		echo $args[ 'after_widget' ];
	}

	public function form( $instance ) {
		genesis_auto_widgets_simple_text_field( 'Headline', 'headline', $this, $instance );

		printf( '<p><label for="%2$s">%1$s</label><br><textarea class="widefat" rows="8" id="%2$s" name="%3$s">%4$s</textarea></p>', 'Intro paragraph', $this->get_field_id( 'intro' ), $this->get_field_name( 'intro' ), isset( $instance[ 'intro' ] ) ? esc_attr( $instance[ 'intro' ] ) : '' );

		genesis_auto_widgets_simple_text_field( 'Left title', 'left_title', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left row 1', 'left_row_1', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left row 2', 'left_row_2', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left row 3', 'left_row_3', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left row 4', 'left_row_4', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left row 5', 'left_row_5', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left row 6', 'left_row_6', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left button URL', 'left_url', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Left button text', 'left_button_text', $this, $instance );

		genesis_auto_widgets_simple_text_field( 'Middle title', 'middle_title', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle row 1', 'middle_row_1', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle row 2', 'middle_row_2', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle row 3', 'middle_row_3', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle row 4', 'middle_row_4', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle row 5', 'middle_row_5', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle row 6', 'middle_row_6', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle row 7', 'middle_row_7', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle button URL', 'middle_url', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Middle button text', 'middle_button_text', $this, $instance );

		genesis_auto_widgets_simple_text_field( 'Right title', 'right_title', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right row 1', 'right_row_1', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right row 2', 'right_row_2', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right row 3', 'right_row_3', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right row 4', 'right_row_4', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right row 5', 'right_row_5', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right row 6', 'right_row_6', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right button URL', 'right_url', $this, $instance );
		genesis_auto_widgets_simple_text_field( 'Right button text', 'right_button_text', $this, $instance );
	}
}

// Render a simple text field
function genesis_auto_widgets_simple_text_field( $label, $id, $obj, $instance ) {
	printf( '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>', $label, $obj->get_field_id( $id ), $obj->get_field_name( $id ), isset( $instance[ $id ] ) ? esc_attr( $instance[ $id ] ) : '' );
}

// Register database of active widgets
// Prevents data loss if user switches theme
register_activation_hook( __FILE__, function() {
	if ( false === get_option( 'genesis_auto_widgets' ) )
		add_option( 'genesis_auto_widgets' );
} );

// Update database
add_action( 'init', function() {
	$options = get_option( 'genesis_auto_widgets' );

	foreach ( array( 'ap_front_page', 'ap_pricing_table', 'ap_testimonial', 'ep_home_middle_icon', 'ep_footer_1_info', 'pp_featured_area', 'pp_pricing_table' ) as $widget_id )
		if ( is_active_widget( false, false, $widget_id, false ) )
			$options[ $widget_id ] = '1';
		else
			unset( $options[ $widget_id ] );

	update_option( 'genesis_auto_widgets', $options );
} );

// Register widgets
add_action( 'widgets_init', function() {
	$options = get_option( 'genesis_auto_widgets' );

	if ( 'altitude-pro' === get_option( 'stylesheet' ) || isset( $options[ 'ap_front_page' ] ) )
		register_widget( 'AP_Front_Page' );

	if ( 'altitude-pro' === get_option( 'stylesheet' ) || isset( $options[ 'ap_pricing_table' ] ) )
		register_widget( 'AP_Pricing_Table' );

	if ( 'altitude-pro' === get_option( 'stylesheet' ) || isset( $options[ 'ap_testimonial' ] ) )
		register_widget( 'AP_Testimonial' );

	if ( 'education-pro' === get_option( 'stylesheet' ) || isset( $options[ 'ep_home_middle_icon' ] ) )
		register_widget( 'EP_Home_Middle_Icon' );

	if ( 'education-pro' === get_option( 'stylesheet' ) || isset( $options[ 'ep_footer_1_info' ] ) )
		register_widget( 'EP_Footer_1_Info' );

	if ( 'parallax-pro' === get_option( 'stylesheet' ) || isset( $options[ 'pp_featured_area' ] ) )
		register_widget( 'PP_Featured_Area' );

	if ( 'parallax-pro' === get_option( 'stylesheet' ) || isset( $options[ 'pp_pricing_table' ] ) )
		register_widget( 'PP_Pricing_Table' );
} );
