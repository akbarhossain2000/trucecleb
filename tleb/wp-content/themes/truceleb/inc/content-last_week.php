<?php
 global	$trucecleb_set;
 $prefix	= "trucec_";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main-content">
		
		<!-- Main Title -->
		<div class="category-heading">
		<?php
			$title	= $trucecleb_set[$prefix.'lptitle'];
			
			echo '<h4>'.$title.'</h4>';
		?>
		</div>
		<!-- Main Title -->
		<?php
			$number		= 10;
			$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
			$args	= array(
				'post_type'		=> 'post',
				'post_status'	=> 'publish',
				'cat'			=> '-1',
				'orderby'		=> 'date',
				'order'			=> 'DESC',
				
				'date_query' => array(
					array(
						'after' => '1 week ago'
					)
				),
				
				'posts_per_page'=> $number,
				'paged'			=> $paged,
			);
			
		
			$data	= new WP_Query($args);
			
			//print_r($data);
			
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
		
			<!-- Pagination div -->
			<?php
				require_once(__DIR__.'/../paginate.php');
				if (function_exists(custom_pagination)) {
					custom_pagination($data->max_num_pages,"",$paged);
				}
			?><!-- End Pagination -->
		<?php
			endif;
			wp_reset_postdata();
		?>
	
	</div>
</article>