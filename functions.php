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
		'homepage-top' => 'Homepage top',
		'homepage-bottom' => 'Homepage bottom',
		'homepage-side' => 'Homepage side',
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

	$args['fields']['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent">Save my name, e-mail, and Web site in this browser for the next time I comment.</label></p>';
		
	



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
		$query->set( 'tax_query', array(
			array(
				'taxonomy' => 'mla_author', //or tag or custom taxonomy
				'field' => 'slug',
				'terms' => array($_GET['post_author'])
			)
		)  );
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

/**
 * Synonyms for elasticpress
 * https://github.com/10up/ElasticPress/wiki/Synonym-Analyzer
 *
 * @param $mapping
 *
 * @return mixed
 */
function filter_ep_config_mapping( $mapping ) {
	$filter_name = 'mla_style_synonym_filter';

	$synonyms = [
		// without "stand" and "alone" as independent synonyms, no matches are returned for "standalone".
		'standalone, stand-alone, stand alone, stand, alone',
		'website, web site',
		'ebook, e-book',
		'catalog, catalogue',
		'exhibit, exhibition',
		'photo, photos, photograph, photographs',
		'movie, film',
	];

	// define the custom filter
	$mapping['settings']['analysis']['filter'][ $filter_name ] = [
		'type' => 'synonym',
		'synonyms' => $synonyms
	];

	// tell the analyzer to use our newly created filter
	array_unshift( $mapping['settings']['analysis']['analyzer']['default']['filter'], $filter_name );

	return $mapping;
}
add_filter( 'ep_config_mapping', __NAMESPACE__ . '\filter_ep_config_mapping' );

/**
 * If query contains quotes, no fuzziness.
 *
 * @param float $fuzziness Fuzziness argument for ElasticSearch.
 * @return float
 */
function sc_filter_ep_fuzziness_arg( $fuzziness, $search_fields, $args ) {
	if ( false !== strpos( $args['s'], '"' ) ) {
		$fuzziness = 0;
	}

	return $fuzziness;
}
add_filter( 'ep_fuzziness_arg', __NAMESPACE__ . '\sc_filter_ep_fuzziness_arg', 10, 3 );

/**
 * Include admin JS/CSS.
 */
function sc_enqueue_admin_scripts() {
	wp_enqueue_script( 'sc_admin', get_template_directory_uri() . '/src/js/admin.js', [ 'jquery' ], 5 );
	wp_enqueue_style( 'sc_admin', get_template_directory_uri() . '/assets/dist/admin.css' );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\sc_enqueue_admin_scripts' );

/**
 * Add styles/classes to the "Styles" drop-down
 */
function sc_mce_before_init( $settings ) {

	$style_formats = [
		[
			'title' => 'Extract Blockquote',
			'selector' => 'blockquote',
			'classes' => 'extract',
		],
		[
			'title' => 'Example Blockquote',
			'selector' => 'blockquote',
			'classes' => 'example',
		],
		[
			'title' => 'Works Cited Header',
			'selector' => 'h4',
			'classes' => 'citations',
		],
		[
			'title' => 'Works Cited Paragraph',
			'selector' => 'p',
			'classes' => 'wc',
		],
		[
			'title' => 'Orange Highlight Span',
			'inline' => 'span',
			'classes' => 'orange-highlight',
		],
		[
			'title' => 'Yellow Highlight Span',
			'inline' => 'span',
			'classes' => 'yellow-highlight',
		],
		[
			'title' => 'Blue Highlight Span',
			'inline' => 'span',
			'classes' => 'blue-highlight',
		],
	];

	$settings['style_formats'] = json_encode( $style_formats );

	return $settings;

}
add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\sc_mce_before_init' );

/**
 * Add ellipsis to Behind the Style post excerpts.
 */
function sc_add_ellipsis_to_behind_the_style_posts( $excerpt ) {
	$ellipsis = '&nbsp;.&nbsp;.&nbsp;.';
	if ( is_category( 'behind-the-style' ) && 0 === preg_match( "/\.\s?$/", $excerpt ) ) {
		$excerpt .= $ellipsis;
	}
	return $excerpt;
}


add_filter( 'get_the_excerpt', __NAMESPACE__ . '\sc_add_ellipsis_to_behind_the_style_posts' );



function my_editor_content( $content, $post ) {

   switch( $post->post_type ) {
        case 'page':

            $content = 
	           
	           '<div class="page-subtitle">
	            <p class="editor-comment"> !!!! This is the page subtitle !!!! </p>
				Get started with MLA style. Learn how to document your sources, set up your paper, and learn to write and teach better.
				</div>
				<p class="editor-comment"> !!!! This is the start of the column container. This can accommodate between 1 and 4 columns automagically. !!!! </p>
				<!-- Column container. This uses flexbox to accommodate between 1 and 4 columns -->
				<div class="column--container">
					<p class="editor-comment"> !!!! Column One Start !!!! </p>
					<div class="column">
						<img src="'.get_stylesheet_directory_uri().'/assets/images/documentation.png" class="column--icon">
						<h3 class="column--header">Document Sources</h3>
						<ul class="column--list">
							<li>
								<h4><a href="/works-cited-a-quick-guide/">Works Cited Quick Guide</a></h4>
								Learn how to use the MLA template of core elements.
							<li>
								<h4><a href="/interactive-practice-template/">Digital Citation Tool</a></h4>
								Build citations with our interactive template.
							</li>
							<li>
								<h4><a href="/tag/in-text-citations/">In-Text Citations</a></h4>
								Get help with in-text citations.
							</li>
							<li>
								<h4><a href="/using-notes-mla-style/">Endnotes and Footnotes</a></h4>
								Read our guide about using notes in MLA style.
							</li>
						</ul>
					</div>
					<p class="editor-comment"> !!!! Column One End !!!! </p>
					<p class="editor-comment"> !!!! Column Two Start !!!! </p>
					<div class="column">
						<img src="'.get_stylesheet_directory_uri().'/assets/images/setting-up-a-paper.png" class="column--icon">
						<h3 class="column--header">Set Up Your Paper</h3>
						<ul class="column--list">
							<li>
								<h4><a href="/formatting-papers/">Setting Up a Research Paper</a></h4>
								Get our guidelines for setting up academic research papers.
							</li>
							<li>
								<h4><a href="/formatting-figure-captions/">Formatting Captions</a></h4>
								Learn how to format captions.
							</li>
							<li>
								<h4><a href="/sample-papers/">Sample Papers</a></h4>
								Read sample papers written in MLA style.
							</li>
							<li>
								<h4><a href="/tag/annotated-bibliography/">Annotated Bibliographies</a></h4>
								Learn how to set up an annotated bibliography.
							</li>
						</ul>
					</div>
					<p class="editor-comment"> !!!! Column Two End !!!! </p>
					<p class="editor-comment"> !!!! Column Three Start !!!! </p>
					<div class="column">
						<img src="'.get_stylesheet_directory_uri().'/assets/images/writing-tips.png" class="column--icon">
						<h3 class="column--header">Get Writing and Teaching Tips</h3>
						<ul class="column--list">
							<li>
								<h4><a href="/category/ask-the-mla/">Ask the MLA</a></h4>
								Browse answers and ask MLA editors questions.
							</li>
							<li>
								<h4><a href="/tag/writing-tips/">Writing Tips</a></h4>
								Improve your writing with these suggestions.
							</li>
							<li>
								<h4><a href="/teaching-resources/">Teaching Resources</a> and <a href="/tag/teaching-tips/">Advice</a></h4>
								Get teaching advice, lesson plans, and activities.
							</li>
							<li>
								<h4><a href="/quizzes-2/">Quizzes</a></h4>
								Test your knowledge with these fun quizzes.
							</li>
						</ul>
					</div>
					<p class="editor-comment"> !!!! Column Three End !!!! </p>
				</div>
				<p class="editor-comment"> !!!! End of Column Container !!!! </p>';
        break;
        default:
            $content = '';
        break;
    }

   return $content;
}

add_filter( 'default_content',  __NAMESPACE__ .'\my_editor_content', 10, 2 );


