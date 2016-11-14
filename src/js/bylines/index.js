/* FAQ module */

/*global document*/

module.exports = function ($) {

  'use strict';

  /**
   * since author tiles are used on various sections but have to not link on behind-the-style,
   * disable link functionality here rather than duplicating markup
   */
  $('.category-behind-the-style .instructor-tile a, .category-teaching-resources .instructor-tile a').each(function() {
    $(this).css({ 'cursor': 'default' });
    $(this).on('click', function(e) {
      e.preventDefault();
    });
  });

};
