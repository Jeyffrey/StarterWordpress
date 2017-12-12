const gulp         = require('gulp'),
      sass         = require('gulp-sass'),
      babel        = require('gulp-babel'),
      uglify       = require('gulp-uglify'),
      plumber      = require('gulp-plumber'),
      autoprefixer = require('gulp-autoprefixer'),
      browserSync  = require('browser-sync').create(),
      reload       = browserSync.reload;

/*  -   Compile Sass   -  */
gulp.task('sass', () =>
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
);

/*  -   Compile JS  -  */
gulp.task('javascript', () =>
    gulp.src('./assets/js/main.js')
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(plumber.stop())
        .pipe(uglify())
        .pipe(gulp.dest('./assets/'))
        .pipe(browserSync.stream())
);

/*  -   Watcher   -  */
gulp.task('watch', ['sass', 'javascript'], () => {
     browserSync.init({
        proxy: "http://perso.wordpress.local"
    })

    gulp.watch('./assets/scss/**/*.scss', ['sass'])
    gulp.watch('./assets/js/**/*.js', ['javascript'])
    gulp.watch(['./**/*.php']).on('change', reload)
});
