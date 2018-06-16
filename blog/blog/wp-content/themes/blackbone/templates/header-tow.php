<div class="baner-bar">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 hidden-xs bb-no-padding">
				<div class="site-logo">
				<?php if( BBOptions::get('site-logo') ) { ?>
					<?php if( is_front_page() || is_home() || is_404() || is_archive() ) { ?>
					     <h1 class="image-logo">
					          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						      <img src="<?php echo BBOptions::get('site-logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
						      <span class="seo-logo-title"><?php bloginfo( 'name' ); ?></span>
					          </a>
					    </h1>
					<?php } else { ?>
					     <h2 class="image-logo">
					         <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						  <img src="<?php echo BBOptions::get('site-logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
						  <span class="seo-logo-title"><?php bloginfo( 'name' ); ?></span>
					         </a>
					     </h2> 
					<?php } ?>
				<?php } else { ?>
				      <?php if( is_front_page() || is_home() || is_404() ) { ?>
				           <h1 class="text-logo">
						<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
					   </h1>
					<?php } else { ?>
				            <h2 class="text-logo">
					        <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
					    </h2>
					<?php } ?>
				<?php } ?>
				
				</div>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12 bb-no-padding">
				<div class="site-baner">
					<?php
						if ( BBOptions::get('bb-site-banner-status') == 'ga' ){ 
							if ( BBOptions::get('bb-banner-ads-code') != '' ) {
								echo BBOptions::get('bb-banner-ads-code');
							} 
						}else{
							if ( BBOptions::get('site-baner') != '' ) {
								echo '<a href=""><img src="'.BBOptions::get('site-baner').'" alt="site banner"></a>';
							} 
						}
					?>  
				</div>
			</div>
		</div>
	</div>
</div>
<div id="bb-menu-bar" class="menu-bar bb-nav-style-tow">
	<div class="container"> 
		<nav class="bb-nav-wrapper"> 
			<div class="site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo BBOptions::get('site-logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			</div>
			<div class="mobile-menu-active">
				<span></span>
				<span></span>
				<span></span>
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