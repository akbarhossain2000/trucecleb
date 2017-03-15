<?php
/**
*	Plugin Name: Trucecleb Custom post list
**/

add_action( 'widgets_init', 'trucec_side_cptlist_load_widget' );
function trucec_side_cptlist_load_widget() {
	register_widget( 'trucec_side_cptlist_widget' );
}

class trucec_side_cptlist_widget extends WP_Widget {
	
	function trucec_side_cptlist_widget() {
		$widget_ops	= array( 'description' => __('A widget that displays a list of posts from a custom post type of your choice.', 'trucecleb_lang') );
		
		$this->__construct( 'trucec_side_cptlist_widget', __('ATrucecleb: CPT List widget', 'trucecleb_lang'), $widget_ops );
	}
	
	
	function widget( $args, $instance ) {
		extract( $args );
		
		global $post;
		$title	= apply_filters( 'widget_title', $instance['title'] );
		$cpt	= $instance['custom_type'];
		$number	= $instance['number'];
		
		echo $before_widget;
?>
		<!-- Contest -->
		<div class="contest <?php if($cpt != 'our_playlist'){ ?>inner-padding<?php } ?>">
			<div class="heat-tracer-info">
			<?php
				if($cpt == 'our_playlist'){
					if(strpos($title, ' ') == true) {
						$separator	= explode(' ', $title);
						echo '<h4>';
						for($i=0; $i<sizeof($separator); $i++){
							if($i == 0){
								echo $separator[$i];
							}else{
								echo '<span>'.' '.$separator[$i].'</span>';
							}
						}
						echo '</h4>';
					}else{
						echo '<h4>'.$title.'</h4>';
					}
				}else{
					echo '<h4>'.$title.'</h4>';
				}
			?>
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
			
				<div class="truceleb-news-all">
				<!-- Single News -->
				<?php
					while($cpt_data->have_posts()): $cpt_data->the_post();
					
					
				?>
					<div class="truceleb-news-single">
					<?php
						if(has_post_thumbnail()) {
						
						$cpt_img_id	= get_post_thumbnail_id();
						$cpt_img_url= wp_get_attachment_image_src( $cpt_img_id, 'small-thumbnail', true );
					?>
						<div class="news-thumb">
							<img src="<?php echo $cpt_img_url[0]; ?>" alt="" />
						</div>
					<?php
						}
					?>
						
						<div class="trueceleb-news-text">
							<a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
							<p><?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?></p>
						</div>
						
					</div>
				<?php
					endwhile;
				?>
				<!-- Single News -->									
				</div>
				
		<?php
				endif;
				wp_reset_postdata();
			}
		?>
		</div>
		<!-- Contest -->
<?php
		echo $after_widget;
	}
	
	
	function update( $new_instance, $old_instance ) {
		$instance	= $old_instance;
		
		$instance['title']	= strip_tags( $new_instance['title'] );
		$instance['custom_type']	= strip_tags( $new_instance['custom_type'] );
		$instance['number']	= strip_tags( $new_instance['number'] );
		
		return $instance;
	}
	
	function form( $instance ) {
		$defaults	= array( 'title' => 'Title', 'number' => 1 );
		
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