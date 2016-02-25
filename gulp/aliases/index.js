/* Gulp task aliases */

module.exports = {
  default: [
    'assets',
    'watch'
  ],
  assets: [
    'js-lint',
    'browserify',
    'scss-lint',
    'sass'
  ]
};
