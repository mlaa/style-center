/* Citation model */

'use strict';

module.exports = function (Module, App, Backbone) {

  Module.Models = Module.Models || {};

  var _ = Backbone._;

  var Model = Backbone.Model.extend({

    defaults: function () {
      return {
        title: '',
        author: '',
        version: '',
        number: '',
        publisher: '',
        pubdate: '',
        location: '',
        container: true,
        containerNumber: 1,
        callouts: {},
        order: this.collection.nextOrder()
      };
    },

    getCitationString: function () {

      var modelAttrs = this.attributes;

      var containerAttrs = [
        'title',
        'author',
        'version',
        'number',
        'publisher',
        'pubdate',
        'location'
      ];

      var sourceAttrs = [
        'author',
        'title'
      ];

      var formatAttribute = function (attr, str, separator) {
        str = (str + separator).replace(/^[\"]/, '“').replace(/[\"”]$/, separator + '”');
        return str.replace(/_([^_]+)_/g, '<em>$1</em>');
      };

      var filterAttrs = (this.attributes.container) ? containerAttrs : sourceAttrs;

      // Filter attributes for valid string values, then reduce to a
      // citation string.
      var attrs = _.filter(filterAttrs, function (attr) {
        var val = modelAttrs[attr];
        return (typeof val === 'string' && val.replace(/\s/g, '') !== '');
      });

      var last = attrs.length - 1;
      var citation = attrs.map(function (attr, i) {
        var separator = (i === last) ? '.' : ',';
        return '<span class="field-' + attr + '">' + formatAttribute(attr, modelAttrs[attr], separator) + '</span>';
      });

      // Wrap in span.
      return '<span class="container-' + this.attributes.order + '">' + citation.join(' ') + '</span> ';

    }

  });

  var Collection = Backbone.Collection.extend({

    model: Model,
    comparator: 'order',

    initialize: function () {
      this.bind('add remove', this.updateNumbers);
    },

    updateNumbers: function () {
      this.each(function (model, i) {
        model.set('containerNumber', i);
      });
    },

    counter: 0,

    nextOrder: function () {
      this.counter = this.counter + 1;
      return this.counter;
    }

  });

  Module.Models.Citation = {
    Model: Model,
    Collection: Collection
  };

};
