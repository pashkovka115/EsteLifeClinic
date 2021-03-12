// https://github.com/agragregra/OptimizedHTML-5/blob/master/gulpfile.js


var syntax = 'sass'; // Syntax: sass or scss;
var src_folder = 'app_html/'; // Результирующая папка

// var gulp = require('gulp'),

const {src, dest, parallel, series, watch} = require('gulp');
const gutil = require('gulp-util');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cleancss = require('gulp-clean-css');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const notify = require("gulp-notify");
const rsync = require('gulp-rsync');




function browser_sync() {
    // browserSync({
    browserSync.init({
        server: {
            baseDir: src_folder
        },
        notify: false,
        // open: false,
        // online: false, // Work Offline Without Internet Connection
        // tunnel: true, tunnel: "projectname", // Demonstration page: http://projectname.localtunnel.me
    })
}

function styles() {
    return src(src_folder + syntax + '/**/*.' + syntax + '')
        .pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
        .pipe(rename({suffix: '.min', prefix: ''}))
        .pipe(autoprefixer(['last 15 versions']))
        .pipe(cleancss({level: {1: {specialComments: 0}}})) // Opt., comment out when debugging
        .pipe(dest(src_folder + 'css'))
        .pipe(dest(src_folder + '../public/css'))
        .pipe(browserSync.stream())
}

function js() {
    return src([
        src_folder + 'libs/jquery/dist/jquery.min.js',
        src_folder + 'libs/waypoints/waypoints.min.js',
        src_folder + 'libs/animate/animate-css.js',
        // src_folder + 'libs/plugins-scroll/plugins-scroll.js',
        src_folder + 'libs/magnific/jquery.magnific-popup.min.js',
        src_folder + 'libs/slick/slick.js',
        src_folder + 'libs/inputmask/jquery.inputmask.bundle.js',
        src_folder + 'libs/nice-select/jquery.nice-select.min.js',
        src_folder + 'libs/twentytwenty/js/jquery.event.move.js',
        src_folder + 'libs/twentytwenty/js/jquery.twentytwenty.js',
        src_folder + 'libs/sticky/jquery.sticky.js',
        src_folder + 'js/common.js', // Always at the end
    ])
        .pipe(concat('scripts.min.js'))
        .pipe(uglify()) // Mifify js (opt.)
        .pipe(dest(src_folder + 'js'))
        .pipe(dest(src_folder + '../public/js'))
        .pipe(browserSync.reload({stream: true}))
}

/*gulp.task('rsync', function () {
    return gulp.src('app/!**')
        .pipe(rsync({
            root: src,
            hostname: 'username@yousite.com',
            destination: 'yousite/public_html/',
            // include: ['*.htaccess'], // Includes files to deploy
            exclude: ['**!/Thumbs.db', '**!/!*.DS_Store'], // Excludes files from deploy
            recursive: true,
            archive: true,
            silent: false,
            compress: true
        }))
});*/

/*gulp.task('watch', ['styles', 'js', 'browser-sync'], function () {
    gulp.watch(src_folder + syntax + '/!**!/!*.' + syntax + '', ['styles']);
    gulp.watch(['libs/!**!/!*.js', src_folder + 'js/common.js'], ['js']);
    gulp.watch(src + '*.html', browserSync.reload)
});*/

// gulp.task('default', ['watch']);

exports.js = js
exports.styles  = styles
