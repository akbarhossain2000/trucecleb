<?php
/**
*	Template Name: Trucecleb Videos
**/
	
	get_header( '2' );
	
?>		
		
		<section class="main main-two">
			<div class="container-fluid no-padding">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12 no-padding">
						<div class="left-side">
						<?php
							dynamic_sidebar( 'left_sidebar' );
						?>
							
							
							<div class="tv-schdule">
								<div class="inner-tv-schdule inner-padding">
									<div class="widget-heading">
										<h4>TV <span>Schdule</span></h4>
										<p>New York, NY</p>
									</div>
								</div>
								<div class="tv-schdule-lists">
									<ul>
										<li><div class="left">10pm</div> <div class="right">Fuse News</div></li>
										<li><div class="left">10pm</div> <div class="right">Fuse News</div></li>
										<li><div class="left">10pm</div> <div class="right">Fuse News</div></li>
										<li><div class="left">10pm</div> <div class="right">Fuse News</div></li>
									</ul>
									
									<div class="two-button inner-padding">
										<a href="" class="btn btn-site-default">Free Channel</a>
										<a href="" class="btn btn-site-default pull-right">Set Location</a>
									</div>
								</div>								
							</div>
							
						</div>
					</div>
					
					
					<div class="col-md-6 col-sm-6 col-xs-12 main-border">
						<div class="main-content">
							
							<!-- Main Title -->
							<div class="category-heading">
								<h4><i class="fa fa-video-camera"></i> all videos</h4>
							</div>
							<!-- Main Title -->
						<?php
							$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
							$vargs	= array(
								'post_type'		=> 'video_type',
								'post_status'	=> 'publish',
								'posts_per_page'=> 10,
								'paged'			=> $paged,
							);
							
							$vdata	= new WP_Query($vargs);
							
							if($vdata->have_posts()):
							
						?>	
							<!-- Two Stories -->
							<div class="two-stories">
								<div class="row no-padding">
								<!-- Single Post -->
								<?php
									$i = 1;
									while($vdata->have_posts()): $vdata->the_post();
									
									$nl = 'no-left-padding';
									$nr = 'no-right-padding';
									
									if($i%2 == 0) {
										$nlnr = $nr;
									}else{
										$nlnr = $nl;
									}
									
									$vurlcode = get_post_meta(get_the_ID(), '_url_code_meta_key', true);
								?>
									<div class="col-md-6 <?php echo $nlnr; ?>">
									
										<div class="single-stories">
											<div class="two-stories-thumb">
												<div class="embed-responsive embed-responsive-16by9">
												  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $vurlcode; ?>"></iframe>
												  
												</div>
											</div>
											
											<h5><?php the_title(); ?></h5>
											<p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
										</div>
										
									
									</div>
								<?php
									$i++;
									endwhile;
								?>
								<!-- Single Post -->
								</div>
							</div>
							<!-- Two Stories -->
						
							
							
						<!-- Pagination div -->
						<?php
							require_once('paginate.php');
							if (function_exists(custom_pagination)) {
								custom_pagination($vdata->max_num_pages,"",$paged);
							}
						?><!-- End Pagination -->
						
						<?php
							endif;
							wp_reset_postdata();
						?>
							
							
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 no-padding">
						<div class="right-side">
							<!-- Adz -->
							<div class="simle-adz inner-padding">
								<div class="simle-adz-thumb">
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/song-of-the-day.png" alt="" />
								</div>
							</div>
							<!-- Adz -->
							
							<!-- Heat Tracker -->
							<div class="main-heat-tracker">
								
								<div class="heat-tracker inner-padding">
									<div class="heat-tracer-info">
										<h4>Heat Tracker</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
									</div>
								</div>
								
								<div class="heat-tracker-lists">
									<ul>
										<li>
											<div class="row no-padding">
												<div class="col-xs-4 no-padding">
													<div class="artist-image">
														<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/artist.png" class="color-purple" alt="" />
													</div>
												</div>
												<div class="col-xs-8 no-padding">
													<div class="artist-name">
														<h5>Justin Bieber</h5>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-4 no-padding">
													<div class="artist-image">
														<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/artist.png" class="color-dep-blue" alt="" />
													</div>
												</div>
												<div class="col-xs-8 no-padding">
													<div class="artist-name">
														<h5>Justin Bieber</h5>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-4 no-padding">
													<div class="artist-image">
														<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/artist.png" class="color-blue" alt="" />
													</div>
												</div>
												<div class="col-xs-8 no-padding">
													<div class="artist-name">
														<h5>Justin Bieber</h5>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-4 no-padding">
													<div class="artist-image">
														<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/artist.png" class="color-green" alt="" />
													</div>
												</div>
												<div class="col-xs-8 no-padding">
													<div class="artist-name">
														<h5>Justin Bieber</h5>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-4 no-padding">
													<div class="artist-image">
														<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/artist.png" alt="" />
													</div>
												</div>
												<div class="col-xs-8 no-padding">
													<div class="artist-name">
														<h5>Justin Bieber</h5>
													</div>
												</div>
											</div>
										</li>
										
										
									</ul>
								</div>
							</div>
							<!-- Heat Tracer -->
							
							
							<!-- Trending 10 -->
							<div class="trending-10">
								<div class="heat-tracker inner-padding">
									<div class="heat-tracer-info">
										<h4>Trending 10</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
									</div>
								</div>
								
								<div class="trending-10-lists">
									<ul>
										<li>
											<div class="row no-padding">
												<div class="col-xs-3 no-padding">
													<div class="trending-serial">
														<h2>1</h2>
													</div>
												</div>
												<div class="col-xs-9 no-padding">
													<div class="trending-name">
														<h5>Lorem ipsum dolor sit amet, consectetur</h5>
														<p>Lorem ipsum dolor sit amet, consectetur</p>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-3 no-padding">
													<div class="trending-serial">
														<h2>2</h2>
													</div>
												</div>
												<div class="col-xs-9 no-padding">
													<div class="trending-name">
														<h5>Lorem ipsum dolor sit amet, consectetur</h5>
														<p>Lorem ipsum dolor sit amet, consectetur</p>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-3 no-padding">
													<div class="trending-serial">
														<h2>3</h2>
													</div>
												</div>
												<div class="col-xs-9 no-padding">
													<div class="trending-name">
														<h5>Lorem ipsum dolor sit amet, consectetur</h5>
														<p>Lorem ipsum dolor sit amet, consectetur</p>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-3 no-padding">
													<div class="trending-serial">
														<h2>4</h2>
													</div>
												</div>
												<div class="col-xs-9 no-padding">
													<div class="trending-name">
														<h5>Lorem ipsum dolor sit amet, consectetur</h5>
														<p>Lorem ipsum dolor sit amet, consectetur</p>
													</div>
												</div>
											</div>
										</li>
										
										<li>
											<div class="row no-padding">
												<div class="col-xs-3 no-padding">
													<div class="trending-serial">
														<h2>5</h2>
													</div>
												</div>
												<div class="col-xs-9 no-padding">
													<div class="trending-name">
														<h5>Lorem ipsum dolor sit amet, consectetur</h5>
														<p>Lorem ipsum dolor sit amet, consectetur</p>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
								
							</div>
							<!-- Trending 10 -->
						<?php 
							dynamic_sidebar( 'right_sidebar' );
						?>
							
						</div>
					</div>
				</div>
			</div>
		</section>

<?php
	get_footer();
?>