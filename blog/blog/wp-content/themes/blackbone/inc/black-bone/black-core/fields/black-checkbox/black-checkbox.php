<?php
class BlackField_Checkbox extends BlackBone{


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
			$name = $this->args['opt_name'] .'['. $this->field['id'] .']';
	
		}
		if ( ! is_array( $this->value ) ){
				$this->value = array();
		}
		 
		// echo -----------------------------------------------------		 
		echo '<div class="form-group bb-field-warp">';
			if( is_array( $this->field['options'] ) ){
					foreach ( $this->field['options'] as $value => $text ) {
						if( ! key_exists( $value, $this->value ) ) {
							$this->value[$value] = '';
						}
					echo '<div class="checkbox">';
						echo '<label>';
							echo '<input type="checkbox" name="'. $name.'['.$value.']'.'" value="'.$value.'" class="" '.checked($this->value[$value], $value, false).' />';
							echo $text;
						echo '</label>';
					echo '</div>';
				}
			} 
		echo '</div>';

	}
	
}
