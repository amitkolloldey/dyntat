<?php
/**
* Black Bone Widgets registers
*/
class BBWidgets extends BlackBone{

	public static $instance = NULL;

	public $fWidget_Num = 5;
	
	public function __construct(){
		add_action( 'widgets_init', array($this, 'blackBone_widgets_Reg') );
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function blackBone_widgets_Reg(){

		register_sidebar( array(
	        'name'          => __( 'Sidebar Right Widget ', 'black-bone' ),
	        'id'            => 'bb-sidebar-right',
	        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'black-bone' ),
	        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="widgettitle">',
	        'after_title'   => '</h4>',
	    ) );

	    register_sidebar( array(
	        'name'          => __( 'Sidebar Left Widget ', 'black-bone' ),
	        'id'            => 'bb-sidebar-left',
	        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'black-bone' ),
	        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="widgettitle">',
	        'after_title'   => '</h4>',
	    ) );


	    register_sidebar( array(
	        'name'          => __( 'Single Page Sidebar Left Widget ', 'black-bone' ),
	        'id'            => 'bb-single-sidebar-left',
	        'description'   => __( 'Widgets in this area will be shown on Single pages.', 'black-bone' ),
	        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="widgettitle">',
	        'after_title'   => '</h4>',
	    ) );

	    register_sidebar( array(
	        'name'          => __( 'Single Page Sidebar Right Widget ', 'black-bone' ),
	        'id'            => 'bb-single-sidebar-right',
	        'description'   => __( 'Widgets in this area will be shown on Single pages.', 'black-bone' ),
	        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="widgettitle">',
	        'after_title'   => '</h4>',
	    ) );

	    register_sidebar( array(
	        'name'          => __( 'Sidebar Left Widget ', 'black-bone' ),
	        'id'            => 'bb-archive-sidebar-left',
	        'description'   => __( 'Widgets in this area will be shown on Archive page.', 'black-bone' ),
	        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="widgettitle">',
	        'after_title'   => '</h4>',
	    ) );

	    register_sidebar( array(
	        'name'          => __( 'Archive Page Sidebar Right Widget ', 'black-bone' ),
	        'id'            => 'bb-archive-sidebar-right',
	        'description'   => __( 'Widgets in this area will be shown on all Archive page.', 'black-bone' ),
	        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h3 class="widgettitle">',
	        'after_title'   => '</h4>',
	    ) );
		

	    for ($i=1; $i<$this->fWidget_Num;$i++) {
		    register_sidebar( array(
		        'name'          => __( 'Footer Widget '.$i, 'black-bone' ),
		        'id'            => 'bb-footer-'.$i,
		        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'black-bone' ),
		        'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		        'after_widget'  => '</div>',
		        'before_title'  => '<h4 class="widgettitle">',
		        'after_title'   => '</h4>',
		    ) );
	    } 
	}
}