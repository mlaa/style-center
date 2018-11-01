<?php
/**
 * Template Name: Practice Template
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

  <article <?php post_class('practice-template'); ?>>

    <!-- Template Wrapper -->
  <!--<fieldset>-->

    <fieldset>
      <div class="temp-element">
        <div class="element-order">1</div>
        <div class="input" id="author" contentEditable="true"></div>
        <div class="label">Author.</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">2</div>
        <div class="input" id="title" contentEditable="true"></div>
        <div class="label">Title of source.</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <!-- Optional Element Add -->
      <div class="optional-element">
        <div class="element-order">+</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Optional element.</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>
    </fieldset>

    <!-- Container 1 -->
    <fieldset class="container">
      <legend>Container</legend>

      <div class="temp-element">
        <div class="element-order">3</div>
        <div class="input" data-title="containerTitle" contenteditable="true"></div>
        <div class="label">Title of container,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">4</div>
        <div class="input" data-title="contributors" contenteditable="true"></div>
        <div class="label">Other contributors,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">5</div>
        <div class="input" data-title="version" contenteditable="true"></div>
        <div class="label">Version,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">6</div>
        <div class="input" data-title="number" contenteditable="true"></div>
        <div class="label">Number,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">7</div>
        <div class="input" data-title="publisher" contenteditable="true"></div>
        <div class="label">Publisher,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">8</div>
        <div class="input" data-title="pubDate" contenteditable="true"></div>
        <div class="label">Publication date,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">9</div>
        <div class="input" data-title="location" contenteditable="true"></div>
        <div class="label">Location.</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <!-- Optional Element Add -->
      <div class="optional-element last-optional-element">
        <div class="element-order">+</div>
        <div class="input" data-title="optionalElement" contenteditable="true"></div>
        <div class="label">Optional element.</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

    </fieldset> <!-- End Container 1 -->



    <!-- Container 2 -->
    <!--<fieldset>
      <legend>Container 2</legend>

      <div class="temp-element">
        <div class="element-order">3</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Title of container,</div>
        <div class="formatting-btn hidden"><i class="material-icons">format_italic</i></div>
      </div>

      <div class="temp-element">
        <div class="element-order">4</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Other contributors,</div>
        <div class="formatting-btn hidden"><i class="material-icons">format_italic</i></div>
      </div>

      <div class="temp-element">
        <div class="element-order">5</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Version,</div>
        <div class="formatting-btn hidden"><i class="material-icons">format_italic</i></div>
      </div>

      <div class="temp-element">
        <div class="element-order">6</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Number,</div>
        <div class="formatting-btn hidden"><i class="material-icons">format_italic</i></div>
      </div>

      <div class="temp-element">
        <div class="element-order">7</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Publisher,</div>
        <div class="formatting-btn hidden"><i class="material-icons">format_italic</i></div>
      </div>

      <div class="temp-element">
        <div class="element-order">8</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Publication date,</div>
        <div class="formatting-btn hidden"><i class="material-icons">format_italic</i></div>
      </div>

      <div class="temp-element">
        <div class="element-order">9</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Location.</div>
        <div class="formatting-btn hidden"><i class="material-icons">format_italic</i></div>
      </div>

    </fieldset>--><!-- End Container 2 -->



    <div class="temp-element button container-add">
      Add a container.
    </div>

    <p class="clear-button">
      Clear template.
    </p>

  <!--</fieldset>--><!-- End Template -->

    <p class="citation">

    </p>

  </article>



</div> <!-- /.block-main -->
<?php get_sidebar(); ?>


<script type="text/javascript">

const $ = jQuery

$(document).ready(function() {

  // Add Container
  const addContainerButton = $('.container-add');
  let i = 0;
  addContainerButton.on('click', function() {

    i++;

    const prevFieldset = $(this).prev();

    if ( i < 3 ) {
      let currFieldset = prevFieldset.clone(true);
      prevFieldset.after(currFieldset);
      currFieldset.children().children('.label').removeClass('focused');
      $('.formatting-btn').addClass('hidden');
      currFieldset.children().children('.input').empty();
      $('.last-optional-element').hide();
      $('.last-optional-element').last().show();

      const legends = $('fieldset').find('legend');
      legends.each( function(index) {
        $(this).text(`Container ${index + 1}`);
      });
      legends.show();

    }

    if ( i >= 2 ) {
      $(this).hide();
    }
  });


  // Set focus to input when active, hide formatting button on inactive input divs
  $('.input').on('change keyup click', function() {

    $('.formatting-btn').addClass('hidden');


    if ( $(this).is(':empty') ) {
      $(this).next('.label').removeClass('focused');
    } else {
        $(this).next('.label').addClass('focused');
    }

    if ( $(this).is(':focus') ) {
      $(this).siblings('.formatting-btn').removeClass('hidden');
    } else {
      $(this).siblings('.formatting-btn').addClass('hidden');
    }
  });


  // Control state and class of formatting button
  $('.formatting-btn').on('mousedown', function(event) {
    event.preventDefault();

    if ( document.queryCommandState('italic') ) {
      $(this).removeClass('active');
    } else {
      $(this).addClass('active');
    }
    document.execCommand('italic',false,false);
  });

  $('.input').on('keyup', function(event) {
    if ( document.queryCommandState('italic') ) {
      $(this).siblings('.formatting-btn').addClass('active');
    } else {
      $(this).siblings('.formatting-btn').removeClass('active');
    }
  });


  // Expand Optional Element slot on click
  $('.optional-element').on('click', function() {
    $(this).addClass('temp-element');
  });


  $('.clear-button').on('click', function() {
    $('.input').empty();
    $('.formatting-btn').addClass('hidden');
    $('.label').removeClass('focused');
  })


 /*
  * Define citation class. 
  */

 class Citation {
   constructor(fieldsObject) {
     this._author = fieldsObject.author
     this._title = fieldsObject.title
     this._containerOne = fieldsObject.containerOne
     this._containerTwo = fieldsObject.containerTwo
     this._containerThree = fieldsObject.containerThree
   }

   set author(val) {
     this._author = val
   }

   set title(val) {
     this._title = val
   }

   set containerOne(obj) {
     this._containerOne = obj
   }

   set containerTwo(obj) {
     this._containerTwo = obj
   }

   set containerThree(obj) {
     this._containerThree = obj
   }
 }

  //initialize new Citation with empty object
  const citation = new Citation({});

  
  //Get container fieldsets, create an object for each one, set props based on inputs, push them into array
  function getContainerNodes() {
    let containerObjects = []

    let containers = document.querySelectorAll('fieldset.container');
    containers.forEach(function(container, index) {

      let inputs = container.querySelectorAll('.input')
      let containerObj = {}

      containerObjects.push(setContainerProps(inputs, containerObj))

    });

    console.log(containerObjects)
    return containerObjects
  }


  // Set properties of object based on non-empty input values
  function setContainerProps(inputs, object) {

    inputs.forEach(function(input, index) {
      if ( input.innerHTML !== '' ) {
        let propName = input.dataset.title
        object[propName] = input.innerHTML
      };
    });

    return object
  }

  
  // Set citation object props, and fill in citation display
  $('.input').on('keyup', function() {

    citation.author = $('#author').html();
    citation.title = $('#title').html();
    citation.containerOne = getContainerNodes()[0]

    $('p.citation').html(
      `${citation._author} ${citation._title} ${citation._containerOne.containerTitle}`
    )

  })

});

</script>
<?php

get_footer();
