/* Book reference views */

'use strict';


module.exports = function (Module, App, Backbone) {

  var ItemView = Backbone.Marionette.ItemView.extend({
    tagName: 'p',
    className: 'book-ref',
    template: require('../templates/book-ref.tpl')
  });

  var CollectionView = Backbone.Marionette.CollectionView.extend({
    childView: ItemView,
    tagName: 'div',
    className: 'book-refs'
  });

  Module.Views = Module.Views || {};

  Module.Views.BookRef = {
    ItemView: ItemView,
    CollectionView: CollectionView
  };

};
