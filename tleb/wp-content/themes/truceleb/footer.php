<?php

global $trucecleb_set;
$prefix	= 'trucec_';
?>		
		<!-- Footer -->
		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="footer-adz">
						<?php
							echo $trucecleb_set[$prefix.'footer_ads'];
						?>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="footer-all">
							<!-- Footer Single Widget -->
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="<?php bloginfo( 'home' ); ?>"><img src="<?php echo $trucecleb_set[$prefix.'flogo']['url']; ?>" alt="" /></a>
								</div>
								<div class="search">
									<form action="<?php echo esc_url( home_url('/') ); ?>" id="searchform" method="get" role="search" >
										<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
										<div class="form-group">
											<div class="icon-addon addon-lg">
												<input type="text" placeholder="" class="form-control my-form-input" name="s" id="<?php echo $unique_id; ?>" value="<?php echo get_search_query(); ?>">
												<label for="search" class="glyphicon glyphicon-search" rel="tooltip" title="search"></label>
											</div>
										</div>
									</form>
								</div>
								<div class="footer-social">
									<ul>
										<li><a href="<?php echo $trucecleb_set[$prefix.'social_link']['1']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?php echo $trucecleb_set[$prefix.'social_link']['2']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="<?php echo $trucecleb_set[$prefix.'social_link']['3']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="<?php echo $trucecleb_set[$prefix.'social_link']['4']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
									</ul>
								</div>
							</div>
							<!-- Footer Single Widget -->
							
							<!-- Footer Single Widget -->
							<div class="single-footer-widget">
								<div class="footer-icon">
									<i class="fa fa-headphones"></i>
								</div>
								<h4>Music</h4>
								<ul>
									<li><a href="#">Music Videos</a></li>
									<li><a href="#">Song Of the day</a></li>
									<li><a href="#">Paylists</a></li>
									<li><a href="#">New Music</a></li>
									<li><a href="#">Live Performance</a></li>
									<li><a href="#">Artist A-Z</a></li>
								</ul>
								<a href="" class="all">All Music <i class="fa fa-angle-double-right"></i></a>
							</div>
							<!-- Footer Single Widget -->
							
							<!-- Footer Single Widget -->
							<div class="single-footer-widget">
								<div class="footer-icon">
									<i class="fa fa-tv "></i>
								</div>
								<h4>Shows</h4>
								<ul>
									<li><a href="#">Music Videos</a></li>
									<li><a href="#">Song Of the day</a></li>
									<li><a href="#">Paylists</a></li>
									<li><a href="#">New Music</a></li>
									<li><a href="#">Live Performance</a></li>
									<li><a href="#">Artist A-Z</a></li>
								</ul>
								<a href="" class="all">All Music <i class="fa fa-angle-double-right"></i></a>
							</div>
							<!-- Footer Single Widget -->
							
							<!-- Footer Single Widget -->
							<div class="single-footer-widget">
								<div class="footer-icon">
									<i class="fa fa-microphone "></i>
								</div>
								<h4>Festivals</h4>
								<ul>
									<li><a href="#">Music Videos</a></li>
									<li><a href="#">Song Of the day</a></li>
									<li><a href="#">Paylists</a></li>
									<li><a href="#">New Music</a></li>
									<li><a href="#">Live Performance</a></li>
									<li><a href="#">Artist A-Z</a></li>
								</ul>
								<a href="" class="all">All Music <i class="fa fa-angle-double-right"></i></a>
							</div>
							<!-- Footer Single Widget -->
							
							<!-- Footer Single Widget -->
							<div class="single-footer-widget">
								<div class="footer-icon">
									<i class="fa fa-users "></i>
								</div>
								<h4>Social</h4>
								<ul>
									<li><a href="#">Music Videos</a></li>
									<li><a href="#">Song Of the day</a></li>
									<li><a href="#">Paylists</a></li>
									<li><a href="#">New Music</a></li>
									<li><a href="#">Live Performance</a></li>
									<li><a href="#">Artist A-Z</a></li>
								</ul>
								<a href="" class="all">All Music <i class="fa fa-angle-double-right"></i></a>
							</div>
							<!-- Footer Single Widget -->
							
							<!-- Footer Single Widget -->
							<div class="single-footer-widget">
								<div class="footer-icon">
									<i class="fa fa-smile-o"></i>
								</div>
								<h4>Fun</h4>
								<ul>
									<li><a href="#">Music Videos</a></li>
									<li><a href="#">Song Of the day</a></li>
									<li><a href="#">Paylists</a></li>
									<li><a href="#">New Music</a></li>
									<li><a href="#">Live Performance</a></li>
									<li><a href="#">Artist A-Z</a></li>
								</ul>
								<a href="" class="all">All Music <i class="fa fa-angle-double-right"></i></a>
							</div>
							<!-- Footer Single Widget -->
							
							<!-- Footer Single Widget -->
							<div class="single-footer-widget">
								<div class="footer-icon">
									<i class="fa fa-newspaper-o"></i>
								</div>
								<h4>News</h4>
								<ul>
									<li><a href="#">Music Videos</a></li>
									<li><a href="#">Song Of the day</a></li>
									<li><a href="#">Paylists</a></li>
									<li><a href="#">New Music</a></li>
									<li><a href="#">Live Performance</a></li>
									<li><a href="#">Artist A-Z</a></li>
								</ul>
								<a href="" class="all">All Music <i class="fa fa-angle-double-right"></i></a>
							</div>
							<!-- Footer Single Widget -->
						</div>
					</div>
				</div>
				
			</div>
		</footer>
		<!-- Footer -->
        

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<?php wp_footer(); ?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>