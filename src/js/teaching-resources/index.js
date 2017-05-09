/* Teaching Resources module */

/*global document*/

module.exports = function ($) {
	'use strict';

	$('a.toggle-category').each(function() {
    	$(this).on('click', function(e) {
      		e.preventDefault();

      		$(this).closest('section').find('.open-category').toggle();

      		if( $(this).closest('section').hasClass('style').find('.open-category').is('hidden') ) {
      			$(this).closest('section').find('img').css('border-bottom', '2px solid #CF8A83');
      		} else {
      			$(this).closest('section').find('img').css('border-bottom', 'none');
      		}
	    });
 	});
	
};