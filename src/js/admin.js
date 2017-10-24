jQuery( function( $ ) {
  var ask_the_mla_category_checkbox = $( '#in-category-3' );
  var behind_the_style_category_checkbox = $( '#in-category-2' );
  var mla_style_user_id = 1007041;

  // "Ask the MLA" defaults
  ask_the_mla_category_checkbox.on( 'click', function( e ) {
    if ( ask_the_mla_category_checkbox.is( ':checked' ) ) {
      // Ensure "Author" is checked in screen options.
      // Need to trigger click rather than just setting check prop so that wp scripts handle change.
      $( '#authordiv-hide:not(:checked)' ).trigger( 'click' );

      // Fill in "Author".
      $( '#post_author_override' ).val( mla_style_user_id );

      // Disable comments.
      $( '#comment_status' ).prop( 'checked', false );

      // TODO validation
    }
  } );

  // "Behind the Style" defaults
  behind_the_style_category_checkbox.on( 'click', function( e ) {
    if ( behind_the_style_category_checkbox.is( ':checked' ) ) {
      // Ensure "Author" is checked in screen options.
      // Need to trigger click rather than just setting check prop so that wp scripts handle change.
      $( '#authordiv-hide:not(:checked)' ).trigger( 'click' );

      // Fill in "Author".
      $( '#post_author_override' ).val( mla_style_user_id );

      // Enable comments.
      $( '#comment_status' ).prop( 'checked', true );

    }
  } );

} );
