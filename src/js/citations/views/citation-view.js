/* Citation views */

/*global wp_theme*/

'use strict';

var popup = require('modui-popup');
var lity = require('lity');

var template = require('../templates/container-form.tpl');

module.exports = function (Module, App, Backbone) {

  var $ = Backbone.$;
  var _ = Backbone._;

  var ItemView = Backbone.Marionette.ItemView.extend({

    tagName: 'fieldset',
    template: template,

    className: function () {
      return this.model.get('container') ? 'container' : 'source';
    },

    events: {
      'click .remove-container': 'removeContainer',
      'click .citation-field': 'maybeShowPopup',
      'click .image-link': 'showLightbox',
      'keyup input': 'updateField'
    },

    onRender: function () {
      var view = this;
      setTimeout(function () {
        $('.has-callout').each(function () {
          view.showPopup($(this), $(this).data('name'));
        });
      }, 1000);
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

    showPopup: function ($target, fieldName) {
      if (this.model.attributes.callouts[fieldName]) {
        popup.open({
          target: $target,
          position: 'right center',
          contents: this.model.attributes.callouts[fieldName]
        });
      }
    },

    maybeShowPopup: function (evt) {
      var $target = $(evt.target).closest('.citation-field');
      var fieldName = $target.data('name');
      this.showPopup($target, fieldName);
    },

    showLightbox: function (evt) {
      var lightbox = lity();
      var imageURL = $(evt.target).data('lity-image');
      // jscs:disable requireCamelCaseOrUpperCaseIdentifiers
      lightbox(wp_theme.asset_path + imageURL);
      // jscs:enable
    },

    serializeData: function () {
      this.model.setClassNames();
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
