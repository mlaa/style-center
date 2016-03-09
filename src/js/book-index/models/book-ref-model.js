/* Book reference model */

'use strict';

module.exports = function (Module, App, Backbone) {

  var Model = Backbone.Model.extend({

    defaults: {
      name: '',
      ref: ''
    }

  });

  var Collection = Backbone.Collection.extend({
    model: Model
  });

  Module.Models = Module.Models || {};

  Module.Models.BookRef = {
    Model: Model,
    Collection: Collection
  };

};
