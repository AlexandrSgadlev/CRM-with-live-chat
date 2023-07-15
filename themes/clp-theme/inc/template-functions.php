<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package clp-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function clp_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'clp_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function clp_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'clp_theme_pingback_header' );


/**
 * Show Menu
 */
function show_menu( $name ){
	$locations_menu = get_nav_menu_locations();
	if( $locations_menu && isset( $locations_menu[ $name ] ) ){
		$menu_items = wp_get_nav_menu_items( $locations_menu[ $name ] );
		$menu_list = '<ul class="' . $name . '">';
		$url = current_location();
		foreach ( (array) $menu_items as $key => $menu_item ){
			global $post;
			$link_class = 'menu_item_id-' . $menu_item->ID;
			if($url == $menu_item->url){
				$link_class .= ' curent-page';
			}
			$menu_list .= '<li class="' . $link_class . '" ><a href="' . $menu_item->url . '">' . __($menu_item->title, THEME_NAME) . '</a></li>';
		}
		$menu_list .= '</ul>';
	}
	else {
		$menu_list = '';
	}
	echo $menu_list;
}

register_nav_menus(array(
	'footer-menu' => 'Нижнее меню'
));


/**
 * Body class
 */
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
	$current_user = wp_get_current_user();
	if($current_user){
		if ( in_array( 'administrator', (array) $current_user->roles ) ) {
			$classes[] = 'administrator';
		}
		if ( in_array( 'um_project-manager', (array) $current_user->roles ) ) {
			$classes[] = 'project-manager';
		}
		if ( in_array( 'um_customer', (array) $current_user->roles ) ) {
			$classes[] = 'customer';
		}
	}
	return $classes;
}


/**
 * Location
 */
function current_location(){
	if (isset($_SERVER['HTTPS']) &&
		($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
		isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
		$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
		$protocol = 'https://';
	} else {
		$protocol = 'http://';
	}
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}


/**
 * Posts nav
 */
function wpbeginner_numeric_posts_nav(){
  
    if( is_singular() )
        return;
  
    global $wp_query;
  
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
  
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
  
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
  
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
  
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
  
    echo '<div class="navigation"><ul>' . "\n";
  
    /** Previous Post Link */
    if ( $paged > 1 ){
		$class = 1 == $paged ? 'active' : '';
		$paged_link = ($paged - 1);
		printf( '<li class="prev %s"><a href="%s" data-page_projects="' . $paged_link . '"> %s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $paged_link ) ), __( 'Previous', THEME_NAME ) );
	}
	
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
  
        printf( '<li%s><a href="%s" data-page_projects="1">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
  
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
  
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s" data-page_projects="' . $link . '">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
  
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s" data-page_projects="' . $max . '">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
  
    /** Next Post Link */
    if ( $paged < $max ){
		$class = $paged == $max ? 'active' : '';
		$paged_link = ($paged + 1);	
		printf( '<li class="next %s"><a href="%s" data-page_projects="' . $paged_link . '">%s </a></li>' . "\n", $class, esc_url( get_pagenum_link( $paged_link ) ), __( 'Next', THEME_NAME ) );
	}
		
	
  
    echo '</ul></div>' . "\n";
  
}