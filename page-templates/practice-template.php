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
      <div class="temp-element author-element" data-element="author">
        <div class="element-order">1</div>
        <div class="input" id="author" contentEditable="true" aria-label="author field"></div>
        <div class="label">Author.</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element title-element" data-element="title">
        <div class="element-order">2</div>
        <div class="input" id="title" contentEditable="true" aria-label="title field"></div>
        <div class="label">Title of source.</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <!-- Optional Element Add -->
      <div class="optional-element" data-element="optional-one">
        <div class="element-order">+</div>
        <div class="input" contenteditable="true" id="optional-element-one" aria-label="first optional element field"></div>
        <div class="label">Optional element.</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>
    </fieldset>

    <!-- Container 1 -->
    <fieldset class="container" data-element="container1">
      <legend>Container</legend>

      <div class="temp-element container-element">
        <div class="element-order">3</div>
        <div class="input" data-title="containerTitle" contenteditable="true" aria-label="title of container field"></div>
        <div class="label">Title of container,</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element container-element">
        <div class="element-order">4</div>
        <div class="input" data-title="contributors" contenteditable="true" aria-label="other contributors field"></div>
        <div class="label">Other contributors,</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element container-element">
        <div class="element-order">5</div>
        <div class="input" data-title="version" contenteditable="true" aria-label="version field"></div>
        <div class="label">Version,</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element container-element">
        <div class="element-order">6</div>
        <div class="input" data-title="number" contenteditable="true" aria-label="number field"></div>
        <div class="label">Number,</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element container-element">
        <div class="element-order">7</div>
        <div class="input" data-title="publisher" contenteditable="true" aria-label="publisher field"></div>
        <div class="label">Publisher,</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element container-element">
        <div class="element-order">8</div>
        <div class="input" data-title="pubDate" contenteditable="true" aria-label="publication date field"></div>
        <div class="label">Publication date,</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element container-element">
        <div class="element-order">9</div>
        <div class="input" data-title="location" contenteditable="true" aria-label="location field"></div>
        <div class="label">Location.</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

    
    </fieldset> <!-- End Container 1 -->

    <!-- Optional Element Add -->
      <div class="optional-element last-optional-element" data-element="optional-two">
        <div class="element-order">+</div>
        <div class="input" data-title="optionalElement" contenteditable="true" id="optional-element-two" aria-label="second optional element field"></div>
        <div class="label">Optional element.</div>
        <div class="formatting-btn hidden" aria-label="italics button"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>


    <div class="temp-element button container-add" aria-label="add a container button">
      Add a container.
    </div>

    <p class="clear-button" aria-label="clear template button">
      Clear template.
    </p>

  <!--</fieldset>--><!-- End Template -->



</div> <!-- /.block-main -->

<aside class="sidebar citation-sidebar">
  
  <div  style="position: sticky; top: 4rem; margin-top: 5rem">
    <h3>Your Citation</h3>
    <!-- Fill in with citation information -->
    <p class="citation-example">Start filling out the practice template to create your citation</p>
  </div>
</aside>


<script type="text/javascript">

const $ = jQuery

$(document).ready(function() {

  

  function logthis() {
    console.log('this');
  }

  // Add Container
  const addContainerButton = $('.container-add');
  let containerCount = 0;
  addContainerButton.on('click', function() {

    containerCount++;

    const prevFieldset = $(this).prev().prev();

    if ( containerCount < 3 ) {
      let currFieldset = prevFieldset.clone(true);
      prevFieldset.after(currFieldset);
      currFieldset.children().children('.label').removeClass('focused');
      $('.formatting-btn').addClass('hidden');
      currFieldset.children().children('.input').empty();
      $('.last-optional-element').hide();
      $('.last-optional-element').last().show();

      const containers = $('fieldset.container');
      containers.each(function(index) {
        $(this)[0].dataset.element = `container${index + 1}`
      })

      const legends = $('fieldset').find('legend');
      legends.each( function(index) {
        $(this).text(`Container ${index + 1}`);
      });
      legends.show();

    }

    if ( containerCount >= 2 ) {
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


  // Expand Optional Element slot on click/tab focus
  $('.optional-element').on('click', function() {
    $(this).addClass('temp-element');
  });
  $('.optional-element .input').on('focus', function() {
    $(this).parent().addClass('temp-element');
  });

  //Clear template
  $('.clear-button').on('click', function() {
    $('.input').empty();
    $('.formatting-btn').addClass('hidden');
    $('.label').removeClass('focused');

    // Clear citation example
    $('p.citation-example').html('Start filling out the practice template to create your citation');

    // Show only the first container fieldset/add container button
    //$('fieldset.container:nth-child(2)').show();
    $('fieldset.container:nth-child(3), fieldset.container:nth-child(4)').remove();
    
    //Show add container button and reset counter
    addContainerButton.show();
    $('html, body').animate({scrollTop:0}, 'slow');
    $('legend').hide();
    containerCount = 0;

  })





 /*
  * Define citation class.
  * This is used to build the citation as a user types in the template.
  * It's then rendered back out into a series of color-coded spans.
  */

 class Citation {
   constructor(fieldsObject) {
     this._author = fieldsObject.author
     this._title = fieldsObject.title
     this._optionalElementOne = fieldsObject.optionalElementOne
     this._optionalElementTwo = fieldsObject.optionalElementTwo
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

   set optionalElementOne(val) {
      this._optionalElementOne = val
   }

   set optionalElementTwo(val) {
      this._optionalElementTwo = val
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

  // Iterate through container oject and turn props into string for display
  function containerPropIterator(object = {}) {
    let containerString = ''
    for (var prop in object) {
      containerString += object[prop] + ' '
      // containerString += '<span data-element="' + prop + '">' + object[prop] + '</span> '
    }
    return containerString
  }


  // When called, this function iterates through all elements and fills in the citation example
  function buildCitation() {
    citation.author = $('#author').html()
    citation.title = $('#title').html()
    citation.optionalElementOne = $('#optional-element-one').html()
    citation.optionalElementTwo = $('#optional-element-two').html()
    citation.containerOne = getContainerNodes()[0]
    citation.containerTwo = getContainerNodes()[1]
    citation.containerThree = getContainerNodes()[2]

    $('p.citation-example').html(
      `<span class="citation__author" data-element="author">${citation._author}</span><span class="citation__title" data-element="title">${citation._title}</span><span class="citation__optional-element" data-element="optional-one">${citation._optionalElementOne}</span><span class="citation__container--one" data-element="container1">${containerPropIterator(citation._containerOne)}</span><span class="citation__container--two" data-element="container2">${containerPropIterator(citation._containerTwo)}</span><span class="citation__container--three" data-element="container3">${containerPropIterator(citation._containerThree)}</span><span class="citation__optional-element" data-element="optional-two">${citation._optionalElementTwo}</span>
      `
    )
  }

   
  
  // Event handlers to trigger buildCitation
  $('.input').on('keyup', function() {
    buildCitation();
  });
  $('.formatting-btn').on('click', function(){
    buildCitation();
  });

  //Highlight corresponding template fields on citation hover
  $(document).on('hover', 'span', function() {
    const el = $(this)[0].dataset.element
    $(`fieldset[data-element="${el}"] div.temp-element, div.temp-element[data-element="${el}"]`).toggleClass('hovered')
  })
  

});



</script>
<?php

get_footer();
