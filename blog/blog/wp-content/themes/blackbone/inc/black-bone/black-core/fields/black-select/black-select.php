<?php
class BlackField_Select extends BlackBone{


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

		if ( empty($this->value) || $this->value == '' ) {
        	$this->value = $this->field['default'];
        }  
		echo '<div class="form-group bb-field-warp">';
			// echo -----------------------------------------------------		 '. esc_attr( $this->value ) .'
			echo '<select  '. $name .' value="" class="form-control bb-select" />';
				if( is_array( $this->field['options'] ) ){
					foreach ( $this->field['options'] as $key => $value ) {
						echo '<option value="'.$key.'" '.selected( $this->value, $key, false ).' >'.$value.'</option>';
					} 
				}
			echo '</select>';  
		echo '</div>';

	}

	public function enqueue(){ 
		$styled = array();
		$styled[] = $this->parent->fielddepand;  
		wp_enqueue_style( 'bb-opt-field-nselet-style', $this->parent->bbfuri.'black-select/nice-select.css', $styled, $this->version, 'all' );
		wp_enqueue_script( 'bb-opt-field-nselect-js', $this->parent->bbfuri.'black-select/jquery.nice-select.js', array('jquery'), $this->version, 'all' );
	}
	
}
