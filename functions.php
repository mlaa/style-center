<?php
/**
 * Theme kickoff
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

require_once( 'includes/loader.php' );

$theme_options = array(
	'menus' => array(
		'site_nav' => 'Site Navigation Menu',
	),
	'sidebars' => array(
		'blog' => 'Blog',
		'faq' => 'FAQ',
		'formatting-papers' => 'Formatting papers',
		'plagiarism-and-academic-dishonesty' => 'Sample chapter',
		'sample-papers' => 'Sample papers',
		'teaching-resources' => 'Teaching resources',
		'search' => 'Search results',
	),
);

$theme_helper = new ThemeHelper( 'mla-style-center', $theme_options );

$theme_helper->enqueue_style( 'main', 'assets/dist/main.css' );
$theme_helper->enqueue_script( 'main', 'assets/dist/main.js', array( 'jquery', 'underscore', 'backbone' ), true, array( 'asset_path' => get_stylesheet_directory_uri() ) );
$theme_helper->enqueue_typekit( 'sho5lfw' );

function filter_comment_defaults( $args ) {
	// store comment field html
	$comment_field_html = $args['comment_field'];

	// empty default comment field
	$args['comment_field'] = '';

	// append comment field html to end
	$args['fields']['comment_field'] = apply_filters( 'comment_form_field_comment', $comment_field_html );

	// replace label text
	$args['fields']['author'] = preg_replace( '/<label.*\/label>/', '<label>Your name</label>', $args['fields']['author'] );
	$args['fields']['email'] = preg_replace( '/<label.*\/label>/', '<label>Your e-mail address</label>', $args['fields']['email'] );
	$args['fields']['comment_field'] = preg_replace( '/<label.*\/label>/', '<label>Your comment</label>', $args['fields']['comment_field'] );

	// label each field required
	foreach ( $args['fields'] as &$field ) {
		$field = preg_replace( '/<\/label>/', ' <span class="required ninja-forms-req-symbol">*</span></label>', $field );
	}

	// add disclaimer under email field
	$args['fields']['email'] .= 'Your e-mail address will not be published.';

	return $args;
}
if ( ! \is_user_logged_in() ) {
	add_filter( 'comment_form_defaults', __NAMESPACE__ . '\filter_comment_defaults' );
}
