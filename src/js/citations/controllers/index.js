/* Citation controller */

'use strict';

module.exports = function (Module, App, Backbone) {

  var $ = Backbone.$;

  var $els = {
    output: $('#citation-output')
  };

  var citation1 = [
    {
      author: 'Copeland, Edward',
      title: '“Money”',
      container: false,
      callouts: {
        author: 'The author (21) and title (27) of the source, found on the first page of the essay.',
        title: 'The author (21) and title (27) of the source, found on the first page of the essay.'
      }
    },
    {
      author: 'edited by Copeland and Juliet McMaster',
      title: '_The Cambridge Companion to Jane Austen_',
      publisher: 'Cambridge UP',
      pubdate: '1997',
      location: 'pp. 131–48',
      callouts: {
        author: 'The book has two editors, one of whom is Copeland. ' +
          'They are <strong>other contributors</strong>. Since Edward ' +
          'Copeland is named twice, his first name is omitted in the ' +
          'second occurrence. See p. xxx.',
        title: 'The essay is contained in a book titled <em>The Cambridge ' +
          'Companion to Jane Austen</em>. The book is thus the container ' +
          'of the essay. In this tool, we use underscores to impart <em>_italics_</em>.',
        version: 'The book shows no sign of being a <strong>version</strong> ' +
          '(such as a second edition). See p. xxx.',
        number: 'No <strong>number</strong> is displayed (such as a ' +
          'volume number). See p. xxx.',
        publisher: 'The <strong>publisher</strong> is identified on the title page.',
        pubdate: 'The <strong>publication date</strong> doesn’t appear ' +
          'on the title page, but a copyright date is given on the reverse. ' +
          'The latest copyright date should usually be treated as the publication ' +
          'date unless the copyright page indicates that the book was significantly ' +
          'changed at a later date (not just reprinted)',
        location: 'For an essay in a book anthology, the <strong>location</strong> is ' +
          'the range of page numbers from the starting one to the' +
          'ending one. See p. xxx.'
      }
    }
  ];

  var showCitationIntro = function () {

    $els.output.hide();

    App.Content.show(Module.Views.Layout, {
      forceShow: true,
      preventDestroy: true
    });

    Module.Views.Layout.showChildView('intro', new Module.Views.Intro());
    Module.Views.Layout.showChildView('form', new Module.Views.Citation.CollectionView({
      collection: new Module.Models.Citation.Collection([{container: false}, {}])
    }));

  };

  var showCitationForm = function () {

    $els.output.show();

    App.Content.show(Module.Views.Layout, {
      forceShow: true,
      preventDestroy: true
    });

    Module.Views.Layout.showChildView('intro', new Module.Views.Step1());
    Module.Views.Layout.showChildView('form', new Module.Views.Citation.CollectionView({
      collection: new Module.Models.Citation.Collection(citation1)
    }));

  };

  return Backbone.Marionette.Controller.extend({
    showCitationIntro: showCitationIntro,
    showCitationForm: showCitationForm
  });

};
