<?php

if( !function_exists('trucecleb_setup')){
	
	function trucecleb_setup(){
		
		load_theme_textdomain('trucecleb_lang', get_template_directory_uri().'/languages');
		
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-background');
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );
		set_post_thumbnail_size( 1024, 768, true );
		add_image_size('slider-image', 760, 570, true);
		add_image_size('lp-post-image', 150, 111, true);
		add_image_size('small-thumbnail', 85, 67, true);
		add_image_size('category-gallery-image', 380, 268, true);
		add_image_size('category-big-image', 796, 478, true);
		add_image_size('ad-song-of-day', 283, 193, true);
		add_image_size('tv-shows-image', 245, 175, true);
		add_image_size('single-image', 945, 535, true);
		add_image_size('single-popular', 335, 218, true);
		add_image_size('single-interesting', 329, 261, true);
		add_image_size('single-gallery', 160, 142, true);
		
		add_post_type_support( 'contest_type', array( 'comments' ) );
		
	}
	
}
add_action('after_setup_theme', 'trucecleb_setup');	

if( !function_exists('register_menu')){
	
	function register_menu(){
		register_nav_menus(array(
			'theme_main_menu'	=> 'Main Menu',
		));
	}	
	
}
add_action('init', 'register_menu');

function truceleb_styleshteet_include(){
	wp_enqueue_style( 'truceleb-style', get_stylesheet_uri() );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array( 'truceleb-style' ), '20160816' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( 'truceleb-style' ), '20160816' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( 'truceleb-style' ), '20160816' );
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.min.css', array( 'truceleb-style' ), '20160816' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array( 'truceleb-style' ), '20160816' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array( 'truceleb-style' ), '20160816' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array( 'truceleb-style' ), '20160816' );
	
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', '', '', false );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', '', '', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', '', true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', '', '', true );
	wp_enqueue_script( 'slicknavslicknav', get_template_directory_uri() . '/js/main.js', '', '', true );

}
add_action( 'wp_enqueue_scripts', 'truceleb_styleshteet_include' );


require_once('lib/ReduxCore/framework.php');
require_once('lib/sample/trucecleb-config.php');

$inc_path	= dirname(__FILE__).'/inc/';
if(file_exists($inc_path.'include-functions.php')){
	require_once($inc_path.'include-functions.php');
}
if(file_exists($inc_path.'include_custom_meta_box.php')){
	require_once($inc_path.'include_custom_meta_box.php');
}

if( !function_exists('register_custom_post_type')){
	function register_custom_post_type(){
		register_post_type('daily_photos', array(
			'labels'		=> array(
				'name'		=> __('Daily Photos', 'trucecleb_lang'),
				'add_new'	=> 'Add New Photo',
			),
			'public'		=> true,
			'publicly_queryable' => true,
			'has_archive'	=> true,
			'rewrite'		=> array(
				'slug'		=> 'daily_photos',
			),
			'supports'		=> array('title', 'thumbnail', 'editor'),
		));
		
		register_post_type('contest_type', array(
			'labels'		=> array(
				'name'		=> __('Contest', 'trucecleb_lang'),
				'add_new'	=> 'Add New',
			),
			'public'		=> true,
			'publicly_queryable' => true,
			'has_archive'	=> true,
			'rewrite'		=> array(
				'slug'		=> 'contest_type',
			),
			'supports'		=> array('title', 'thumbnail', 'editor', 'author', 'çomments'),
		));
		
		register_post_type('video_type', array(
			'labels'		=> array(
				'name'		=> __('Videos', 'trucecleb_lang'),
				'add_new'	=> 'Add New',
			),
			'public'		=> true,
			'publicly_queryable' => true,
			'has_archive'	=> true,
			'rewrite'		=> array(
				'slug'		=> 'video_type',
			),
			'supports'		=> array('title', 'editor', 'author', 'çomments'),
		));
		
		register_post_type('our_playlist', array(
			'labels'		=> array(
				'name'		=> __('Our Playlist', 'trucecleb_lang'),
				'add_new'	=> 'Add New',
			),
			'public'		=> true,
			'publicly_queryable' => true,
			'has_archive'	=> true,
			'rewrite'		=> array(
				'slug'		=> 'our_playlist',
			),
			'supports'		=> array('title', 'thumbnail', 'editor', 'author', 'çomments'),
		));
	}
}
add_action('init', 'register_custom_post_type');


if( !function_exists('trucecleb_sidebar_init')){
	function trucecleb_sidebar_init(){
		register_sidebar(array(
			'id'			=> 'left_sidebar',
			'name'			=> __('Page Left Sidebar', 'trucecleb_lang'),
			'before_widget'	=> '<div class="truceleb-news inner-padding">',
			'after_widget'	=> '</div><div class="line"></div>',
			'before_title'	=> '<div class="widget-heading"><h4>',
			'after_title'	=> '</h4></div>',
		));
		register_sidebar(array(
			'id'			=> 'right_sidebar',
			'name'			=> __('Page Right Sidebar', 'trucecleb_lang'),
			'before_widget'	=> '<div class="right-sidebar-widget">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="heat-tracer-info"><h4>',
			'after_title'	=> '</h4></div>',
		));
		register_sidebar(array(
			'id'			=> 'single_sidebar',
			'name'			=> __('Post/Page Sidebar', 'trucecleb_lang'),
			'before_widget'	=> '<div class="single-sidebar-widget">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<div class="popular-title"><h3>',
			'after_title'	=> '</h3></div>',
		));
	}
}
add_action('widgets_init', 'trucecleb_sidebar_init');


/*===== Widgets =====*/
	$path	= dirname(__FILE__).'/widgets/';
	if(file_exists($path.'widget-side-catlist.php')){
		require_once($path.'widget-side-catlist.php');
	}
	if(file_exists($path.'widget-popular.php')){
		require_once($path.'widget-popular.php');
	}
	if(file_exists($path.'widget-ad.php')){
		require_once($path.'widget-ad.php');
	}
	if(file_exists($path.'widget-featured.php')){
		require_once($path.'widget-featured.php');
	}
	if(file_exists($path.'widget-gallery-slide.php')){
		require_once($path.'widget-gallery-slide.php');
	}
	if(file_exists($path.'widget-side-cptlist.php')){
		require_once($path.'widget-side-cptlist.php');
	}
	if(file_exists($path.'widget-song-of-day.php')){
		require_once($path.'widget-song-of-day.php');
	}
	if(file_exists($path.'widget-new-music.php')){
		require_once($path.'widget-new-music.php');
	}
/*===== End Widgets =====*/