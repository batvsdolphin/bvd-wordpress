<!DOCTYPE html>

<html <?php language_attributes( ); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<title><?php wp_title( '&#8212;', true, 'right' ); bloginfo( 'name' ); ?></title>

  <link rel="icon" type="image/x-icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/favicon/favicon.ico" />
  <link rel="icon" type="image/png" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/favicon/favicon-16x16.png" sizes="16x16" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<?php get_template_part( 'partials/header', 'js' ); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php get_sidebar(); ?>

<div class="logo"></div>

	<div class="wrapper">
