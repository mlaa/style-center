jQuery( function( $ ) {
  var mla_style_user_id = 1007041;

  var ask_checkbox = $( '#in-category-3' );

  var ask_click_handler = function( e ) {
    if ( ask_checkbox.is( ':checked' ) ) {
      // Ensure "Author" is checked in screen options.
      // Need to trigger click rather than just setting check prop so that wp scripts handle change.
      $( '#authordiv-hide:not(:checked)' ).trigger( 'click' );

      // Fill in "Author".
      $( '#post_author_override' ).val( mla_style_user_id );

      // Disable comments.
      $( '#comment_status' ).prop( 'checked', false );

      // Turn on validation.
      $( '#post' ).on( 'submit', ask_submit_handler );
    } else {
      // Turn off validation.
      $( '#post' ).on( 'submit', ask_submit_handler );
    }
  };

  var ask_submit_handler = function( e ) {
    var violations = [];

    // Maximum word length of post name in permalink.
    if ( $( '#editable-post-name-full' ).text().split( '-' ).length > 5 ) {
      violations.push( 'You must shorten the permalink to five words.' );
    }

    // Require post_short_title custom field value.
    if ( ! $.trim( $( '#postcustomstuff [value="post_short_title"]' ).parents( 'tr' ).find( 'textarea' ).val() ) ) {
      violations.push( 'You must include a short title for all posts.' );
    }

    // Require tags.
    if ( ! $( '.tagchecklist' ).children().length ) {
      violations.push( 'You must add tags for all posts.' );
    }

    if ( violations.length ) {
      e.preventDefault();
      display_violations( violations );
    }
  };

  var behind_checkbox = $( '#in-category-2' );

  var behind_click_handler = function( e ) {
    if ( behind_checkbox.is( ':checked' ) ) {
      // Ensure "Author" is checked in screen options.
      // Need to trigger click rather than just setting check prop so that wp scripts handle change.
      $( '#authordiv-hide:not(:checked)' ).trigger( 'click' );

      // Fill in "Author".
      $( '#post_author_override' ).val( mla_style_user_id );

      // Enable comments.
      $( '#comment_status' ).prop( 'checked', true );

      // Turn on validation.
      $( '#post' ).on( 'submit', behind_submit_handler );
    } else {
      // Turn off validation.
      $( '#post' ).on( 'submit', behind_submit_handler );
    }
  };

  var behind_submit_handler = function( e ) {
    var violations = [];

    // Maximum word length of post name in permalink.
    if ( $( '#editable-post-name-full' ).text().split( '-' ).length > 5 ) {
      violations.push( 'You must shorten the permalink to five words.' );
    }

    // Require post_short_title custom field value.
    if ( ! $.trim( $( '#postcustomstuff [value="post_short_title"]' ).parents( 'tr' ).find( 'textarea' ).val() ) ) {
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
    if ( ! $.trim( $( '#postcustomstuff [value="post_author"]' ).parents( 'tr' ).find( 'textarea' ).val() ) ) {
      violations.push( 'You must include an author for all posts.' );
    }

    if ( violations.length ) {
      e.preventDefault();
      display_violations( violations );
    }
  };

  var display_violations = function( violations ) {
    alert( violations.join( "\n" ) );
  };

  ask_checkbox.on( 'click', ask_click_handler );
  behind_checkbox.on( 'click', behind_click_handler );

} );
