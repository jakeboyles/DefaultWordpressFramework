<?php
	define('SUND_BLOGNAME', get_bloginfo('name'));
	define('SUND_STYLESHEET', get_bloginfo('stylesheet_url'));
	define('SUND_THEME_DIR', get_bloginfo('stylesheet_directory'));
	define('SUND_THEME_DIR_FS', get_stylesheet_directory());

	//----------------------------------------------------------------------------
	// Define navigation menus
	//

	add_action( 'init', 'sund_nav_menu' );
	if (!function_exists('sund_nav_menu')) {
		function sund_nav_menu() {
			register_nav_menus(array(
				'main-nav'            => __( 'Main Nav' ),
			));
		}
	}


	//----------------------------------------------------------------------------
	// Theme scripts and styles
	//
	add_action('wp_enqueue_scripts', 'sund_load_scripts');
	if (!function_exists('sund_load_scripts')) {
		function sund_load_scripts() {

			// Global, loaded for all pages
			wp_enqueue_script("jquery");
			wp_enqueue_script('jquery.fancybox', SUND_THEME_DIR.'/includes/js/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'), '1.3.4');
			wp_enqueue_script('jquery.easing', SUND_THEME_DIR.'/includes/js/fancybox/jquery.easing-1.3.pack.js', array('jquery'), '1.3');
			wp_enqueue_style('fancybox-stylesheet', SUND_THEME_DIR.'/includes/js/fancybox/jquery.fancybox-1.3.4.css');
			wp_enqueue_script('sund-global', SUND_THEME_DIR.'/includes/js/sund-global.js', array('jquery'), '1.0');


			// Home page only
			if (is_front_page()) {
				wp_enqueue_script('sund-home', SUND_THEME_DIR.'/includes/js/sund-home.js', array('jquery'), '1.0');
			}
		}
	}


	//----------------------------------------------------------------------------
	// Adds menu-item-first and menu-item-last classes as appropriate
	//
	add_filter('wp_nav_menu', 'wp_nav_menu_item_first_last');
	if (!function_exists('wp_nav_menu_item_first_last')) {

		function wp_nav_menu_item_first_last($menuHTML) {
			$first_items_ids  = array();
			$last_items_ids  = array();
			$menus = wp_get_nav_menus();

			foreach($menus as $menu_maybe) {
				if($menu_items = wp_get_nav_menu_items($menu_maybe->term_id)) {
					$items = array();

					foreach($menu_items as &$menu_item) {
						$items[$menu_item->menu_item_parent][] = $menu_item->ID;
					}

					foreach($items as $item) {
						$first_items_ids[] = $item[0];
						$last_items_ids[] .= end($item);
					}
				}
			}

			// First menu items
			foreach($first_items_ids as $first_item_id) {
				$items_add_class[] .= ' menu-item-'.$first_item_id;
				$replacement[]     .= ' menu-item-'.$first_item_id . ' menu-item-first';
			}

			// Last menu items
			foreach($last_items_ids as $last_item_id) {
				$items_add_class[] .= ' menu-item-'.$last_item_id;
				$replacement[]     .= ' menu-item-'.$last_item_id . ' menu-item-last';
			}

			$menuHTML = str_replace($items_add_class, $replacement, $menuHTML);
			return $menuHTML;
		}
	}



	//----------------------------------------------------------------------------
	// Register Sidebar
	//


	if ( function_exists ('register_sidebar')) { 
    register_sidebar ('news'); 
	} 


	//----------------------------------------------------------------------------
	// Custom image sizes
	//

	//--- support for featured images
	add_theme_support( 'post-thumbnails' );

	//add_image_size( 'schmedium', 210, 160, true );
	add_image_size( 'schmedium', 210, 160, true );


	//----------------------------------------------------------------------------
	// Admin customizations
	//
	//add_editor_style('admin/editor-style.css');
	//if (function_exists('pods')) {
	//	get_template_part('admin/pods-ui-customizations');
	//}

	//----------------------------------------------------------------------------
	// Login customizations
	//
	//get_template_part('admin/login-customizations');
