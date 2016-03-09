/* Citation controller */

'use strict';

module.exports = function (Module, App, Backbone) {

  var searchIndex = require('../search')(Backbone);

  var showBookRefs = function (terms) {

    App.addRegions({
      BookRefs: '#search-book-refs'
    });

    terms = decodeURIComponent(terms.replace(/\+/g, '%20'));

    if (terms) {
      searchIndex(terms, function (results) {
        if (results.length) {

          App.addRegions({
            'BookRefs': '#search-book-refs'
          });
          App.BookRefs.show(Module.Views.Layout);

          Module.Views.Layout.showChildView('bookRefs', new Module.Views.BookRef.CollectionView({
            collection: new Module.Models.BookRef.Collection(results)
          }));

        }
      });
    }

  };

  return Backbone.Marionette.Controller.extend({
    showBookRefs: showBookRefs
  });

};
