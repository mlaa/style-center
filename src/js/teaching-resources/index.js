/* Teaching Resources module */

/*global document*/

module.exports = function ($) {
	'use strict';

	$('a.toggle-category').each(function() {
    	$(this).on('click', function(e) {
      		e.preventDefault();

      		$(this).closest('section').find('.open-category').toggle();
	    });
 	});
	
};