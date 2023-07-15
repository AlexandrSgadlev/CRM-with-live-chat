<?php
/**
 * clp-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package clp-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


/* Constant */
define( 'THEME_URI', get_template_directory_uri()  );
define( 'THEME_NAME', 'CLP'  );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clp_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on clp-theme, use a find and replace
		* to change 'clp-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'clp-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'clp-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'clp_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'clp_theme_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clp_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clp_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'clp_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clp_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'clp-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'clp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'clp_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clp_theme_scripts() {
	wp_enqueue_style( 'clp-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'clp-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'clp-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clp_theme_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Load project.
 */
require get_template_directory() . '/inc/clp-project/clp-project.php';
new CLP_Project;


/**
 * Load comment project.
 */
if (  class_exists( 'CLP_Project' ) ) {
	require get_template_directory() . '/inc/clp-project-comments/clp-project-comments.php';
	new CLP_Project_Comments;
}


/**
 * Add fields to account page
*/
if (  class_exists( 'UM' ) ) {
	add_action('um_before_account_general', 'showExtraFields', 100);
	function showExtraFields()
	{
		$custom_fields = [
			"user_name" => "Name",
		];

		foreach ($custom_fields as $key => $value) {

			$fields[ $key ] = array(
					'title' => $value,
					'metakey' => $key,
					'type' => 'select',
					'label' => $value,
			);

			apply_filters('um_account_secure_fields', $fields, 'general' );
			
			$field_value = get_user_meta(um_user('ID'), $key, true) ? : '';

			$html = '<div class="um-field um-field-'.$key.'" data-key="'.$key.'">
			<div class="um-field-label">
			<label for="'.$key.'">'.$value.'</label>
			<div class="um-clear"></div>
			</div>
			<div class="um-field-area">
			<input class="um-form-field valid "
			type="text" name="'.$key.'"
			id="'.$key.'" value="'.$field_value.'"
			placeholder=""
			data-validate="" data-key="'.$key.'">
			</div>
			</div>';

			echo $html;

		}
	}

	add_action('um_account_pre_update_profile', 'getUMFormData', 100);
	function getUMFormData(){
		$id = um_user('ID');
		$names = array('user_name');
		foreach( $names as $name ){
			update_user_meta( $id, $name, $_POST[$name] );
		}
	}
}





/**
 * Add files
 */
function my_scripts_and_css(){

	// jquery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', THEME_URI . '/js/jquery.min.js');
	wp_enqueue_script( 'jquery' );

	wp_deregister_script( 'jquery-migrate' );
	wp_register_script( 'jquery-migrate', THEME_URI . '/js/jquery-migrate.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-migrate' );
	
	
	// script
	wp_register_script( 'jquery-inputmask', THEME_URI . '/js/jquery.inputmask.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'bootstrap', THEME_URI . '/js/bootstrap.min.js', array( 'jquery', 'slick' ), '', true );
	wp_register_script( 'customizer', THEME_URI . '/js/customizer.js', array( 'jquery'  ), '', true );


	// style
	wp_register_style( 'clp-project-page',  THEME_URI . '/css/project-page.css');
	wp_register_style( 'clp-projects',  THEME_URI . '/css/projects.css');


	
	if( is_single() && get_post_type() == 'project' ){
		wp_enqueue_style( 'clp-project-page' );
	}
	
	if( is_archive() && get_post_type() == 'project' ){
		wp_enqueue_style( 'clp-projects' );
	}

	
	wp_enqueue_script( 'customizer' );
	

}
add_action( 'wp_enqueue_scripts', 'my_scripts_and_css' );




// Дополнительные поля для project-type
function cb_edit_term_fields( $term, $taxonomy ) {
	$value = get_term_meta( $term->term_id, 'clp_custom_meta_fields', true );
	for ($i = 1; $i <= 2; $i++) {
		$v = $value['field-' . $i];
			$label = ''; $description = ''; $placeholder = ''; $hide = ''; $required = '';
			if( isset( $v['label'] ) ){ $label = $v['label']; }
			if( isset( $v['description'] ) ){ $description = $v['description']; }
			if( isset( $v['placeholder'] ) ){ $placeholder = $v['placeholder']; }
			if( isset( $v['hide'] ) ){ $hide = 'checked'; }
			if( isset( $v['required'] ) ){ $required = 'checked'; }
			
			echo '<tr class="form-field">
			<th>
				<label>' . __('Field', THEME_NAME) . ' ' . $i . '</label>
			</th>
				<td>
					<label>Label:</label>
					<input type="text" name="field-' . $i . '-label" id="field-label' . $i . '" value="' . $label . '" />
					<br/><br/>
					<label>' . __('Description', THEME_NAME) . ':</label>
					<textarea type="text" name="field-' . $i . '-description" id="field-' . $i . '-description">' . $description . '</textarea>
					<br/><br/>
					<label>' . __('Placeholder', THEME_NAME) . ':</label>
					<input type="text" name="field-' . $i . '-placeholder" id="field-' . $i . '-placeholder" value="' . $placeholder . '" />
					<br/><br/>
					<label>' . __('Hide', THEME_NAME) . ':</label> <input type="checkbox" id="field-' . $i . '-hide" class="clp-field-checkbox-update" name="field-' . $i . '-hide" value="1" ' . $hide . ' />
					<br/><br/>
					<label>' . __('Required', THEME_NAME) . ':</label> <input type="checkbox" id="field-' . $i . '-required" class="clp-field-checkbox-update" name="field-' . $i . '-required" value="1"' . $required . '  />
				</td>
			</tr>';
	}
}
add_action( 'project-type_edit_form_fields', 'cb_edit_term_fields', 10, 2 );

function cb_save_term_fields( $term_id ) {
	$fields = array(); 
	for ($i = 1; $i <= 2; $i++){
		$fields['field-' . $i] = array();
		foreach( array( 'label', 'description', 'placeholder', 'hide', 'required' ) as $k ){
			if( isset( $_POST[ 'field-' . $i . '-' . $k ] ) && !empty( $_POST[ 'field-' . $i . '-' . $k ] ) ){
				$fields['field-' . $i][$k] = sanitize_text_field($_POST[ 'field-' . $i . '-' . $k ]);
			}
		}
		
	}
	update_term_meta( $term_id, 'clp_custom_meta_fields', $fields);
}
add_action( 'created_project-type', 'cb_save_term_fields' );
add_action( 'edited_project-type', 'cb_save_term_fields' );







































		






