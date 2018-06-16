<?php
class BlackField_Image_select extends BlackBone{


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
			if( is_array( $this->field['options'] ) ){
				echo '<div class="radio radio-primary bb-image-select">';
					foreach ( $this->field['options'] as $value => $img_uri ) { 

						$active_class = ($this->value == $value) ? 'image-active': '';

						echo '<label class="imagesetBoxed '.$active_class.'">';
						echo '<img style="" alt="'.$value.'" src="'.$img_uri.'" />';
							echo '<input type="radio" '. $name .' value="'.$value.'" class="" '.checked($this->value, $value, false).' />'; 
						echo '</label>';
					}
				echo '</div>';
			}  
		echo '</fieldset>';

	}
	
}
