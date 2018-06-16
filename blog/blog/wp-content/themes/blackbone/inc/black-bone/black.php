<?php
/**
 * Theme Options - fields and args
 *
 * @package Black-Bone
 * @author Unique-IT-World
 * @link http://uniwueitworld.com
 */
// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( ! defined('BB_OPTIONS_DIR') ){ 
	define('BB_OPTIONS_DIR', trailingslashit( dirname(__FILE__) ) );
}

if( ! defined('BB_OPTIONS_URI') ){ 
	define('BB_OPTIONS_URI',  THEME_URI."/inc/black-bone/");	
}

if (!class_exists("BlackBone_Option")) {
	/**
	* 
	*/

	class BlackBone_Option{

		public $name 		= 'Blackbone';
		public $version 	= 1.0;
		public $bbdir 		= BB_OPTIONS_DIR;
		public $bburl 		= BB_OPTIONS_URI; 
		public $blackcore 	= BB_OPTIONS_DIR; //.'black-core';
		public $fielddepand = 'bb-opts-fonticon';
		public $bbfuri 		= BB_OPTIONS_URI; //.'black-core/fields/';
		public $page 		= '';
		public $defaultargs = array();
		public $args 		= array();
		public $menu 		= array();
		public $sections 	= array();
		public $extra_tabs 	= array();
		public $errors 		= array();
		public $warnings 	= array();
		public $options 	= array(); 
		
		public function __construct($settings, $sections = array() ){

			$this->blackcore = BB_OPTIONS_DIR.'black-core';
			$this->bbfuri	 = BB_OPTIONS_URI.'black-core/fields/';

			$this->defaultArgs();
			//print_r($this->defaultargs);
			$this->init($settings, $sections);

			//set option with defaults
			add_action('init', array(&$this, '_set_default_options'));

			add_action('admin_menu', array(&$this, '_create_options_page'));

			$this->menu = apply_filters('bb-opts-menu-'.$this->args['opt_name'], $this->menu);

			$this->args = apply_filters('bb-opts-args-'.$this->args['opt_name'], $this->args);

			$this->sections = apply_filters('bb-opts-sections-'.$this->args['opt_name'], $sections);
			add_action('admin_init', array(&$this, '_register_setting'));
			//add_action('admin_init', array(&$this, 'palash_register_setting'));

			$this->options = get_option( $this->args['opt_name'] ); 

			

/*
			$this->menu = apply_filters('bb-opts-menu', $menu);
			
			$defaults = array(); 
			$defaults['opt_name'] 		= !empty($bbopname)? $bbopname : 'tbbtheme';
			$defaults['menu_icon'] 		= MFN_OPTIONS_URI.'/img/menu_icon.png';
			$defaults['menu_title'] 	= __('BBTheme Options', 'black-bone');
			$defaults['page_icon'] 		= 'icon-themes';
			$defaults['page_title'] 	= __('BBTheme Theme Options', 'black-bone');
			$defaults['page_slug'] 		= 'blackbone_options';
			$defaults['page_cap'] 		= 'manage_options';
			$defaults['page_type'] 		= 'menu';
			$defaults['page_parent'] 	= '';
			$defaults['page_position'] 	= 100;

			//Set args in class
			$this->args = $defaults;
			$this->args = apply_filters('bb-opts-args', $this->args);
			$this->args = apply_filters('bb-opts-args-'.$this->args['opt_name'], $this->args);

			//Set sections in class
			$this->sections = apply_filters('bb-opts-sections', $sections);
			$this->sections = apply_filters('bb-opts-sections-'.$this->args['opt_name'], $this->sections);

			//options page
			add_action('admin_menu', array(&$this, '_create_options_page'));

			//register setting
			add_action('admin_init', array(&$this, '_register_setting'));
*/			//add_action( 'admin_enqueue_scripts', array( $this, '_bbenqueue') );
			//set option with defaults 

		}

		public function init($settings, $sections){ 
			if(is_array($settings)){
				$args = wp_parse_args( $settings, $this->defaultargs );
				$args['opt_name'] = str_replace("-","_",trim( $this->validArge($args['opt_name']), " ") );
				$args['page_slug'] = $this->validArge($args['page_slug']) ? $this->validArge($args['page_slug']) : $this->validArge($args['opt_name']); 
				$this->args = $args;
			}
			$this->menu = $this->getMenus($sections);
		}

		protected function getMenus($sections){
			$storeMenu = array(); 
			foreach ($sections as $key => $section ) {
				//array_push($storeMenu, $section['title']);  
				$storeMenu[$key] = array();
				$storeMenu[$key]['title']      = $section['title'];
				$storeMenu[$key]['icon']  	   = $section['icon'];
				$storeMenu[$key]['substatus']  = $section['substatus'];
				if ( isset( $section['substatus'] ) && $section['substatus'] === true ) {
					if ( isset( $section['subsection'] ) && is_array( $section['subsection'] ) ) { 
						$storeMenu[$key]['subsection'] = array();
						foreach ($section['subsection'] as $i => $value) {  
							$storeMenu[$key]['subsection'][$i] = array(); 

							$storeMenu[$key]['subsection'][$i]['title'] = $value['title'];
							$storeMenu[$key]['subsection'][$i]['icon']  = $value['icon']; 
						}  
					}
				}  
			}
			return $storeMenu;
			//print_r($storeMenu); 
		}

		private function defaultArgs(){
			$theme = wp_get_theme();
			$defaultargs = array( 
                    'opt_name'             => '', 
                    'display_name'         => $theme->get( 'Name' ), 
                    'display_version'      => $theme->get( 'Version' ), 
                    'admin_bar'            => true, 
                    'allow_sub_menu'       => false, 
                    'menu_icon'       	   => 'dashicons-portfolio', 
                    'menu_priority'   	   => 60,
                    'page_slug'            => '', 
                    'page_cap'             => 'manage_options', 
                    'menu_title'           => __( 'Sample Options', 'black-bone' ),
                    'page_title'           => __( 'Sample Options', 'black-bone' ), 
                    'google_api_key'       => '', 
                    'google_update_weekly' => false,    
                    'global_variable'      => '', 
                    'dev_mode'             => true, 
                    'update_notice'        => true, 
                    'page_priority'        => null, 
                    'page_parent'          => 'themes.php',  
                    'menu_icon'            => '', 
                    'last_tab'             => '',   
                    'save_defaults'        => true, 
                    'default_show'         => false, 
                    'default_mark'         => '', 
                    'show_import_export'   => true, 
                    'output'               => true, 
                    'output_tag'           => true, 
                    'system_info'          => false
			); 
			$this->defaultargs = $defaultargs;
		}
		public function _default_values(){
			$defaults = array();

			foreach ($this->sections as $k => $section) {
				if ( $section['substatus'] === true && $section['subsection'] ) {
					foreach ( $section['subsection'] as $sk => $subsection) {
						foreach ( $subsection['fields'] as $key => $field) {
							$defaults[$field['id']] = $field['default'];
						}
					}
				}elseif( $section['substatus'] === false ){
					if ( is_array($section['fields']) ) {
						foreach ( $section['fields'] as $fieldkey => $field ) {
							//$field_type = $field['type']; 
							$defaults[$field['id']] = $field['default'];
						}
					}
				}
			} 

			return $defaults;
		}

		public function _set_default_options(){
			if(!get_option($this->args['opt_name'])){
				add_option($this->args['opt_name'], $this->_default_values());
			}
			$this->options = get_option($this->args['opt_name']);
		}

		function get($opt_name, $default = null){
			
			if( ( ! is_array($this->options) ) || ( ! key_exists($opt_name, $this->options) ) ){
				return $default;
			}elseif( ! empty( $this->options[$opt_name]) ){
				return $this->options[$opt_name];
			} 
		}

		public function _create_options_page(){
			if ( $this->validArge($this->args['opt_name']) ) {
				if ( $this->validArge($this->args['admin_bar'] == true ) ) {
					$this->page = add_menu_page( 
						$this->args['page_title'], 
						$this->args['menu_title'], 
						$this->args['page_cap'], 
						$this->args['page_slug'], 
						array( &$this, '_create_options_page_html' ), 
						$this->args['menu_icon'], 
						$this->args['menu_priority'] 
					);
				} elseif ( $this->validArge($this->args['admin_bar'] ) == false && $this->validArge($this->args['page_parent'] ) ) {   
					$this->page = add_submenu_page(
						$this->args['page_parent'], 
						$this->args['page_title'], 
						$this->args['menu_title'], 
						$this->args['page_cap'], 
						$this->args['page_slug'], 
						array( &$this, '_create_options_page_html' ) 
					);
				} 
				//add_action( 'admin_print_styles-'.$this->page, array( &$this, '_bbenqueue' ) );
				add_action( 'admin_print_scripts-'.$this->page, array( &$this, '_bbenqueue' ) ); 
			}
		}

		private function validArge($arge){
			if ( isset($arge) && !empty($arge) && $arge != '' ) {
				return $arge;
			}else{
				return false;
			}
		}

		public function _bbenqueue(){

			wp_enqueue_media();
			wp_enqueue_script( 'media-grid' );
			wp_enqueue_script( 'media' );

			wp_enqueue_style('thickbox');
			wp_enqueue_style('thickbox-css');
			wp_enqueue_style( 'wp-color-picker' );

			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_script( 'wp-color-picker');
			wp_enqueue_script('jquery'); 
			wp_enqueue_script( 'jquery-form' );

			

			/*-----------------------------------------------------------------------------------
			* Field enquery Registery
			*-----------------------------------------------------------------------------------*/
			foreach ($this->sections as $k => $section) {
				if ( $section['substatus'] === true && $section['subsection'] ) {
					foreach ( $section['subsection'] as $sk => $subsection) {
						foreach ( $subsection['fields'] as $fieldkey => $field ) {
							if(isset($field['type'])){  
								$field_class = 'BlackField_'.ucfirst(str_replace( "-","_", $field['type'] ));

								$intupclass_file = $this->blackcore.'/fields/black-'.strtolower($field['type']).'/black-'.strtolower($field['type']).'.php'; 
								if (file_exists($intupclass_file)) {

									require_once ($intupclass_file);
									if (class_exists($field_class)) {    
										//$field_obj = new $field_class($field, $this); 
										$field_obj = new $field_class(array(), true, $this); 
										
										if ( method_exists( $field_obj, 'enqueue' ) ) {
											$field_obj->enqueue();
										}
									}
								} 
							}
						}
					}
				}elseif( $section['substatus'] === false ){
					if ( is_array($section['fields']) ) {
						foreach ( $section['fields'] as $fieldkey => $field ) {
							$field_type = $field['type'];


							if(isset($field['type'])){  
								$field_class = 'BlackField_'.ucfirst(str_replace( "-","_", $field['type'] ));

								$intupclass_file = $this->blackcore.'/fields/black-'.strtolower($field['type']).'/black-'.strtolower($field['type']).'.php'; 
								if (file_exists($intupclass_file)) {

									require_once ($intupclass_file);
									if (class_exists($field_class)) {    
										//$field_obj = new $field_class($field, $this); 
										$field_obj = new $field_class(array(), true, $this); 
										
										if ( method_exists( $field_obj, 'enqueue' ) ) {
											$field_obj->enqueue();
										}
									}
								} 
							}
						}
					}
				}
			}

			wp_enqueue_style( 'bb-jquery-ui', $this->bburl.'assets/css/jquery-ui.min.css', array(), $this->version, 'all');

			wp_enqueue_style( 'bb-opts-fonticon', $this->bburl.'assets/css/bb-fonts.css', array(), $this->version, 'all');
			wp_enqueue_style( 'bb-opts-style', $this->bburl.'assets/css/black-born-option.css', array(), $this->version, 'all');   
			

			wp_enqueue_script( 'bb-jquery-ui-js', $this->bburl.'assets/js/jquery-ui.min.js', array('jquery'), $this->version, true );
			wp_enqueue_script( 'bb-opts-js', $this->bburl.'assets/js/black-born-option.js', array('jquery', 'bb-jquery-ui-js', 'thickbox', 'media-upload', 'media-grid', 'media', 'wp-color-picker' ), $this->version, true );
		}

		public function _register_setting(){

			register_setting($this->args['opt_name'].'_group', $this->args['opt_name']);

			foreach($this->sections as $k => $section){
				if ( $section['substatus'] === true && $section['subsection'] ) {
					foreach ( $section['subsection'] as $sk => $subsection) {
						add_settings_section($sk.'_section', $subsection['title'], array(&$this, '_section_desc'), $sk.'_section_group');

							foreach ( $subsection['fields'] as $key => $field) {
								if(isset($field['title'])){
									if ( isset( $field['desc'] ) ) {
										$title = "<div class='fieldes-cont'>".$field['title']."<span class='description'>".$field['desc']."</span></div>";
									}else{
										$title = "<div class='fieldes-cont'>".$field['title']."</div>";
									}
								}else{
									$title = '';
								}
								if ( $field['type'] != 'info' ) {
									$field['class'] = 'bb-single-field';
								}elseif( $field['type'] == 'info' ){
									$field['class'] = 'bb-single-field bb-field-info';
								}
								add_settings_field($field['id'].'_field', $title, array(&$this,'_field_input'), $sk.'_section_group', $sk.'_section', $field);
							}  
					}
				}elseif( $section['substatus'] === false ){
					add_settings_section($k.'_section', $section['title'], array(&$this, '_section_desc'), $k.'_section_group');
					if ( is_array($section['fields']) ) {
						foreach ( $section['fields'] as $fieldkey => $field) {

							if(isset($field['title'])){
								if ( isset( $field['desc'] ) ) {
									$title = "<div class='fieldes-cont'>".$field['title']."<span class='description'>".$field['desc']."</span></div>";
								}else{
									$title = "<div class='fieldes-cont'>".$field['title']."</div>";
								}
							}else{
								$title = '';
							}
							if ( $field['type'] != 'info' ) {
								$field['class'] = 'bb-single-field';
							}elseif( $field['type'] == 'info' ){
								$field['class'] = 'bb-single-field bb-field-info';
							}
							//$field = print_r($field);
							add_settings_field('field_'.$fieldkey, $title, array(&$this,'_field_input'), $k.'_section_group', $k.'_section', $field);
						} 
					}
				}  
			}
		}

		public function _validate_options($data){
		}

		public function _section_desc($section){  
		}

		public function _field_input($field){ 
			//start input class
			if(isset($field['type'])){ 

				$value = (isset( $this->options[$field['id']])) ? $this->options[$field['id']]:'';
				$field_class = 'BlackField_'.ucfirst( str_replace( "-","_", $field['type'] ) );

				$intupclass_file = $this->blackcore.'/fields/black-'.str_replace( "_","-", strtolower($field['type'])).'/black-'.str_replace( "_","-", strtolower($field['type']) ).'.php'; 
				//var_dump( $intupclass_file );
				if (file_exists($intupclass_file)) {

					require_once ($intupclass_file);
					if (class_exists($field_class)) {    
						//$field_obj = new $field_class($field, $this); 
						$field_obj = new $field_class($field, $value, $this); 
						$field_obj->render();
					}
				} 
			}
		}

		public function _create_options_page_html(){ 
			$html  = ''; 
			$html .= '<div class="black-born-page-wrapper">';
			$html .= '<form method="post" action="options.php" enctype="multipart/form-data" id="bbOptionsForm">';
				ob_start(); 
				settings_fields($this->args['opt_name'].'_group');
				$html .= ob_get_clean();
				$html .= '<div class="black-born-option">
					<div class="bb-option-menu">';
					$html .= '<div class="bb-logo">';
						$html .= '<h2>'.$this->args['display_name'].'</h2>';
						$html .= '<span> Version : '.$this->args['display_version'].'</span>';
					$html .= '</div>';
					$html .= '<ul class="bb-menu">';
						foreach($this->menu as $k => $menu_item){ 
							$html .= '<li class="bb-menu-li">';
								
								if ( $menu_item[''] === true ) {
									$html .= '<a href="">
									<i class="bb-icon '.$menu_item['icon'].'"></i>'.ucfirst($menu_item['title']).'
								</a>';
								}else{
									$html .= '<a href="" data-rel="'.strtolower($k).'">
									<i class="bb-icon '.$menu_item['icon'].'"></i>'.ucfirst($menu_item['title']).'
								</a>';
								}
								if( is_array( $menu_item['subsection'] ) && isset( $menu_item['subsection'] ) ){
									$html .= '<ul>';
										foreach( $menu_item['subsection'] as $smk => $sub_item ){
											/*ob_start(); 
												print_r($sub_item);
											$html .= ob_get_clean();*/
											$html .= '<li class="bb-menu-li">
												<a href="" data-rel="'.strtolower($smk).'">'.ucfirst($sub_item['title']).'
												</a>
											</li>';
										}
									$html .= '</ul>';
								}
							$html .= '</li>';
						}
						$html .= '</ul>'; 
						
					$html .= '</div>';
					$html .= '<div class="bb-option-container">';

						//------- Start Black Bone Option Header Section ------------
						$html .= '<div class="bb-header">';

								//------- Start Ajax Save Button ------------
								$html .= ' <button class="btn btn-raised btn bb-btn bb-ajax-save-btn" type="button">Quike Save</button> ';

								//------- Start Saving Button ------------
								$html .= '<input class="btn btn-raised btn bb-btn" type="submit" name="submit" value="Save Changes" class="mfn-popup-save" />'; 

						$html .= '</div>';
     					//------- End Black Bone Option Header Section ------------

						//------- Start Black Bone Option Fields Sections  ------------
						$html .= '<div class="bb-section">';
							ob_start();
								foreach($this->sections as $k => $section){ 

									if ( $section['substatus'] === false ) { 
											echo '<div class="bb-single-section '.$k.'">';
											//var_dump($k);
											do_settings_sections($k.'_section_group');
											echo '</div>'; 
									}
									if ( $section['substatus'] === true && $section['subsection'] ) {
										foreach ( $section['subsection'] as $sk => $subsection) { 
											echo '<div class="bb-single-section '.$sk.'">';
											do_settings_sections($sk.'_section_group');
											echo '</div>';
										}
									}
								} 
							$html .= ob_get_clean(); 
							$html .= '<div class="bb-ajax-disble" style="display: none;">';
								$html .= '<img src="'.$this->bburl.'/assets/images/ajax_loading.gif'.'" alt="">';
							$html .= '</div>';
						$html .= '</div>';
						//------- End Black Bone Option Fields Sections ------------

						//------- Start Black Bone Option Footer Section ------------
						$html .= '<div class="bb-footer">';
							$html .= ' <button class="btn btn-raised btn bb-btn bb-ajax-save-btn" type="button">Quike Save</button> ';
							$html .= '<input class="btn btn-raised btn bb-btn" type="submit" name="submit" value="Save Changes" class="mfn-popup-save" />';
						$html .= '</div>';
						//------- End Black Bone Option Footer Section ------------

				$html .='</div>';
				$html .= '</div>'; 
			$html .=  '</form>';
			$html .= '</div>';
			echo $html;
		}
	}
}
