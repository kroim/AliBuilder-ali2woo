<?php
   /*
   Plugin Name: AliBuilder
   Plugin URI: http://www.aliBuilder.com
   description: A plugin for Ali Express and much more functionality for Woocommerce with chrome extension
   Version: 1.0.0
   Author: Mr. AliBuilder
   Author URI: http://www.aliBuilder.com
   License: GPL2
   */

   define('plugin_url', plugins_url().'/AliBuilder/');
   
   function alibuilder_activate_code(){
	  
   }
   register_activation_hook( __FILE__, 'alibuilder_activate_code' );

/*add_action("wp_enqueue_scripts", "myscripts");
function myscripts() { 
   wp_register_script( 'jQuery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' , '', '', true );
   wp_enqueue_script( 'jQuery-js' );   
}*/

   function alibuilder_register_menu() {
    add_menu_page(
			__( 'AliBuilder', 'textdomain' ),
			'AliBuilder',
			'manage_options',
			'alibuilder',
			'alibuilder_main',
			plugins_url( '/AliBuilder/images/icon.png' )
		);
		
		add_submenu_page( 'alibuilder', 'Search Products', 'Search Products',
		'manage_options', 'alib-products', 'alibuilder_products');
		
			$warning_count=0;
			$args = array(
			  'post_type'   => 'product',
			  'post_status' => array('alib_imported'),
                          'posts_per_page' => -1
			);
			 
			$products = get_posts( $args );
			 //echo '<pre>'; print_r($products); exit;
			$i=1; foreach($products as $product){
			if($product->post_status == 'alib_imported'){
				$warning_count++;
			}
			}
    
			$warning_title = esc_attr( sprintf( '%d plugin warnings', $warning_count ) );

			$menu_label = sprintf( __( 'Import Lists %s' ), "<span class='update-plugins count-$warning_count' title='$warning_title'><span class='update-count'>" . number_format_i18n($warning_count) . "</span></span>" );

		add_submenu_page( 'alibuilder', 'Import Lists', $menu_label,
		'manage_options', 'alib-import', 'alibuilder_import');
	
		add_submenu_page( 'alibuilder', 'Settings', 'Settings',
		'manage_options', 'alib-settings', 'alibuilder_settings');
		
		add_submenu_page( 'alibuilder', 'Shipping-list', 'Shipping list',
		'manage_options', 'alib-shipping-list', 'alibuilder_shipping_list');
		
		add_submenu_page( 'alibuilder', 'Extensions', 'Extensions',
		'manage_options', 'alib-extensions', 'alibuilder_extensions');
	
	}
	add_action( 'admin_menu', 'alibuilder_register_menu' );

	function alibuilder_main(){
		include 'templates/overview.php';
	}
	
	function alibuilder_products(){
		include 'templates/search-products.php';
	}
	
	function alibuilder_import(){
		include 'templates/import-lists.php';
	}
	
	function alibuilder_settings(){
		include 'templates/settings.php';
	}
	
	function alibuilder_shipping_list(){
		include 'templates/shipping_list.php';
	}
	
	function alibuilder_extensions(){
		include 'templates/extensions.php';
	}
	
include 'includes/core.php';
include 'includes/import_by_url.php';

