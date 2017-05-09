<?php 
/*
Template Name: Teaching Resources
 */

get_header();
?>

<div class="block-main no-post-author">
	<div class="tr-title"><h1><?php the_title(); ?></h1></div>

<?php 

$style_cat = get_term_by( 'slug', 'style', 'category', 'OBJECT' );
$research_cat = get_term_by( 'slug', 'research', 'category', 'OBJECT' );
$writing_cat = get_term_by( 'slug', 'writing', 'category', 'OBJECT' );

?>

	<div class="sections-container">

		<section class="style">
			<p><a href="#" class="toggle-category"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/style-button.jpg" /></a></p>
			<div class="open-category">
				<ul>
					<?php 
						$style_query = new WP_Query('cat=' . $style_cat->term_id);
						if( $style_query->have_posts() ) : while( $style_query->have_posts() ) : $style_query->the_post();
					?>
					<li>
						<p><?php the_post_thumbnail('thumbnail') ?></p>
						<h4><?php the_title(); ?></h4>
						<p><?php the_excerpt(); ?></p>
						<div class="post_links">
							<?php $style_meta = get_post_meta( get_the_ID(), 'teaching_resources_links', true );
								echo $style_meta;
							?>
						</div> <!-- /.post_links -->
					</li>
					<?php
						endwhile;
					endif; 
					wp_reset_postdata();
					?>
				</ul>
			</div> <!-- /.open-category -->
		</section> <!-- /.style -->

		<section class="research">
			<p><a href="#" class="toggle-category"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/research-button.jpg" /></a></p>
			
			<div class="open-category">
				<div class="bibliography_resources">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bibliography-resources.gif" />
					<div class="research_description">
						<h4>Understanding the <i>MLA International Bibliography</i>: An Online Course</h4>
						<p>Introductory Text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu purus nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu purus nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Solor sit amet, nisi. <a href="#">Link to sign up</a>.</p>
					</div> <!-- /.research_description -->
				</div> <!-- /.bibliography_resources -->
				<div class="resources_row_1">
					<ul>
						<?php 
							$research_query = new WP_Query('cat=' . $research_cat->term_id );
							if( $research_query->have_posts() ) : while( $research_query->have_posts() ) : $research_query->the_post();
						?>
						<li>
							<p><?php the_post_thumbnail('thumbnail') ?></p>
							<h4><?php the_title(); ?></h4>
							<p><?php the_excerpt(); ?></p>
							<div class="post_links">
								<?php $research_meta = get_post_meta( get_the_ID(), 'teaching_resources_links', true );
									echo $research_meta;
								?>
							</div> <!-- /.post_links -->
						</li>
						<?php
							if( $research_query->current_post % 3 == 2 ) {
								echo "</ul></div> <!-- /.resources_row_1 --> <div class='resources_row_2'><ul>";
							}

							endwhile;
						endif; 
						wp_reset_postdata();
						?>
					</ul>
				</div> <!-- /.resources_row_2 -->
			</div> <!-- /.open-category -->

		</section> <!-- /.research -->

		<section class="writing">

			<p><a href="#" class="toggle-category"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/writing-button.jpg" /></a></p>
			<div class="open-category">
			
				<article class="type-page page tr-content">

				<?php while( have_posts() ) : the_post();
				the_content();
				?>
				</article>

			<?php endwhile;
			wp_reset_query();
			?>
				<ul>
					<?php 
						$writing_query = new WP_Query('cat=' . $writing_cat->term_id );
						if( $writing_query->have_posts() ) : while( $writing_query->have_posts() ) : $writing_query->the_post();
					?>
					<li>
						<p><?php the_post_thumbnail('thumbnail') ?></p>
						<h4><?php the_title(); ?></h4>
						<p><?php the_excerpt(); ?></p>
						<div class="post_links">
							<?php $writing_meta = get_post_meta( get_the_ID(), 'teaching_resources_links', true );
								echo $writing_meta;
							?>
						</div> <!-- /.post_links -->
					</li>
					<?php endwhile;
					endif; 
					wp_reset_postdata();
					?>
				</ul>
			</div> <!-- /.open-category -->
		</section> <!-- /.writing -->

	</div> <!-- /.sections-container -->
</div> <!-- /.block-main -->
<?php 
get_sidebar();
get_footer();
?>