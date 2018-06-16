<?php
class BlackField_Buttonset extends BlackBone{


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
		if ( empty($this->value) && $this->value == '' ) {
			$this->value = $this->field['default'];
		} 
		// echo -----------------------------------------------------		 
		echo '<fieldset class="form-group bb-field-warp">';
			if( is_array( $this->field['choices'] ) ){
				echo '<div class="radio radio-primary bb-buttonset">';
					foreach ( $this->field['choices'] as $value => $text ) { 
						$active_class = $this->value == $value ? 'buttonset-active': '';
						echo '<label class="buttonsetBoxed '.$active_class.'">';
							echo '<input type="radio" '. $name .' value="'.$value.'" class="" '.checked($this->value, $value, false).' />';
							echo $text;
						echo '</label>';
					}
				echo '</div>';
			}  
		echo '</fieldset>';

	}
	
}
