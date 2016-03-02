<?php
/**
 * Header
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \bloginfo;
use \body_class;
use \do_action;
use \esc_url;
use \has_nav_menu;
use \home_url;
use \language_attributes;
use \wp_head;
use \wp_nav_menu;

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<?php do_action( 'get_header' ); ?>

		<nav class="page-banner print-remove">

			<h1 class="page-logo">
				<a href="<?php echo( esc_url( home_url( '/' ) ) ); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
			</h1>

			<ul class="page-menu">
				<li><span class="page-sub-menu-link button">☰ Menu</span></li>
				<ul class="page-sub-menu">
					<li><h4>Sections</h4></li>
					<li><a href="/about-the-handbook/">About the <em>Handbook</em></a></li>
					<li><a href="/understanding-mla-style/">MLA Citation Template</a></li>
					<li><a href="/category/ask-the-experts/">Ask the Experts</a></li>
					<li><a href="/category/behind-the-style/">Behind the Style</a></li>
					<li><a href="/plagiarism-and-academic-dishonesty/">From the book: “Plagiarism”</a></li>
					<li><a href="/sample-papers/">Research Papers in MLA Style</a></li>
					<li><a href="/teaching-resources/">Teaching MLA Style</a></li>
				</ul>
			</ul>

			<form class="site-search-form">
				<fieldset>
					<?php get_search_form(); ?>
				</fieldset>
			</form>

		</nav>

		<main class="content">
