<?php
class BlackField_Ace_editor extends BlackBone{


	private $field;
	private $value;
	public $args;
	private $parent;
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
		echo '<div class="form-group bb-field-warp">';

			// echo ----------------------------------------------------- 
			echo '<textarea class="bbeditor-field" style="display: none;" '. $name .' rows="8" cols="65" >'.esc_attr($this->value).'</textarea>';
			$editor_id = trim($this->field['id'] );
			$editor_id = str_replace(' ', '-', $editor_id);
			echo '<div id="'.$editor_id.'" class="bbeditor" style="display: block; height: 200px;"></div>'; 
		echo '</div>';
	}

	public function enqueue(){ 
		$styled = array();
		$styled[] = $this->parent->fielddepand; 
		//$this->parent->bbfuri   
		//wp_enqueue_style( 'bb-opt-field-sliders-panal-css', .'black-sliders-panal/sliders-panal.css', $styled, $this->version, 'all' );
		wp_enqueue_script( 'bb-opt-field-ace-editor-js', 'https://cdn.jsdelivr.net/ace/1.2.6/min/ace.js', array('jquery'), $this->version, 'all' ); 
		wp_enqueue_script( 'bb-opt-field-custom-ace-editor-js', $this->parent->bbfuri.'black-ace-editor/custom-ace-editor.js', array('jquery', 'bb-opt-field-ace-editor-js'), $this->version, 'all' ); 
	}
	
}
