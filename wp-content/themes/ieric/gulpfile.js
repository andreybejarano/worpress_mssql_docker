var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    stripCssComments = require('gulp-strip-css-comments');
browserSync = require('browser-sync'),
    replace = require('gulp-string-replace'),
    imagemin = require('gulp-imagemin'),
    mode = require('gulp-mode')();

// Create browserSync server
var server = browserSync.create();

// Set paths for dest and source files
var paths = {
    dest: './dist',

    styles: {
        src: './assets/scss/**/*.sass',
        sourcemaps: './dist/css/sourcemap.css'
    },

    scripts: {
        src: [
            './node_modules/jquery/dist/jquery.min.js',
            './assets/js/app.js'
        ]
    },

    images: {
        src: [
            './assets/img/**/*.jpg',
            './assets/img/**/*.jpeg',
            './assets/img/**/*.png',
            './assets/img/**/*.svg',
            './assets/img/**/*.gif'
        ],

        dest: './dist/img'
    }
};

// Options
var sassOptions = {
    errLogToConsole: true,
    /*
    Output options:
    - compressed
    - compact
    - nested
    - expanded
    */
    outputStyle: 'compressed'
};

// Uglify and concat JS files
function scripts() {
    return gulp
        .src(paths.scripts.src)
        .pipe(uglify())
        .pipe(concat('app.min.js'))
        .pipe(mode.development(sourcemaps.write('../sourcemaps')))
        .pipe(gulp.dest(paths.dest + "/js"))
        .pipe(server.stream());
}

// Bundle styles files
function styles() {

    // Bundle everything
    return gulp
        .src(paths.styles.src)
        .pipe(mode.development(sourcemaps.init()))
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(stripCssComments({
            preserve: false
        }))
        .pipe(mode.development(sourcemaps.write('../sourcemaps')))
        .pipe(gulp.dest(paths.dest + "/css"))
        .pipe(server.stream());
}

// Reload when required
function reload(done) {
    server.reload();
    done();
}

// Serve the app using browserSync
function serve(done) {
    server.init({
        proxy: "http://localhost:8080",
        port: 8080
    });

    done();
}

// Watch and reload on changes
function watch() {
    gulp.watch(paths.scripts.src, gulp.series(scripts, reload));
    gulp.watch(paths.styles.src, gulp.series(styles));
    //gulp.watch("**/*.php", gulp.series(styles, scripts, reload));
    //gulp.watch("**/*.html", gulp.series(styles, scripts, reload));
};

// When starting, initialize styles, scripts, serve and watch files
gulp.task('default', gulp.series(
    styles, scripts, serve, watch
));

function images_compression(done) {
    return gulp
        .src(paths.images.src)
        .pipe(imagemin({
            verbose: true
        }))
        .pipe(gulp.dest(paths.images.dest))
}


// Compress images
gulp.task('compress-images', gulp.series(
    images_compression
));

// Build for prod
gulp.task('build', gulp.series(
    styles, scripts, images_compression
));