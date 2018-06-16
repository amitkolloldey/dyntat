<?php
/**
* 
*/
class BBFormat extends BlackBone{
	
	public function __construct() {

	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static  function bb_short_content( $excerpt_length = 50){
		if (get_the_excerpt()) {  
	 		
	 		return wp_trim_words(get_the_excerpt(), $excerpt_length, '[...]');
	 	}else{
	 		return wp_trim_words(get_the_content(''), $excerpt_length, '[...]');
	 	} 
	}

	public static function bb_post_metta(){

		$output .= '<div class="post-meta">';
		/*$output .= '<div class="post-author-avater">';
			$output .= '<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">'.get_avatar( get_the_author_meta( 'ID' ), 50 ).'</a>';
		$output .= '</div>';*/
			$output .= '<ul>';
			if ( BBOptions::get('bb-blog-meta-date') == '1' ){
				$output .='<li><i class="bb-icon bbcalendar"></i> '.get_the_date().'</span>';
			}
			if ( BBOptions::get('bb-blog-meta-time') == '1' ){
				$output .= '<li><i class="bb-icon bbclock-1"></i> '.get_the_time('h:i').'</span>';
			}
			if ( BBOptions::get('bb-blog-meta-auth') == '1' ){
				$output .= '<li><i class="bb-icon bbuser-o"></i>'.'<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">'. get_the_author_meta( 'display_name' ) .'</a>'.'</li> ';
			}
			if ( BBOptions::get('bb-blog-meta-cat') == '1' ){
				$output .= '<li><i class="bb-icon bbtags"></i>';
					$i = 0;
					foreach((get_the_category()) as $cat) {
				        $output .= '<a href="'.get_category_link($cat->cat_ID).'">' . $cat->cat_name . '  ,</a>';
				        if (++$i == 2) break;
				      } 
				$output .= '</li>';
			}
			$output .= '</ul>';

		$output .= '</div>'; 
		return $output;
	}

	public static function bb_post_pagination($pages = '', $range = 2 ){
		//$showitems = ($range * 2)+1;
		global $paged;
		if(empty($paged)) $paged = 1;
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}   

		if(1 != $pages){
			echo '<div class="blog-pagination">';
			if( $paged > 1 ){
			 	echo '<a href="'.get_pagenum_link($paged-1).'" class="page prev"><i class="bb-icon bb-iconangle-double-left"></i> previus</a>';
			} 
			for ( $i=1; $i <= $pages; $i++ ){
			 	$active_class = $paged == $i ? 'active' : '';
			 	echo '<a href="'.get_pagenum_link($i).'" class="page '.$active_class.'">'.$i.'</a>'; 
			}
			if ( $paged < $pages ) { 
				echo '<a href="'.get_pagenum_link($paged+1).'" class="page next">next <i class="bb-icon bb-iconangle-double-right"></i></a>';
			}
			echo '</div>';
		}
	}



	/**
	 * Generate breadcrumbs
	 * @author Palash
	 * @authorURL www.palash-info.com
	 */
	public static function bb_breadcrumb(){
			if (is_home() ) {
				echo '<h1>Blog</h1>';
			} elseif (is_category()) {
		        echo '<h1>'.get_the_archive_title().'</h1>';       
		    } elseif (is_single()) {  
		        echo '<h1>'.get_the_title().'</h1>'; 
		    } elseif (is_page()) { 
		         echo '<h1>'.get_the_title().'</h1>';
		    } elseif (is_search()) {
		    	echo '<h1>'.the_search_query().'</h1>';  
		    }


			echo '<ul>';
		    	echo '<li><a href="'.home_url().'" rel="nofollow">Home</a></li>';
			    if (is_category()) {
			        echo '<li>'.get_the_archive_title().'</li>';       
			    } elseif (is_single()) { 
			        echo '<li>'.get_the_title().'</li>'; 
			    } elseif (is_page()) { 
			         echo '<li>'.get_the_title().'</li>';
			    } elseif (is_search()) {
			    	echo '<li>Search Results for...[ '.the_search_query().' ]</li>';  
			    }
		    echo "</ul>";
	}




