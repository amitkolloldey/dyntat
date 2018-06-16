<?php
class BlackField_Sliders_panal extends BlackBone{


	private $field;
	private $value;
	private $parent;
	public $args;
	public $cat_data = array();
	public $name;
	
	/**
	 * Constructor
	 */
	public function __construct( $field = array(), $value ='', $parent = NULL ){
		$this->field = $field;
		$this->value = $value; 
		$this->args = $parent->args;  
		$this->parent = $parent; 
		$this->nameGanarat(); 
	}

	public function nameGanarat(){
		// name -----------------------------------------------------	
		if( $this->field['id'] ){	 
			$this->name = ''. $this->args['opt_name'] .'['. $this->field['id'] .']';
		} 
	}
	
	/**
	 * Render
	 */
	public function render( $meta = false ){ 
		echo '<div class="form-group bb-field-warp">';
	
			/*echo "<pre>";
			print_r($this->value);
			echo "</pre>";*/
			echo '<div class="clone-parents" style="display: none !important;">';
				echo $this->damo_fields();
			echo '</div>';

			echo '<div class="slide-panal-wrappre">';
				$fiels_count_name = $this->name.'[fields-count]';
				if ( isset($this->value['fields-count']) && $this->value['fields-count'] != '' ) {
					$fiels_count_val = $this->value['fields-count'];
				}else{
					$fiels_count_val = '0';
				}
				echo '<input type="hidden" class="fiels-count" name="'. $fiels_count_name .'" value="'.$fiels_count_val.'">';
				if (is_array($this->value) && isset($this->value['fields']) ) { 
					$counta = 0; 
					foreach ($this->value['fields'] as $key => $value) { 
						echo '<div class="single-slide-panal"> ';
								echo '<div class="slide-panal-title single-field-Unique">';
									$htitle = $value['slide-title'] != '' ? $value['slide-title'] : 'New Tab';
			                        echo '<h4>'.$htitle.'</h4>';
			                    echo '</div>';
			                    echo '<div class="slide-panal-fields">';  
			                    	$this->get_Slide_Fields($counta, $value); 
			                    	echo '<div class="form-group ">';
			                    		echo '<button type="submit" class="btn delt-single-panal">Delete This</button>'; 
			                    	echo '</div>'; 
			                    echo '</div>'; 
						echo '</div>';
						if($counta == $fiels_count_val) break;
						$counta++;
					}
				}else{ 
					echo '<div class="single-slide-panal"> ';
							echo '<div class="slide-panal-title single-field-Unique">';
		                        echo '<h4>New Tab</h4>';
		                    echo '</div>';
		                    echo '<div class="slide-panal-fields">';  
		                    	$this->get_Slide_Fields(); 
		                    	echo '<div class="form-group ">';
			                    	echo '<button type="submit" class="btn delt-single-panal">Delete This</button>'; 
			                    echo '</div>'; 
		                    echo '</div>'; 
					echo '</div>'; 
				}


			echo '</div>';
			echo '<button class="add_slide_panal">Add New</button>'; 
		echo '</div>';
	}

	private function damo_fields(){ 
			echo '<div class="single-slide-panal" style="display: none !important;"> ';
					echo '<div id="single-field-Unique" class="slide-panal-title">';
                        echo '<h4>New Tab</h4>';
                    echo '</div>'; 
                    echo '<div class="slide-panal-fields">';   
                    	$this->get_Slide_Fields('0');
                    	echo '<div class="form-group ">';
	                    	echo '<button type="submit" class="btn delt-single-panal">Delete This</button>'; 
	                    echo '</div>';
                    echo '</div>'; 
			echo '</div>';  
	}

	public function get_Slide_Fields( $counta, $value = array() ){ 
		$this->slide_text( 'slide-title', $counta, 'Name of Field Title', $value['slide-title'] );
		foreach ( $this->field['slide-fields'] as $field) {  
			if ($field['type'] != '') { 
				$mathod  = trim($field['type'],' ');
				$mathod  =  'slide_'.strtolower( $mathod ); 
				$this->$mathod($field['id'], $counta, $field['title'], $value[$field['id']], $field['options']);
			} 
	    } 
	}

	protected function slide_text($id, $counta, $title = '', $value = ''){ 
		$fiels_name = $this->name.'[fields]['.$counta.']['.$id.']';
		echo '<div class="form-group ">';
			echo '<input type="text" class="form-control slide-title" name="'. $fiels_name .'" value="'.$value.'" placeholder="'.$title.'"/>';  
		echo '</div>'; 
	}

	protected function slide_select($id, $counta, $title = '', $value = '', $options){ 
		$fiels_name = $this->name.'[fields]['.$counta.']['.$id.']';
		echo '<div class="form-group ">';
			echo '<select  name="'. $fiels_name .'" value="" class="form-control bb-select">';
				if( $options ){ 
					echo '<option>'.$title.'</option>';
					foreach ( $options as $id => $cat) {  
						echo '<option value="'.$id.'" '.selected( $value, $id, false ).'  >'.$cat.'</option>';
						//echo '<option value="'.$key.'" '.selected( $this->value, $key, false ).' >'.$value.'</option>';
					} 
				}
			echo '</select>'; 
		echo '</div>'; 
	}


	public function enqueue(){ 
		$styled = array();
		$styled[] = $this->parent->fielddepand;    
		wp_enqueue_style( 'bb-opt-field-sliders-panal-css', $this->parent->bbfuri.'black-sliders-panal/sliders-panal.css', $styled, $this->version, 'all' );
		wp_enqueue_script( 'bb-opt-field-sliders-panal-js', $this->parent->bbfuri.'black-sliders-panal/sliders-panal.js', array('jquery'), $this->version, 'all' );
		//wp_enqueue_script( 'bb-opt-field-nouislider-js', $this->parent->bbfuri.'black-slider/nouislider.min.js', array('jquery'), $this->version, 'all' );
	}
	
}
