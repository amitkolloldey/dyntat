<div id="bb-menu-bar" class="menu-bar">
	<div class="container">
		<div class="row"> 
			<nav class="bb-nav-wrapper">
				<div class="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo BBOptions::get('site-logo'); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
				</div>
				<?php 
					wp_nav_menu( array( 
					    'theme_location' => 'bb-primary-menu', 
					    'menu_class'	 => 'main-menu',
					    'container'		 => 'div',
					    'container_class'=> 'menu-wrapper'
					) ); 
				?>	
			</nav>   
		</div>
	</div>
</div>