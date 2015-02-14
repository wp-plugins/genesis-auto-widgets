<?php
/**
 * Plugin Name: Genesis Auto Widgets
 * Description: Genesis Auto Widgets is the easiest way to get your new Genesis site to look like the theme demo. It provides you with widgets that are automatically configured and styled to match the demo of your Genesis theme. This is NOT an official StudioPress plugin.
 * Author: Carlo Manf
 * Plugin URI: http://carlomanf.id.au/products/genesis-auto-widgets/
 * Author URI: http://carlomanf.id.au/products/genesis-auto-widgets/
 * Version: 1.1
 */

//* Education Pro: Home Middle icon widget
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

//* Education Pro: Footer 1 info widget
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

//* Parallax Pro: featured area widget
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

//* Parallax Pro: pricing table widget
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

			echo '<ul>';

			$number_of_rows = array( 1, 2, 3, 4, 5, 6 );
			if ( 'middle' === $col )
				$number_of_rows[] = 7;

			foreach ( $number_of_rows as $num )
				if ( !empty( $instance[ $col . '_row_' . $num ] ) )
					printf( '<li>%s</li>', wptexturize( esc_attr( $instance[ $col . '_row_' . $num ] ) ) );

			echo '</ul>';

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

//* Render a simple text field
function genesis_auto_widgets_simple_text_field( $label, $id, $obj, $instance ) {
	printf( '<p><label for="%2$s">%1$s</label><br><input class="widefat" type="text" id="%2$s" name="%3$s" value="%4$s"></p>', $label, $obj->get_field_id( $id ), $obj->get_field_name( $id ), isset( $instance[ $id ] ) ? esc_attr( $instance[ $id ] ) : '' );
}

//* Load the callback function
if ( !function_exists( 'cm_settings_field_callback' ) )
	require_once( 'lib/cm-settings-callbacks.php' );

//* Register settings page
add_action( 'admin_menu', function() { //* genesis_auto_widgets_register_settings_page
	add_submenu_page(
		'genesis', //* parent slug
		'Genesis Auto Widgets', //* title of page
		'Auto Widgets', //* menu text
		'manage_options', //* capability to view the page
		'genesis_auto_widgets', //* ID
		function() { //* callback genesis_auto_widgets_options_page_callback
			echo '<div class="wrap">';
			printf( '<h2>%s</h2>', 'Genesis Auto Widgets' );
			echo '<form method="post" action="options.php">';
			echo '<p>Genesis Auto Widgets is the easiest way to get your new Genesis site to look like the theme demo. It provides you with widgets that are automatically configured and styled to match the demo of your Genesis theme. This is NOT an official StudioPress plugin.</p>';
			submit_button();
			settings_fields( 'genesis_auto_widgets' );
			do_settings_sections( 'genesis_auto_widgets' );
			submit_button();
			echo '</form></div>';
		}
	);
} );

//* Initialise settings section
add_action( 'admin_init', function() { //* genesis_auto_widgets_initialise_settings_section
	if ( false === get_option( 'genesis_auto_widgets' ) )
		add_option( 'genesis_auto_widgets' );

	add_settings_section(
		'genesis_auto_widgets_ep', //* ID
		'Education Pro', //* title to be displayed
		function() { //* callback
			echo '<p>Below are the widgets that can be used with the Education Pro theme.</p>';
		},
		'genesis_auto_widgets' //* settings page to add to
	);

	add_settings_field(
		'ep_home_middle_icon', //* ID
		'Home Middle Icon', //* label
		'cm_settings_field_callback', //* callback
		'genesis_auto_widgets', //* settings page to add to
		'genesis_auto_widgets_ep', //* section to add to
		array(
			'setting' => 'genesis_auto_widgets',
			'field' => 'ep_home_middle_icon',
			'type' => 'checkbox',
			'label' => 'Activate the Home Middle Icon auto widget?',
			'description' => 'Use this auto widget to display an icon, a headline, a body paragraph and a button in the Education Pro Home Middle area.'
		)
	);

	add_settings_field(
		'ep_footer_1_info', //* ID
		'Footer 1 Info', //* label
		'cm_settings_field_callback', //* callback
		'genesis_auto_widgets', //* settings page to add to
		'genesis_auto_widgets_ep', //* section to add to
		array(
			'setting' => 'genesis_auto_widgets',
			'field' => 'ep_footer_1_info',
			'type' => 'checkbox',
			'label' => 'Activate the Footer 1 Info auto widget?',
			'description' => 'Use this auto widget to display your site and company info in the Education Pro Footer 1 area.'
		)
	);

	add_settings_section(
		'genesis_auto_widgets_pp', //* ID
		'Parallax Pro', //* title to be displayed
		function() { //* callback
			echo '<p>Below are the widgets that can be used with the Parallax Pro theme.</p>';
		},
		'genesis_auto_widgets' //* settings page to add to
	);

	add_settings_field(
		'pp_featured_area', //* ID
		'Featured Area', //* label
		'cm_settings_field_callback', //* callback
		'genesis_auto_widgets', //* settings page to add to
		'genesis_auto_widgets_pp', //* section to add to
		array(
			'setting' => 'genesis_auto_widgets',
			'field' => 'pp_featured_area',
			'type' => 'checkbox',
			'label' => 'Activate the Featured Area auto widget?',
			'description' => 'Use this auto widget to display a headline, a body paragraph and a button in a Parallax Pro featured area.'
		)
	);

	add_settings_field(
		'pp_pricing_table', //* ID
		'Pricing Table', //* label
		'cm_settings_field_callback', //* callback
		'genesis_auto_widgets', //* settings page to add to
		'genesis_auto_widgets_pp', //* section to add to
		array(
			'setting' => 'genesis_auto_widgets',
			'field' => 'pp_pricing_table',
			'type' => 'checkbox',
			'label' => 'Activate the Pricing Table auto widget?',
			'description' => 'Use this auto widget to display a pricing table in a Parallax Pro featured area.'
		)
	);

	register_setting( 'genesis_auto_widgets', 'genesis_auto_widgets' );
} );

//* Register widgets
add_action( 'widgets_init', function() { //* genesis_auto_widgets_register_widgets
	$options = get_option( 'genesis_auto_widgets' );

	if ( isset( $options[ 'ep_home_middle_icon' ] ) )
		register_widget( 'EP_Home_Middle_Icon' );

	if ( isset( $options[ 'ep_footer_1_info' ] ) )
		register_widget( 'EP_Footer_1_Info' );

	if ( isset( $options[ 'pp_featured_area' ] ) )
		register_widget( 'PP_Featured_Area' );

	if ( isset( $options[ 'pp_pricing_table' ] ) )
		register_widget( 'PP_Pricing_Table' );
} );
