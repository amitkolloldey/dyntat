<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>


</head>
<body <?php body_class(); ?>>
	
	<div class="site-wrapper">
		<header class="header">
			<?php
				$topbarlayout = "";
				if ( BBOptions::get('bb-header-top-status') == 1 ){  
			?>
				<div class="top-bar">
					<div class="container">
						<div class="row">
							<div class="topbar-inner">
								<div class="col-md-6 bb-no-padding">
									<div class="topbar-left">
										<?php 
											if (BBOptions::get('bb-header-top-left') == 'ci') {
											 	
											}elseif (BBOptions::get('bb-header-top-left') == 'sl') {
											 	do_action( 'bb-social-icons' );
											}elseif (BBOptions::get('bb-header-top-left') == 'nav') {
											 	wp_nav_menu( array( 
												    'theme_location' => 'bb-top-menu', 
												    'container'		 => 'div',
												    'container_class'=> 'top-menu float-right'
												) );
											}elseif (BBOptions::get('bb-header-top-left') == 'le') {
												
											}else{
												do_action( 'bb-social-icons' );
											} 
										?> 
									</div>
								</div>
								<div class="col-md-6 bb-no-padding">
									<div class="topbar-right"> 
										<?php 
											if (BBOptions::get('bb-header-top-right') == 'ci') {
											 	
											}elseif (BBOptions::get('bb-header-top-right') == 'sl') {
											 	do_action( 'bb-social-icons' );
											}elseif (BBOptions::get('bb-header-top-right') == 'nav') {
											 	wp_nav_menu( array( 
												    'theme_location' => 'bb-top-menu', 
												    'container'		 => 'div',
												    'container_class'=> 'top-menu float-right'
												) );
											}elseif (BBOptions::get('bb-header-top-right') == 'le') {
												
											}else{
												wp_nav_menu( array( 
												    'theme_location' => 'bb-top-menu', 
												    'container'		 => 'div',
												    'container_class'=> 'top-menu float-right'
												) );
											} 
										?>  
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php 
				if ( BBOptions::get('bb-header-layout') == "hs1" ){  
					get_template_part( 'templates/header', 'one' );
				}elseif( BBOptions::get('bb-header-layout') == "hs2" ){
					get_template_part( 'templates/header', 'tow' );
				} 
			?>  
		</header>
		<?php if ( BBOptions::get('bb-header-layout') != "hs2" ){ ?>
			<section class="subtitle-wrapper">
				<div class="container">
					<div class="row">
						<div class="subtitle-inner"> 
							<?php  BBFormat::bb_breadcrumb(); ?>
						</div>
					</div>
				</div>
			</section>
		<?php } ?>