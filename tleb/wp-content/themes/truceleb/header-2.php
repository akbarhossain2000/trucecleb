<!doctype html>
<html class="no-js" lang="<?php language_attributes(); ?>">
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
    <body <?php if(is_single()){ body_class( 'article-bg' ); }else { body_class(); } ?>>
	<?php
		global $trucecleb_set;
		$prefix	= "trucec_";
	?>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		
		<!-- Header Start -->
		<header>
			<div <?php if(is_single()){?> class="menu-two" <?php }else{ ?> class="menu-two menu-two-no-margin" <?php } ?>>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2">
							<div class="logo2">
								<a href="<?php bloginfo('home'); ?>"><img src="<?php echo $trucecleb_set[$prefix.'logo']['url']; ?>" alt="" /></a>
							</div>
						</div>
						<div class="col-md-7">
							<div class="home-menu-two">
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
						</div>
						<div class="col-md-3">
							<div class="search-box-two">
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
				</div>
			</div>
		</header>
		<!-- Header End -->