<?php get_header(); ?>
<?php
/*global $wp_query;
echo "<pre>";
var_dump($wp_query);
echo "</pre>";*/
//$pages = $wp_query->max_num_pages;

$blogStatus_class = '';
$blogStatus_Sidebar_class = '';
if ( BBOptions::get('bb-sidebar-status') == 'full' ){ 

	$blogStatus_class = 'col-md-12 bb-blog-full'; 

}elseif ( BBOptions::get('bb-sidebar-status') == 'ls' ) {

	$blogStatus_class = 'col-md-9 bb-blog-left-sidebar'; 
	$blogStatus_Sidebar_class = 'bb-left-sidebar';

}elseif ( BBOptions::get('bb-sidebar-status') == 'rs' ) {

	$blogStatus_class = 'col-md-9 bb-blog-right-sidebar'; 
	$blogStatus_Sidebar_class = 'bb-right-sidebar';

}elseif ( BBOptions::get('bb-sidebar-status') == 'ds' ) {

	$blogStatus_class = 'col-md-9 bb-blog-duale-sidebar'; 
	$blogStatus_Sidebar_class = 'bb-duale-sidebar';

}else {
	$blogStatus_class = 'col-md-9'; 
}

$blogStyleWarp_class = '';
$blogLayout_class 	 = '';
if ( BBOptions::get('bb-blog-layout') == 'gt2' ){ 
	$blogStyleWarp_class = 'bb-blog-grid-style'; 
	$blogLayout_class    = 'bb-grid grid-two'; 
} 

?>
<section class="content-warp">
	<div class="container">
		<div class="row">
			<!-- 
			*********************************************************************
			* Blog Left Sidebar 
			*********************************************************************
			--> 
			<?php
				if ( (BBOptions::get('bb-sidebar-status') == 'ls') || (BBOptions::get('bb-sidebar-status') == 'ds') ) {
					echo '<div class="col-md-3 bb-no-padding '.$blogStatus_Sidebar_class.'">';
				 		get_sidebar('left');
					echo '</div>';
				} 
			?>  

			<!-- 
			*********************************************************************
			* Blog Post Contant 
			*********************************************************************
			-->
			<div class="<?php echo $blogStatus_class; ?> bb-no-padding">
				<div class="blog-wrapper <?php echo $blogStyleWarp_class; ?>"> 
					<div class="blog-posts <?php echo $blogLayout_class; ?>">
						<?php if ( have_posts() ) :  while ( have_posts() ) : the_post();   ?>
						<?php  if ( BBOptions::get('bb-blog-layout') == 'gt2' ){ echo '<div class="bb-grid-item">'; } ?>
							<div class="single-post">  
								<!-- Post Thumb -->
								<?php 
									if ( (BBOptions::get('bb-blog-archive-thumb-status') == '1') && has_post_thumbnail(get_the_ID()) && ! post_password_required() ) {
										echo '<div class="post-thumb">';
											echo  get_the_post_thumbnail( get_the_ID());
											echo  '<div class="thumb-overlay">
													<a class="link" href="'.get_permalink().'"><i class="bb-icon bbattach"></i></a>
													<a class="zoom" href="#"><i class="bb-icon bbeye_open"></i></a>
												</div>';
										echo '</div>';
									}
								?>
								<!-- Post Content -->
								<div class="post-cont">
									<h2 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
									<?php
										if (BBOptions::get('bb-blog-archive-meta-status') == 1 ){
											echo BBFormat::bb_post_metta();
										}
									?>
									<p class="desc"><?php echo BBFormat::bb_short_content(35); ?></p>
									<a class="show-more" href="<?php echo get_permalink(); ?>">Read More</a>
								</div>
							</div>
						<?php  if ( BBOptions::get('bb-blog-layout') == 'gt2' ){ echo '</div>'; } ?>
						<?php endwhile; endif;  ?>
					</div> 
					<?php BBFormat::bb_post_pagination(); ?> 
				</div>
			</div>

			<!-- 
			*********************************************************************
			* Blog Right Sidebar 
			*********************************************************************
			--> 
			<?php
				if ( (BBOptions::get('bb-sidebar-status') == 'rs') || (BBOptions::get('bb-sidebar-status') == 'ds') ) {
					echo '<div class="col-md-3 bb-no-padding '.$blogStatus_Sidebar_class.'">';
				 	get_sidebar();
					echo '</div>';
				} 
			?> 
		</div>
	</div>
</section>
<?php  get_footer(); ?>
