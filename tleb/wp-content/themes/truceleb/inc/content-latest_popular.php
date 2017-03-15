<?php
 global	$trucecleb_set;
 $prefix	= "trucec_";
?>

	<div class="latest">
		<div class="heading-title">
		<?php
			$title	= $trucecleb_set[$prefix.'lptitle'];
			if (strpos($title, '/') !== false) {
				$separator	= explode('/', $title);
				echo '<h2>';
				for($i=0; $i<sizeof($separator); $i++){
					if($i == 0){
						echo $separator[$i].'/';
					}
					else{
						if($i==1){
							echo '<span>'.$separator[$i].'</span>';
						}else{
							echo '<span>/'.$separator[$i].'</span>';
						}
					}
				}
				echo '</h2>';
			}else if(strpos($title, ' ') !== false){
				$separator	= explode(' ', $title);
				echo '<h2>';
				for($j=0; $j<sizeof($separator); $j++){
					if($j == 0){
						echo $separator[$j].'/';
					}else{
						if($j==1){
							echo '<span>'.$separator[$j].'</span>';
						}else{
							echo '<span>/'.$separator[$j].'</span>';
						}
					}
				}
				echo '</h2>';
			}else{
				echo '<h2>'.$title.' <span>News</span></h2>';
			}
		?>
		</div>
		
		<!-- Latest -->
		<div class="latest-entry">
		<?php
			$args	= array(
				'post_type'		=> 'post',
				'cat'			=> '-1',
				'posts_per_page'=> 4,
			);
			
			$lp_data	=  new WP_Query($args);
			
			if($lp_data->have_posts()):
			
			while($lp_data->have_posts()): $lp_data->the_post();
			
			$lp_img_id		= get_post_thumbnail_id();
			$lp_img_url		= wp_get_attachment_image_src($lp_img_id, 'lp-post-image', true);
			
			$id		= get_the_ID();
			$category	= get_the_category($id);
			$cat_id		= $category[0]->cat_ID;
		?>
			<!-- Single Entry -->
			<div class="single-entry">
				<div class="entry-image">
					<img src="<?php echo $lp_img_url[0] ?>" alt="" />
					<div class="latest-category">
						<a href="<?php echo get_category_link($cat_id); ?>"><?php echo get_the_category_by_ID($cat_id); ?></a>
					</div>
				</div>
				
				<div class="entry-info">
					<a href="<?php the_permalink(); ?>"><h4><?php the_title();  ?></h4></a>
					<p><?php echo wp_trim_words(get_the_excerpt(), 15, ' ...'); ?></p>
				</div>
		
				
			</div>
			<!-- Single Entry -->
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
			<div class="more-stories">
				<a href="<?php echo get_permalink($trucecleb_set[$prefix.'mbtpage']); ?>" class="btn btn-more-stories"><?php echo $trucecleb_set[$prefix.'mbttext']; ?></a>
			</div>
			
		</div>
		<!-- Latest -->
		
		
	</div>