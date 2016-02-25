/* Compiles Sass files, autoprefixes, minifies, and writes sourcemaps. */

'use strict';

var autoprefixer = require('gulp-autoprefixer');
var config = require('../config/sass.json');
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var cssnano = require('gulp-cssnano');

module.exports = function () {
  return gulp.src(config.source)
    .pipe(sourcemaps.init())
    .pipe(sass(config.sassConfig))
    .pipe(sourcemaps.write({includeContent: false}))
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(autoprefixer(config.autoprefix))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.target));
};
