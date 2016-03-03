<?php
/**
 * Theme kickoff
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

require_once( 'includes/loader.php' );

$sidebars = array(
	'blog' => 'Blog',
	'faq' => 'FAQ',
	'formatting-papers' => 'Formatting papers',
	'plagiarism-and-academic-dishonesty' => 'Sample chapter',
	'sample-papers' => 'Sample papers',
	'teaching-resources' => 'Teaching resources',
	'search' => 'Search results',
);

$theme_helper = new ThemeHelper( 'mla-style-center', $sidebars );

$theme_helper->enqueue_style( 'main', 'assets/dist/main.css' );
$theme_helper->enqueue_script( 'main', 'assets/dist/main.js', array( 'jquery', 'underscore', 'backbone' ), true );
$theme_helper->enqueue_typekit( 'sho5lfw' );
