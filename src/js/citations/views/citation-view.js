/* Citation views */

'use strict';

var popup = require('modui-popup');

var sourceTemplate = require('../templates/source-form.tpl');
var containerTemplate = require('../templates/container-form.tpl');

module.exports = function (Module, App, Backbone) {

  var $ = Backbone.$;
  var _ = Backbone._;

  var ItemView = Backbone.Marionette.ItemView.extend({

    tagName: 'fieldset',

    getTemplate: function () {
      return this.model.get('container') ? containerTemplate : sourceTemplate;
    },

    className: function () {
      return this.model.get('container') ? 'container' : 'source';
    },

    events: {
      'click .remove-container': 'removeContainer',
      'focus input': 'showPopup',
      'blur input': 'hideHilite',
      'keyup input': 'updateField'
    },

    updateField: function (evt) {
      var $field = $(evt.target);
      var newAttr = {};
      newAttr[$field.attr('name')] = $field.val();
      this.model.set(newAttr);
    },

    removeContainer: function () {
      this.model.collection.remove(this.model);
    },

    showPopup: function (evt) {

      var fieldName = $(evt.target).attr('name');
      if (this.model.attributes.callouts[fieldName]) {
        popup.open({
          target: $(evt.target).closest('.field'),
          position: 'right center',
          contents: this.model.attributes.callouts[fieldName]
        });
        console.log(fieldName);
      }

      $('.citation-output span').removeClass('hilite');
      $('.container-' + this.model.attributes.order + ' .field-' + fieldName).addClass('hilite');

    },

    hideHilite: function () {
      $('.citation-output span').removeClass('hilite');
    },

    serializeData: function () {
      return this.model.toJSON();
    }

  });

  var CollectionView = Backbone.Marionette.CollectionView.extend({

    childView: ItemView,
    tagName: 'div',
    className: 'citation',

    events: {
      'click .add-container': 'addContainer',
      'keyup input': 'updateCitation'
    },

    onRender: function () {
      this.updateCitation();
    },

    addContainer: function () {
      this.collection.add({});
    },

    onRemoveChild: function () {
      this.updateCitation();
    },

    updateCitation: function () {
      var citation = _.map(this.collection.models, function (model) {
        return model.getCitationString();
      });
      $('#citation-el').html(citation.join(''));
    }

  });

  Module.Views = Module.Views || {};

  Module.Views.Citation = {
    ItemView: ItemView,
    CollectionView: CollectionView
  };

};
