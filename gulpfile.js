import gulp from 'gulp'
import gulp_include from 'gulp-include' // include
import gulp_cache from 'gulp-cache' // Cache image optimizations
import gulp_sass from 'gulp-sass' // Sass compilation
import gulp_cleanCSS from 'gulp-clean-css' // Optimize CSS
import gulp_sass_glob from 'gulp-sass-glob' // Glob sass (support * import)
import gulp_prefixer from 'gulp-autoprefixer' // Prefix CSS for compatibilities issues
// import gulp_uglify from 'gulp-uglify'; // Optimize JS (not support ES6 ! Need to use TerserPlugin TODO: replace gulp by webpack)
import gulp_imagemin from 'gulp-imagemin'; // Optimize .gif .png .svg images
import imageminJpegoptim from 'imagemin-jpegoptim'; // Optimize .jpg & .jpeg images
import imageminMozjpeg from 'imagemin-mozjpeg'; // Optimize .jpg & .jpeg images
import browserSyncMod from 'browser-sync' // Sync multiple browsers & auto refresh naviguator on save
import { deleteAsync } from 'del'; // Delete files before optimizations
import * as dartSass from 'sass';

const sass = gulp_sass(dartSass);
const browserSync = browserSyncMod.create();

const browserLink = 'http://wordpress.local/';
const browserPort = 80;
const srcFolder = './_src';
const publicFolder = '.';

const srcSass = srcFolder + '/sass/**/**/*.+(sass|scss)';
const sassCompileFiles = srcFolder + '/sass/+(style|admin).scss';
const srcJS = srcFolder + '/js/**/*.js';
const srcPHP = srcFolder + '/php/**/*.php';
const srcImgs = srcFolder + '/assets/imgs/**/*.+(svg|png|jpg|jpeg|gif)';
const srcFonts = srcFolder + '/assets/fonts/**/*.+(ttf|woff|eot)';

const publicStyleFolder = publicFolder + '/';
const publicScriptFolder = publicFolder + '/js';
const publicPagesFolder = publicFolder + '/';
const publicAssetsFolder = publicFolder + '/assets';
const publicImagesFolder = publicAssetsFolder + '/imgs';
const publicFontsFolder = publicAssetsFolder + '/fonts';

export function clean() {
	return deleteAsync([
		publicStyleFolder + '*.css',
		publicScriptFolder,
		publicPagesFolder + '*.php',
		publicPagesFolder + 'inc/',
		publicPagesFolder + 'modules-php/',
		publicPagesFolder + 'page_templates/',
		publicAssetsFolder
	]).then(gulp_cache.clearAll());
}

/********************
 *   Dev functions  *
 ********************/

function styleDev() {
	return gulp
		.src(sassCompileFiles)
		.pipe(gulp_include())
		.pipe(gulp_sass_glob())
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp_prefixer('last 2 versions')) // list of targeted browsers => https://browserl.ist/?q=last+2+versions
		.pipe(gulp.dest(publicStyleFolder));
}

function scriptsDev() {
	return gulp
		.src(srcJS)
		.pipe(gulp_include())
		.pipe(gulp.dest(publicScriptFolder));
}

function pagesDev() {
	return gulp
		.src(srcPHP)
		.pipe(gulp_include())
		.pipe(gulp.dest(publicPagesFolder));
}

function fontsDev() {
	return gulp.src(srcFonts).pipe(gulp.dest(publicFontsFolder));
}

function imgsDev() {
	return gulp
		.src(srcImgs)
		.pipe(
			gulp_cache(
				gulp_imagemin([
					// gulp_imagemin.gifsicle({
					// 	interlaced: true,
					// 	optimizationLevel: 1
					// }),

					imageminJpegoptim({
						progressive: true,
						strilAll: true
					}),
					imageminMozjpeg({
						progressive: true,
						quality: 85
					}),

					// gulp_imagemin.optipng({
					// 	interlaced: true,
					// 	optimizationLevel: 0
					// }),

					// gulp_imagemin.svgo({
					// 	plugins: [
					// 		{
					// 			sortAttrs: true
					// 		}
					// 	]
					// })
				])
			)
		)
		.pipe(gulp.dest(publicImagesFolder));
}

const devBuild = gulp.parallel(
	styleDev,
	scriptsDev,
	pagesDev,
	imgsDev,
	fontsDev
);

/*********************
 *   Prod functions  *
 *********************/

function styleProd() {
	return gulp
		.src(sassCompileFiles)
		.pipe(gulp_include())
		.pipe(gulp_sass_glob())
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp_prefixer('last 2 versions')) // list of targeted browsers => https://browserl.ist/?q=last+2+versions
		.pipe(gulp_cleanCSS())
		.pipe(gulp.dest(publicStyleFolder));
}

function scriptProd() {
	return gulp
		.src(srcJS)
		.pipe(gulp_include())
		// .pipe(gulp_uglify())
		.pipe(gulp.dest(publicScriptFolder));
}

function pagesProd() {
	return gulp
		.src(srcPHP)
		.pipe(gulp_include())
		.pipe(gulp.dest(publicPagesFolder));
}

function fontsProd() {
	return gulp.src(srcFonts).pipe(gulp.dest(publicFontsFolder));
}

function imgProd() {
	return gulp
		.src(srcImgs)
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
		.pipe(gulp.dest(publicImagesFolder));
}

const prodBuild = gulp.parallel(
	styleProd,
	scriptProd,
	pagesProd,
	imgProd,
	fontsProd
);

/********************
 *   Browser Sync    *
 ********************/
function browserSyncReload(done) {
	browserSync.reload();
	done();
}

function browserSyncServer(done) {
	browserSync.init({
		proxy: browserLink,
		port: browserPort
	});

	gulp.watch(srcSass, gulp.series(styleDev, browserSyncReload));
	gulp.watch(srcJS, gulp.series(scriptsDev, browserSyncReload));
	gulp.watch(srcPHP, gulp.series(pagesDev, browserSyncReload));
	gulp.watch(srcImgs, gulp.series(imgsDev, browserSyncReload));
	gulp.watch(srcFonts, gulp.series(fontsDev, browserSyncReload));

	done();
}


export default gulp.series(clean, devBuild, browserSyncServer);

export const work = gulp.series(clean, devBuild, browserSyncServer);

export const build = gulp.series(clean, prodBuild);
