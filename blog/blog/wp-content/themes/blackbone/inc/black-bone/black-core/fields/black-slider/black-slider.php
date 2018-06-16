<?php
class BlackField_Slider extends BlackBone{


	private $field;
	private $value;
	private $parent;
	public $args;
	
	/**
	 * Constructor
	 */
	public function __construct( $field = array(), $value ='', $parent = NULL ){
		$this->field = $field;
		$this->value = $value; 
		$this->args = $parent->args;  
		$this->parent = $parent; 
	}
	
	/**
	 * Render
	 */
	public function render( $meta = false ){
		// name -----------------------------------------------------	
		if( $this->field['id'] ){	
			
			// theme options
			$name = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .']"';
	
		}  //data-max="'.$this->field['max'].'" data-min="'.$this->field['min'].'" data-default="'.$this->field['default'].'" data-step="'.$this->field['step'].'"
		 
		echo '<div class="form-group bb-field-warp">'; 
		// echo -----------------------------------------------------		 
		echo '<input type="text" '. $name .' value="'. esc_attr( $this->value ) .'" class="form-control bb-sliders-input" id="'.$this->field['id'].'-slider-input" />'; 
		echo '<div id="'.$this->field['id'].'" class="bb-sliders" ></div>';
		echo '</div>';
	}

	public function enqueue(){ 
		$styled = array();
		$styled[] = $this->parent->fielddepand;    
		//wp_enqueue_style( 'bb-opt-field-nouislider-style', $this->parent->bbfuri.'black-slider/nouislider.min.css', $styled, $this->version, 'all' );
		//wp_enqueue_script( 'bb-opt-field-wNumb-js', $this->parent->bbfuri.'black-slider/wNumb.js', array('jquery'), $this->version, 'all' );
		//wp_enqueue_script( 'bb-opt-field-nouislider-js', $this->parent->bbfuri.'black-slider/nouislider.min.js', array('jquery'), $this->version, 'all' );
	}
	
}
