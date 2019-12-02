<?php
/**
 * Template Name: Full-page Template
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

get_header();

?>

<div class="block-main no-post-author">
  <h1><?php the_title(); ?></h1>

    <?php
      while( have_posts() ) : the_post();
    ?>
        <div class="practice-template-content">
          <?php the_content(); ?>
        </div>
    <?php
      endwhile;
      wp_reset_query();
    ?>

  




</div> <!-- /.block-main -->

  
 

<?php

get_footer();
