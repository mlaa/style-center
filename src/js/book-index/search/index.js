/* Book index search */

module.exports = function (Backbone) {

  'use strict';

  var Bloodhound = require('bloodhound-js');
  var indexTerms = require('../../data/index.json');

  var _ = Backbone._;

  var engine = new Bloodhound({
    local: indexTerms,
    identify: function (obj) {
      return obj.id;
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    }
  });

  // Build simplified results array from Bloodhound matches.
  var buildResults = function (data, cb) {

    var sortedData = _.sortBy(data, function (datum) {
      return datum.parent;
    });

    var results = [];

    // Parse results.
    _.each(sortedData, function (datum) {
      // Only proceed if the reference exists and has not already been added.
      if (datum.ref && _.findWhere(results, {ref: datum.ref}) === undefined) {
        results.push({
          name: datum.name,
          ref: datum.ref
        });
      }
    });

    // Format page numbers and section references.
    _.each(results, function (result) {
      var refs = result.ref.split(', ');
      result.ref = _.map(refs, function (ref) {
        if (ref.indexOf('.') !== -1) {
          return '<em>' + ref + '</em>';
        } else if (ref.indexOf('–') !== -1) {
          return 'pps. ' + ref;
        } else {
          return 'p. ' + ref;
        }
      }).join(', ');
    });

    cb(results);

  };

  // Initialize Bloodhound.
  var promise = engine.initialize();

  // Export search function.
  return function (terms, cb) {
    promise.then(function () {
      engine.search(terms, function (data) {
        buildResults(data, cb);
      });
    });
  };

};
