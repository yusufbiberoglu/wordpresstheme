<?php 
/*

	My Theme Functions

*/



// Theme Title Tag
add_theme_support('title-tag');

// Post Thumbnails
add_theme_support('post-thumbnails', array('post', 'page','slider'));
add_image_size('slider', 700, 500, true);
add_image_size('thumbnail_image', 1920, 300, true);


// All Css And jQuery Files

function yusuf_css_calling() {
	wp_enqueue_style('yusuf-style', get_stylesheet_uri());
	wp_register_style('default', get_template_directory_uri(). '/css/default.css', array(), '1.0.0', 'all');
	wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.css', array(), '5.2.2');
	wp_enqueue_style('default');
	wp_enqueue_style('bootstrap');


	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.js', array());
	wp_enqueue_script('admin', get_template_directory_uri(). '/js/admin.js', array(), '1.0.0', 'true');
	wp_enqueue_script('app', get_template_directory_uri(). '/js/app.js', array(), '1.0.0', 'true');

}
add_action('wp_enqueue_scripts', 'yusuf_css_calling');

// Shortcuts
function yusuf_shortcode_slider($atts) {
	ob_start();
	$query = new WP_Query(array(
		'post_type' => 'slider',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'title',
	));
	if($query->have_posts()) { ?>



<div id="slider_area">
	<div class="bxslider">
		<?php query_posts('post_type=slider&post_status=publish&posts_per_page=3&order=ASC&paged='.get_query_var('post'));?>
			<?php while($query->have_posts()) : $query->the_post(); ?>

		<div class="item">
			<?php echo the_post_thumbnail('slider'); ?>
			<div class="slider_inner">
				<div class="slider_table">
					<div class="slider_display">
						<div class="slider_main">
									<?php the_title(); ?>
									<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
	
		</div>
			<?php endwhile; wp_reset_postdata();?>
	</div>
</div>






		<?php $myvariable = ob_get_clean();
		return $myvariable;
	}
}
add_shortcode('slider','yusuf_shortcode_slider');

// Theme Functions

function yusuf_customizer_register($wp_customize) {

	// COLOR SETTINGS
	$wp_customize->add_section('yusuf_colors', array(
		'title' =>__('Colors', 'yusuf_biberoglu'),
		'description'=> 'Modify your theme colors',
	));
	$wp_customize->add_setting('yusuf_bg_colors', array(
		'default' => '#ffffff',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yusuf_bg_colors', array(
		'label' =>'Background color',
		'section' => 'yusuf_colors',
		'settings' => 'yusuf_bg_colors',
	)));

	$wp_customize->add_setting('yusuf_link_colors', array(
		'default' => '#262626',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yusuf_link_colors', array(
		'label' =>'Lİnk Background color',
		'section' => 'yusuf_colors',
		'settings' => 'yusuf_link_colors',
	)));


	$wp_customize->add_section('yusuf_header_top_logo', array(
		'title' =>__('Logo Alanı', 'yusuf_biberoglu'),
		'description' => 'Logonu değiştirebilirsin'
	));

	$wp_customize->add_setting('yusuf_logo', array(
		'default' => get_bloginfo('template_directory') . '/img/ehliturizm.png',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'yusuf_logo', array(
		'label' => 'Logo',
		'description' => 'Logonu buraya yükleyebilirsin',
		'section' => 'yusuf_header_top_logo',
		'settings' => 'yusuf_logo',
	)));

	$wp_customize->add_section('copyright_section', array(
		'title' =>__('Copyright alanı', 'yusuf_biberoglu'),
		'description' => 'copyrightı değiştirebilirsin',
	));

	$wp_customize->add_setting('copyright_id', array(
		'default' => '&copy; Copyright 2019 | Yusuf BİBEROĞLU',
	));

	$wp_customize->add_control('copyright_id', array(
		'label' => 'Copyright Text',
		'description' => 'Copyright değiştir',
		'section' => 'copyright_section',
		'settings' => 'copyright_id',
	));

	//Layout Settings
	$wp_customize->add_section('yusuf_sidebar_section', array(
		'title' =>__('Sidebar alanı', 'yusuf_biberoglu'),
		'description' => 'sidebar ayarı',
	));

	$wp_customize->add_setting('yusuf_sidebar', array(
		'default' => 'sag_sidebar',
	));

	$wp_customize->add_control('yusuf_sidebar', array(
		'label' => 'Sidebar konumu',
		'description' => 'sidebar konumunu seç',
		'section' => 'yusuf_sidebar_section',
		'settings' => 'yusuf_sidebar',
		'type' => 'radio',
		'choices' => array(
			'sol_sidebar'=>'Sol Sidebar',
			'sag_sidebar'=>'Sağ Sidebar',
			'no_sidebar'=> 'Sidebarı kaldır',
		)
	));
}
add_action('customize_register', 'yusuf_customizer_register');

