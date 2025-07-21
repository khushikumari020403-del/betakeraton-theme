<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove parent theme scripts/styles
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );
	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

/**
 * Enqueue child theme styles/scripts
 */
function theme_enqueue_styles() {
	$the_theme = wp_get_theme();
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . "/css/child-theme{$suffix}.css", array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . "/js/child-theme{$suffix}.js", array(), $the_theme->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Load translation files
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

/**
 * Default Bootstrap version to 5
 */
add_filter( 'theme_mod_understrap_bootstrap_version', function() {
	return 'bootstrap5';
}, 20 );

/**
 * Customizer JS for warning dialogs
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
 * Custom Block Category
 */
function my_plugin_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'norisma',
				'title' => __( 'Norisma', 'norisma' ),
				'icon'  => 'businesswoman',
			),
		)
	);
}
add_filter( 'block_categories', 'my_plugin_block_categories', 10, 2 );

/**
 * Register ACF Blocks
 */
function my_acf_init_block_types() {

	if ( ! function_exists( 'acf_register_block_type' ) ) return;

	$blocks = [
		'forsidehoved'      => [ 'Forsideområde på topp', 'Område med bilde, nedtelling og Gravity Forms' ],
		'hero-lp-two'       => [ 'Hero LP Two', 'Hero section with video, offer, countdown, and Gravity Form' ],
		'introboks'         => [ 'Introboks', 'Gult område under header på forside' ],
		'velgfavoritt'      => [ 'Velg favoritt', 'Velg din favoritt' ],
		'prodfordeler'      => [ 'Produktfordeler', 'Produktfordeler mørk/lys' ],
		'prodanmeldelser'   => [ 'Produktanmeldelser', 'Produktanmeldelser' ],
		'produkthoved'      => [ 'Produktsidehoved', 'Produktsidehoved' ],
		'kundersier'        => [ 'Kundene våre sier', 'Kundene våre sier' ],
		'bildegalleri'      => [ 'Bildegalleri', 'Bildegalleri' ],
	];

	foreach ( $blocks as $name => $info ) {
		acf_register_block_type( [
			'name'            => $name,
			'title'           => __( $info[0], 'norisma' ),
			'description'     => __( $info[1], 'norisma' ),
			'render_template' => "blocks/$name/$name.php",
			'category'        => 'norisma',
			'icon'            => 'admin-page',
			'keywords'        => [ 'bilde', 'tekst' ],
			'enqueue_style'   => get_stylesheet_directory_uri() . "/blocks/$name/css/block.css",
			'supports'        => [
				'align_content' => [ 'left', 'right', 'full' ],
				'align'         => true,
				'mode'          => true,
				'multiple'      => true,
				'jsx'           => true,
				'anchor'        => true,
				'acf'           => true, // ✅ Enables field group binding
			],
		] );
	}
}
add_action( 'acf/init', 'my_acf_init_block_types' );

/**
 * Gravity Forms: Place ZIP before city
 */
add_filter( 'gform_address_display_format', function() {
	return 'zip_before_city';
});

/**
 * Custom Excerpt Length
 */
add_filter( "the_excerpt", function( $excerpt ) {
	if ( has_excerpt() ) {
		return wp_trim_words( get_the_excerpt(), apply_filters( "excerpt_length", 30 ) );
	}
	return $excerpt;
}, 999 );

/**
 * TinyMCE Custom Colors
 */
add_filter( 'tiny_mce_before_init', function( $init ) {
	$init['textcolor_map'] = '[ "F6DFA4", "Gul", "361700", "Brun" ]';
	$init['textcolor_rows'] = 1;
	return $init;
});

/**
 * Register Menus
 */
add_action( 'after_setup_theme', function() {
	register_nav_menus( [
		'hovedmeny2' => __( 'Hovedmeny2', 'text_domain' ),
		'footerm'    => __( 'Footermeny', 'text_domain' ),
	] );
}, 0 );

/**
 * Register Widgets
 */
add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => __( 'Footer full topp', 'textdomain' ),
		'id'            => 'footfulltop',
		'description'   => __( 'Øverste del av footer', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	] );

	register_sidebar( [
		'name'          => __( 'Footer full bunn', 'textdomain' ),
		'id'            => 'footfullbtm',
		'description'   => __( 'Nederste del av footer', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	] );
});

/**
 * Shortcode: [antpakker]
 */
add_shortcode( 'antpakker', function() {
	return '<p class="ant-nmbr">' . rand( 5, 20 ) . '</p>';
});

/**
 * Enqueue custom JS for specific pages
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( is_page( [727, 763, 807, 1045] ) ) {
		wp_enqueue_script( 'various-styles', get_stylesheet_directory_uri() . '/js/various-styles.js', [ 'jquery' ], false, true );
	}
});

/**
 * Gravity Forms: Add dynamic checkbox to form ID 1 on page 1222
 */
add_filter( 'gform_pre_render_1', 'add_dynamic_checkbox' );
add_filter( 'gform_pre_validation_1', 'add_dynamic_checkbox' );
add_filter( 'gform_pre_submission_filter_1', 'add_dynamic_checkbox' );
add_filter( 'gform_admin_pre_render_1', 'add_dynamic_checkbox' );

function add_dynamic_checkbox( $form ) {
	$new_field_id = 1000;
	$should_show = is_page( 1222 );

	foreach ( $form['fields'] as $field ) {
		if ( $field->id == $new_field_id ) return $form;
	}

	$new_field = GF_Fields::create( [
		'type'       => 'checkbox',
		'id'         => $new_field_id,
		'label'      => 'Tilleggsvalg (kun på denne siden)',
		'inputName'  => 'tilleggsgodkjenning',
		'choices'    => [
			[
				'text'  => 'Jeg forstår, om jeg har benyttet meg av tilbudet (49,- kr) de siste 3 månedene...',
				'value' => 'ja',
			],
		],
		'inputs'     => [
			[
				'id'    => "{$new_field_id}.1",
				'label' => 'Godtar',
				'name'  => 'tilleggsgodkjenning',
			],
		],
		'pageNumber' => 2,
		'visibility' => $should_show ? 'visible' : 'hidden',
	]);

	$new_fields = [];
	foreach ( $form['fields'] as $field ) {
		$new_fields[] = $field;
		if ( $field->id == 21 ) {
			$new_fields[] = $new_field;
		}
	}

	$form['fields'] = $new_fields;
	return $form;
}

/**
 * Validate dynamic checkbox in form ID 1
 */
add_filter( 'gform_validation_1', function( $result ) {
	$form = $result['form'];

	if ( is_page(1222) && rgpost('gform_target_page_number_1') == '0' ) {
		foreach ( $form['fields'] as &$field ) {
			if ( $field->id == 1000 ) {
				if ( empty( rgpost( 'input_1000_1' ) ) ) {
					$field->failed_validation  = true;
					$field->validation_message = 'Du må godta for å sende inn skjemaet.';
					$result['is_valid'] = false;
				}
				break;
			}
		}
	}

	$result['form'] = $form;
	return $result;
});
