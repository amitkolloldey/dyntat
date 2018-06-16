<?php
class BlackField_Textarea extends BlackBone{


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
		// name -----------------------------------------------------	
		if( $this->field['id'] ){	
			
			// theme options
			$name = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .']"';
	
		}
		echo '<div class="form-group bb-field-warp">';
		// echo ----------------------------------------------------- 
		echo '<textarea class="form-control" '. $name .' rows="8" cols="65" >'.esc_attr($this->value).'</textarea>';
		
		if( isset( $this->field['desc'] ) && ! empty( $this->field['desc'] ) ){
			echo '<span class="description '.$class.'">'. $this->field['desc'] .'</span>';	
		}
		echo '</div>';
	}
	
}
