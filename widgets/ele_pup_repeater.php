<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Ele_Pup_Repeater extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hello_world_widget_1';
	}

	public function get_title() {
		return esc_html__( 'Pup Repeater', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	/*public function get_categories() {
		return [ 'general' ];
	}*/

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}


	public function get_group() {
		return [ 'site' ];
	}

	
	public function get_categories() {
		return [ \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY ];
		
	}





	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-currency-control' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'price',
			[
				'label' => esc_html__( 'Price', 'elementor-currency-control' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 100,
			]
		);

		$this->add_control(
			'repeater_field_name',
			[
				'label' => esc_html__( 'value', 'elementor-currency-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'hike',
				'placeholder' => 'dded',
			]
		);
		$this->add_control(
			'fields',
			[
				'label' => esc_html__( 'Fields', 'elementor-acf-average-dynamic-tag' ),
				'type' => 'text',
				'dynamic' => [
					'active' => true,
				],
			]
		);
	
		$this->end_controls_section();
	}

/**/






	protected function render() {
		

		$settings = $this->get_settings_for_display();
		echo $settings['repeater_field_name'] . 'rep name ';



// Check rows existexists.
$repeater_field_name = $settings['repeater_field_name'];


if (class_exists('ACF')) {

echo 'scfff';

	if( have_rows('gallery') ):

		// Loop through rows.
		while( have_rows('gallery') ) : the_row();
	
			// Load sub field value.
			$sub_value = get_sub_field('title');
			echo the_sub_field('title');
			echo 'hello'; 
			// Do something...
	
		// End loop.
		endwhile;
	
	// No value.
	else :
		// Do something...
	endif;
	
}



/*
$fields = $this->get_settings( 'fields' );
		$sum = 0;
		$count = 0;
		$value = 0;

	
		if ( ! function_exists( 'get_field' ) ) {
			echo 0;
			return;
		}

		foreach ( explode( ',', $fields ) as $index => $field_name ) {
			$field = get_field( $field_name );
			if ( (int) $field > 0 ) {
				$sum += (int) $field;
				$count++;
			}
		}

		if ( 0 !== $count ) {
			$value = $sum / $count;
		}

		echo $value;

*/

	}











}
?>