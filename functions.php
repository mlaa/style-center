<?php
/**
 * Theme kickoff
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

require_once( 'includes/loader.php' );

$sidebars = array(
	'faq' => 'Ask the Experts',
	'blog' => 'Behind the Style',
	'plagiarism-and-academic-dishonesty' => 'Sample chapter',
	'research-papers' => 'Research papers',
	'teaching-resources' => 'Teaching resources',
	'search' => 'Search results',
);

$theme_helper = new ThemeHelper( 'mla-style-center', $sidebars );

$theme_helper->enqueue_style( 'main', 'assets/dist/main.css' );
$theme_helper->enqueue_script( 'main', 'assets/dist/main.js', null, true );
$theme_helper->enqueue_typekit( 'sho5lfw' );
