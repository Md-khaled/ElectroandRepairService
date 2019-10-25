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
     /*for RepairService*/
    .scripts([
    'resources/assets/repair-service/js/jquery.min.js',
    'resources/assets/repair-service/js/colors.js',
    'resources/assets/repair-service/js/modernizr.min.js',
    'resources/assets/repair-service/js/wow.min.js',
    'resources/assets/repair-service/js/jquery.fancybox.min.js',
    'resources/assets/repair-service/js/animate-text.js',
    'resources/assets/repair-service/js/jquery.slicknav.min.js',
    'resources/assets/repair-service/js/jquery.stellar.min.js',
    'resources/assets/repair-service/js/easing.js',
    'resources/assets/repair-service/js/jquery.nav.js',
    'resources/assets/repair-service/js/owl.carousel.min.js',
    'resources/assets/repair-service/js/ytplayer.min.js',
    'resources/assets/repair-service/js/particles.min.js',
    'resources/assets/repair-service/js/waypoints.min.js',
    'resources/assets/repair-service/js/jquery.counterup.min.js',
    'resources/assets/repair-service/js/isotope.pkgd.min.js',
    'resources/assets/repair-service/js/bootstrap.min.js',
    'resources/assets/repair-service/js/main.js',
    ],'public/repair-service/js/all.js')
    .styles([
    'resources/assets/repair-service/css/animate.min.css',
    'resources/assets/repair-service/css/jquery.fancybox.min.css',
    'resources/assets/repair-service/css/slicknav.min.css',
    'resources/assets/repair-service/css/animate-text.css',
    'resources/assets/repair-service/css/owl.theme.default.css',
    'resources/assets/repair-service/css/owl.carousel.min.css',
    'resources/assets/repair-service/css/bootstrap.min.css',
    'resources/assets/repair-service/css/style.css',
    'resources/assets/repair-service/css/reset.css',
    'resources/assets/repair-service/css/responsive.css',
    'resources/assets/repair-service/css/color3.css',
    ],'public/repair-service/css/all.css')
    .version();
