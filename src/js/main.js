/**
 * Main theme JS file driven by CommonJS and Browserify.
 */

'use strict';

var $ = require('jquery');
require('typeahead.js');

// Load terms.
var searchTerms = require('./data/searchTerms.json');

// Toggle order drop-down.
$('.order-button-link').on('click', function () {
  $(this).parent().toggleClass('open');
});

// Add Typeahead to search field.
function findMatches (q, cb) {

  var matches = [];
  var substrRegex = new RegExp(q, 'i');

  $.each(searchTerms, function (i, str) {
    if (substrRegex.test(str)) {
      matches.push(str);
    }
  });

  cb(matches);

}

var options = {
  hint: true,
  highlight: true,
  minLength: 2
};

var engine = {
  name: 'terms',
  source: findMatches
};

// Bind to search field.
$('.search-field')
  .typeahead(options, engine)
  .on('typeahead:selected', function () {
    $(this).closest('form').submit();
  });
