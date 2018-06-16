<?php get_header(); ?>
<?php

$blogStatus_class = '';
$blogStatus_Sidebar_class = '';
if ( BBOptions::get('bb-page-sidebar-status') == 'full' ){ 

	$blogStatus_class = 'col-md-12 bb-blog-full'; 

}elseif ( BBOptions::get('bb-page-sidebar-status') == 'ls' ) {

	$blogStatus_class = 'col-md-9 bb-blog-left-sidebar'; 
	$blogStatus_Sidebar_class = 'bb-left-sidebar';

}elseif ( BBOptions::get('bb-page-sidebar-status') == 'rs' ) {

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
				* Page Left Sidebar 
				*********************************************************************
				*/ 
				if ( BBOptions::get('bb-page-sidebar-status') == 'ls' ) {
					echo '<div class="col-md-3 bb-no-padding '.$blogStatus_Sidebar_class.'">';
						echo '<aside class="sidebar-wrapper">';
				 			dynamic_sidebar( "bb-single-sidebar-left" );
						echo '</aside>';
					echo '</div>';
				} 
			?>
			<div class="<?php echo $blogStatus_class; ?> bb-no-padding">
				<div class="blog-wrapper"> 
					<div class="blog-posts">
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
								<h2 class="title"><?php the_title(); ?></h2>   
								<div class="desc"><?php the_content(); ?></div> 
							</div>  
						</div>  
					<?php endwhile;  endif; ?>
					</div>  
				</div>
			</div>
			<?php
				/*
				*********************************************************************
				* Page Right Sidebar 
				*********************************************************************
				*/ 
				if ( BBOptions::get('bb-page-sidebar-status') == 'rs' ) {
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