<?php
/**
*	Plugin Name: Trucecleb Song of the day
**/


add_action( 'widgets_init', 'trucec_side_song_of_load_widget' );
function trucec_side_song_of_load_widget() {
	register_widget( 'side_song_of_widget' );
}

class side_song_of_widget extends WP_Widget {
	
	function side_song_of_widget() {
		$widget_ops	= array( 'description' => __('A widget that dispaly to show song of the day.', 'trucecleb_lang') );
		
		$this->__construct( 'side_song_of_widget', __( 'ATrucecleb: Song of the day widget', 'trucecleb_lang' ), $widget_ops );
	}
	
	function widget( $args, $instance ) {
		extract($args);
		
		$title		= apply_filters( 'widget_title', $instance['title'] );
		$urlcode	= $instance['urlcode'];
		$description= $instance['description'];
		
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
					if($urlcode) {
						
				?>
						<div class="day-song-image">
							<iframe width="100%" height="195" src="https://www.youtube.com/embed/<?php echo $urlcode; ?>" frameborder="0" allowfullscreen></iframe>
							<p><?php echo $description; ?></p>
						</div>
				
				<?php
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
		$instance['urlcode']	= strip_tags( $new_instance['urlcode'] );
		$instance['description']= strip_tags( $new_instance['description'] );
		
		return $instance;
	}
	
	function form($instance) {
		$defaults	= array( 'title' => 'Title' );
		
		$instance	= wp_parse_args( (array) $instance, $defaults );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'urlcode' ); ?>">Add Video url code: </label>
			<input type="text" name="<?php echo $this->get_field_name( 'urlcode' ); ?>" id="<?php echo $this->get_field_id( 'urlcode' ); ?>" value="<?php echo $instance['urlcode']; ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">Description: </label>
			<textarea name="<?php echo $this->get_field_name( 'description' ); ?>" id="<?php echo $this->get_field_id( 'description' ); ?>" rows="6" class="widefat" ><?php echo $instance['description']; ?></textarea>
			
		</p>
		
		
		
<?php
	}
	
}