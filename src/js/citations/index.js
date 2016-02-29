/* Citation module */

module.exports = function (Module, App, Backbone) {

  'use strict';

  require('./links')(Module, App, Backbone);
  require('./models/citation-model.js')(Module, App, Backbone);
  require('./views/citation-view.js')(Module, App, Backbone);
  require('./views/citation-intro-view.js')(Module, App, Backbone);
  require('./views/citation-step1-view.js')(Module, App, Backbone);
  require('./views/layout-view.js')(Module, App, Backbone);

  var Router = require('./routers')(Module, App, Backbone);
  var Controller = require('./controllers')(Module, App, Backbone);

  App.addInitializer(function () {
    Module.router = new Router({
      controller: new Controller()
    });
  });

};
