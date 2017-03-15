<?php
/*
	Plugin Name: Trucecleb Ad Widget
*/

add_action( 'widgets_init', 'side_ad_load_widget' );
function side_ad_load_widget() {
	register_widget('side_ad_widget');
}

class side_ad_widget extends WP_Widget {
	
	function side_ad_widget() {
		$widget_ops	= array( 'description' => __('Add widget display to show ads', 'trucecleb_lang') );
		
		$this->__construct( 'side_ad_widget', __('ATrucecleb: Ad Widget', 'trucecleb_lang'), $widget_ops );
	}
	
	function widget( $args, $instance ) {
		extract($args);
		
		$code = $instance['code'];
		
		echo $before_widget;
?>
		<!-- Adz -->
		<div class="simle-adz inner-padding">
			<div class="simle-adz-thumb">
			<?php
				echo html_entity_decode($code);
			?>
			</div>
		</div>
		<!-- Adz -->
<?php
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance) {
		$instance	= $old_instance;
		
		$instance['code'] = $new_instance['code'];
		
		return $instance;
	}
	
	function form( $instance ) {
		$defaults	= array( 'code' => 'Enter ad code here' );
		$instance	= wp_parse_args( (array) $instance, $defaults );
		
		$code = $instance['code'];
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'code' ); ?>">Ad Code: </label>
			<textarea name="<?php echo $this->get_field_name( 'code' ); ?>" id="<?php echo $this->get_field_id( 'code' ); ?>" rows="6" class="widefat"><?php echo $code; ?></textarea>
		</p>
<?php
	}
	
}