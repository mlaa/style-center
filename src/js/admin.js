jQuery( function( $ ) {
  // https://stackoverflow.com/a/38882022
  function waitForAddedNode(params) {
    new MutationObserver(function(mutations) {
      var el = document.getElementById(params.id);
      if (el) {
        this.disconnect();
        params.done(el);
      }
    }).observe(params.parent || document, {
      subtree: !!params.recursive,
      childList: true,
    });
  }

  var mla_style_user_id = 1007041;

  // helper function to get saved custom field values by field name
  var get_custom_field_value = function( field_name ) {
    return $.trim(
      $( '#postcustomstuff [type="text"][value="' + field_name + '"]' ).parents( 'tr:visible' ).find( 'textarea' ).val()
    );
  }

  var ask_checkbox = $( '#in-category-3' );

  var ask_click_handler = function( e ) {
    // Ensure "Author" is checked in screen options.
    // Need to trigger click rather than just setting check prop so that wp scripts handle change.
    $( '#authordiv-hide:not(:checked)' ).trigger( 'click' );

    // Fill in "Author".
    $( '#post_author_override' ).val( mla_style_user_id );

    // Disable comments.
    $( '#comment_status' ).prop( 'checked', false );
  };

  var behind_checkbox = $( '#in-category-2' );

  var behind_click_handler = function( e ) {
    // Ensure "Author" is checked in screen options.
    // Need to trigger click rather than just setting check prop so that wp scripts handle change.
    $( '#authordiv-hide:not(:checked)' ).trigger( 'click' );

    // Fill in "Author".
    $( '#post_author_override' ).val( mla_style_user_id );

    // Enable comments.
    $( '#comment_status' ).prop( 'checked', true );
  };

  var post_submit_handler = function( e ) {
    var violations = [];

    if ( [ 'post-preview', 'save-post' ].indexOf( document.activeElement.id ) !== -1 ) {
      return; // Don't apply validation when saving drafts or previewing.
    } else if ( ask_checkbox.is( ':checked' ) ) {
      // Require post_short_title custom field value.
      if ( ! get_custom_field_value( 'post_short_title' ) ) {
        violations.push( 'You must include a short title for all posts.' );
      }

      // Require tags.
      if ( ! $( '.tagchecklist' ).children().length ) {
        violations.push( 'You must add tags for all posts.' );
      }

      // Require "Author" to be mlastyle.
      if ( mla_style_user_id != $( '#post_author_override' ).val() ) {
        violations.push( 'Author must be mlastyle.' );
      }
    } else if ( behind_checkbox.is( ':checked' ) ) {
      // Require post_short_title custom field value.
      if ( ! get_custom_field_value( 'post_short_title' ) ) {
        violations.push( 'You must include a short title for all posts.' );
      }

      // Require tags.
      if ( ! $( '.tagchecklist' ).children().length ) {
        violations.push( 'You must add tags for all posts.' );
      }

      // Require featured image.
      if ( -1 == $( '#_thumbnail_id' ).val() ) {
        violations.push( 'You must include a Featured Image for Behind the Style posts.' );
      }

      // Require excerpt.
      if ( ! $.trim( $( '#excerpt' ).val() ) ) {
        violations.push( 'You must enter an excerpt of 100 or fewer characters.' );
      }

      // Limit character length of excerpt.
      if ( $( '#excerpt' ).val().length > 100 ) {
        violations.push( 'Excerpts must be 100 or fewer characters.' );
      }

      // Require post_author custom field value.
      if ( ! get_custom_field_value( 'post_author' ) ) {
        violations.push( 'You must include a post_author for Behind the Style posts.' );
      }

      // Require "Author" to be mlastyle.
      if ( mla_style_user_id != $( '#post_author_override' ).val() ) {
        violations.push( 'Author must be mlastyle.' );
      }
    }

    if ( violations.length ) {
      e.preventDefault();
      display_violations( violations );
    }
  }

  var display_violations = function( violations ) {
    alert( violations.join( "\n" ) );
  };

  // Warn user if permalink is more than five words.
  var check_permalink = function() {
    var warn_markup = $( '<div id="sc_permalink_warn" class="notice notice-warning"><p>Try to limit the permalink slug to five words.</p></div>' );

    $( '#sc_permalink_warn' ).remove();

    if ( $( '#editable-post-name-full' ).text().split( '-' ).length > 5 ) {
      $( warn_markup ).insertBefore( '#poststuff' );
    }
  }

  waitForAddedNode({
    id: 'edit-slug-box',
    parent: $( '#poststuff' )[0],
    recursive: true,
    done: function() {
      var observer = new MutationObserver( check_permalink );
      observer.observe( $( '#edit-slug-box' )[0], { childList: true } );
      check_permalink();
    }
  });

  ask_checkbox.on( 'click', ask_click_handler );
  behind_checkbox.on( 'click', behind_click_handler );
  $( 'form#post' ).on( 'submit', post_submit_handler );

} );
