<?php
/**
 * Template Name: Source Archive
 *
 * @package MLAStyleCenter
 */


get_header();

?>

<div class="block-main no-post-author feature-page">
  <h1><?php the_title(); ?></h1>


 <?php
     wp_reset_postdata();
    ?>
    <?php 
      $args = array(
        'post_type' =>   'attachment',
        'post_status' => 'any',
        'category_name' => 'the source'
      );

      $source_images = new WP_Query($args);

      ?>
        
      <?php

      if ($source_images->have_posts() ) {
        
        while( $source_images->have_posts() ) {
          $source_images->the_post();
          ?>

            <article class="source-archive--issue">
              <h2 class="source-archive--title">
                <?php echo get_the_title(); ?>
              </h2>

              <a href="<?php echo get_post_meta(get_the_ID(),'assoc_url',true); ?>">
                <img src="<?php echo get_permalink(); ?>">
              </a>
            </article>

          <?php 
        }
      }
    ?>

   

  

   
</div> <!-- /.block-main -->

<aside class="sidebar citation-sidebar">
  
  <div  class="citation-sidebar--sticky-block">

    <div class="handbook-ad-container">
      <?php 
        get_template_part( "templates/buttons/buy-handbook-button" );
      ?>
    </div>
      
  </div>




</aside>



<?php

get_footer();