	public static function cat_posts_calback_one($brand_query, $tab_title){
		if ( $brand_query->have_posts() ){
			echo '<div class="blog-posts style-bbone ">';
				if (!empty($tab_title)) {
					echo '<div class="block-title">';
						echo '<h4>'.$tab_title.'</h4>';
					echo '</div>';
				} 
				$catpost_count = 1;
				echo '<div class="cat-post-col-6">';
				while ( $brand_query->have_posts() ) : $brand_query->the_post();  
					$output = '';
					if ( $catpost_count == 1 ) {  
						
						$output .= '<div class="single-post big-post ffffffff">';
							if ( (BBOptions::get('bb-blog-thumb-status') == '1') && has_post_thumbnail(get_the_ID()) && ! post_password_required() ) {
								$output .= '<div class="post-thumb">';  
									$output .= get_the_post_thumbnail( get_the_ID());
									$output .= '<div class="thumb-overlay">
											<a class="link" href="'.get_permalink().'"><i class="bb-icon bbattach"></i></a>
											<a class="zoom" href="#"><i class="bb-icon bbeye_open"></i></a>
										</div>';
								$output .= '</div>';
							}
							$output .= '<div class="post-cont">';
								$output .= '<h2 class="title"><a href="'. get_permalink() .'">'. get_the_title() .'</a></h2>';

								if (BBOptions::get('bb-blog-meta-status') == 1 ){
									$output .= BBFormat::bb_post_metta();
								}
								$output .= '<p class="desc">'; 
								$output .= BBFormat::bb_short_content(42);  
								$output .= '</p>';
								$output .= '<a class="show-more" href="'.get_permalink().'">Read More</a>';
							$output .= '</div>';
						$output .= '</div>'; 
						echo $output;
					} 
				$catpost_count++;
				endwhile; 
				echo '</div>';

				$catpost_count_tow = 1;
				echo '<div class="cat-post-col-6">';
				while ( $brand_query->have_posts() ) : $brand_query->the_post();  
					$output = '';
					if ( $catpost_count_tow > 1 ) {  
						
						$output .= '<div class="single-post normal-post">';
							if ( (BBOptions::get('bb-blog-thumb-status') == '1') && has_post_thumbnail(get_the_ID()) && ! post_password_required() ) {
								$output .= '<div class="post-thumb">';
									$output .= get_the_post_thumbnail(get_the_ID(), 'bb-small'); 
								$output .= '</div>';
							}
							$output .= '<div class="post-cont">';
								$output .= '<h5 class="title"><a href="'. get_permalink() .'">'. get_the_title() .'</a></h5>';
								$output .= '<span>'.get_the_date().'</span>';
							$output .= '</div>';
						$output .= '</div>'; 
						echo $output;
					} 
				$catpost_count_tow++;
				endwhile; 
				echo '</div>';
			echo '</div>';
		}else{
			
		}
	}


