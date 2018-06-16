<?php
class BlackField_Color_alpha extends BlackBone{


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
	
		}  
		if ( empty($this->value) && $this->value == '' ) {
			$this->value = $this->field['default'];
		} 
		 
		echo '<div class="form-group bb-field-warp">';
		echo '<div class="slider shor slider-success"></div>';
		// echo -----------------------------------------------------		 
		echo '<input type="text" data-alpha="true" '. $name .' value="'. esc_attr( $this->value ) .'" class="form-control bb-color-alpha-input" />'; 
		echo '</div>';
	}

	public function enqueue(){ 
		$styled = array();
		$styled[] = $this->parent->fielddepand;  
		$styled[] = 'wp-color-picker';  
		wp_enqueue_script( 'bb-opt-field-colora-js', $this->parent->bbfuri.'black-color-alpha/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), $this->version, 'all' );
	}
	
}
