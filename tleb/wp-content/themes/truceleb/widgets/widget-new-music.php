<?php
/**
*	Plugin Name: Trucecleb New Music
**/


add_action( 'widgets_init', 'trucec_new_music_load_widget' );
function trucec_new_music_load_widget() {
	register_widget( 'side_new_music_widget' );
}

class side_new_music_widget extends WP_Widget {
	
	function side_new_music_widget() {
		$widget_ops	= array( 'description' => __('A widget that dispaly to show new music.', 'trucecleb_lang') );
		
		$this->__construct( 'side_new_music_widget', __( 'ATrucecleb: New Music widget', 'trucecleb_lang' ), $widget_ops );
	}
	
	function widget( $args, $instance ) {
		extract($args);
		
		global $post;
		$title		= apply_filters( 'widget_title', $instance['title'] );
		$showlpost	= $instance['showlpost'];
		$number		= $instance['number'];
		
		echo $before_widget;
?>		
		
		<!-- Song of the day -->
		<div class="song-of-the-day">
			<div class="widget-heading">
			<?php 
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
			?>
			</div>
			<?php 
				if($showlpost) {
					
					$lvargs = array(
						'post_type'	=> 'video_type',
						'posts_per_page' => $number,
					);
					
					$lvdata		= new WP_Query($lvargs);
					
					if($lvdata->have_posts()):
					
					while($lvdata->have_posts()): $lvdata->the_post();
					
					$vurlcode 	= get_post_meta( get_the_ID(), '_url_code_meta_key', true);
			?>
					<div class="day-song-image">
						<iframe width="100%" height="195" src="https://www.youtube.com/embed/<?php echo $vurlcode; ?>" frameborder="0" allowfullscreen></iframe>
						<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					</div>
			
			<?php
					endwhile;
					endif;
					wp_reset_postdata();
				}
			?>
			
		</div>
		<!-- Song of the day -->

<?php	
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance	= $old_instance;
		
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['showlpost']	= strip_tags( $new_instance['showlpost'] );
		$instance['number']		= strip_tags( $new_instance['number'] );
		
		return $instance;
	}
	
	function form($instance) {
		$defaults	= array( 'title' => 'Title', 'showlpost' => 'on', 'number' => 1 );
		
		$instance	= wp_parse_args( (array) $instance, $defaults );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('showlpost'); ?>">Show latest video on posts</label>
			<input type="checkbox" id="<?php echo $this->get_field_id('showlpost'); ?>" name="<?php echo $this->get_field_name('showlpost'); ?>" <?php checked( (bool) $instance['showlpost'], true) ?>/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to show: </label>
			<input type="text" name="<?php echo $this->get_field_name( 'number' ); ?>" id="<?php echo $this->get_field_id( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>
		
		
		
<?php
	}
	
}