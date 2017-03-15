<?php
/**
*	Plugin Name: Custom Meta box for video
**/

abstract class WPVideo_meta_box {
	
	
	public static function wpvideo_add_meta_box() {
		
		add_meta_box(
			'video_meta_id',
			__( 'Add video url code', 'trucecleb_lang' ),
			['self::wpvideo_html'],
			'video_type',
			'normal',
			'high'
		);
	}
	
	public static function wpvideo_save($post_id) {
		
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'wpvideo_nonce' ] ) && wp_verify_nonce( $_POST[ 'wpvideo_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
	 
		// Exits script depending on save status
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
		}
	 
		// Checks for input and sanitizes/saves if needed
		if(array_key_exists('meta_text', $_POST)) {
			update_post_meta( $post_id, '_url_code_meta_key', sanitize_text_field( $_POST[ 'meta_text' ] ) );
		}
		
	}
	
	public static function wpvideo_html($post) {
		wp_nonce_field( basename(__FILE__), 'wpvideo_nonce' );
		$wpvideo_stored_meta = get_post_meta($post->ID, '_url_code_meta_key', true);
?>
		<p>
			<label for="meta_text"><?php _e('Type Video url code: ', 'trucecleb_lang'); ?></label><br />
			<input type="text" name="meta_text" id="meta_text" value="<?php echo esc_attr($wpvideo_stored_meta); ?>" class="regular-text" placeholder="<?php esc_html_e('Code add here!', 'trucecleb_lang'); ?>" />
		</p>
		
<?php
	}
	
	
	
}
add_action('add_meta_boxes', ['WPVideo_meta_box', 'wpvideo_add_meta_box']);
add_action('save_post', ['WPVideo_meta_box', 'wpvideo_save']);
