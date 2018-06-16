		<footer class="footer">
			<?php
				if (BBOptions::get('bb-footer-widget-status') == '1' ) { 
			?>
			<div class="footer-widget">
				<div class="container">
					<div class="row">
						<?php 
							if ( BBOptions::get('bb-footer-widget-col') != '' ){
								$fWidget_Num = ( BBOptions::get('bb-footer-widget-col') + 1 ); 
								for ($i=1; $i<$fWidget_Num;$i++) {
									$widget_cal_calss = 12 / BBOptions::get('bb-footer-widget-col'); 
									$widget_cal_calss = 'col-md-'.$widget_cal_calss;
									echo '<div class="'.$widget_cal_calss.'">';
									dynamic_sidebar( "bb-footer-".$i );
									echo '</div>';
								}
							}else{
								$fWidget_Num = 5;
								for ($i=1; $i<$fWidget_Num;$i++) { 
									echo '<div class="col-md-3">';
									dynamic_sidebar( "bb-footer-".$i );
									echo '</div>';
								}
							}
						?> 
					</div> 
				</div>
			</div>
			<?php } ?>
			<div class="footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-6 col-xs-12"> 
							<div class="footer-copytext">
							<?php if ( BBOptions::get('bb-footer-copyright-msg') != '' ){
								echo '<span class="copytext">'.BBOptions::get('bb-footer-copyright-msg').'</span>';
								} ?>
							</div> 
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="footer-right float-right">
								<?php   
									if (BBOptions::get('bb-footer-bottom-right') == 'sl') {
									 	do_action( 'bb-social-icons' );
									}elseif (BBOptions::get('bb-footer-bottom-right') == 'nav') {
									 	wp_nav_menu( array( 
										    'theme_location' => 'bb-top-menu', 
										    'container'		 => 'div',
										    'container_class'=> 'top-menu float-right'
										) );
									}elseif (BBOptions::get('bb-footer-bottom-right') == 'le') { 
									}else{
										do_action( 'bb-social-icons' );
									}   
								?>  
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>      -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Wordpress footer -->
<?php wp_footer(); ?>
</body>
<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>

<?php endif; ?>
</html>