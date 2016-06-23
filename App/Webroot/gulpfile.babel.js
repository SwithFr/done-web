"use strict"

import gulp from 'gulp'
import babel from 'gulp-babel'
import watch from 'gulp-watch'
import sass from 'gulp-sass'
import BS from 'browser-sync'
import svgSymbols from 'gulp-svg-symbols'

let browserSync = BS.create()

gulp.task( 'sass', () => {
    return gulp.src( './src/sass/**/*.sass' )
        .pipe( sass().on( 'error', sass.logError ) )
        .pipe( gulp.dest( 'css' ) )
        .pipe( browserSync.stream() )
} )

gulp.task( 'babel', () => {
    return gulp.src( './src/js/**/*.js' )
        .pipe( babel( {
            presets: [ 'es2015' ]
        } ) )
        .pipe( gulp.dest( 'js' ) )
        .pipe( browserSync.stream() )
} )

gulp.task( 'svg', () => {
    return gulp.src( './img/*.svg' )
        .pipe( svgSymbols() )
        .pipe( gulp.dest( 'img' ) )
        .pipe( browserSync.stream() )
} )

gulp.task( 'watch', () => {
    browserSync.init( {
        proxy: "done.dev"
    } )

    gulp.watch( './src/js/**/*.js', [ 'babel' ] )
    gulp.watch( './src/sass/**/*.sass', [ 'sass' ] )
    gulp.watch( "../../App/Views/**/*" ).on( 'change', browserSync.reload )
} )

gulp.task( 'default', [ 'watch', 'babel', 'sass' ] )