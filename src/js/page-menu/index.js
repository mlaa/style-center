/* Page menu module */

/*global document*/

module.exports = function ($) {

  'use strict';

  var $button = $('.page-sub-menu-link');
  var $targets = $('.page-sub-menu-link, .page-sub-menu');
  var $parent = $('.page-menu');

  var activeClass = 'page-menu-active';
  var hoverOutDelay = 250;

  var closeDropdown = function (e) {
    e.stopPropagation();
    $parent.removeClass(activeClass);
    document.removeEventListener('touchstart', closeDropdown);
    $button.removeEventListener('touchstart', closeDropdown);
  };

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

  if ('ontouchstart' in document.documentElement) {

    $button.on('touchstart', function(e) {

      if (e.touches.length === 1) {

        e.stopPropagation();

        if (!$parent.hasClass(activeClass)) {

          // Prevent link on first touch.
          if (e.target === this || e.target.parentNode === this) {
              e.preventDefault();
          }

          $parent.addClass(activeClass);
          document.addEventListener('touchstart', closeDropdown, false);
          $button.addEventListener('touchstart', closeDropdown, false);

        }

      }

    });

  }

};