	public static function cat_posts_calback_two($brand_query_two, $tab_title){


		if ( $brand_query_two->have_posts() ){
			echo '<div class="blog-posts style-bbtow">';
				if (!empty($tab_title)) {
					echo '<div class="block-title">';
						echo '<h4>'.$tab_title.'</h4>';
					echo '</div>';
				} 
				$catpost_count = 1;
				$output = '';
				while ( $brand_query_two->have_posts() ) : $brand_query_two->the_post(); 
					/**
					 *********************************************************
					 * Big Post 
					 *********************************************************
					 */  
					if ( $catpost_count < 3 ) { 
						if ( $catpost_count % 2 != 0 ) { 
							$output .= '<div class="cat-post-col-12">';
						} 
						$output .= '<div class="single-post big-post">';
							if ( (BBOptions::get('bb-blog-thumb-status') == '1') && has_post_thumbnail(get_the_ID()) && ! post_password_required() ) {
								$output .= '<div class="post-thumb">';
									$output .= get_the_post_thumbnail( get_the_ID());
									$output .= '<div class="thumb-overlay">
											<a class="link" href="'.get_permalink().'"><i class="bb-icon bbattach"></i></a>
											<a class="zoom" href="#"><i class="bb-icon bbeye_open"></i></a>
										</div>';
								$output .= '</div>';
							}
							$output .= '<div class="post-cont">';
								$output .= '<h2 class="title"><a href="'. get_permalink() .'">'. get_the_title() .'</a></h2>';

								if (BBOptions::get('bb-blog-meta-status') == 1 ){
									$output .= BBFormat::bb_post_metta();
								}
								$output .= '<div class="desc">'; 
								$output .= BBFormat::bb_short_content(42);  
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>'; 
						if ( $catpost_count % 2 == 0 ){
							$output .= '</div>';
						}
					}    
				
					/**
					 *********************************************************
					 * Small Post
					 *********************************************************
					 */ 
					if ( $catpost_count > 2 ){   
						    if ( $catpost_count % 2 != 0 ) {
							$output .= '<div class="cat-post-col-12">';
						    } 
						//----
							$output .= '<div class="single-post normal-post">';
								if ( (BBOptions::get('bb-blog-thumb-status') == '1') && has_post_thumbnail(get_the_ID()) && ! post_password_required() ) {
									$output .= '<div class="post-thumb">';
										$output .= get_the_post_thumbnail( get_the_ID(), 'bb-small' ); 
									$output .= '</div>';
								}
								$output .= '<div class="post-cont">';
									$output .= '<h5 class="title"><a href="'. get_permalink() .'">'. get_the_title() .get_the_ID().'</a></h5>';
									$output .= '<span>'.get_the_date().'</span>';
								$output .= '</div>';
							$output .= '</div>'; 
							//echo $output;
							 
						 if ( $catpost_count % 2 == 0 || $catpost_count == $brand_query_two->post_count ) {  
						     $output .= '</div>';
						     //break;
						 }
					} 
					
				$catpost_count++;  
				endwhile;
			echo $output;
			echo '</div>'; 
		} 
	}


	public static function cat_posts_calback_three($brand_query_three){
		if ( $brand_query_three->have_posts() ) :
			echo '<div class="blog-wrapper bb-blog-grid-style">'; 
				echo '<div class="blog-posts bb-grid grid-two">'; 
					while ( $brand_query_three->have_posts() ) : $brand_query_three->the_post(); 
			 
							echo '<div class="bb-grid-item">';
								echo '<div class="single-post">';   
											if (is_sticky()) {
												echo '<div class="bb-post-type-status">Sticky</div>';
											}
											if ( (BBOptions::get('bb-blog-thumb-status') == '1') && has_post_thumbnail(get_the_ID()) && ! post_password_required() ) {
												echo '<div class="post-thumb">';
													echo  get_the_post_thumbnail( get_the_ID());
													
													echo  '<div class="thumb-overlay">
															<a class="link" href="'.get_permalink().'"><i class="bb-icon bbattach"></i></a>
															<a class="zoom" href="#"><i class="bb-icon bbeye_open"></i></a>
														</div>';
												echo '</div>';
											} 
										echo '<div class="post-cont">';
											echo '<h2 class="title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>'; 
												if (BBOptions::get('bb-blog-meta-status') == 1 ){
													echo BBFormat::bb_post_metta();
												} 
											echo '<p class="desc">'.BBFormat::bb_short_content(35).'</p>';
											echo '<a class="show-more" href="'.get_permalink().'">Read More</a>';
										echo '</div>';
								echo '</div>';
							echo '</div>';  
					endwhile;
				echo '</div>';
			echo '</div>';
		endif; 
	}


	
}