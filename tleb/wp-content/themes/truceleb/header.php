<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> 
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
	<?php
		global $trucecleb_set;
		$prefix	= "trucec_";
	?>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		
		<!-- Header Start -->
		<header>
			<div class="header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-7 col-sm-12 col-xs-12">
							<div class="slider">
								
								<!-- Slider Carosel -->
								<div id="slider-carousel" class="carousel slide" data-ride="carousel">
								<?php
									$slider_args = array(
										'post_type'		=> 'post',
										'cat'			=> $trucecleb_set[$prefix.'slider'],
										'posts_per_page'=> 5,
									);
									
									$slider_data	= new WP_Query($slider_args);
									if($slider_data->have_posts()):
								?>
									<div class="carousel-inner" role="listbox">
									<?php
										while($slider_data->have_posts()): $slider_data->the_post();
										
										$slider_img_id	= get_post_thumbnail_id();
										$slider_img_url	= wp_get_attachment_image_src($slider_img_id, 'slider-image', true);
									?>
										<div class="item <?php if($slider_data->current_post==0): ?> active <?php endif; ?>">
											<img src="<?php echo $slider_img_url[0]; ?>" alt="" />
											<div class="slider-caption">
												<p><?php the_title(); ?></p>
											</div>
										</div>
									<?php 
										endwhile;
									?>
									</div>
									<?php
										endif;
										wp_reset_postdata();
									?>
								 
									<a class="left slider-left-btn-two" href="#slider-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
									<a class="right slider-right-btn-two" href="#slider-carousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
								</div>
								<!-- Slider Carosel -->
								
							</div>
							
							<div class="home-menu">
								<div class="logo">
									<a href="<?php bloginfo('home'); ?>"><img src="<?php echo $trucecleb_set[$prefix.'logo']['url']; ?>" alt="" /></a>
								</div>
								<div class="menu">
								<?php
								if( function_exists('wp_nav_menu')){
									
								$icon_class = $trucecleb_set[$prefix.'micon'];
								//print_r($icon_class);
							
								$navcount = wp_nav_menu( array(
									'theme_location' 	=> 'theme_main_menu',
									'menu' 				=> 'Main Menu',
									'depth'      		=> 2,
									'container'  		=> false,
									'echo'            	=> false,
									'menu_class'    	=> '',
									'menu_id'    	 	=> 'nav',
									'link_before'		=> '<i></i> ',
								) );
								$nav_bits = explode('<li ', $navcount);
								$navcount = ''; $i = 0; $j = 0;
								foreach($nav_bits as $bits) :
								//echo $bits;
								if($i==0) { $navcount = $navcount.$bits; }
								else { $navcount = $navcount.'<li rel="item'.$i.'" '.$bits; }
								$i++;
								endforeach;
								echo $navcount;
								}
								?>
								<script type="text/javascript">
									jQuery(document).ready(function(){
										var ul = document.getElementById("nav");
										//console.log(ul);
										var liNodes = [];
										var j = 0;
										var icon = <?php echo json_encode($icon_class); ?>;
										for (var i = 0; i < ul.childNodes.length; i++) {
											if (ul.childNodes[i].nodeName == "LI") {
												var q = jQuery(ul.childNodes[i]).attr("rel");
												var ai = jQuery('[rel='+q+'] a i');
												jQuery(ai).addClass(icon[j]);
												j++;
											}
										}
									});
								</script>
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
							</div>
						</div>
						
						
						<div class="col-md-5 col-sm-12 col-xs-12">
						<?php
							get_template_part('inc/content', 'latest_popular');
						?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header End -->