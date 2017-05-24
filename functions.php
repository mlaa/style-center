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

	// append comment field html to end
	$args['fields']['comment_field'] = apply_filters( 'comment_form_field_comment', $comment_field_html );

	// replace label text
	$args['fields']['author'] = preg_replace(
		'/<label.*\/label>/',
		'<label>Your name <span class="required ninja-forms-req-symbol">*</span></label>',
		$args['fields']['author']
	);
	$args['fields']['email'] = preg_replace(
		'/<label.*\/label>/',
		'<label>Your e-mail address <span class="required ninja-forms-req-symbol">*</span></label>',
		$args['fields']['email']
	);
	// update labels on both native & custom comment field, former for anonymous users & latter for logged-in users
	$args['comment_field'] = $args['fields']['comment_field'] = preg_replace(
		'/<label.*\/label>/',
		'<label>Your comment <span class="required ninja-forms-req-symbol">*</span></label>',
		$args['fields']['comment_field']
	);

	// empty default comment field for anonymous users
	// (logged-in users don't see other fields and so need the original field intact - see comment_form() definition)
	if ( ! \is_user_logged_in() ) {
		$args['comment_field'] = '';
	}

	// add disclaimer under email field
	$args['fields']['email'] .= 'Your e-mail address will not be published.';

	return $args;
}
add_filter( 'comment_form_defaults', __NAMESPACE__ . '\filter_comment_defaults' );

function filter_document_title_parts( $parts ) {
	if ( is_category( 'ask-the-mla' ) && ! isset( $_GET['s'] ) ) {
		$parts['title'] = ThemeHelper::get_page_title();
	}
	return $parts;
}
add_filter( 'document_title_parts', __NAMESPACE__ . '\filter_document_title_parts' );

function filter_author_query( $query ) {
	if ( isset( $_GET['post_author'] ) ) {
		$query->set( 'meta_key', 'post_author' );
		$query->set( 'meta_value', $_GET['post_author'] );
	}
}
add_filter( 'pre_get_posts', __NAMESPACE__ . '\filter_author_query' );

/**
 * Parses post author field from comma seperated list for content-all.php file
 * 
 * @param  string $post_meta	post meta to be parsed from post_author   
 * @return array  $authors		parsed array of authors
 */
function parse_post_author( $post_meta ) {

	$authors = explode(',', $post_meta);
	return $authors;

}
