<?php
	$rp_id		= get_the_ID();
	$rp_cats	= get_the_category($p_id);
	$rp_args	= array(
		'cat'			=> $rp_cats[0]->cat_ID,
		'posts_per_page'=> 6,
		'order'			=> 'DESC',
	);
	
	$rp_data	= new WP_Query($rp_args);
	
	if($rp_data->have_posts()):
?>

<!-- Interesting Stories --->
	<div class="interesting-stories">
		<div class="interesting-title">
			<h3>interesting articles</h3>
			<div class="line"></div>
		</div>
		
		<!-- Three Stories -->
		<div class="three-stories">
			<div class="row no-padding">
				
				<!-- Single Post -->
				<?php
					$i = 1;
					$nlpadding = 'no-left-padding';
					$nrpadding = 'no-right-padding';
					$lrpadding = 'left-right-padding';
					
					while($rp_data->have_posts()): $rp_data->the_post();
					
					$pr_id 	= get_the_ID();
					$pr_cat = get_the_category($pr_id);
					
					if($i%3 == 0){
						$nlr = $nrpadding;
					}else{
						$j = $i + 1;
						if($j%3 == 0) {
							$nlr = $lrpadding;
						}else {
							$nlr = $nlpadding;
						}
					}
					
				?>
					<div class="col-md-4 <?php echo $nlr; ?>">
						<div class="single-stories">
							<div class="two-stories-thumb">
							<?php 
								if(has_post_thumbnail()){
								
								$rp_img_id		= get_post_thumbnail_id();
								$rp_img_url		= wp_get_attachment_image_src($rp_img_id, 'single-interesting', true);
							?>	
								<img src="<?php echo $rp_img_url[0]; ?>" alt="" />
							<?php 
								}
							?>
							<div class="stories-category">
								<a href="<?php echo get_category_link($pr_cat[0]->cat_ID); ?>"><?php echo get_the_category_by_ID($pr_cat[0]->cat_ID); ?></a>
							</div>
						</div>
						
						<a href="<?php the_permalink(); ?>">
							<h5><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></h5>
						</a>
						<p>
						<?php
							echo wp_trim_words(get_the_excerpt(), 15, '...');
						?>
						</p>
						</div>
					</div>
			<?php
				$i++;
				endwhile;
			?>
				<!-- Single Post -->
			</div>
		</div>
		<!-- Three Stories -->
		
	</div>
<!-- Interesting Stories --->
<?php
	endif;
	wp_reset_postdata();