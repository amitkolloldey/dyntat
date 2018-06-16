<?php
class BlackField_Spacing extends BlackBone{


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
            'icon'      => true,
            'top'     	=> true,
    		'bottom'  	=> true,
    		'left'    	=> true,
    		'right'   	=> true, 
            'default'   => array(
        		'top'     => '',
        		'bottom'  => '',
        		'left'    => '',
        		'right'   => '',
            )
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
			$namet = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .'][top]"';
			$nameb = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .'][bottom]"';
			$namel = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .'][left]"';
			$namer = 'name="'. $this->args['opt_name'] .'['. $this->field['id'] .'][right]"';
	
		}
		echo '<fieldset class="form-group bb-field-warp spacing">';
		if ($this->field['top'] === true ) {
			echo '<div class="spacing">';
				echo '<i class="bb-icon bbdown-small-1"></i>';
				echo '<input type="text" '. $namet .' value="'. esc_attr( $this->value['top'] ) .'" class="form-control" />';
			echo '</div>';
		}

		if ($this->field['bottom'] === true ) {
			echo '<div class="spacing">';
				echo '<i class="bb-icon    bbup-small-1"></i>';
				echo '<input type="text" '. $nameb .' value="'. esc_attr( $this->value['bottom'] ) .'" class="form-control" />';
			echo '</div>';
		}

		if ($this->field['left'] === true ) {
			echo '<div class="spacing">'; 
				echo '<i class="bb-icon bbright-small-1"></i>';
				echo '<input type="text" '. $namel .' value="'. esc_attr( $this->value['left'] ) .'" class="form-control" />';
			echo '</div>';
		}

		if ($this->field['right'] === true ) {
			echo '<div class="spacing">'; 
				echo '<i class="bb-icon bbleft-small-1"></i>';
				echo '<input type="text" '. $namer .' value="'. esc_attr( $this->value['right'] ) .'" class="form-control" />';
			echo '</div>';
		} 
		//echo '<input type="text" '. $name .' value="'. esc_attr( $this->value ) .'" class="form-control" />'; 
		echo '</fieldset>';
	}
	
}
