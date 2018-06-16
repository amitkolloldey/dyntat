<?php
/**
 * Theme Functions
 *
 * @package Blac kBone
 * @author Palash
 * @link http://uniqueitworld.com
 */


/* ---------------------------------------------------------------------------
 * Define Theme Directorys
 * --------------------------------------------------------------------------- */
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'THEME_NAME', 'blackbone' );
define( 'THEME_VERSION', '1.0' );

define( 'LANG_DIR', THEME_DIR. '/languages' );

//include ( 'redux/ReduxCore/framework.php'  );
//include ( 'redux/sample/sample-config.php' );
/* ---------------------------------------------------------------------------
 * Load All classes 
 * --------------------------------------------------------------------------- */
spl_autoload_register(function ($class) {
	$class_file = THEME_DIR.'/inc/' . $class . '.class.php';
	if ( file_exists( $class_file ) ) {
		include ( $class_file );
	} 
});

/* ---------------------------------------------------------------------------
 * Loads Black Bone theme Options
 * --------------------------------------------------------------------------- */
//require( THEME_DIR .'/inc/black-bone/theme-options.php' );

/* ---------------------------------------------------------------------------
 * Loads Main Class
 * --------------------------------------------------------------------------- */
BlackBone::instance();


/* ---------------------------------------------------------------------------
 * Loads Main Class
 * --------------------------------------------------------------------------- */
BBFormat::instance(); 


/* ---------------------------------------------------------------------------
 * Loads Black Bone theme Options
 * --------------------------------------------------------------------------- */  
/*global $bboptions;
$bboptions = new BBOptions();*/
BBOptions::instance();
/*function getOption($op_key){
	//global $bboptions;
	return false;//$bboptions->get($op_key);
} */

/* ---------------------------------------------------------------------------
 * Loads Main Class
 * --------------------------------------------------------------------------- */
BBWidgets::instance(); 


function my_widget_content_wrap($content) {
    $content = '<div class="some-other-div">'.$content.'</div>';
    return $content;
}
add_filter('widget_text', 'my_widget_content_wrap');

// Changing excerpt more
function palash_excerpt_more($more) {
	global $post;
	return 'Read More';
}
add_filter('excerpt_more', 'palash_excerpt_more');

add_action( 'bb-social-icons', 'bb_social_icons');
function bb_social_icons(){
	echo '<div class="social-icon">';
		if (BBOptions::get('bb-facebook-link')) {
			echo '<a href="'.BBOptions::get('bb-facebook-link').'" class="single-socile"><i class="bb-icon bbfacebook"></i></a>';
		} 
		if (BBOptions::get('bb-twitter-link')) {
			echo '<a href="'.BBOptions::get('bb-twitter-link').'" class="single-socile"><i class="bb-icon bbtwitter-1"></i></a>';
		}  
		if (BBOptions::get('bb-google-link')) { 
			echo '<a href="'.BBOptions::get('bb-google-link').'" class="single-socile"><i class="bb-icon bbpinterest-1"></i></a>';
		} 
		if (BBOptions::get('bb-pinterest-link')) {  
			echo '<a href="#" class="single-socile"><i class="bb-icon bbgplus-4"></i></a>';
		}
		if (BBOptions::get('bb-linkedin-link')) {  
			echo '<a href="'.BBOptions::get('bb-linkedin-link').'" class="single-socile"><i class="bb-icon  bblinkedin-1"></i></a>';
		}
	echo '</div>';
}


function load_parent_theme_css() {
	$parentcss = get_template_directory() . '/style.css';
	wp_enqueue_style(
		'parent-theme',
		get_template_directory_uri() . '/style.css',
		array(),
		filemtime( $parentcss )
	);
	$custom_styles = '';
	$sitepaddingTop = '';
	$sitepaddingBottom = '';
	$sitepadding = BBOptions::get('bb-page-conpad');
	if (is_array($sitepadding)) {
		if ( array_key_exists( 'top', $sitepadding) ) {
			$sitepaddingTop = $sitepadding['top'];
		}
		if ( array_key_exists( 'bottom', $sitepadding) ) {
			$sitepaddingBottom = $sitepadding['bottom'];
		}
	}
	$sitewidth = BBOptions::get('bb-site-width') == '' ? '1170px' : BBOptions::get('bb-site-width') ;
	$sitewidth = $sitewidth['width'];
	$headertopbgcolor = BBOptions::get('bb-header-top-bg') == '' ? '#000000' : BBOptions::get('bb-header-top-bg') ;
	$fwidgetbgcolor = BBOptions::get('bb-footer-widget-bg') == '' ? '#222225' : BBOptions::get('bb-footer-widget-bg') ;
	$fcopybgcolor = BBOptions::get('bb-footer-bottom-bg') == '' ? '#1b1b1d' : BBOptions::get('bb-footer-bottom-bg') ;
	$ftextcolor = BBOptions::get('bb-footer-bottom-text') == '' ? '#FFFFFF' : BBOptions::get('bb-footer-bottom-text') ;


	if ( BBOptions::get('bb-site-layout') == 'Boxed' ) {
		$custom_styles .= ".site-wrapper { width: $sitewidth;margin: 0 auto;}\n"; 
	}
	$custom_styles .= ".container { width: $sitewidth;}\n";
	$custom_styles .= ".content-warp { padding-bottom: $sitepaddingBottom; padding-top: $sitepaddingTop; }\n";
	
	$custom_styles .= ".top-bar { background: $headertopbgcolor; }\n";
	$custom_styles .= ".footer, .footer-widget { background: $fwidgetbgcolor; }\n";
	$custom_styles .= ".footer-copyright{ background: $fcopybgcolor;}\n";
	 
	$custom_styles .= ".top-story-post-wrapper { margin-top: -$sitepaddingTop; }\n";
	$custom_styles .= ".footer-copytext .copytext, .footer-right .copytext, .social-icon .single-socile, .footer-right .social-icon a.single-socile{ color: $ftextcolor;}\n";
	if ( $custom_styles != '' ) {
	  //$css = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $custom_styles);
		wp_add_inline_style( 'parent-theme', $custom_styles );
	}
}
add_action( 'wp_enqueue_scripts', 'load_parent_theme_css', 11 );


/*add_filter('nav_menu_css_class' , 'bb_home_nav_class' , 10 , 2);
function bb_home_nav_class($classes, $item){
	echo "<pre>";
		print_r($item);
	echo "</pre>";
	if( is_home() ){     
		$classes[] = "bb-home-menu-active";
	}
	//return $classes;
}*/

// AIzaSyAKHl7iea4oEcMFlYN-5EnUeL-dD653X3M
//ini_set('allow_url_fopen', 'on');
//ini_set('allow_url_include', 'on');
$result = wp_remote_get('https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAKHl7iea4oEcMFlYN-5EnUeL-dD653X3M'); //, array( 'sslverify' => false )
//echo "<pre>";
//var_dump($result);

if ( ! is_wp_error( $result ) && $result['response']['code'] == 200 ) {
    $result = json_decode( $result['body'] );
    //print_r($result);
    /*foreach ( $result->items as $font ) {
        $this->parent->googleArray[ $font->family ] = array(
            'variants' => $this->getVariants( $font->variants ),
            'subsets'  => $this->getSubsets( $font->subsets )
        );
    }*/
}
//echo "</pre>"; 




function meks_disable_srcset( $sources ) {
   return false;
}
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );
