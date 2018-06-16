<?php
class BlackField_Switch extends BlackBone{


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
				echo '<div class="bb-switch">';  
						$enable_class = $this->value == 1 ? 'switch-active': '';
						$disable_class = $this->value == 0 ? 'switch-active': '';
						echo '<label class="switchBoxed enable '.$enable_class.'">On</label>';
						echo '<label class="switchBoxed disable '.$disable_class.'">Off</label>';
						echo '<input type="hidden" '. $name .' value="'.$this->value.'" class="switch-input" />';
				echo '</div>'; 
		echo '</fieldset>';

	}
	
}
