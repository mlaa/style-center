/* Link handler module */

/*global window*/

'use strict';

module.exports = function (Module, App, Backbone) {

  var $ = Backbone.$;

  // Listen for internal links when pushState is enabled.
  $('body').on('click', 'a', function (e) {

    if (Backbone.history.options && Backbone.history.options.pushState) {

      // Only act on internal links.
      var href = $(this).attr('href');

      if (href && href.charAt(0) === '#') {

        // Disable link and route manually.
        e.preventDefault();

        href = (href === '#') ? '/' : href;
        Backbone.history.navigate(href.substring(1), true);
        window.scrollTo(0, 0);

      }

    }

  });

};
