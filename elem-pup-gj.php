<?php
/**
 * Plugin Name: Elementor PUP
 * Description: GJ Elementor widgets PowerUps.
 * Version:     1.0.0
 * Author:      Gabriel Joffe
 * Author URI:  https://www.gabrieljoffe.com/
 * Text Domain: elementor-pup
 */

function register_ele_pup( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/ele_pup_repeater.php' );
	//require_once( __DIR__ . '/widgets/hello-world-widget-2.php' );

	$widgets_manager->register( new \Ele_Pup_Repeater() );
	//$widgets_manager->register( new \Elementor_Hello_World_Widget_2() );

}
add_action( 'elementor/widgets/register', 'register_ele_pup' );
?>