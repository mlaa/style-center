<?php
/**
 * Header
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

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

			<div class="page-nav">

				<form class="site-search-form" action="/" method="get">
					<fieldset>
						<?php get_search_form(); ?>
					</fieldset>
				</form>

				<ul class="page-menu">
					<li><span class="buy-the-book-button button">Buy the Book</span></li>
					<li><span class="page-sub-menu-link button">☰<span class="menu-gloss"> Menu</span></span></li>
					<ul class="page-sub-menu">
						<li><h4>Sections</h4></li>
						<?php wp_nav_menu( [
							'container' => false,
							'items_wrap' => '%3$s',
							'menu' => 'site_nav',
						] ) ?>
					</ul>
				</ul>

			</div>

		</nav>

		<main class="content">
