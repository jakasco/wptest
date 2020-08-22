<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<!--valitsee kielen wordpress asennuskielen mukaan -->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo get_template_directory_uri(); ?>/css/fonts/foundation-icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet"> <!-- kaikki ennen tätä -->
	<?php wp_head(); ?>
	<!--Pluginit osaa lukea headerin -->
</head>

<body <?php body_class(); ?>>

	<header class="tummansininen main-header">

		<div class="headerImg">
			<h1 id="headerTitle"><?php echo get_bloginfo('name'); ?></h1>

			<div class="banner">
				<img src="
			<?php header_image(); ?>
			" height="
			<?php echo get_custom_header()->height; ?>
			" width="<?php echo get_custom_header()->width; ?>
			" alt="Header img">
			</div>

		</div>

		<div id='photocount'>
			<span id="photocountlabel"><?php // echo get_theme_mod( 'cd_photocount', 0 ) 
										?></span>
		</div>

		<div class="nav-container">
			<?php
			get_sidebar();
			?>
		</div>

		<button id="scrollTopButton" onclick="scrollToTop(1000);">Ylös &#x2B06;</button>
		
	</header>