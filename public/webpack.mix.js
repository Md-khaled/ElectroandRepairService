const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
/*Admin*/
	.scripts([
	'resources/assets/admin/js/jquery-3.3.1.min.js',
	'resources/assets/admin/js/libscripts.bundle.js',
	'resources/assets/admin/js/vendorscripts.bundle.js',
	'resources/assets/admin/js/jvectormap.bundle.js',
	'resources/assets/admin/js/sparkline.bundle.js',
	'resources/assets/admin/js/c3.bundle.js',
	'resources/assets/admin/js/mainscripts.bundle.js',
	'resources/assets/admin/js/index.js',
	'resources/assets/admin/js/dropzone.js',
	'resources/assets/admin/js/summernote.js',
	],'public/admin/js/all.js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
    'resources/assets/admin/css/bootstrap.min.css',
    'resources/assets/admin/css/jquery-jvectormap-2.0.3.min.css',
    'resources/assets/admin/css/plugin.css',
    'resources/assets/admin/css/morris.min.css',
    'resources/assets/admin/css/summernote.css',
    'resources/assets/admin/css/bootstrap-select.css',
    'resources/assets/admin/css/style.min.css',
    ],'public/admin/css/custom.css')
    /*User*/
    .scripts([
	//'resources/assets/users/js/modernizr-2.8.3.min.js',
	'resources/assets/users/js/jquery-3.1.1.min.js',
	'resources/assets/users/js/bootstrap.min.js',
	'resources/assets/users/js/jquery.nivo.slider.js',
	'resources/assets/users/js/plugins.js',
	'resources/assets/users/js/main.js',
	],'public/users/js/all.js')
	.styles([
    'resources/assets/users/css/bootstrap.min.css',
    'resources/assets/users/css/nivo-slider.css',
   // 'resources/assets/users/css/core.css',
    'resources/assets/users/css/animate.css',
    'resources/assets/users/css/slick.css',
    'resources/assets/users/css/jquery-ui.min.css',
    'resources/assets/users/css/meanmenu.min.css',
    'resources/assets/users/css/jquery.fancybox.css',
    'resources/assets/users/css/textanimate.css',
    'resources/assets/users/css/jquery.mb.YTPlayer.min.css',
    'resources/assets/users/css/default.css',
    'resources/assets/users/css/header.css',
    'resources/assets/users/css/slider.css',
    'resources/assets/users/css/footer.css',
    //'resources/assets/users/css/shortcodes.css',
    'resources/assets/users/css/style.css',
    'resources/assets/users/css/responsive.css',
    'resources/assets/users/css/custom.css',
    'resources/assets/users/css/style-customizer.css',
    ],'public/users/css/custom.css')
    /*for auth*/
    .scripts([
    'resources/assets/users/js/core/jquery.min.js',
    'resources/assets/users/js/core/popper.min.js',
    'resources/assets/users/js/core/bootstrap-material-design.min.js',
    'resources/assets/users/js/core/perfect-scrollbar.jquery.min.js',
    'resources/assets/users/js/core/material-dashboard.minf066.js',
    ],'public/users/coreJs/all.js')
    .styles([
    'resources/assets/users/css/core/font-awesome.min.css',
    'resources/assets/users/css/core/material-dashboard.minf066.css',
    ],'public/users/coreCss/all.css')
    .version();
