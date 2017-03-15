<?php
/*
	Plugin Name: Featured Catlist Widget
*/

add_action('widgets_init', 'featured_catlist_load_widget');
function featured_catlist_load_widget() {
	register_widget( 'featured_catlist_widget' );
}

class featured_catlist_widget extends WP_Widget {
	
	function featured_catlist_widget(){
		
		$widget_ops		= array( 'description' => __('A widget that displays a list of Featured posts from a category of your choice.', 'trucecleb_lang') );
		
		$this->__construct('featured_catlist_widget', __('ATrucecleb: Featured Catlist Widget', 'trucecleb_lang'), $widget_ops);
	}
	
	function widget($args, $instance){
		extract( $args );

		/* Our variables from the widget settings. */
		global $post;
		$opt_title	= 'posts';
		$title = apply_filters('widget_title', $instance['title'] );
		$feature_cat = $instance['feature_cat'];
		$showcat = $instance['showcat'];
		$number = $instance['number'];
	
	/* Before widget (defined by themes). */
	echo $before_widget;
		if($instance['feature_cat'] !== "all"){
			$separator	= explode("_", $instance['feature_cat']);
			$feature_cat	= $separator[0];
			
	?>
			<?php
				$fp_args	= array(
					'post_type'		=> 'post',
					'cat'			=> $feature_cat,
					'posts_per_page'=> $number,
				);
				
				$fp_data	= new WP_Query($fp_args);
				if($fp_data->have_posts()):
				
				
			?>
				<!-- Featured Posts -->
				<div class="featured-posts">
					<div class="popular-title">
				<?php 
					if($title){
					
						if(strpos($title, ' ') == true){
							echo '<h3>'.$title.'</h3>';
						}else{
				?>
							<h3><?php echo $title.' '.$opt_title; ?></h3>
				<?php 
						}
					}
				?>
					</div>
					<div class="line"></div>
			
					<div class="truceleb-news-all">
					<!-- Single News -->
					<?php
						while($fp_data->have_posts()): $fp_data->the_post();
					?>
						<div class="truceleb-news-single">
							<div class="news-thumb">
								<?php
									if(has_post_thumbnail()){
									
									$fp_img_id		= get_post_thumbnail_id();
									$fp_img_url		= wp_get_attachment_image_src($fp_img_id, 'small-thumbnail', true);
								?>
									<img src="<?php echo $fp_img_url[0]; ?>" alt="" />
								<?php 
									}
								?>
							</div>
							
							<div class="trueceleb-news-text">
								<p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a></p>
							</div>
							
						</div>
					<?php
						endwhile;
					?>
					<!-- Single News -->
					</div>
				</div><!-- Featured Posts -->
			<?php
				endif;
				wp_reset_postdata();
			?>
	<?php
		}else{
	?>
			<?php
				$fp_args	= array(
					'post_type'		=> 'post',
					'cat'			=> $feature_cat,
					'posts_per_page'=> $number,
				);
				
				$fp_data	= new WP_Query($fp_args);
				if($fp_data->have_posts()):
			?>
				<!-- Featured Posts -->
				<div class="featured-posts">
					<div class="popular-title">
					<?php 
						if($title){
						
							if(strpos($title, ' ') == true){
								
								echo '<h3>'.$title.'</h3>';
								
							}else{
					?>
								<h4><?php echo $title.' '.$opt_title; ?></h4>
					<?php 
							}
						}
					?>
					</div>
					<div class="line"></div>
				
					<div class="truceleb-news-all">
					<?php
						while($fp_data->have_posts()): $fp_data->the_post();
					?>
						<!-- Single News -->
						<div class="truceleb-news-single">
							<div class="news-thumb">
								<?php
									if(has_post_thumbnail()){
									
									$fp_img_id		= get_post_thumbnail_id();
									$fp_img_url		= wp_get_attachment_image_src($fp_img_id, 'small-thumbnail', true);
								?>
									<img src="<?php echo $fp_img_url[0]; ?>" alt="" />
								<?php 
									}
								?>
							</div>
							
							<div class="trueceleb-news-text">
								<p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a></p>
							</div>
							
						</div>
					<?php
						endwhile;
					?>
					<!-- Single News -->
					</div>
				</div><!-- Featured Posts -->
			<?php
				endif;
				wp_reset_postdata();
			?>
	
	<?php
		}
	/* After widget (defined by themes). */
	echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ){
			
		$instance = $old_instance;
	
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['feature_cat'] = strip_tags( $new_instance['feature_cat'] );
		$instance['showcat'] = strip_tags( $new_instance['showcat'] );
		$instance['number']	 = strip_tags( $new_instance['number'] );
		
		return $instance;
		
	}
	
	function form($instance){
		$defaults = array('title' => 'Title', 'showcat' => 'on', 'number' => 5);
		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title </label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat fcattitle" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('feature_cat'); ?>">Select Category </label>
			<input type="hidden" name="dprev" class="dprev" value="all" />
			<select name="<?php echo $this->get_field_name('feature_cat'); ?>" id="<?php echo $this->get_field_id('feature_cat'); ?>" class="widefat featcategory">
				<option value="all" <?php if( 'all' == $instance['feature_cat']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php 
					$feature_cat = get_categories('hide_empty=0&depth=1&type=post');
					$i = 0;
					foreach($feature_cat as $category){
				?>
					<option value="<?php echo $category->term_id .'_'.$category->name; ?>" <?php if($category->term_id .'_'.$category->name == $instance['feature_cat']) echo 'selected="selected"'; ?>><?php echo $category->name; ?></option>
				<?php
					$i++;
					}
				?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('showcat'); ?>">Show categories on posts</label>
			<input type="checkbox" id="<?php echo $this->get_field_id('showcat'); ?>" name="<?php echo $this->get_field_name('showcat'); ?>" <?php checked( (bool) $instance['showcat'], true) ?>/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of posts to display: </label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>
		
	<?php
	}
	
}
