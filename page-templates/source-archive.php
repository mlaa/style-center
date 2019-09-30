<?php
/**
 * Template Name: Source Archive
 *
 * @package MLAStyleCenter
 */


get_header();

?>

<div class="no-post-author feature-page source-archive">
  <h1><?php the_title(); ?></h1>

  <p><?php the_content(); ?></p>

  <div class="mailing-list mailing-list__top">

      <div class="mailing-list-inner">

        <h2 class="icon-inline-tag icon-mail">Get MLA Style News from <em>The Source</em></h2>
        <p>Be the first to read new posts and updates about MLA style.</p>

        <?php
          echo do_shortcode("[formassembly formid=4649903]");
        ?>

      </div>

    </div>


  <div class="row">
   <?php
       wp_reset_postdata();
      ?>
      <?php 
        $args = array(
          'post_type' =>   'attachment',
          'post_status' => 'any',
          'category_name' => 'the source',
          'orderby' => 'date',
          'order'  => 'DESC'
        );

        $source_images = new WP_Query($args);

        ?>
          
        <?php

        if ($source_images->have_posts() ) {
          
          while( $source_images->have_posts() ) {
            $source_images->the_post();
            ?>

              <?php if( $source_images->current_post < 3 ) {
              ?>
                <article class="source-archive--issue">
                  <a href="<?php echo get_post_meta(get_the_ID(),'assoc_url',true); ?>">
                    <h2 class="source-archive--title">
                      <?php the_title(); ?>
                    </h2>
                  
                    <img src="<?php echo get_permalink(); ?>">
                  </a>
                </article>
              <?php
              } else {
              ?>
                <article class="source-archive--issue__old">
                  <a href="<?php echo get_post_meta(get_the_ID(),'assoc_url',true); ?>">
                    <h2 class="source-archive--title">
                      <?php the_title(); ?>
                      <?php var_dump($source_images->current_post) ?>
                    </h2> 
                  </a>
                </article>
              <?php 
            }
          }
        }
      ?>
   </div>
</div> <!-- /.block-main -->

<!--<aside class="sidebar citation-sidebar">
  
  <div  class="citation-sidebar--sticky-block">

    <div class="handbook-ad-container">
      <?php 
        get_template_part( "templates/buttons/buy-handbook-button" );
      ?>
    </div>
      
  </div>




</aside>-->



<?php

get_footer();
