<?php
class BlackField_Media_tow extends BlackBone{


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
		echo '<div class="form-group bb-field-warp media">';
		// echo -----------------------------------------------------		 
			echo '<input type="text" '. $name .' value="'. esc_attr( $this->value ) .'" class="form-control media-input" />';
			echo '<button class="btn btn-raised bb-btn bb-upmedia">Upload</button>';
			echo '<div class="bb-input-image">';
				if ($this->value == "") {
				 	echo '<img src="'.$this->bbfuri."black-media-tow/placeholder-1200.png".'" alt="" />';	
				}else{
					echo '<img src="'.esc_attr( $this->value ).'" alt="" />';
				}  
			echo '</div>';	 
		echo '</div>';
	}
	
}
