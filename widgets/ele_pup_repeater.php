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
		return 'eicon-editor-list-ul';
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
		//return [ \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY ];
		return [ 'general' ];
	}


	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
  

		wp_register_script( 'your-script', plugin_dir_url( __FILE__ ) . 'assets/js/flickity.pkgd.min.js', array( 'jquery' ), $plugin['Version'], true );
		
		//wp_register_script( 'script-handle', 'path/to/file.js', [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_script( 'your-script', plugin_dir_url( __FILE__ ) . 'assets/js/file.js', array( 'jquery' ), $plugin['Version'], true );
		//wp_register_style( 'your-style', plugin_dir_url( __FILE__ ) . 'assets/css/file.css', array(), $plugin['Version'] );
		wp_register_style( 'your-style', plugin_dir_url( __FILE__ ) . 'assets/css/flickity.css', array(), $plugin['Version'] );
	}
  
	 public function get_script_depends() {
		 return [ 'your-script' ];
	 }
	 public function get_style_depends() {
		return [ 'your-style' ];
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
				'label' => esc_html__( 'Repeater Name', 'elementor-currency-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'hike',
				'placeholder' => '',
			]
		);
		$this->add_control(
			'repeater_field_image',
			[
				'label' => esc_html__( 'Image Field', 'elementor-currency-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'hike',
				'placeholder' => '',
			]
		);
		$this->add_control(
			'repeater_field_caption',
			[
				'label' => esc_html__( 'Caption Field', 'elementor-currency-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'hike',
				'placeholder' => '',
			]
		);
		/*$this->add_control(
			'fields',
			[
				'label' => esc_html__( 'Fields', 'elementor-acf-average-dynamic-tag' ),
				'type' => 'text',
				'dynamic' => [
					'active' => true,
				],
			]
		);*/
	
		$this->end_controls_section();
	}

/**/






	protected function render() {
		





		$settings = $this->get_settings_for_display();
		//echo $settings['repeater_field_name'] . 'rep name ';



// Check rows existexists.
$repeater_field_name = $settings['repeater_field_name'];
$repeater_field_image = $settings['repeater_field_image'];
$repeater_field_caption = $settings['repeater_field_caption'];

if (class_exists('ACF')) {

echo '<div class="main-carousel  js-flickity">';

	if( have_rows($repeater_field_name) ):

		// Loop through rows.
		while( have_rows($repeater_field_name) ) : the_row();

		echo '<div class="carousel-cell">';
			$image = get_sub_field($repeater_field_image);
			// Load sub field value.
			echo wp_get_attachment_image( $image, 'full' ); 
			//$sub_value = get_sub_field($repeater_field_caption);
			//echo the_sub_field($repeater_field_caption);
			//echo '<div class="csstry">'.$repeater_field_name.'</div>'; 
			// Do something...
			echo '</div>';
		// End loop.
		endwhile;
	
	// No value.
	else :
		// Do something...
	endif;



	echo '</div>';
	
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