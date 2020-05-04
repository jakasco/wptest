<!DOCTYPE HTML>
<html <?php language_attributes(); ?>> <!--valitsee kielen wordpress asennuskielen mukaan -->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo get_template_directory_uri(); ?>/css/fonts/foundation-icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet"> <!-- kaikki ennen tätä -->
	<?php wp_head(); ?> <!--Pluginit osaa lukea headerin -->
</head>

<body <?php body_class(); ?>>
<div class="main-container">
<header class="tummansininen main-header">
	<div class="punainen tunnus"><a href="<?php echo get_home_url(); ?>">Oy Firma ab</a></div>
	<div class="search-block">
	<?php get_search_form(); ?>
	</div>
</header>
<div class="banner"> <!-- TARKASTA ONKO HEADER IMAGE, jos ei löydy, jätä tyhjäksi -->
	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="Banneri" >
</div>
<h1>VIDEO 8 VIIMEISIN </h1>
