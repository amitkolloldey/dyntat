<?php
/**
 * Theme Options - fields and args
 *
 * @package Black-Bone
 * @author Unique-IT-World
 * @link http://uniwueitworld.com
 */
require_once( dirname( __FILE__ ) . '/black-bone/black.php' );
/**
* 
*/
class BBOptions extends BlackBone{

	public static 	$instance;
	public static 	$optName 	= 'black_bone';
	public 			$BB_Options = NULL;
	protected 		$settings;
	protected 		$sections;

	public $bbPostCats = array();
	
	public function __construct(){ 

		$this->set_args();
		$this->set_Sections();
		$this->bb_theme_option_setup(); 
		
		//add_action('admin_init', array( $this, 'bb_insert_CreateCategory') );
		//$this->bb_insert_CreateCategory();
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self(); 
		}
		return self::$instance;
	}
	public function bb_insert_CreateCategory(){ 
		$bbPostCats = array();
		$args = array(
	        'orderby' => 'id',
	        'hide_empty'=> 0,
	        //'child_of' => 10, //Child From Boxes Category 
	    ); 
	    $categories = get_categories($args);  
	    foreach ($categories as $value) {  
	    	$bbPostCats[$value->cat_ID] = $value->name; 
	    }
	    //var_dump($bbPostCats); 
	    //$this->bbPostCats = $bbPostCats;
	    return $bbPostCats;
	}
	
	public function bb_get_pages(){ 
		/*$bbPostCats = array();
	  	$args = array(
	        'orderby' => 'id',
	        'hide_empty'=> 0,
	        //'child_of' => 10, //Child From Boxes Category 
	    ); 
	    $categories = get_categories($args);  
	    foreach ($categories as $value) {  
	    	$bbPostCats[$value->cat_ID] = $value->name; 
	    }
	    //var_dump($bbPostCats); 
	    //$this->bbPostCats = $bbPostCats;
	    return $bbPostCats;*/
	}

	protected function set_args(){
		$theme = wp_get_theme();
		$settings = array(
			'opt_name'             => self::$optName, 
            'display_name'         => $theme->get( 'Name' ), 
            'display_version'      => $theme->get( 'Version' ), 
            'menu_type'            => 'menu', 
            'allow_sub_menu'       => false, 
            'menu_title'           => __( 'Black Options', 'black-bone' ),
            'page_title'           => __( 'Black Options', 'black-bone' ), 
            'google_api_key'       => '', 
            'google_update_weekly' => false,   
            'admin_bar'            => false, 
            'admin_bar_icon'       => 'dashicons-portfolio', 
            'admin_bar_priority'   => 50, 
            'global_variable'      => '', 
            'dev_mode'             => true, 
            'update_notice'        => true, 
            'page_priority'        => null, 
            'page_parent'          => 'themes.php', 
            'page_permissions'     => 'manage_options', 
            'menu_icon'            => '', 
            'last_tab'             => '', 
            'page_icon'            => 'icon-themes', 
            'page_slug'            => '', 
            'save_defaults'        => true, 
            'default_show'         => false, 
            'default_mark'         => '', 
            'show_import_export'   => true, 
            'output'               => true, 
            'output_tag'           => true, 
            'system_info'          => false
		);
		$this->settings = $settings;
	}

	protected function set_Sections(){
			$sections = array();

			$sections['home'] = array(
				'title'		=> __('Home', 'black-bone'),
				'icon' 		=> 'bbhome-2',
				'substatus' => false,
				'fields' 	=> array( 
					array(
						'id' 		=> 'bb-catTampl-sidebar-status',
						'type' 		=> 'image_select',
						'title' 	=> 'Sidebar Status',
						'desc' 		=> __('Controls the Site Cat Tamplate layout.', 'black-bone') ,
						'default'   => 'rs',
                        'options'   => array(
                            'full'  	=> BB_OPTIONS_URI. 'assets/images/layout.png',
                            'ls'		=> BB_OPTIONS_URI. 'assets/images/layout3.png',
                            'rs'  		=> BB_OPTIONS_URI. 'assets/images/layout2.png' 
                        ), 
					),
					array(
						'id' 			=> 'bb-cat-templ', 
						'type' 			=> 'sliders-panal',
						'title' 		=> __('Black Blog Home Template', 'black-bone'),
						'desc' 			=> __('Controls the site Black Blog Home Template.', 'black-bone') , 
                        'slide-fields'  => array(
                    		array(
                    			'id' 	=> 'bb-sliders-cat', 
								'type' 	=> 'select', 
								'title' 	=> 'Blog Page Post Column', 
								'default'   => 'col9', 
								'options' 	=> $this->bb_insert_CreateCategory(),
                    		), 
                    		array(
                    			'id' 	=> 'bb-sliders-style', 
								'type' 	=> 'select', 
								'title' 	=> 'Blog Page Post Column', 
								'default'   => 'col9', 
								'options' 	=> array(
										's1' =>	'Style One',
										's2' =>	'Style Tow',
										's3' =>	'Style Three',
										'bp' =>	'Recent Blog Posts'
									),
                    		), 
                        ), 
					),
				) 
			);
			$sections['layout'] = array(
				'title'		=> __('Layout', 'black-bone'),
				'icon' 		=> 'bblayout-1',
				'substatus' => false,
				'fields' 	=> array( 
					array(
						'id' 		=> 'bb-site-layout',
						'type' 		=> 'buttonset',
						'title' 	=> __('Layout', 'black-bone'),
						'desc' 		=> __('Controls the site layout.', 'black-bone') ,
						'default'   => 'Boxed',
                        'choices'   => array(
                    		'Boxed'   => 'Boxed',
                    		'Wide'    => 'Wide',
                        ), 
					), 
					array(
						'id' 		=> 'bb-site-width',
						'type' 		=> 'dimensions',
						'title' 	=> 'Site Width',
						'desc' 		=> __('Controls the overall site width. Enter value including any valid CSS unit, ex: 1100px.', 'black-bone') ,
                        'icon'      => true,
                        'width'     => true,
                        'height'    => false, 
                        'default'   => array(
                    		'width'     => '1170px',
                    		'height'    => '',
                        ), 
					), 
					array(
						'id' 		=> 'bb-page-conpad',
						'type' 		=> 'spacing',
						'title' 	=> __('Page Content Padding', 'black-bone'),
						'desc' 		=> __('Controls the top/bottom padding for page content. Enter values including any valid CSS unit, ex: 55px, 40px.', 'black-bone') ,
                        'icon'      => true,
                        'top'     	=> true,
                		'bottom'  	=> true,
                		'left'    	=> false,
                		'right'   	=> false, 
                        'default'   => array(
                    		'top'     => '50px',
                    		'bottom'  => '50px',
                    		'left'    => '',
                    		'right'   => '',
                        ), 
					),   
				) 
			);
			$sections['header'] = array(
				'title'		=> __('Header', 'black-bone'),
				'icon' 		=> 'bbheader',
				'substatus' => true,
				'subsection'=> array(
					'header-ganaral'	=> array(
						'title'		=> __('Header Ganaral', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',
						'fields' 	=> array( 
							array(
								'id' 		=> 'bb-header-layout',
								'type' 		=> 'image_select',
								'title' 	=> 'Header  Layout Status',
								'desc' 		=> __('Controls the site blog layout.', 'black-bone') ,
								'default'   => 'hs3',
		                        'options'   => array(
		                            'hs1' => BB_OPTIONS_URI. 'assets/images/1c.png',
		                            'hs2' => BB_OPTIONS_URI. 'assets/images/2cl.png',
		                            'hs3' => BB_OPTIONS_URI. 'assets/images/2cr.png',
		                            'ds' => BB_OPTIONS_URI. 'assets/images/3cm.png' 
		                        ), 
							), 
							array(
								'id' 		=> 'site-logo',
								'type' 		=> 'media-tow',
								'title' 	=> 'Site Logo',
								'desc' 		=> __('Upload your site logo in site baner left', 'black-bone') 
							), 
							array(
								'id' 		=> 'bb-site-banner-status',
								'type' 		=> 'buttonset',
								'title' 	=> __('Site Banner Status', 'black-bone'),
								'desc' 		=> __('Select your baner Type.', 'black-bone') ,
								'default'   => 'bi',
		                        'choices'   => array(
		                    		'bi'   		=> 'Banner Image',
		                    		'ga'    	=> 'Ads Image',
		                        ), 
							), 
							array(
								'id' 		=> 'site-baner',
								'type' 		=> 'media-tow',
								'title' 	=> 'Site ADS Baner',
								'desc' 		=> __('Upload your site Baner Image in site baner right ( It Work on Header Layout Tow )', 'black-bone') 
							),
							array(
								'id' 		=> 'bb-banner-ads-code',
								'type' 		=> 'ace-editor',
								'title' 	=> 'ADS Code',
								'desc' 		=> __('Add your valid ads code ( It Work on Header Layout Tow )', 'black-bone') 
							)
						)
					),
					'header-top'	=> array(
						'title'		=> __('Header Top', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',
						'fields' 	=> array( 
							array(
								'id' 		=> 'bb-header-top-status',
								'type' 		=> 'switch',
								'title' 	=> __('Header Top Status', 'black-bone'),
								'desc' 		=> __('Controls the Height top section.', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-header-top-layout',
								'type' 		=> 'select',
								'title' 	=> 'Header Top Bar Layout',
								'desc' 		=> __('Controls the content that displays in the top right section.', 'black-bone'), 
								'default'   => 's2', 
								'options' 	=> array(
										's1' =>	'Style One',
										's2' =>	'Style Tow', 
									)
							), 
							array(
								'id' 		=> 'bb-header-top-height',
								'type' 		=> 'dimensions',
								'title' 	=> 'Header Top Height',
								'desc' 		=> __('Controls the Height that displays in the Height top section.', 'black-bone') ,
		                        'icon'      => false,
		                        'width'     => false,
		                        'height'    => true, 
		                        'default'   => array( 
		                    		'height'    => '60px',
		                        ), 
							),  
							array(
								'id' 		=> 'bb-header-top-bg',
								'type' 		=> 'color-alpha',
								'title' 	=> 'Header Top Background',
								'desc' 		=> __('Controls the Background Color that displays in the Height top section.', 'black-bone') ,
								'default'   => '#313131'
							), 
							array(
								'id' 		=> 'bb-header-top-left',
								'type' 		=> 'select',
								'title' 	=> 'Header Content Left',
								'desc' 		=> __('Controls the content that displays in the top left section.', 'black-bone'), 
								'options' 	=> array(
										'ci' =>	'Contact Info',
										'sl' =>	'Social Links',
										'nav'=>	'Navigation',
										'le' =>	'Leave Empty',
									)
							), 
							array(
								'id' 		=> 'bb-header-top-right',
								'type' 		=> 'select',
								'title' 	=> 'Header Content Righr',
								'desc' 		=> __('Controls the content that displays in the top right section.', 'black-bone'), 
								'options' 	=> array(
										'ci' =>	'Contact Info',
										'sl' =>	'Social Links',
										'nav'=>	'Navigation',
										'le' =>	'Leave Empty',
									)
							), 
						) 
					)
				)
			);
			$sections['blog'] = array(
				'title'		=> __('Blog', 'black-bone'),
				'icon' 		=> 'bbalign-justify',
				'substatus' => true,
				'subsection'=> array(
					'blog-general'	=> array(
						'title'		=> __('Blog General', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',  
						'fields' 	=> array(
							array(
								'id' 		=> 'bb-blog-sidebar-status',
								'type' 		=> 'image_select',
								'title' 	=> 'Sidebar Status',
								'desc' 		=> __('Controls the site layout.', 'black-bone') ,
								'default'   => 'rs',
		                        'options'   => array(
		                            'full'  	=> BB_OPTIONS_URI. 'assets/images/layout.png',
		                            'ls'		=> BB_OPTIONS_URI. 'assets/images/layout3.png',
		                            'rs'  		=> BB_OPTIONS_URI. 'assets/images/layout2.png' 
		                        ), 
							),  
							array(
								'id' 		=> 'bb-blog-layout',
								'type' 		=> 'select',
								'title' 	=> __('Blog Layout', 'black-bone'),
								'desc' 		=> __('If you want to change your site blog style, now change Blog Layout', 'black-bone'), 
								'default'   => 'nor', 
								'options' 	=> array(
										'nor' =>	'Blog General',  
										'gt2'  =>	'Blog Grid Style Tow Column'  
									)
							),  
							array(
								'id' 		=> 'bb-blog-thumb-status',
								'type' 		=> 'switch',
								'title' 	=> 'Blog Post Fature Image Status',
								'desc' 		=> __(' Blog Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-meta-status',
								'type' 		=> 'switch',
								'title' 	=> 'Blog Post Meta Status',
								'desc' 		=> __(' Blog Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-mate-info',
								'type' 		=> 'info',
								'title' 	=> __('Blog Post Meta Options', 'black-bone'),
								'desc' 		=> __('Controls the site layout.', 'black-bone')  
							),
							array(
								'id' 		=> 'bb-blog-meta-date',
								'type' 		=> 'switch',
								'title' 	=> 'Blog Post Meta Date',
								'desc' 		=> __(' Blog Post Meta Date', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-meta-time',
								'type' 		=> 'switch',
								'title' 	=> 'Blog Post Meta Time',
								'desc' 		=> __(' Blog Post Meta Time', 'black-bone') ,
								'default'   => '0' 
							),
							array(
								'id' 		=> 'bb-blog-meta-auth',
								'type' 		=> 'switch',
								'title' 	=> 'Blog Post Meta Author',
								'desc' 		=> __(' Blog Post Meta Author', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-meta-cat',
								'type' 		=> 'switch',
								'title' 	=> 'Blog Post Meta Category',
								'desc' 		=> __(' Blog Post Meta Category', 'black-bone') ,
								'default'   => '1' 
							),
						) 
					),
					'blog-single'	=> array(
						'title'		=> __('Blog Single', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',  
						'fields' 	=> array(  
							array(
								'id' 		=> 'bb-bsingle-sidebar-status',
								'type' 		=> 'image_select',
								'title' 	=> 'Sidebar Status',
								'desc' 		=> __('Controls the site layout.', 'black-bone') ,
								'default'   => 'rs',
		                        'options'   => array(
		                            'full'  	=> BB_OPTIONS_URI. 'assets/images/layout.png',
		                            'ls'		=> BB_OPTIONS_URI. 'assets/images/layout3.png',
		                            'rs'  		=> BB_OPTIONS_URI. 'assets/images/layout2.png' 
		                        ), 
							),
							array(
								'id' 		=> 'bb-blog-single-layout',
								'type' 		=> 'select',
								'title' 	=> __('Single Post Layout', 'black-bone'),
								'desc' 		=> __('If you want to change your site blog style, now change Blog Layout', 'black-bone'), 
								'options' 	=> array(
										'nor' =>	'Blog Normar',
										'gt'  =>	'Blog With Grid Tow' 
									)
							), 
							array(
								'id' 		=> 'bb-blog-single-thumb-status',
								'type' 		=> 'switch',
								'title' 	=> 'Single Post Fature Image Status',
								'desc' 		=> __(' Blog Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-single-meta-status',
								'type' 		=> 'switch',
								'title' 	=> 'Single Post Meta Status',
								'desc' 		=> __(' Blog Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-single-tags-status',
								'type' 		=> 'switch',
								'title' 	=> 'Single Post Tags Status',
								'desc' 		=> __(' Blog Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-single-cats-status',
								'type' 		=> 'switch',
								'title' 	=> 'Single Post Category Status',
								'desc' 		=> __(' Blog Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
						) 
					),
					'blog-archive'	=> array(
						'title'		=> __('Blog Archive', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',  
						'fields' 	=> array(
							array(
								'id' 		=> 'bb-barchive-sidebar-status',
								'type' 		=> 'image_select',
								'title' 	=> 'Sidebar Status',
								'desc' 		=> __('Controls the Site Archive layout.', 'black-bone') ,
								'default'   => 'rs',
		                        'options'   => array(
		                            'full'  	=> BB_OPTIONS_URI. 'assets/images/layout.png',
		                            'ls'		=> BB_OPTIONS_URI. 'assets/images/layout3.png',
		                            'rs'  		=> BB_OPTIONS_URI. 'assets/images/layout2.png' 
		                        ), 
							), 
							array(
								'id' 		=> 'bb-blog-archive-layout',
								'type' 		=> 'select',
								'title' 	=> __('Archive Layout', 'black-bone'),
								'desc' 		=> __('If you want to change your site Archive style, now change Archive Layout', 'black-bone'), 
								'default'   => 'nor', 
								'options' 	=> array(
										'nor' =>	'Archive General',  
										'gt2'  =>	'Archive Grid Style Tow Column'  
									)
							),   
							array(
								'id' 		=> 'bb-blog-archive-thumb-status',
								'type' 		=> 'switch',
								'title' 	=> 'Archive Post Fature Image Status',
								'desc' 		=> __(' Archive Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-archive-meta-status',
								'type' 		=> 'switch',
								'title' 	=> 'Archive Post Meta Status',
								'desc' 		=> __(' Archive Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
						) 
					),
					'blog-search'	=> array(
						'title'		=> __('Blog Search', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',  
						'fields' 	=> array(
							array(
								'id' 		=> 'bb-bsearch-sidebar-status',
								'type' 		=> 'image_select',
								'title' 	=> 'Sidebar Status',
								'desc' 		=> __('Controls the Search Page layout.', 'black-bone') ,
								'default'   => 'rs',
		                        'options'   => array(
		                            'full'  	=> BB_OPTIONS_URI. 'assets/images/layout.png',
		                            'ls'		=> BB_OPTIONS_URI. 'assets/images/layout3.png',
		                            'rs'  		=> BB_OPTIONS_URI. 'assets/images/layout2.png' 
		                        ), 
							), 
							array(
								'id' 		=> 'bb-blog-search-layout',
								'type' 		=> 'select',
								'title' 	=> __('Search Layout', 'black-bone'),
								'desc' 		=> __('If you want to change your site Search style, now change Search Layout', 'black-bone'), 
								'default'   => 'nor', 
								'options' 	=> array(
										'nor' =>	'Search General',  
										'gt2'  =>	'Search Grid Style Tow Column'  
									)
							),   
							array(
								'id' 		=> 'bb-blog-search-thumb-status',
								'type' 		=> 'switch',
								'title' 	=> 'Search Post Fature Image Status',
								'desc' 		=> __('Search Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-blog-search-meta-status',
								'type' 		=> 'switch',
								'title' 	=> 'Search Post Meta Status',
								'desc' 		=> __(' Search Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
						) 
					),
				)
			);
			$sections['page'] = array(
				'title'		=> __('Page', 'black-bone'),
				'icon' 		=> 'bblayers-1',
				'substatus' => false,
				'fields' 	=> array( 
					array(
						'id' 		=> 'bb-page-sidebar-status',
						'type' 		=> 'image_select',
						'title' 	=> 'Sidebar Status',
						'desc' 		=> __('Controls the Site Page layout.', 'black-bone') ,
						'default'   => 'rs',
                        'options'   => array(
                            'full'  	=> BB_OPTIONS_URI. 'assets/images/layout.png',
                            'ls'		=> BB_OPTIONS_URI. 'assets/images/layout3.png',
                            'rs'  		=> BB_OPTIONS_URI. 'assets/images/layout2.png' 
                        ), 
					),
				) 
			);
			$sections['social'] = array(
				'title'		=> __('Social', 'black-bone'),
				'icon' 		=> 'bb019-worldwide',
				'substatus' => false,
				'fields' 	=> array(  
					array(
						'id' 		=> 'bb-facebook-link',
						'type' 		=> 'text',
						'title' 	=> __('Facebook Link', 'black-bone'),
						'desc' 		=> __('Controls the content that displays in the footer bottom section.', 'black-bone') 
					), 
					array(
						'id' 		=> 'bb-twitter-link',
						'type' 		=> 'text',
						'title' 	=> __('Twitter Link', 'black-bone'),
						'desc' 		=> __('Controls the content that displays in the footer bottom section.', 'black-bone') 
					), 
					array(
						'id' 		=> 'bb-google-link',
						'type' 		=> 'text',
						'title' 	=> __('Google Plus Link', 'black-bone'),
						'desc' 		=> __('Controls the content that displays in the footer bottom section.', 'black-bone') 
					), 
					array(
						'id' 		=> 'bb-pinterest-link',
						'type' 		=> 'text',
						'title' 	=> __('Pinterest Link', 'black-bone'),
						'desc' 		=> __('Controls the content that displays in the footer bottom section.', 'black-bone') 
					),  
					array(
						'id' 		=> 'bb-linkedin-link',
						'type' 		=> 'text',
						'title' 	=> __('Linkedin Link', 'black-bone'),
						'desc' 		=> __('Controls the content that displays in the footer bottom section.', 'black-bone') 
					), 
				) 
			);
			$sections['footer'] = array(
				'title'		=> __('Footer', 'black-bone'),
				'icon' 		=> 'bb046-vector',
				'substatus' => true,
				'subsection'=> array(
					'footer-widget'	=> array(
						'title'		=> __('Footer Widget', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',
						'fields' 	=> array( 
							array(
								'id' 		=> 'bb-footer-widget-status',
								'type' 		=> 'switch',
								'title' 	=> 'Site Footer Status',
								'desc' 		=> __(' Blog Post Meta Status', 'black-bone') ,
								'default'   => '1' 
							),
							array(
								'id' 		=> 'bb-footer-widget-col',
								'type' 		=> 'select',
								'title' 	=> 'Footer Column',
								'desc' 		=> __('Country Select', 'black-bone'),
								'default'   => 'col4', 
								'options' 	=> array(  
									'2' =>	'Colum Tow', 
									'3' =>	'Colum Three', 
									'4' =>	'Colum Four' 
								)
							),
							array(
								'id' 		=> 'bb-footer-widget-bg',
								'type' 		=> 'color-alpha',
								'title' 	=> 'Footer Widget Background',
								'desc' 		=> __('Controls the Background Color that displays in the Footer Widget section.', 'black-bone') ,
								'default'   => '#313131'
							), 
						) 
					),
					'footer-bottom'	=> array(
						'title'		=> __('Footer Bottom', 'black-bone'),
						'icon' 		=> 'el-icon-cogs',
						'fields' 	=> array( 
							array(
								'id' 		=> 'bb-footer-bottom-status',
								'type' 		=> 'switch',
								'title' 	=> __('Footer Bottom Status', 'black-bone'),
								'desc' 		=> __('Controls the Footer Bottom section.', 'black-bone') ,
								'default'   => '1' 
							),  
							array(
								'id' 		=> 'bb-footer-bottom-bg',
								'type' 		=> 'color-alpha',
								'title' 	=> 'Footer Bottom Background',
								'desc' 		=> __('Controls the Background Color that displays in the Footer Bottom section.', 'black-bone') ,
								'default'   => '#313131'
							),  
							array(
								'id' 		=> 'bb-footer-bottom-right',
								'type' 		=> 'select',
								'title' 	=> 'Header Content Righr',
								'desc' 		=> __('Controls the content that displays in the top right section.', 'black-bone'), 
								'options' 	=> array( 
										'sl' =>	'Social Links',
										'nav'=>	'Navigation',
										'le' =>	'Leave Empty',
									)
							),
							array(
								'id' 		=> 'bb-footer-copyright-msg',
								'type' 		=> 'text',
								'title' 	=> __('Copy Right Massage', 'black-bone'),
								'desc' 		=> __('Controls the content that displays in the footer bottom section.', 'black-bone'), 
								'default'	=>'Copyright 2016 Unique It World | All Rights Reserved | Powered by WordPress'
							),  
						) 
					),
				)
			);
			/*
			$sections['damo'] = array(
				'title'		=> __('Damo', 'black-bone'),
				'icon' 		=> 'el-icon-cogs',
				'substatus' => false,
				'fields' 	=> array(
					array(
						'id' 		=> 'bb-blog-sidebar-info',
						'type' 		=> 'info',
						'title' 	=> __('Blog & Sidebar', 'black-bone'),
						'desc' 		=> __('Controls the site layout.', 'black-bone')  
					) 
					array(
						'id' 		=> 'palash-ace-editor-panna',
						'type' 		=> 'ace-editor',
						'title' 	=> 'sometext textarea',
						'desc' 		=> __('textarea Layout', 'black-bone') 
					), 
					array(
						'id' 		=> 'palash-ace-editor',
						'type' 		=> 'ace-editor',
						'title' 	=> 'sometext textarea',
						'desc' 		=> __('textarea Layout', 'black-bone') 
					),
					array(
						'id' 			=> 'bb-sliders-panal-layout', 
						'type' 			=> 'sliders-panal',
						'title' 		=> __('Sliders Panal', 'black-bone'),
						'desc' 			=> __('Controls the site Sliders Panal.', 'black-bone') , 
                        'slide-fields'  => array(
                    		array(
                    			'id' 	=> 'bb-sliders-cat', 
								'type' 	=> 'select', 
								'title' 	=> 'Blog Page Post Column', 
								'default'   => 'col9', 
								'options' 	=> $this->bb_insert_CreateCategory(),
                    		), 
                    		array(
                    			'id' 	=> 'bb-sliders-style', 
								'type' 	=> 'select', 
								'title' 	=> 'Blog Page Post Column', 
								'default'   => 'col9', 
								'options' 	=> $this->bb_insert_CreateCategory(),
                    		), 
                        ), 
					),
					array(
						'id' 		=> 'palash-image-select',
						'type' 		=> 'image_select',
						'title' 	=> 'Palash image select',
						'desc' 		=> __('Layout image select', 'black-bone') ,
						'default'   => '3',
                        'options'   => array(
                            '1' => BB_OPTIONS_URI. 'assets/images/1c.png',
                            '2' => BB_OPTIONS_URI. 'assets/images/2cl.png',
                            '3' => BB_OPTIONS_URI. 'assets/images/2cr.png',
                            '4' => BB_OPTIONS_URI. 'assets/images/3cm.png' 
                        ), 
					),
					array(
						'id' 		=> 'palash-switch',
						'type' 		=> 'switch',
						'title' 	=> 'Palash switch',
						'desc' 		=> __('Layout switch', 'black-bone') ,
						'default'   => '1' 
					),
					array(
						'id' 		=> 'palash-switch-tow',
						'type' 		=> 'switch',
						'title' 	=> 'Palash switch tow',
						'desc' 		=> __('Layout switch tow', 'black-bone') ,
						'default'   => '1' 
					),
					array(
						'id' 		=> 'palash-buttonset-tow',
						'type' 		=> 'buttonset',
						'title' 	=> 'Palash buttonset tow',
						'desc' 		=> __('Layout buttonset tow', 'black-bone') ,
						'default'   => 'Boxed',
                        'choices'   => array(
                    		'Boxed'   => 'Boxed',
                    		'Wide'    => 'Wide',
                        ), 
					),
					array(
						'id' 		=> 'palash-buttonset',
						'type' 		=> 'buttonset',
						'title' 	=> 'Palash buttonset',
						'desc' 		=> __('Layout buttonset', 'black-bone') ,
						'default'   => 'Wide',
                        'choices'   => array(
                    		'Boxed'   => 'Boxed',
                    		'Wide'    => 'Wide',
                        ), 
					),
					array(
						'id' 		=> 'palash-spacing',
						'type' 		=> 'spacing',
						'title' 	=> 'Palash spacing',
						'desc' 		=> __('Layout spacing', 'black-bone') ,
                        'icon'      => true,
                        'top'     	=> true,
                		'bottom'  	=> true,
                		'left'    	=> true,
                		'right'   	=> true, 
                        'default'   => array(
                    		'top'     => '10px',
                    		'bottom'  => '15px',
                    		'left'    => '20px',
                    		'right'   => '30px',
                        ), 
					),
					array(
						'id' 		=> 'palash-dimensions',
						'type' 		=> 'dimensions',
						'title' 	=> 'Palash dimensions',
						'desc' 		=> __('Layout dimensions', 'black-bone') ,
                        'icon'      => false,
                        'width'     => false,
                        'height'    => true, 
                        'default'   => array(
                    		'width'     => '80%',
                    		'height'    => '1170px',
                        ), 
					), 
					array(
						'id' 		=> 'palash-sliders-toes',
						'type' 		=> 'slider',
						'title' 	=> 'Palash slider toes',
						'desc' 		=> __('Layout toes ', 'black-bone'),
						'default'       => 50,
                        'min'           => 1,
                        'step'          => 10,
                        'max'           => 150,
					),
					array(
						'id' 		=> 'palash-sliders',
						'type' 		=> 'slider',
						'title' 	=> 'Palash slider',
						'desc' 		=> __('Layout alpha', 'black-bone') 
					), 
					array(
						'id' 		=> 'palash-color-alpha',
						'type' 		=> 'color-alpha',
						'title' 	=> 'Palash alpha',
						'desc' 		=> __('Layout alpha', 'black-bone') 
					), 
					array(
						'id' 		=> 'palash-color',
						'type' 		=> 'color',
						'title' 	=> 'Palash',
						'desc' 		=> __('Layout', 'black-bone') 
					), 
					array(
						'id' 		=> 'gredname',
						'type' 		=> 'text',
						'title' 	=> 'Palash',
						'desc' 		=> __('Layout', 'black-bone') 
					),
					array(
						'id' 		=> 'palashtex',
						'type' 		=> 'text',
						'title' 	=> 'sometext',
						'desc' 		=> __('grid Layout', 'black-bone') 
					), 
					array(
						'id' 		=> 'palash-select',
						'type' 		=> 'select',
						'title' 	=> 'Country Select',
						'desc' 		=> __('Country Select', 'black-bone'), 
						'options' 	=> array(
								'bd' =>	'Bangladesh',
								'us' =>	'United State',
								'uk' =>	'United kingdon',
								'cn' =>	'Canada',
							)
					), 
					array(
						'id' 		=> 'palash-textarea',
						'type' 		=> 'textarea',
						'title' 	=> 'sometext textarea',
						'desc' 		=> __('textarea Layout', 'black-bone') 
					),   
					array(
						'id' 		=> 'palash-radioxx',
						'type' 		=> 'radio',
						'title' 	=> 'sometext radio',
						'desc' 		=> __('textarea Layout', 'black-bone'),
						'default'	=> 'uk',
						'options' 	=> array(
								'bk' =>	'Bangladesh',
								'uk' =>	'United State' 
							) 
					), 
					array(
						'id' 		=> 'palash-checkbox',
						'type' 		=> 'checkbox',
						'title' 	=> 'sometext radio',
						'desc' 		=> __('textarea Layout', 'black-bone'),
						'default'	=> 'uk',
						'options' 	=> array(
								'bk' =>	'Bangladesh',
								'uk' =>	'United State' 
							) 
					), 
					array(
						'id' 		=> 'palash-media',
						'type' 		=> 'media',
						'title' 	=> 'sometext media',
						'desc' 		=> __('textarea Layout', 'black-bone') 
					), 
					array(
						'id' 		=> 'palash-media-tow',
						'type' 		=> 'media-tow',
						'title' 	=> 'sometext media',
						'desc' 		=> __('textarea Layout', 'black-bone') 
					)
				) 
			); */
		$this->sections = $sections;
	} 

	protected function bb_theme_option_setup(){
		if ( !empty($this->settings) && !empty($this->sections) ) {
			$this->BB_Options = new BlackBone_Option( $this->settings, $this->sections);
		}
	}

	public static function get( $opt_name, $default = null ){
		$allOptions = get_option( self::$optName );
		if ( is_array( $allOptions ) ) {
			if (array_key_exists( $opt_name, $allOptions ) ) {
				return $allOptions[$opt_name];
			} 
		}  
	} 

}

	 
