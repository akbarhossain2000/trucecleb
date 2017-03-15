<?php 
	get_header();
	$prefix		= "trucec_";
	$theme 		= wp_get_theme();
	
	/* $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	
	echo $post_id; */

?>

	<section class="main">
		<div class="container-fluid no-padding">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-12 no-padding ">
					<div class="left-side">
					<?php 
						dynamic_sidebar('left_sidebar');
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
					<?php
						$mt_args	= array(
							'post_type'		=> 'post',
							'cat'			=> $trucecleb_set[$prefix.'middletop'],
							'posts_per_page'=> 5,
						);
						
						$mt_data	= new WP_Query($mt_args);
						
						if($mt_data->have_posts()):
					?>
						<div class="main-title">
							<div class="row no-padding">
							<?php
							
							?>
								<div class="col-xs-6 no-padding">
								<?php
									$mt_cat_name = get_the_category_by_ID($trucecleb_set[$prefix.'middletop']);
									if(strpos($mt_cat_name, ' ') !== false){
										$separator = explode(' ', $mt_cat_name);
										echo '<h3>';
										for($i=0; $i<sizeof($separator); $i++) {
											if($i == 0) {
												echo $separator[$i];
											}else{
												echo '<span>'.' '.$separator[$i].'</span>';
											}
										}
										echo '</h3>';
									}else{
										echo '<h3>'.$mt_cat_name.' '.'<span>Stories</span></h3>';
									}
								?>
								</div>
								<div class="col-xs-6 no-padding">
									<div class="view-all">
										<a href="<?php echo get_category_link($trucecleb_set[$prefix.'middletop']); ?>">All</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Main Title -->
						
						
						<!-- Two Stories -->
						<div class="two-stories">
							<div class="row no-padding">
							<?php
								$i = 1;
								while($mt_data->have_posts()): $mt_data->the_post();
								
								$mt_img_id	= get_post_thumbnail_id();
								$mt_img_url	= wp_get_attachment_image_src($mt_img_id, 'category-gallery-image', true);
								$mt_bigimg_url	= wp_get_attachment_image_src($mt_img_id, 'category-big-image', true);
								
								$mt_id		= get_the_ID();
								$mt_category	= get_the_category($mt_id);
								$mt_cat_id		= $mt_category[0]->cat_ID;
								
								if($i%3 == 0){
							?>
								<!-- One Big Stories -->
								<div class="col-md-12 col-xs-12 no-padding">
								
									<!-- Single Post -->
									<div class="single-stories single-stories-big">
										<div class="two-stories-thumb">
											<img src="<?php echo $mt_bigimg_url[0]; ?>" alt="" />
											<div class="stories-category">
												<a href="<?php echo get_category_link($mt_cat_id); ?>"><?php echo get_the_category_by_ID($mt_cat_id); ?></a>
											</div>
										</div>
										
										<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
										<?php
											$mt_content = wp_trim_words(get_the_excerpt(), 30, '... ');
											if(str_word_count($mt_content) >= 30){
										?>
											<p><?php echo $mt_content; ?><a href="<?php the_permalink(); ?>">READ MORE</a></p>
										<?php
											}else{
										?>
											<p><?php echo $mt_content; ?>... <a href="<?php the_permalink(); ?>">READ MORE</a></p>
										<?php
											}
										?>
									</div>
									<!-- Single Post -->
									
									
								</div>
								<!-- One Big Stories -->
							<?php
								}else {
								
									$j = $i + 1;
									if($j % 3 == 0) {
							?>
									<div class="col-md-6 no-right-padding">
									
										<!-- Single Post -->
										<div class="single-stories">
											<div class="two-stories-thumb">
												<img src="<?php echo $mt_img_url[0]; ?>" alt="" />
												<div class="stories-category">
													<a href="<?php echo get_category_link($mt_cat_id); ?>"><?php echo get_the_category_by_ID($mt_cat_id); ?></a>
												</div>
											</div>
											
											<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
											<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
										</div>
										<!-- Single Post -->
										
										
									</div>
							<?php
									}else {
							?>
									<div class="col-md-6 no-left-padding">
									
										<!-- Single Post -->
										<div class="single-stories">
											<div class="two-stories-thumb">
												<img src="<?php echo $mt_img_url[0]; ?>" alt="" />
												<div class="stories-category">
													<a href="<?php echo get_category_link($mt_cat_id); ?>"><?php echo get_the_category_by_ID($mt_cat_id); ?></a>
												</div>
											</div>
											
											<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
											<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
										</div>
										<!-- Single Post -->
										
										
									</div>
							<?php
									}
								}
								$i++;
								endwhile;
							?>
							</div>
						</div>
						<!-- Two Stories -->
					<?php
						endif;
						wp_reset_postdata();
					?>
						
						
					<!-- Main Title -->
					<?php
						$mm_args	= array(
							'post_type'		=> 'post',
							'cat'			=> $trucecleb_set[$prefix.'middle'],
							'posts_per_page'=> 1,
						);
						
						$mm_data	= new WP_Query($mm_args);
						
						if($mm_data->have_posts()):
					?>
						<div class="main-title">
							<div class="row no-padding">
								<div class="col-xs-6 no-padding">
								<?php
									$mm_cat_name = get_the_category_by_ID($trucecleb_set[$prefix.'middle']);
									if(strpos($mm_cat_name, ' ') == true){
										$separator = explode(' ', $mm_cat_name);
										echo '<h3>';
										for($i=0; $i<sizeof($separator); $i++) {
											if($i == 0) {
												echo $separator[$i];
											}else{
												echo '<span>'.' '.$separator[$i].'</span>';
											}
										}
										echo '</h3>';
									}else{
									
								?>
									<h3><?php echo $theme->get( 'Name' ); ?> <span><?php echo $mm_cat_name; ?></span></h3>
								<?php
									}
								?>
								</div>
								<div class="col-xs-6 no-padding">
									<div class="view-all">
										<a href="<?php echo get_category_link($trucecleb_set[$prefix.'middle']); ?>">All</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Main Title -->
						
						
						<!-- One Big Stories -->
						<div class="one-stories">
							<div class="row no-padding">
							<?php
								while($mm_data->have_posts()): $mm_data->the_post();
								
								$mm_img_id	= get_post_thumbnail_id();
								$mm_img_url = wp_get_attachment_image_src($mm_img_id, 'category-big-image', true);
								
								$mm_id			= get_the_ID();
								$mm_category 	= get_the_category($mm_id);
								$mm_cat_id		= $mm_category[0]->cat_ID;
							?>
								<div class="col-md-12 col-xs-12 no-padding">
								
									<!-- Single Post -->
									<div class="single-stories single-stories-big">
										<div class="two-stories-thumb">
											<img src="<?php echo $mm_img_url[0]; ?>" alt="" />
											<div class="stories-category">
												<a href="<?php echo get_category_link($mm_cat_id); ?>"><?php echo get_the_category_by_ID($mm_cat_id); ?></a>
											</div>
										</div>
										
										<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
										<?php
											$mm_content = wp_trim_words(get_the_excerpt(), 30, '... ');
											if(str_word_count($mm_content) >= 30){
										?>
											<p><?php echo $mm_content; ?><a href="<?php the_permalink(); ?>">READ MORE</a></p>
										<?php
											}else{
										?>
											<p><?php echo $mm_content; ?>... <a href="<?php the_permalink(); ?>">READ MORE</a></p>
										<?php
											}
										?>
									</div>
									<!-- Single Post -->
									
									
								</div>
							<?php
								endwhile;
							?>
							</div>
						</div>
						<!-- One Big Stories -->
					<?php
						endif;
						wp_reset_postdata();
					?>
						
					<!-- Main Title -->
					<?php
						$mb_args	= array(
							'post_type'		=> 'post',
							'cat'			=> $trucecleb_set[$prefix.'middlebottom'],
							'posts_per_page'=> 3,
						);
						
						$mb_data	= new WP_Query($mb_args);
						
						if($mb_data->have_posts()):
						
						$mb_cat_name	= get_the_category_by_ID($trucecleb_set[$prefix.'middlebottom']);
						
					?>
						<div class="main-title">
							<div class="row no-padding">
								<div class="col-xs-6 no-padding">
								<?php
									if(strpos($mb_cat_name, ' ') !==false){
										$separator	= explode(' ', $mb_cat_name);
										echo '<h3>';
										for($i=0; $i<sizeof($separator); $i++) {
											if($i == 0) {
												echo $separator[$i];
											}else{
												echo '<span>'.' '.$separator[$i].'</span>';
											}
										}
										echo '</h3>';
									}else{
										echo '<h3>'.$mb_cat_name.' <span>Shows</span></h3>';
									}
								?>
								</div>
								<div class="col-xs-6 no-padding">
									<div class="view-all">
										<a href="<?php echo get_category_link($trucecleb_set[$prefix.'middlebottom']); ?>">All</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Main Title -->
						
						<!-- Three Stories -->
						<div class="three-stories">
							<div class="row no-padding">
							<?php 
								$i = 1;
								while($mb_data->have_posts()): $mb_data->the_post();
								
								$mb_img_id	= get_post_thumbnail_id();
								$mb_img_url	= wp_get_attachment_image_src($mb_img_id, 'tv-shows-image', true);
								
								$mb_id			= get_the_ID();
								$mb_category	= get_the_category($mb_id);
								$mb_cat_id		= $mb_category[0]->cat_ID;
								
								if($i%3 == 0) {
							?>
								<div class="col-md-4 no-right-padding">
								
									<!-- Single Post -->
									<div class="single-stories">
										<div class="two-stories-thumb">
											<img src="<?php echo $mb_img_url[0]; ?>" alt="" />
											<div class="stories-category">
												<a href="<?php echo get_category_link($mb_cat_id); ?>"><?php echo get_the_category_by_ID($mb_cat_id); ?></a>
											</div>
										</div>
										
										<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
										<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
									</div>
									<!-- Single Post -->
									
									
								</div>
							<?php
								}else{
									$j = $i + 1;
									
									if($j%3 == 0){
							?>
									<div class="col-md-4 left-right-padding">
								
									<!-- Single Post -->
									<div class="single-stories">
										<div class="two-stories-thumb">
											<img src="<?php echo $mb_img_url[0]; ?>" alt="" />
											<div class="stories-category">
												<a href="<?php echo get_category_link($mb_cat_id); ?>"><?php echo get_the_category_by_ID($mb_cat_id); ?></a>
											</div>
										</div>
										
										<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
										<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
									</div>
									<!-- Single Post -->
									
									
								</div>
							<?php
									}else{
							?>
									<div class="col-md-4 no-left-padding">
								
									<!-- Single Post -->
									<div class="single-stories">
										<div class="two-stories-thumb">
											<img src="<?php echo $mb_img_url[0]; ?>" alt="" />
											<div class="stories-category">
												<a href="<?php echo get_category_link($mb_cat_id); ?>"><?php echo get_the_category_by_ID($mb_cat_id); ?></a>
											</div>
										</div>
										
										<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
										<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
									</div>
									<!-- Single Post -->
									
									
								</div>
							<?php
									}
								}
								$i++;
								endwhile;
							?>
							</div>
						</div>
						<!-- Three Stories -->
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
								<img src="<?php echo get_template_directory_uri(); ?>/img/song-of-the-day.png" alt="" />
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
													<img src="<?php echo get_template_directory_uri(); ?>/img/artist.png" class="color-purple" alt="" />
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
													<img src="<?php echo get_template_directory_uri(); ?>/img/artist.png" class="color-dep-blue" alt="" />
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
													<img src="<?php echo get_template_directory_uri(); ?>/img/artist.png" class="color-blue" alt="" />
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
													<img src="<?php echo get_template_directory_uri(); ?>/img/artist.png" class="color-green" alt="" />
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
													<img src="<?php echo get_template_directory_uri(); ?>/img/artist.png" alt="" />
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
		
<?php get_footer(); ?>
