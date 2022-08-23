<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


/**
 * Adding Sidebars
 */

function hdc_widgets_init() {
	register_sidebar( array(
		'name'          => 'Our Work Sidebar',
		'id'            => 'our-work-sidebar',
		'description'   => 'Sidebar for Our Work pages',
		'before_widget' => '',
		'after_widget'  => '',
	) );
}
add_action( 'widgets_init', 'hdc_widgets_init' );


/**
 * Adding Menus
 */
function hdc_custom_menus() {
	register_nav_menus( array(
	'secondary' => __("Secondary Menu"),
	'footer' => __("Footer Menu"),
	) );
}

add_action('init', 'hdc_custom_menus');


/**
 *  Add ACF Options Pages
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_slug' 	=> 'site-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Homepage Options',
		'menu_title'	=> 'Homepage',
		'parent_slug'	=> 'site-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'site-settings',
	));
	
}

// change posts per page on resources to 6

function hdc_site_resources_posts_per_page( $query ) {
	if( $query->is_main_query() && is_taxonomy('section') && ! is_admin() ) {
		$query->set( 'posts_per_page', '6' );
	}
}
add_action( 'pre_get_posts', 'hdc_site_resources_posts_per_page' );

// change default behavior of understrap_posted_on

/**
* Prints HTML with meta information for the current post-date/time and author.
*/
function understrap_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$posted_on   = apply_filters(
		'understrap_posted_on',
		sprintf(
			'<span class="posted-on">%1$s</span>',
			apply_filters( 'understrap_posted_on_time', $time_string )
		)
	);
	echo $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Get a list of the years that posts have been published in
 *
 * @return array - array of years that have posts published in them
 */

 function get_post_years() {
	
	$post_years = array();
	
	$query = new WP_Query( array( 'post_type' => 'post' ) );

	if($query->have_posts()) {
		while($query->have_posts()) {
			$query->the_post();

			$the_post_year = get_the_date('Y');

			if(!in_array($the_post_year, $post_years)){
				$post_years[] = $the_post_year;
			}
		}
	}
	wp_reset_postdata();

	return $post_years;

 }


/**
 * Get a 3 posts with same provided slug
 *
 * @param string $tag_slug The provided slug to match
 * @return array - array of years that have posts published in them
 */

 function get_related_posts($tag_slug) {
	
	$related_posts = get_posts( array( 'post_type' => 'post', 'tag' => $tag_slug, 'posts_per_page' => 3 ) );

	wp_reset_postdata();

	return $related_posts;
 }

/**
 * Redirect search results url to /search
 */

function hdc_change_search_url() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}   
}
add_action( 'template_redirect', 'hdc_change_search_url' );



// create row in DB for email and verification, set cookie for verification ID, send user email
function create_verification($email) {

	global $wpdb;
	$sanitized_email = sanitize_email($email);
	$verification = wp_generate_password(20, false, false);
	$verification_has = wp_hash($verification);


	$wpdb->insert(
		'wp_bwjp_email_verification',
		array(
			'user_email' => sanitize_text_field( $sanitized_email ),
			'verification' => $verification_has,
			'submitted' => date( 'Y-m-d', strtotime( 'now' ) ),
			'verified' => 0,
		)
	);

	setcookie("bwjpVID", $wpdb->insert_id);

	setcookie('bwjpVS', 0, time() + 3600, '/');

	wp_mail(
		$sanitized_email,
		'Your verification code for BWJP',
		'<p>Here is your verification code:</p><p>' . $verification . '</p>',
		array( 'Content-Type: text/html; charset=UTF-8' ),
	);
}

function verify_code($id, $verification) {

	global $wpdb;

	$table_name = $wpdb->base_prefix . 'bwjp_email_verification';
	$verification_has = wp_hash( $verification );
	
	$sql = "SELECT * FROM $table_name WHERE ID = '$id' AND verification = '$verification_has'";
	$result = $wpdb->get_row($sql);

	if ($result) {
		setcookie('bwjpVS', 1, time() + 3600, '/');
		$wpdb->update($table_name, ['verified'=>'1'], ['ID'=>$id]);
		return true;
	}  else {
		return false;
	}


}

