<?php get_header(); ?>

<?php
/*global $wp_query;
echo "<pre>";
var_dump($wp_query);
echo "</pre>";*/
//$pages = $wp_query->max_num_pages;

$blogStatus_class = '';
$blogStatus_Sidebar_class = '';
if ( BBOptions::get('bb-bsingle-sidebar-status') == 'full' ){ 

	$blogStatus_class = 'col-md-12 bb-blog-full'; 

}elseif ( BBOptions::get('bb-bsingle-sidebar-status') == 'ls' ) {

	$blogStatus_class = 'col-md-9 bb-blog-left-sidebar'; 
	$blogStatus_Sidebar_class = 'bb-left-sidebar';

}elseif ( BBOptions::get('bb-bsingle-sidebar-status') == 'rs' ) {

	$blogStatus_class = 'col-md-9 bb-blog-right-sidebar'; 
	$blogStatus_Sidebar_class = 'bb-right-sidebar';

}else {
	$blogStatus_class = 'col-md-9'; 
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
?>
			<?php
				if ( BBOptions::get('bb-bsingle-sidebar-status') == 'ls' ) {
					echo '<div class="col-md-3 bb-no-padding '.$blogStatus_Sidebar_class.'">';
				 		echo '<aside class="sidebar-wrapper">';
				 			dynamic_sidebar( "bb-single-sidebar-left" );
						echo '</aside>';
					echo '</div>';
				} 
			?> 
<?php
/*
*********************************************************************
* Blog Post Contant 
*********************************************************************
*/
?>
			<div class="<?php echo $blogStatus_class; ?>">
				<div class="blog-wrapper "> 
					<div class="blog-posts ">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<div class="single-post single-post-details"> 
							<!-- Post Thumb -->
							<?php
								if ( (BBOptions::get('bb-blog-single-thumb-status') == '1') && has_post_thumbnail(get_the_ID()) && ! post_password_required() ) {
									echo '<div class="post-thumb">';
										echo get_the_post_thumbnail( get_the_ID(), 'full');
									echo '</div>';
								}
							?>
							<div class="post-cont">
								<h1 class="title"><?php the_title(); ?></h1> 
								<?php
									if ( BBOptions::get('bb-blog-single-meta-status') == '1' ) {
										echo BBFormat::bb_post_metta();
									}
								?>  
								<div class="desc"><?php the_content(); ?></div> 


							</div> 
							<div class="post-share">
								<div class="post-next-prev">
								<?php 
									echo get_previous_post_link('%link', '<i class="bb-icon bbdouble_angle_left"></i>'.__('previus', 'black-bone'), true);
									echo get_next_post_link('%link', __('Next', 'black-bone').'<i class="bb-icon bbdouble_angle_right"></i>', true); 
								?>
								</div> 
								<?php
									echo  '<div class="social-icon">';
										// Facebook
										echo '<a href="http://www.facebook.com/sharer.php?u='.get_permalink().'&t='.get_the_title().'" class="single-socile" target="_blank" ><i class="bb-icon bbfacebook-9"></i></a>';
										// Twiter
										echo '<a href="https://twitter.com/share?url='.get_permalink().'" class="single-socile" target="_blank"><i class="bb-icon bbtwitter-1"></i></a>'; 
										// Google
										echo '<a href="https://plus.google.com/share?url='.get_permalink().'" class="single-socile" target="_blank"><i class="bb-icon bbgplus-4"></i></a>';
										// Linkedin
										echo '<a href="http://www.linkedin.com/shareArticle?url='.get_permalink().'" class="single-socile" target="_blank"><i class="bb-icon  bblinkedin-7"></i></a>';
									echo '</div>';
								?>
							</div>
						</div>

						<!-- 
						*********************************************************************
						* Single Post Tags
						*********************************************************************
						-->
						<?php
							if ( BBOptions::get('bb-blog-single-tags-status') == '1' ){
								echo '<div class="post-tags">';
									echo '<h5>'.__('Tages', 'black-bone').'</h5>';
									echo '<div class="tages">';
										echo get_the_tag_list();
									echo '</div>';
								echo '</div>';
							} 
						?>

						<!-- 
						*********************************************************************
						* Single Post Cats
						*********************************************************************
						-->
						<?php 
							if ( BBOptions::get('bb-blog-single-cats-status') == '1' ){
								echo '<div class="post-cats">';
									echo '<h5>'.__('Category', 'black-bone').'</h5>';
										echo '<div class="cats">';
											echo get_the_category_list();
									echo '</div>';
								echo '</div>';
							} 
						?>
					<?php endwhile;  endif; ?>
					</div>  
				</div>
			</div>

<?php
/*
*********************************************************************
* Blog Right Sidebar
*********************************************************************
*/
?>
			<?php
				if ( BBOptions::get('bb-bsingle-sidebar-status') == 'rs' ) {
					echo '<div class="col-md-3 bb-no-padding '.$blogStatus_Sidebar_class.'">';
				 		echo '<aside class="sidebar-wrapper">';
				 			dynamic_sidebar( "bb-single-sidebar-right" );
						echo '</aside>';
					echo '</div>';
				} 
			?>
		</div>
	</div>
</section>
<?php  get_footer(); ?>