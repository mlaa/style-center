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
        <div class="input" contenteditable="true"></div>
        <div class="label">Title of container,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">4</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Other contributors,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">5</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Version,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">6</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Number,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">7</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Publisher,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">8</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Publication date,</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <div class="temp-element">
        <div class="element-order">9</div>
        <div class="input" contenteditable="true"></div>
        <div class="label">Location.</div>
        <div class="formatting-btn hidden"><span class="dashicons dashicons-editor-italic"></span></div>
      </div>

      <!-- Optional Element Add -->
      <div class="optional-element last-optional-element">
        <div class="element-order">+</div>
        <div class="input" contenteditable="true"></div>
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



	</article>



</div> <!-- /.block-main -->
<?php get_sidebar(); ?>


<script type="text/javascript">

/*
 * Define citation class. Citations take in an object (of input values from
 * the .input template fields), and set methods accordingly.
 */
 class Citation {
	 constructor(fieldsObject) {
		 this.author = fieldsObject.author
		 this.title = fieldsObject.title
		 this.containerOne = fieldsObject.containerOne
		 this.containerTwo = fieldsObject.containerTwo
		 this.containerThree = fieldsObject.containerThree
	 }
 }
 
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

  $('.formatting-btn').on('mousedown', function(event) {
    event.preventDefault();

		if ( document.queryCommandState('italic') ) {
			$(this).removeClass('active');
		} else {
			$(this).addClass('active');
		}
    //$(this).toggleClass('active');
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
    //console.log($(this));
  });


	$('.clear-button').on('click', function() {
		$('.input').empty();
		$('.formatting-btn').addClass('hidden');
		$('.label').removeClass('focused');
	})

//	let inputsObj = {}
	//const citation = new Citation(inputsObj);

//	$('.input').on('keyup', function() {
//		const inputs = $('.input')
//		inputsObj.author = $('#author').text();
//		inputsObj.title = $('#title').text();

//		console.log(inputsObj)
//	})










});

</script>
<?php

get_footer();
