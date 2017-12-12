var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    plumber      = require('gulp-plumber'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify       = require('gulp-uglify'),
    browserSync  = require('browser-sync').create(),
    reload       = browserSync.reload;

/*  -   Compile Sass   -  */
gulp.task('sass', function(){
    gulp.src('./assets/scss/*.scss')
        .pipe(plumber())
        .pipe(sass({
            includePaths : ['_/scss/**/*'],
            outputStyle: 'compressed'
        }))
        .pipe(plumber.stop())
        .pipe(autoprefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(gulp.dest('./assets/'))
        .pipe(browserSync.stream())
});

/*  -   Concatenation JS files  -  */
gulp.task('uglify', function() {
    return gulp.src('./assets/main.js')
        .pipe(uglify())
        .pipe(gulp.dest('./assets/'));
});

/*  -   Watcher   -  */
gulp.task('watch', ['sass'], function(){
    browserSync.init({
        proxy: "http://perso.wordpress.local"
    });

    gulp.watch('./assets/scss/**/*.scss', ['sass']);
    gulp.watch(['./**/*.php', './assets/*.js']).on('change', reload);
});
