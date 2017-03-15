<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main-content">
		
		<!-- Main Title -->
		<div class="category-heading">
			<h4><?php echo single_cat_title('', false); ?></h4>
		</div>
		<!-- Main Title -->
		<?php
			$category 		= single_cat_title('', false);
			$catid			= get_cat_ID($category);
			$number			= 10;
			$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
			$args	= array(
				'post_type'		=> 'post',
				'cat'			=> $catid,
				'posts_per_page'=> $number,
				'paged'			=> $paged,
			);
			
		
			$data	= new WP_Query($args);
			
			if($data->have_posts()):
		?>
		
			<!-- Two Stories -->
			<div class="two-stories">
				<div class="row no-padding">
					<!-- Single Post -->
					<?php
						$i = 1;
						while($data->have_posts()): $data->the_post();
						
						$pid = get_the_ID();
						$catlist = get_the_category($pid);
						$pcatname = get_the_category_by_ID($catlist[0]->cat_ID);
						$pcatlink = get_category_link($catlist[0]->cat_ID);
						
						if($i%2 == 0) {
					?>
						<div class="col-md-6 no-right-padding">
							<div class="single-stories">
							<?php
								if(has_post_thumbnail()){
									
								$img_id		= get_post_thumbnail_id();
								$img_url 	= wp_get_attachment_image_src($img_id, 'category-gallery-image', true);
							?>	
								<div class="two-stories-thumb">
									<img src="<?php echo $img_url[0]; ?>" alt="" />
									<div class="stories-category">
										<a href="<?php echo $pcatlink; ?>"><?php echo $pcatname; ?></a>
									</div>
								</div>
							<?php
								}
							?>
								<a href="<?php the_permalink(); ?>"><h5><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></h5></a>
								<p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
							</div>
						</div>
						
					<?php
						}else {
					?>
						
						<div class="col-md-6 no-left-padding">
							<div class="single-stories">
							<?php
								if(has_post_thumbnail()){
									
								$img_id		= get_post_thumbnail_id();
								$img_url 	= wp_get_attachment_image_src($img_id, 'category-gallery-image', true);
							?>	
								<div class="two-stories-thumb">
									<img src="<?php echo $img_url[0]; ?>" alt="" />
									<div class="stories-category">
										<a href="<?php echo $pcatlink; ?>"><?php echo $pcatname; ?></a>
									</div>
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
			endif;
			wp_reset_postdata();
		?>
	
	</div>
</article>