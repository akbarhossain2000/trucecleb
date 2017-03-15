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
							$vurlcode = get_post_meta(get_the_ID(), '_url_code_meta_key', true);
						?>
						<iframe class="embed-responsive-item" width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $vurlcode; ?>"></iframe>
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
							/* if ( comments_open() || get_comments_number() ) {
								comments_template();
							} */
						?>
						
					</div><!-- end of comments div -->
				</div>
				
			</div>
		</div>
	</article>