var gulp = require("gulp"),
  less = require('gulp-less'),
  postcss = require("gulp-postcss"),
  autoprefixer = require("autoprefixer"),
  cssnano = require("cssnano"),
  sourcemaps = require("gulp-sourcemaps"),
  uglify = require('gulp-uglify-es').default,
  concat = require("gulp-concat"),
  rename = require("gulp-rename"),
  browserSync = require("browser-sync").create();

var paths = {
  styles: {
    input: "./assets/less/style.less",
    output: "./"
  },
  scripts: {
    input: [
        "./assets/js/vendor/*.js", 
        "./assets/js/bvd-tools.js",
        "./assets/js/phase-*.js",
        "./assets/js/bvd-app.js"],
    output: "./"
  }
};

function style() {
  return gulp
    .src(paths.styles.input)
    .pipe(sourcemaps.init())
    .pipe(less())
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(paths.styles.output))
    .pipe(browserSync.stream());
}

function scripts() {
  return gulp.src(paths.scripts.input)
    .pipe(sourcemaps.init())
    .pipe(uglify().on('error', console.error))
    .pipe(concat('scripts.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(paths.scripts.output))
    .pipe(browserSync.stream());
}

// A simple task to reload the page
function reload() {
  browserSync.reload();
}

// Add browsersync initialization at the start of the watch task
function watch() {
  browserSync.init({
    proxy: "batvsdolphin.local"
  });

  gulp.watch(paths.scripts.input, scripts);
  gulp.watch("./assets/less/**/*", style);
  gulp.watch("*.php").on('change', browserSync.reload);

}

exports.watch = watch
exports.style = style;
exports.scripts = scripts;

var build = gulp.series(watch, gulp.parallel(style, scripts)); 


gulp.task('default', build);
