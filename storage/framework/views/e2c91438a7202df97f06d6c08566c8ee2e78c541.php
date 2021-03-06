<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="<?php echo e($html_class ?? ''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css'>
    <?php event(new \Modules\Layout\Events\LayoutBeginHead()); ?>
    <?php
        $favicon = setting_item('site_favicon');
    ?>
    <?php if($favicon): ?>
        <?php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        ?>
        <?php if(!empty($file)): ?>
            <link rel="icon" type="<?php echo e($file['file_type']); ?>" href="<?php echo e(asset('uploads/'.$file['file_path'])); ?>" />
        <?php else: ?>:
            <link rel="icon" type="image/png" href="<?php echo e(url('images/favicon.png')); ?>" />
        <?php endif; ?>
    <?php endif; ?>

    <?php echo $__env->make('Layout::parts.seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href="<?php echo e(asset('libs/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/icofont/icofont.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/notification.css')); ?>" rel="newest stylesheet">
    <link href="<?php echo e(asset('dist/frontend/css/app.css?_ver='.config('app.version'))); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/daterange/daterangepicker.css")); ?>" >
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A300%2C400%2C500%2C600' type='text/css' media='all' />
    <?php echo \App\Helpers\Assets::css(); ?>

    <?php echo \App\Helpers\Assets::js(); ?>

    <script>
        var bookingCore = {
            url:'<?php echo e(url( app_get_locale() )); ?>',
            url_root:'<?php echo e(url('')); ?>',
            booking_decimals:<?php echo e((int)get_current_currency('currency_no_decimal',2)); ?>,
            thousand_separator:'<?php echo e(get_current_currency('currency_thousand')); ?>',
            decimal_separator:'<?php echo e(get_current_currency('currency_decimal')); ?>',
            currency_position:'<?php echo e(get_current_currency('currency_format')); ?>',
            currency_symbol:'<?php echo e(currency_symbol()); ?>',
			currency_rate:'<?php echo e(get_current_currency('rate',1)); ?>',
            date_format:'<?php echo e(get_moment_date_format()); ?>',
            map_provider:'<?php echo e(setting_item('map_provider')); ?>',
            map_gmap_key:'<?php echo e(setting_item('map_gmap_key')); ?>',
            map_options:{
                map_lat_default:'<?php echo e(setting_item('map_lat_default')); ?>',
                map_lng_default:'<?php echo e(setting_item('map_lng_default')); ?>',
                map_clustering:'<?php echo e(setting_item('map_clustering')); ?>',
                map_fit_bounds:'<?php echo e(setting_item('map_fit_bounds')); ?>',
            },
            routes:{
                login:'<?php echo e(route('auth.login')); ?>',
                register:'<?php echo e(route('auth.register')); ?>',
                checkout:'<?php echo e(is_api() ? route('api.booking.doCheckout') : route('booking.doCheckout')); ?>'
            },
            module:{
                hotel:'<?php echo e(route('hotel.search')); ?>',
                car:'<?php echo e(route('car.search')); ?>',
                tour:'<?php echo e(route('tour.search')); ?>',
                space:'<?php echo e(route('space.search')); ?>',
                flight:"<?php echo e(route('flight.search')); ?>"
            },
            currentUser: <?php echo e((int)Auth::id()); ?>,
            isAdmin : <?php echo e(is_admin() ? 1 : 0); ?>,
            rtl: <?php echo e(setting_item_with_lang('enable_rtl') ? "1" : "0"); ?>,
            markAsRead:'<?php echo e(route('core.notification.markAsRead')); ?>',
            markAllAsRead:'<?php echo e(route('core.notification.markAllAsRead')); ?>',
            loadNotify : '<?php echo e(route('core.notification.loadNotify')); ?>',
            pusher_api_key : '<?php echo e(setting_item("pusher_api_key")); ?>',
            pusher_cluster : '<?php echo e(setting_item("pusher_cluster")); ?>',
        };
        var i18n = {
            warning:"<?php echo e(__("Warning")); ?>",
            success:"<?php echo e(__("Success")); ?>",
        };
        var daterangepickerLocale = {
            "applyLabel": "<?php echo e(__('Apply')); ?>",
            "cancelLabel": "<?php echo e(__('Cancel')); ?>",
            "fromLabel": "<?php echo e(__('From')); ?>",
            "toLabel": "<?php echo e(__('To')); ?>",
            "customRangeLabel": "<?php echo e(__('Custom')); ?>",
            "weekLabel": "<?php echo e(__('W')); ?>",
            "first_day_of_week": <?php echo e(setting_item("site_first_day_of_the_weekin_calendar","1")); ?>,
            "daysOfWeek": [
                "<?php echo e(__('Su')); ?>",
                "<?php echo e(__('Mo')); ?>",
                "<?php echo e(__('Tu')); ?>",
                "<?php echo e(__('We')); ?>",
                "<?php echo e(__('Th')); ?>",
                "<?php echo e(__('Fr')); ?>",
                "<?php echo e(__('Sa')); ?>"
            ],
            "monthNames": [
                "<?php echo e(__('January')); ?>",
                "<?php echo e(__('February')); ?>",
                "<?php echo e(__('March')); ?>",
                "<?php echo e(__('April')); ?>",
                "<?php echo e(__('May')); ?>",
                "<?php echo e(__('June')); ?>",
                "<?php echo e(__('July')); ?>",
                "<?php echo e(__('August')); ?>",
                "<?php echo e(__('September')); ?>",
                "<?php echo e(__('October')); ?>",
                "<?php echo e(__('November')); ?>",
                "<?php echo e(__('December')); ?>"
            ],
        };
    </script>
    <!-- Styles -->
    <?php echo $__env->yieldContent('head'); ?>
    
    <link href="<?php echo e(route('core.style.customCss')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/carousel-2/owl.carousel.css')); ?>" rel="stylesheet">
    <?php if(setting_item_with_lang('enable_rtl')): ?>
        <link href="<?php echo e(asset('dist/frontend/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <?php if(!is_demo_mode()): ?>
        <?php echo setting_item('head_scripts'); ?>

        <?php echo setting_item_with_lang_raw('head_scripts'); ?>

    <?php endif; ?>

    <?php event(new \Modules\Layout\Events\LayoutEndHead()); ?>