function custom_slider(){
	register_post_type('slider',
		array(
			'labels' => array(
				'name'=>('Slider'),
				'singular_name'=>('Slider'),
				'add_new' =>('Yeni Slider Ekle'),
				'add_new_item'=>('Yeni Slider Ekle'),
				'edit_item'=>('Slider Düzenle'),
				'new_item'=>('Slider Ekle'),
				'view_item'=>('Slider Görüntüle'),
				'not_found'=>('Slider bulunamadı'),
				),
			'menu_icon'=>'dashicons-format-gallery',
			'public'=> true,
			'public_queryable'=> true,
			'exclude_from_search'=> true,
			'menu_position'=>4,
			'has_archive'=>true,
			'hierarchial'=>true,
			'show_ui'=>true,
			'capability_type'=>'post',
			'rewrite'=>array('slag'=>'slider'),
			'supports'=>array('title', 'thumbnail', 'editor'),
		));
}
add_action('init','custom_slider');


//Color settings
function yusuftheme_customize_css(){
	?>
		<style type="text/css">
			body{background: <?php echo get_theme_mod('yusuf_bg_colors'); ?>}
			a{background: <?php echo get_theme_mod('yusuf_link_colors'); ?>}
		</style>
	<?php 
}
add_action('wp_head', 'yusuftheme_customize_css');


// Menu Function
register_nav_menu('navbarmenu', __('Main Menu'), 'yusuf_biberoglu');





// Sidebar Function
function yusuf_widgets_init() {
	register_sidebar(array(
		'name'    =>__('Ana bileşen alanı', 'yusuf_biberoglu'),
		'id'      =>'sidebar-1',
		'description' =>__('Sidebar sayfalarda görünür', 'yusuf_biberoglu'),
		'before_widget' => '<div class="child_sidebar">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));

		register_sidebar(array(
		'name'    =>__('footer alanı 1', 'yusuf_biberoglu'),
		'id'      =>'sidebar-2',
		'description' =>__('footer görünür', 'yusuf_biberoglu'),
		'before_widget' => '<div class="child_footer">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));

		register_sidebar(array(
		'name'    =>__('footer alanı 2', 'yusuf_biberoglu'),
		'id'      =>'sidebar-3',
		'description' =>__('footer görünür', 'yusuf_biberoglu'),
		'before_widget' => '<div class="child_footer">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));

		register_sidebar(array(
		'name'    =>__('footer alanı 3', 'yusuf_biberoglu'),
		'id'      =>'sidebar-4',
		'description' =>__('footer görünür', 'yusuf_biberoglu'),
		'before_widget' => '<div class="child_footer">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'yusuf_widgets_init');

// Devamını oku fonksiyonu
function new_excerpt_more($more){
	global $post;
		return '<br> <a class="readmore" href="'. get_permalink($post->ID) . '">'.'Devamı'.'</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function yusuf_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'yusuf_excerpt_length');


// Pagenav Function

function yusuf_pagenav(){
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if(!$current = get_query_var('paged')) $current = 1;
	$args['base'] = str_replace(9999999, '%#%', get_pagenum_link(999999999));
	$args['total'] = $max;
	$args['current'] = $current;
	$total = 1;
	$args['mid_size'] = 3;
	$args['end_size'] = 1;
	$args['prev_text'] = 'İleri';
	$args['next_text'] = 'Geri';
	if($max > 1) echo '</pre>
		<div class="wp-pagenav">';
		if($total == 1 && $max >1) $pages = '<span class="pages"> Sayfa'.$current.'of'. $max.'</span>';
		echo $pages .paginate_links($args);
		if($max >1) echo '<div> <pre>';
	
 }


// Max Image Size
function max_image_size( $file ) {
   if (preg_match('#^image/#', $file['type']) && $file['size'] > 500 * 1024 ) {
       $file['error'] = 'Görsel boyutu 500kb üzerinde olamaz.';
   }

   return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'max_image_size' );






































