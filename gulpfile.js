var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    vinylpaths = require('vinyl-paths'),
    cleancss = require('gulp-clean-css'),
    cmq = require('gulp-combine-mq'),
    prettify = require('gulp-jsbeautifier'),
    concatcss = require('gulp-concat-css'),
    uglify = require('gulp-uglify'),
    del = require('del');

// CSS
gulp.task('source:css', function(){
    return gulp.src('scss/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(cmq())
        .pipe(prettify())
        .pipe(gulp.dest('temp/css'))
        .pipe(rename('widget.css'))
        .pipe(gulp.dest('css'))
        .pipe(notify({ message: 'Source styles task complete' }));
} );

// Vendor JS
gulp.task('vendor:js', function(){
    return gulp.src([
        'bower_components/veinjs/vein.js',
        'bower_components/owl.carousel/dist/owl.carousel.js'
    ])
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('temp/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(notify({ message: 'Vendor scripts task complete' }));
});

// Clean temp folder
gulp.task('clean:temp', function(){
    return gulp.src('temp/*')
    .pipe(vinylpaths(del))
});

// Default task
gulp.task('default', ['clean:temp'], function() {
    gulp.start('source:css', 'watch');
    gulp.start('vendor:js', 'watch');
});

// Watch
gulp.task('watch', function() {
    // Watch .scss files
    gulp.watch(['scss/*.scss', 'sass/**/*.scss'], ['source:css']);
    gulp.watch(['js/vendor/*.js'], ['vendor:js']);
});
