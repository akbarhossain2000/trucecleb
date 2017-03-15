<?php
/*
	Plugin Name: Popular Widget
*/

add_action('widgets_init', 'side_popular_load_widget');
function side_popular_load_widget() {
		register_widget('side_popular_widget');
}

class side_popular_widget extends WP_Widget {

	function side_popular_widget() {
		$widget_ops	= array('description' => __('Add widget show to display popular posts', 'trucecleb_lang'));
		
		$this->__construct('side_popular_widget', __('ATrucecleb: Popular Posts Widget', 'trucecleb_lang'), $widget_ops);
	}
	
	function widget( $args, $instance ) {
		extract($args);
		
		global $post;
		$title		= apply_filters( 'widget_title', $instance['title'] );
		$showcat	= $instance['showcat'];
		$number		= $instance['number'];
		
		
		echo $before_widget;		
		
?>
		<!-- Popular Article -->
			<div class="popurlar-article">
				<div class="popular-title">
				<?php
					if($title){
						echo '<h3>'.$title.'</h3>';
					}
				?>
					<div class="line"></div>
				</div>
				
			<!-- Single Post -->
			<?php
				$pp_args	= array(
					'meta_key'		=> '_wpb_post_views_count',
					'orderby'		=> 'meta_value_num',
					'order'			=> 'DESC',
					'posts_per_page'=> $number,
				);
				
				$pp_data	= new WP_Query($pp_args);
				
				if($pp_data->have_posts()):
				
				while($pp_data->have_posts()): $pp_data->the_post();
			?>
				<div class="single-stories">
					<div class="two-stories-thumb">
						<?php
							if(has_post_thumbnail()){
								$ppimg_id	= get_post_thumbnail_id();
								$ppimg_url	= wp_get_attachment_image_src($ppimg_id, 'single-popular', true);
								echo '<img src="'.$ppimg_url[0].'" alt="" />';
							}
						?>
						
						<?php
							if($showcat) {
								$pp_id 	= get_the_ID();
								$pp_cat	= get_the_category($pp_id);
								$pp_cat_name = get_the_category_by_ID($pp_cat[0]->cat_ID);
								$pp_cat_link = get_category_link($pp_cat[0]->cat_ID);
						?>
								<div class="stories-category">
									<a href="<?php echo $pp_cat_link; ?>"><?php echo $pp_cat_name; ?></a>
								</div>
						<?php
							}
						?>
					</div>
					<a href="<?php the_permalink(); ?>">
						<h5><?php the_title(); ?></h5>
					</a>
				</div>
			<?php
				endwhile;
				endif;
				wp_reset_postdata();
			?>
			<!-- Single Post -->
				

				
			</div>
		<!-- Popular Article -->
<?php
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		
		$instance	= $old_instance;
		
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['showcat']	= strip_tags( $new_instance['showcat'] );
		$instance['number']		= strip_tags( $new_instance['number'] );
		
		return $instance;
	}
	
	function form( $instance ) {
		$defaults	= array('title' => 'Popular Article', 'showcat' => 'on', 'number' => 4);
		$instance	= wp_parse_args( (array) $instance, $defaults );
		
		$title		= $instance['title'];
		$showcat	= $instance['showcat'];
		$number		= $instance['number'];
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('showcat'); ?>">Show categories on posts</label>
			<input type="checkbox" id="<?php echo $this->get_field_id('showcat'); ?>" name="<?php echo $this->get_field_name('showcat'); ?>" <?php checked( (bool) $showcat, true) ?> />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of posts to show: </label>
			<input type="text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $number; ?>" size="3" />
		</p>
<?php
	}

}