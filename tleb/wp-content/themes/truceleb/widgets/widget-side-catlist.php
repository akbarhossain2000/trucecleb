<?php
/*
	Plugin Name: Side Catlist Widget
*/

add_action('widgets_init', 'trucec_catlist_load_widget');
function trucec_catlist_load_widget() {
	register_widget( 'trucec_catlist_widget' );
}

class trucec_catlist_widget extends WP_Widget {
	
	function trucec_catlist_widget(){
		
		$widget_ops		= array( 'description' => __('A widget that displays a list of posts from a category of your choice.', 'trucecleb_lang') );
		
		$this->__construct('trucec_catlist_widget', __('ATrucecleb: Left Catlist Widget', 'trucecleb_lang'), $widget_ops);
	}
	
	function widget($args, $instance){
		extract( $args );

		/* Our variables from the widget settings. */
		global $post;
		$theme	= wp_get_theme();
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$showcat = $instance['showcat'];
		$number = $instance['number'];
	
	/* Before widget (defined by themes). */
	echo $before_widget;
		if($instance['categories'] !== "all"){
			$separator	= explode("_", $instance['categories']);
			$categories	= $separator[0];
			
	?>
			<?php
				$lt_args	= array(
					'post_type'		=> 'post',
					'cat'			=> $categories,
					'posts_per_page'=> $number,
				);
				
				$lt_data	= new WP_Query($lt_args);
				
				if($lt_data->have_posts()):
				
				
			?>
				<div class="widget-heading">
				<?php 
					if($title){
					
						if(strpos($title, ' ') == true){
							
							$sep_title 	= explode(' ', $title);
							echo '<h4>';
							for($t=0; $t<sizeof($sep_title); $t++){
								if($t == 0){
									echo $sep_title[$t];
								}else {
									echo '<span>'.' '.$sep_title[$t].'</span>';
								}
							}
							echo '</h4>';
						}else{
				?>
							<h4><?php echo $theme->get( 'Name' ); ?> <span><?php echo $title; ?></span></h4>
				<?php 
						}
					}
				?>
				</div>
			
				<div class="truceleb-news-all">
				<?php
					while($lt_data->have_posts()): $lt_data->the_post();
				?>
					<!-- Single News -->
					<div class="truceleb-news-single">
						<div class="news-thumb">
							<?php
								if(has_post_thumbnail()){
								
								$lt_img_id		= get_post_thumbnail_id();
								$lt_img_url		= wp_get_attachment_image_src($lt_img_id, 'small-thumbnail', true);
							?>
								<img src="<?php echo $lt_img_url[0]; ?>" alt="" />
							<?php 
								}
							?>
						</div>
						
						<div class="trueceleb-news-text">
							<p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a></p>
						</div>
						
					</div>
					<!-- Single News -->
				<?php
					endwhile;
				?>
				</div>
			<?php
				endif;
				wp_reset_postdata();
			?>
	<?php
		}else{
	?>
			<?php
				$lt_args	= array(
					'post_type'		=> 'post',
					'cat'			=> $categories,
					'posts_per_page'=> $number,
				);
				
				$lt_data	= new WP_Query($lt_args);
				
				if($lt_data->have_posts()):
			?>
				<div class="widget-heading">
				<?php 
					if($title){
					
						if(strpos($title, ' ') == true){
							
							$sep_title 	= explode(' ', $title);
							echo '<h4>';
							for($t=0; $t<sizeof($sep_title); $t++){
								if($t == 0){
									echo $sep_title[$t];
								}else {
									echo '<span>'.' '.$sep_title[$t].'</span>';
								}
							}
							echo '</h4>';
						}else{
				?>
							<h4><?php echo $theme->get( 'Name' ); ?> <span><?php echo $title; ?></span></h4>
				<?php 
						}
					}
				?>
				</div>
			
				<div class="truceleb-news-all">
				<?php
					while($lt_data->have_posts()): $lt_data->the_post();
				?>
					<!-- Single News -->
					<div class="truceleb-news-single">
						<div class="news-thumb">
							<?php
								if(has_post_thumbnail()){
								
								$lt_img_id		= get_post_thumbnail_id();
								$lt_img_url		= wp_get_attachment_image_src($lt_img_id, 'small-thumbnail', true);
							?>
								<img src="<?php echo $lt_img_url[0]; ?>" alt="" />
							<?php 
								}
							?>
						</div>
						
						<div class="trueceleb-news-text">
							<p><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a></p>
						</div>
						
					</div>
					<!-- Single News -->
				<?php
					endwhile;
				?>
				</div>
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
		$instance['categories'] = strip_tags( $new_instance['categories'] );
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
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat cattitle" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Select Category </label>
			<input type="hidden" name="prevd" class="prevd" value="all" />
			<select name="<?php echo $this->get_field_name('categories'); ?>" id="<?php echo $this->get_field_id('categories'); ?>" class="widefat sidecategory">
				<option value="all" <?php if( 'all' == $instance['categories']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php 
					$categories = get_categories('hide_empty=0&depth=1&type=post');
					$i = 0;
					foreach($categories as $category){
				?>
					<option value="<?php echo $category->term_id .'_'.$category->name; ?>" <?php if($category->term_id .'_'.$category->name == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->name; ?></option>
				<?php
					$i++;
					}
				?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('showcat'); ?>">Show Categories on posts</label>
			<input type="checkbox" id="<?php echo $this->get_field_id('showcat'); ?>" name="<?php echo $this->get_field_name('showcat'); ?>" <?php checked( (bool) $instance['showcat'], true) ?>/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of posts to display: </label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>
		
	<?php
	}
	
}

add_action('admin_enqueue_scripts', 'trucec_load_script');
function trucec_load_script(){

wp_register_script('main-script', get_template_directory_uri().'/widgets/js/main-script.js');
wp_enqueue_script('main-script');
}

