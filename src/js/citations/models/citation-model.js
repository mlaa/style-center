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

        schema: {
          source: {
            author: {
              name: 'Author',
              punctuation: '.'
            },
            title: {
              name: 'Title of source',
              punctuation: '.'
            }
          },
          container: {
            author: {
              name: 'Other contributors',
              punctuation: ','
            },
            title: {
              name: 'Title of container',
              punctuation: ','
            },
            version: {
              name: 'Version',
              punctuation: ','
            },
            number: {
              name: 'Number',
              punctuation: ','
            },
            publisher: {
              name: 'Publisher',
              punctuation: ','
            },
            pubdate: {
              name: 'Publication date',
              punctuation: ','
            },
            location: {
              name: 'Location',
              punctuation: '.'
            }
          }
        },

        callouts: {},
        classNames: {},
        images: {},

        order: this.collection.nextOrder()
      };
    },

    setClassNames: function () {
      var modelAttrs = this.attributes;
      var classNames = {};

      _.each(_.keys(modelAttrs.schema.container), function (attr) {
        var attrClassNames = [];

        if (modelAttrs[attr]) {
          attrClassNames.push('has-value');
        }

        if (modelAttrs.callouts[attr]) {
          attrClassNames.push('has-callout');
        }

        if (modelAttrs.images[attr]) {
          attrClassNames.push('has-image');
        }

        classNames[attr] = attrClassNames.join(' ');
      });

      this.set({
        classNames: classNames
      });
    },

    getCitationString: function () {

      var modelAttrs = this.attributes;

      var formatAttribute = function (attr, str) {
        return str.replace(/_([^_]+)_/g, '<em>$1</em>');
      };

      var filterAttrs = (modelAttrs.container) ? _.keys(modelAttrs.schema.container) : _.keys(modelAttrs.schema.container);

      // Filter attributes for valid string values, then reduce to a
      // citation string.
      var attrs = _.filter(filterAttrs, function (attr) {
        var val = modelAttrs[attr];
        return (typeof val === 'string' && val.replace(/\s/g, '') !== '');
      });

      var citation = attrs.map(function (attr) {
        return '<span class="field-' + attr + '">' + formatAttribute(attr, modelAttrs[attr]) + '</span>';
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
