<?php
class BlackField_Info extends BlackBone{


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
		echo '</td></tr></table><div class="bb-field-warp bb-info-bar">';
		// echo -----------------------------------------------------		 
		echo '<span>'.$this->field['title'].'</span>'; 
		echo '</div><table class="form-table"><tbody><tr class="bb-single-field" style="border: medium none ! important; display: none ! important;"><th scope="row"></th><td>';
	}
	
}
