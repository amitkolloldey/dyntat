<?php
/**
 * Template Name: Black Blog Home Template
 *
 * @package Black Bone Theme
 * @author Unique It World
 */
?>
<?php get_header(); ?>
<?php

$sidebar_status_class = "";
$blogStatus_class = '';
if ( BBOptions::get('bb-catTampl-sidebar-status') == 'full' ){ 

	$blogStatus_class = 'col-md-12 bb-blog-full'; 

}elseif ( BBOptions::get('bb-catTampl-sidebar-status') == 'ls' ) {

	$blogStatus_class = 'col-md-9 col-sm-8 bb-blog-left-sidebar';  

}elseif ( BBOptions::get('bb-catTampl-sidebar-status') == 'rs' ) {

	$blogStatus_class = 'col-md-9 col-sm-8 bb-blog-right-sidebar';  

}else{
	$blogStatus_class = 'col-md-9 col-sm-8';
}

?>
		<section class="content-warp">
			<div class="container">
				<div class="row"> 
					<?php
						/*
						*********************************************************************
						* Blog Left Sidebar 
						*********************************************************************
						*/
						if ( BBOptions::get('bb-catTampl-sidebar-status') == 'ls' ) {
							echo '<div class="col-md-3 bb-no-padding '.$blogStatus_Sidebar_class.'">';
						 		get_sidebar('left');
							echo '</div>';
						} 
					?>  
					<div class="<?php echo $blogStatus_class; ?> bb-no-padding">
						<div class="blog-wrapper">
							<?php 
								$cat_templ_opt = BBOptions::get('bb-cat-templ');
								if (is_array($cat_templ_opt)) {
									foreach ( $cat_templ_opt['fields'] as $psak => $psarr ) { 
										if ( !empty( $psarr['bb-sliders-cat'] ) ) { 
											$tab_title = $psarr['slide-title'];
											if ( $psarr['bb-sliders-style'] == 's1' ) {
												$posts_per_page = 7; 
											}elseif ( $psarr['bb-sliders-style'] == 's2' ) {
												$posts_per_page = 8 ;
											} else{
												$posts_per_page = 6 ;
											}

											$brand_query = new WP_Query( array(
											    'post_type'      => 'post',
											    'suppress_filters' => true,
											    'posts_per_page' => $posts_per_page,
											    'cat' 	     => $psarr['bb-sliders-cat'] 
											) ); 
											if ( $psarr['bb-sliders-style'] == 's1' ){
												BBFormat::cat_posts_calback_one($brand_query, $tab_title);
											}elseif ( $psarr['bb-sliders-style'] == 's2' ) {
												BBFormat::cat_posts_calback_two($brand_query, $tab_title);
											}elseif ( $psarr['bb-sliders-style'] == 's3' ) {
												BBFormat::cat_posts_calback_three($brand_query, $tab_title);
											}elseif ( $psarr['bb-sliders-style'] == 'bp' ) {
												$Blog_query = new WP_Query( array(
												    'post_type' 	=> 'post',
												    'posts_per_page' 	=> $posts_per_page, 
												    'order' 		=> 'DESC'
												) );
												BBFormat::cat_posts_calback_three($Blog_query, $tab_title);
											}
										}
									}
								} 
							?>
						</div>
					</div> 
 
					<?php
						/*
						*********************************************************************
						* Blog Right Sidebar 
						*********************************************************************
						*/
						if ( BBOptions::get('bb-catTampl-sidebar-status') == 'rs' ) {
							echo '<div class="col-md-3 col-sm-4 bb-no-padding '.$blogStatus_Sidebar_class.'">';
						 	get_sidebar();
							echo '</div>';
						} 
					?> 
				</div>
			</div>
		</section>
<?php  get_footer(); ?>
