<?php
/**
*	Plugin Name: Trucecleb Gallery Slide
**/

add_action( 'widgets_init', 'trucec_side_gallery_load_widget' );
function trucec_side_gallery_load_widget() {
	register_widget( 'trucec_side_gallery_widget' );
}

class trucec_side_gallery_widget extends WP_Widget {
	
	function trucec_side_gallery_widget() {
		$widget_ops	= array( 'description' => __('Add widget display to show custom post types slider gallery!', 'trucecleb_lang') );
		
		$this->__construct( 'trucec_side_gallery_widget', __('ATrucecleb: CPT Gallery Slider', 'trucecleb_lang'), $widget_ops );
	}
	
	function widget($args, $instance) {
		extract( $args );
		
		global $post;
		$title	= apply_filters( 'widget_title', $instance['title']);
		$cpt	= $instance['custom_type'];
		$number	= $instance['number'];
		
		echo $before_widget;
		
?>
			<!-- Dialy Photos -->
			<div class="daily-photos inner-padding">
				<div class="heat-tracer-info">
					<h4><?php echo $title; ?></h4>
				</div>
			<?php
			if($cpt != 'all') {
			
				$cpt_args = array(
					'post_type'		=> $cpt,
					'posts_per_page'=> $number,
				);
				
				$cpt_data	= new WP_Query($cpt_args);
			
				if($cpt_data->have_posts()):
			?>
				<div class="daily-photos-slider">
					<div id="fawesome-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
						<?php 
							while($cpt_data->have_posts()): $cpt_data->the_post();
						?>
							<div class="item <?php if($cpt_data->current_post == 0) { ?> active <?php } ?>">
							<?php 
								if(has_post_thumbnail()) {
								
								$cpt_img_id	= get_post_thumbnail_id();
								$cpt_img_url= wp_get_attachment_image_src( $cpt_img_id, 'category-gallery-image', true);
							?>
								<img src="<?php echo $cpt_img_url[0]; ?>" alt="" />
							<?php
								}
							?>
								<div class="daily-photos-caption">
									<h5><?php the_title(); ?></h5>
									<p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
								</div>
							</div>
						<?php 
							endwhile;
						?>
						</div>
					 
						<a class="left slider-left-btn" href="#fawesome-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="right slider-right-btn" href="#fawesome-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			<?php 
				endif;
				wp_reset_postdata();
			}
			?>
				
			</div>
			<!-- Dialy Photos -->
			
<?php
		echo $after_widget;
		/*--- Line ---*/
		echo '<div class="line"></div>';
		/*--- Line ---*/
	}
	
	function update( $new_instance, $old_instance ) {
		$instance	= $old_instance;
		
		$instance['title']	= strip_tags( $new_instance['title'] );
		$instance['custom_type']	= strip_tags( $new_instance['custom_type'] );
		$instance['number']	= strip_tags( $new_instance['number'] );
		
		return $instance;
	}
	
	function form($instance) {
		$defaults	= array( 'title' => 'Title', 'number' => 5 );
		
		$instance = wp_parse_args( (array) $instance, $defaults );
?>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'custom_type' ); ?>">Select Custom post types: </label>
			<select name="<?php echo $this->get_field_name( 'custom_type' ); ?>" id="<?php echo $this->get_field_id( 'custom_type' ); ?>" class="widefat gscustom_post">
			
				<option value="all" <?php if( 'all' == $instance['custom_type']) echo 'selected="selected"'; ?>>Select Custom Type</option>
				<?php 
					$custom_type = get_post_types( array('_builtin' => false), 'objects');
					foreach( $custom_type as $cpt) {
				?>
					<option value="<?php echo $cpt->name; ?>" <?php if( $cpt->name == $instance['custom_type']) echo 'selected="selected"'; ?>><?php echo $cpt->label; ?></option>
				
				<?php
					}
				?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to show</label>
			<input type="text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>
	
<?php
	}
	
}