</head>
<body class="frontend-page <?php echo e(!empty($row->header_style) ? "header-".$row->header_style : "header-normal"); ?> <?php echo e($body_class ?? ''); ?> <?php if(setting_item_with_lang('enable_rtl')): ?> is-rtl <?php endif; ?> <?php if(is_api()): ?> is_api <?php endif; ?>">
    <?php event(new \Modules\Layout\Events\LayoutBeginBody()); ?>

    <?php if(!is_demo_mode()): ?>
        <?php echo setting_item('body_scripts'); ?>

        <?php echo setting_item_with_lang_raw('body_scripts'); ?>

    <?php endif; ?>
    <div class="bravo_wrap">
        <?php if(!is_api()): ?>
            <?php echo $__env->make('Layout::parts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Layout::parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('Layout::parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if(!is_demo_mode()): ?>
        <?php echo setting_item('footer_scripts'); ?>

        <?php echo setting_item_with_lang_raw('footer_scripts'); ?>

    <?php endif; ?>
    <?php event(new \Modules\Layout\Events\LayoutEndBody()); ?>

    <script>
        $(document).ready(function(){
            $('.carousel').slick({
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots:false,
                centerMode: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        // centerMode: true,    
                    }
            
                }, {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: false,
                        infinite: true,
            
                    }
                },  {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        infinite: true,
                    }
                }]
            });
        });
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>
</body>
</html>
<?php /**PATH D:\Laravel Projects New\HomeStayjeGithub\modules/Layout/app.blade.php ENDPATH**/ ?>