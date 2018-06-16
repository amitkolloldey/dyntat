<?php
class BlackField_Dimensions extends BlackBone{


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

		$defaults = array(
            'width'          => true,
            'height'         => true,
            'default'        => array(
                'width'  => false,
                'height' => false,
            ),
        );

        $this->field = wp_parse_args( $this->field, $defaults );
        if ( !is_array($this->value)) {
        	$this->value = array();
        }

        if (is_array($this->value) ) {
        	$this->value = wp_parse_args( $this->value, $this->field['default'] );
        } 

		// name -----------------------------------------------------	
		if( $this->field['id'] ){	
			
			// theme options
			$namew = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .'][width]"';
			$nameh = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .'][height]"';
	
		}
		echo '<fieldset class="form-group bb-field-warp dimensions">';
		if ($this->field['width'] === true && $this->field['height'] === true ) {  //
			if ($this->field['icon'] === true){
				echo '<div class="width">';
					echo '<i class="bb-icon  bb-iconresize-vertical-1"></i>';
					echo '<input type="text" '. $namew .' value="'. esc_attr( $this->value['width'] ) .'" class="form-control" />';
				echo '</div>';

				echo '<div class="height">';
					echo '<i class="bb-icon  bb-iconresize-horizontal-1"></i>';
					echo '<input type="text" '. $nameh .' value="'. esc_attr( $this->value['height'] ) .'" class="form-control" />';
				echo '</div>';
			}else{
				echo '<div class="width">'; 
					echo '<input type="text" '. $namew .' value="'. esc_attr( $this->value['width'] ) .'" class="form-control" />';
				echo '</div>';

				echo '<div class="height">'; 
					echo '<input type="text" '. $nameh .' value="'. esc_attr( $this->value['height'] ) .'" class="form-control" />';
				echo '</div>';
			}
		}else{
			if ( $this->field['width'] === true ) {
				echo '<input type="text" '. $namew .' value="'. esc_attr( $this->value['width'] ) .'" class="form-control" />';
			}elseif( $this->field['height'] === true ) {
				echo '<input type="text" '. $nameh .' value="'. esc_attr( $this->value['height'] ) .'" class="form-control" />';
			}
		}
		//echo '<input type="text" '. $name .' value="'. esc_attr( $this->value ) .'" class="form-control" />'; 
		echo '</fieldset>';
	}
	
}
