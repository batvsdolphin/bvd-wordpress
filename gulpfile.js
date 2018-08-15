var gulp = require('gulp');
var less = require('gulp-less');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var notify = require('gulp-notify');
var responsive = require('gulp-responsive');
var argv = require('yargs').argv;

var exec = require('child_process').exec;

gulp.task('less', function() {

  var dir = './assets/less/';

  return gulp.src([
    dir + 'reset.less',
    dir + 'common.less',
    dir + 'sidebar.less',
    dir + 'page-*.less'
  ]).pipe(concat('style')).pipe(less()).pipe(autoprefixer({browsers: ['last 2 versions'], cascade: false})).pipe(cleanCSS({compatibility: 'ie8'})).pipe(gulp.dest('./'));
});

gulp.task('js', function() {

  var dir = './assets/js/';

  // jQuery, Vendor, Custom

  return gulp.src([
    dir + 'vendor/jquery-3.1.1.min.js',
    dir + 'vendor/*.js',
    dir + 'bvd-tools.js',
    dir + 'phase-*.js',
    dir + 'bvd-app.js'
  ]).pipe(concat('scripts.js')).pipe(uglify()).pipe(gulp.dest('./assets/'));
});

gulp.task('default', ['less', 'js']);
gulp.watch('./assets/less/*.less', ['less']);
gulp.watch('./assets/js/*.js', ['js']);
