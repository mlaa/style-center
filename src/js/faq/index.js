/* FAQ module */

/*global document*/

module.exports = function ($) {

  'use strict';

  $('a.toggle-answer').each(function() {
    $(this).on('click', function(e) {
      e.preventDefault();

      $(this)
        .toggleClass('toggle')
        .siblings('.answer').toggle();
    });
  });

};
