<?php
	get_header( '2' );
?>		
		<!-- Article Main -->
		<section class="article">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9 col-sm-8 col-xs-12">
						<div class="article-main-content">
								<!-- One Big Stories -->
								<?php
								if(have_posts()):
									while(have_posts()): the_post();
									
										topViewPost(get_the_ID());
										//$view = wpb_get_post_views(get_the_ID());
										//echo '<h1>'.$view.'</h1>';
										get_template_part('inc/content', 'single');
										
									endwhile;
								endif;
								?>
								<!-- One Big Stories -->
								
								
								<!-- Interesting Stories --->
								<?php
									get_template_part('inc/content', 'related_post');
								?>
								<!-- Interesting Stories --->
								
						</div>
					</div>
					
					
					<div class="col-md-3 col-sm-4 col-xs-12">
						<div class="article-sidebar">
							
							<?php 
								dynamic_sidebar( 'single_sidebar' );
							?>
							
							<!-- Gallery  -->
							<div class="gallery-image">
								<div class="popular-title">
									<h3>Gallery</h3>
									<div class="line"></div>
								</div>
								
								<div class="gallery-inner">
									<ul>
										<li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/gallery.png" alt="" /></li>
										<li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/gallery.png" alt="" /></li>
										<li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/gallery.png" alt="" /></li>
										<li><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/gallery.png" alt="" /></li>
									</ul>
								</div>
								
							</div>
							<!-- Gallery  -->
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Article Main -->
		
<?php 
	get_footer();