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
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5DS27MV');</script>
<!-- End Google Tag Manager -->

		<?php wp_head(); ?>
		
	</head>

	<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="​https://www.googletagmanager.com/ns.html?id=GTM-5DS27MV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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
					<fieldset class="icon-search">
						<?php get_search_form(); ?>
					</fieldset>
				</form>

				<ul class="page-menu">
					<li><span class="buy-the-book-button button">Buy the Book</span></li>
					<li><span class="page-sub-menu-link button icon-menu"><span class="menu-gloss"> Menu</span></span></li>
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
