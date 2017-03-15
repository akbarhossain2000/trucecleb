<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main-content">
		
		<!-- Main Title -->
		<div class="category-heading">
			<h4><?php printf( __( 'Search Results for: %s', 'Zurecipe' ), get_search_query() ); ?></h4>
		</div>
		<!-- Main Title -->
		<?php
			if(have_posts()):
			
		?>
		
			<!-- Two Stories -->
			<div class="two-stories">
				<div class="row no-padding">
					<!-- Single Post -->
					<?php
						$i = 1;
						while(have_posts()): the_post();
						
						$post_type = get_post_type(get_the_ID());
							
						$pid = get_the_ID();
						$catlist = get_the_category($pid);
						if($catlist){
							$pcatname = get_the_category_by_ID($catlist[0]->cat_ID);
							$pcatlink = get_category_link($catlist[0]->cat_ID);
						}
						$nr = "no-right-padding";
						$nl = "no-left-padding";
						if($i%2 == 0) {
							$nlnr = $nr;
						}else{
							$nlnr = $nl;
						}
						
						if($post_type == "video_type") {
							//echo $i;
							$vurlcode = get_post_meta(get_the_ID(), '_url_code_meta_key', true);
						
					?>
						<div class="col-md-6 <?php echo $nlnr; ?>">
							<div class="single-stories">
								<div class="two-stories-thumb">
									  <iframe class="embed-responsive-item" width="100%" height="218" src="https://www.youtube.com/embed/<?php echo $vurlcode; ?>"></iframe>
								</div>
								<a href="<?php the_permalink(); ?>"><h5><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></h5></a>
								<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
							</div>
						</div>
					<?php
						}else {
					?>
						<div class="col-md-6 <?php echo $nlnr; ?>">
							<div class="single-stories">
							<?php
								if(has_post_thumbnail()){
									
								$img_id		= get_post_thumbnail_id();
								$img_url 	= wp_get_attachment_image_src($img_id, 'category-gallery-image', true);
							?>	
								<div class="two-stories-thumb">
									<img src="<?php echo $img_url[0]; ?>" alt="" />
									<?php
									if($pcatlink && $pcatname){
									?>
									<div class="stories-category">
										<a href="<?php echo $pcatlink; ?>"><?php echo $pcatname; ?></a>
									</div>
									<?php
									}
									?>
								</div>
							<?php
								}
							?>
								<a href="<?php the_permalink(); ?>"><h5><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></h5></a>
								<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
							</div>
						</div>
					<?php
						}
						$i++;
						endwhile;
						wp_reset_postdata();
					?>
					<!-- Single Post -->
				</div>
			</div>
			<!-- Two Stories -->
		
			<!-- Pagination -->
			<div class="pagination">
				<?php 
					the_posts_pagination(array(
						'mid_size'          => 2,
						'type'				=> 'list',
						'prev_text' 		=> 'Prev',
						'next_text'			=> 'Next',
						'screen_reader_text'=> ' ',
					));
					
				?>
			</div>
			<!-- Pagination -->
		<?php
			else:
		?>
			<!-- Two Stories -->
			<div class="two-stories">
				<div class="row no-padding">
					<div class="col-md-12 no-padding">
						<div class="error">
							<div class="error-icon">
								<i class="fa fa-frown-o"></i>
							</div>
							<h1>No Results Found</h1>
							<h3>Sorry, but the requested resource was not found on this site.</h3>
						</div>
					</div>
				</div>
			</div>
		<?php
			endif;
		?>
	
	</div>
</article>