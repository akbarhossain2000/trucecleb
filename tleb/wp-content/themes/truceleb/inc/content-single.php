<?php

?>	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="one-stories">
			<div class="row no-padding">
				<div class="col-md-12 col-xs-12 no-padding">
					<!-- Single Post -->
					<div class="single-stories single-stories-big">
						<div class="two-stories-thumb">
						<?php
							
							
							if(has_post_thumbnail()){
								
								$simg_id	= get_post_thumbnail_id();
								$simg_url	= wp_get_attachment_image_src($simg_id, 'full', true);
						?>
								<img src="<?php echo $simg_url[0]; ?>" alt="" />
						<?php
							}else {
						?>
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/article.jpg" alt="" />
						<?php 
							}
						?>
						</div>
						
						<div class="article-inner">
							<h3><?php the_title(); ?></h3>
						
							<div class="article-info">
								<span class="post-date"><?php the_time('F j, Y'); ?></span> <span class="post-author">by <a href=""><?php the_author(); ?></a></span>
							</div>
							
							<p><?php the_content(); ?></p>
							
						</div>
						
						<div class="article-share">
							<ul>
								<li><a href="">Share Post:</a></li>
								<li><a href=""><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/facebook.png" alt="" /></a></li>
								<li><a href=""><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/twitter.png" alt="" /></a></li>
								<li><a href=""><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/pintrest.png" alt="" /></a></li>
								<li><a href=""><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/google.png" alt="" /></a></li>
								<li><a href=""><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/linkedin.png" alt="" /></a></li>
							</ul>
						</div>
						
					</div>
					<!-- Single Post -->
					
					<!-- end of comments div -->
					<div class="comments">

						<!-- You can start editing here. -->
						<!-- If comments are open, but there are no comments. -->
						<?php
							if(is_single()){
								if ( comments_open() || get_comments_number() ) {
								comments_template();
								}
							}
						?>
						
					</div><!-- end of comments div -->
				</div>
				
			</div>
		</div>
	</article>