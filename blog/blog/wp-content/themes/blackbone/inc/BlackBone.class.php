<?php
/**
* Black Bone Main Class
*/
class BlackBone{

	public $Version  = THEME_VERSION;
	public $BBDIR  	 = THEME_DIR;
	public $BBURI  	 = THEME_URI;

	public static $instance = NULL;
	
	public function __construct(){
		add_action( 'after_setup_theme', array($this, 'blackBone_setup' ) ); 
		add_action( 'wp_enqueue_scripts', array($this, 'bb_scripts') ); 

		//add_filter( 'excerpt_more', array($this, 'blackBone_excerpt_more' ) );
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function blackBone_setup(){

		/* ---------------------------------------------------------------------------
		 * Loads Theme Textdomain
		 * --------------------------------------------------------------------------- */
		load_theme_textdomain( 'black-bone',  LANG_DIR );

		/* ---------------------------------------------------------------------------
		 * Add default posts and comments RSS feed links to head.
		 * --------------------------------------------------------------------------- */
		add_theme_support( 'automatic-feed-links' );

		/* ---------------------------------------------------------------------------
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 * --------------------------------------------------------------------------- */
		add_theme_support( 'title-tag' );

		/* ---------------------------------------------------------------------------
		 * Black Bone Enable support for Post Formats.
		 * --------------------------------------------------------------------------- */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
		) );

		/* ---------------------------------------------------------------------------
		 * Black Bone Enable support for Post thumbnail.
		 * Black Bone Set thumbnail size for Post .
		 * Black Bone add thumbnail size for Post .
		 * --------------------------------------------------------------------------- */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 700, 440, true );
		add_image_size('bb-small', 110, 70, true );

		/* ---------------------------------------------------------------------------
		 * Switch default core markup for search form, comment form, and comments
	 	 * to output valid HTML5.
		 * --------------------------------------------------------------------------- */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );


		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'bb-primary-menu' => __( 'Primary Menu', 'black-bone' ),
			'bb-top-menu'  => __( 'Top Bar Menu', 'black-bone' )
		) );
	}

	function blackBone_excerpt_more($more) {
		global $post;
	    return '<a class="show-more" href="'.get_the_permalink($post->ID).'">show more</a>';
	} 

	/* ---------------------------------------------------------------------------
	* Loads Theme scripts
	* --------------------------------------------------------------------------- */
	public function bb_scripts(){

		// wp_enqueue_style ------------------------------------------------------
		wp_enqueue_style( 'style',				get_stylesheet_uri(), false, THEME_VERSION, 'all' );
		
		wp_enqueue_style( 'bb-bootstrap',			THEME_URI .'/assets/css/bootstrap.min.css', false, THEME_VERSION, 'all' );
		wp_enqueue_style( 'bb-bootstrap-theme',			THEME_URI .'/assets/css/bootstrap-theme.min.css', false, THEME_VERSION, 'all' );
		wp_enqueue_style( 'bb-bbfont',		THEME_URI .'/assets/css/bb-fonts.css', false, THEME_VERSION, 'all' );
		wp_enqueue_style( 'bb-main-style',		THEME_URI .'/assets/css/main-style.css', false, THEME_VERSION, 'all' );
		wp_enqueue_style( 'bb-responsive',		THEME_URI .'/assets/css/responsive.css', false, THEME_VERSION, 'all' );


		// wp_enqueue_style ------------------------------------------------------
		wp_enqueue_script( 'bb-bootstrap-js', 		THEME_URI .'/assets/js/bootstrap.min.js', array('jquery'), THEME_VERSION, true );
		wp_enqueue_script( 'bb-isotope-js', 		THEME_URI .'/assets/js/isotope.pkgd.min.js', array('jquery'), THEME_VERSION, true );
		wp_enqueue_script( 'bb-main-js', 		THEME_URI .'/assets/js/scripts.js', array('jquery'), THEME_VERSION, true );
	}

}