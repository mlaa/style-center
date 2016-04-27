/* Search hints module */

/*global document*/

module.exports = function ($) {

  'use strict';

  require('typeahead.js');

  // Load terms.
  var searchTerms = require('../data/searchTerms.json');

  // Simple case-insensitive matching.
  var findMatches = function (q, cb) {
    var matches = [];
    var substrRegex = new RegExp(q, 'i');

    $.each(searchTerms, function (i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };

  var options = {
    hint: true,
    highlight: true,
    minLength: 2
  };

  var engine = {
    name: 'terms',
    source: findMatches
  };

  if (! ('ontouchstart' in document)) {

    // Bind to search field.
    $('.search-field')
      .typeahead(options, engine)
      .on('typeahead:selected', function () {
        $(this).closest('form').submit();
      });

  }

};
