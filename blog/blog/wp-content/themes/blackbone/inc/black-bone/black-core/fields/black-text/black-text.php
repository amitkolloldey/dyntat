<?php
class BlackField_Text extends BlackBone{


	private $field;
	private $value;
	public $args;
	
	/**
	 * Constructor
	 */
	public function __construct( $field = array(), $value ='', $parent = NULL ){
		$this->field = $field;
		$this->value = $value; 
		$this->args = $parent->args;  
	} 

	/**
	 * Render
	 */
	public function render( $meta = false ){



		if ( empty($this->value) && $this->value == '' ) {
			$this->value = $this->field['default'];
		} 

		
		// name -----------------------------------------------------	
		if( $this->field['id'] ){	
			
			// theme options
			$name = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .']"';
	
		}
		echo '<div class="form-group bb-field-warp">';
		// echo -----------------------------------------------------		 
		echo '<input type="text" '. $name .' value="'. esc_attr( $this->value ) .'" class="form-control" />'; 
		echo '</div>';
	}
	
}
