<?php 


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<?php wp_head(); ?>
	<meta charset="UTF-8">
	<title>Yusuf's Wordpress Theme</title>
</head>
	<body <?php body_class() ?>>
	<div id="header_area">
		<div class="container">
			<div class="row">
				<div class="col-md-3 logo_area">
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_mod('yusuf_logo'); ?>" alt=""></a>
				</div>
				<div class="col-md-9">
						<?php wp_nav_menu(array(
							'theme_location' => 'navbarmenu', 
							'menu_id'=>'nav'
						)
					); 
						?>
				</div>
			</div>
		</div>
	</div>
