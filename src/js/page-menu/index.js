/* Page menu module */

/*global document*/

module.exports = function ($) {

  'use strict';

  var $button = $('.page-sub-menu-link');
  var $targets = $('.page-sub-menu-link, .page-sub-menu');
  var $parent = $('.page-menu');

  var activeClass = 'page-menu-active';
  var hoverOutDelay = 250;

  $targets.on({
    mouseover: function() {
      if ($button.prop('hoverTimeout')) {
        $button.prop('hoverTimeout', clearTimeout($button.prop('hoverTimeout')));
      }
      $parent.addClass(activeClass);
    },
    mouseleave: function() {
      $button.prop('hoverTimeout', setTimeout(function() {
        $parent.removeClass(activeClass);
      }, hoverOutDelay));
    }
  });

  if ('ontouchstart' in document) {

    $button.on('touchstart', function(e) {

        e.stopPropagation();

        if ($parent.hasClass(activeClass)) {
          $parent.removeClass(activeClass);
        } else {
          $parent.addClass(activeClass);
        }

    });

  }

};
