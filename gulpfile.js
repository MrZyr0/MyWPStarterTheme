const gulp = require('gulp');
const gulp_sass = require('gulp-sass'); // Sass compilation
const gulp_cleanCSS = require('gulp-clean-css'); // Optimize CSS
const gulp_sass_glob = require('gulp-sass-glob'); // Glob sass (support * import)
const gulp_prefixer = require('gulp-autoprefixer'); // Prefix CSS for compatibilities issues
const gulp_uglify = require('gulp-uglify'); // Optimize JS
const gulp_cache = require('gulp-cache'); // Cache image optimizations
const gulp_imagemin = require('gulp-imagemin'); // Optimize .gif .png .svg images
const imageminJpegoptim = require('imagemin-jpegoptim'); // Optimize .jpg & .jpeg images
const imageminMozjpeg = require('imagemin-mozjpeg'); // Optimize .jpg & .jpeg images
const browserSync = require('browser-sync').create(); // Sync multiple browsers & auto refresh naviguator on save
const del = require('del'); // Delete files before optimizations

const browserLink = '[YOUR LINK TO YOUR PROJECT USING A WEBSERVER]';
const browserPort = 3030;
const srcFolder = './_src';
const publicFolder = '.';

const srcSass = srcFolder + '/sass/**/**/*.+(sass|scss)';
const sassCompileFiles = srcFolder + '/sass/+(style|admin).scss';
const srcJS = srcFolder + '/js/**/*.js';
const srcPHP = srcFolder + '/php/**/*.php';
const srcImg = srcFolder + '/assets/**/*.+(svg|png|jpg|jpeg|gif)';

const publicStyleFolder = publicFolder + '/';
const publicScriptFolder = publicFolder + '/js';
const publicPagesFolder = publicFolder + '/';
const publicImgsFolder = publicFolder + '/assets';

function clean(done) {
	del([
		publicStyleFolder + '*.css',
		publicScriptFolder,
		publicPagesFolder + '*.php',
		publicPagesFolder + 'inc/',
		publicPagesFolder + 'modules/',
		publicPagesFolder + 'page_templates/',
		publicImgsFolder
	]);
	gulp_cache.clearAll();
	done();
}

/********************
 *   Dev functions  *
 ********************/

function styleDev() {
	del(publicStyleFolder + '*.css');
	return gulp
		.src(sassCompileFiles)
		.pipe(gulp_sass_glob())
		.pipe(gulp_sass())
		.pipe(gulp_prefixer('last 2 versions')) // list of targeted browsers => https://browserl.ist/?q=last+2+versions
		.pipe(gulp.dest(publicStyleFolder));
}

function scriptDev() {
	del(publicScriptFolder);
	return gulp.src(srcJS).pipe(gulp.dest(publicScriptFolder));
}

function pagesDev() {
	del([publicPagesFolder + '*.php']);
	return gulp.src(srcPHP).pipe(gulp.dest(publicPagesFolder));
}

function imgDev() {
	del([publicImgsFolder + '/img/*.+(svg|png|jpg|jpeg|gif)']);
	return gulp
		.src(srcImg)
		.pipe(
			gulp_cache(
				gulp_imagemin([
					gulp_imagemin.gifsicle({
						interlaced: true,
						optimizationLevel: 1
					}),

					imageminJpegoptim({
						progressive: true,
						strilAll: true
					}),
					imageminMozjpeg({
						progressive: true,
						quality: 85
					}),

					gulp_imagemin.optipng({
						interlaced: true,
						optimizationLevel: 0
					}),

					gulp_imagemin.svgo({
						plugins: [
							{
								sortAttrs: true
							}
						]
					})
				])
			)
		)
		.pipe(gulp.dest(publicImgsFolder));
}

const devBuild = gulp.parallel(styleDev, scriptDev, pagesDev, imgDev);

/*********************
 *   Prod functions  *
 *********************/

function styleProd() {
	del(publicStyleFolder + '*.css');
	return gulp
		.src(sassCompileFiles)
		.pipe(gulp_sass_glob())
		.pipe(gulp_sass())
		.pipe(gulp_prefixer('last 2 versions')) // list of targeted browsers => https://browserl.ist/?q=last+2+versions
		.pipe(gulp_cleanCSS())
		.pipe(gulp.dest(publicStyleFolder));
}

function scriptProd() {
	del(publicScriptFolder + '/*.js');
	return gulp
		.src(srcJS)
		.pipe(gulp_uglify())
		.pipe(gulp.dest(publicScriptFolder));
}

function pagesProd() {
	del([publicPagesFolder + '*.php']);
	return gulp.src(srcPHP).pipe(gulp.dest(publicPagesFolder));
}

function imgProd() {
	del([publicImgsFolder + '/img/*.+(svg|png|jpg|jpeg|gif)']);
	return gulp
		.src(srcImg)
		.pipe(
			gulp_cache(
				gulp_imagemin([
					gulp_imagemin.gifsicle({
						interlaced: true,
						optimizationLevel: 3
					}),

					imageminJpegoptim({
						progressive: true,
						strilAll: true
					}),
					imageminMozjpeg({
						progressive: true,
						quality: 85
					}),

					gulp_imagemin.optipng({
						interlaced: true,
						optimizationLevel: 7
					}),

					gulp_imagemin.svgo({
						plugins: [
							{
								sortAttrs: true
							}
						]
					})
				])
			)
		)
		.pipe(gulp.dest(publicImgsFolder));
}

const prodBuild = gulp.parallel(styleProd, scriptProd, pagesProd, imgProd);

/********************
 *   Browser Sync    *
 ********************/
function browserSyncReload(done) {
	browserSync.reload();
	done();
}

function devSync() {
	browserSync.init({
		proxy: browserLink,
		port: browserPort
	});

	gulp.watch(srcSass, gulp.series(styleDev, browserSyncReload));
	gulp.watch(srcJS, gulp.series(scriptDev, browserSyncReload));
	gulp.watch(srcPHP, gulp.series(pagesDev, browserSyncReload));
	gulp.watch(srcImg, gulp.series(imgDev, browserSyncReload));
}

exports.default = gulp.series(clean, devBuild, devSync);
exports.work = exports.default;

exports.build = gulp.series(clean, prodBuild);

exports.clean = clean;
