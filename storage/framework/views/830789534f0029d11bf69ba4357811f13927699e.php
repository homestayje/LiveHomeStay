
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_detail_hotel">
        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <?php $review_score = $row->review_data ?>
                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="col-md-12 p-0">
                            <div class="share" style="font-size: 14px;color: #1a2b48;"> <?php echo e(__("Share")); ?> 
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Facebook")); ?>"><i class="fa fa-facebook fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="twitter share-item" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Twitter")); ?>"><i class="fa fa-twitter fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="reddit share-item" href="https://reddit.com/submit?url=<?php echo e($row->getDetailUrl()); ?>&title=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Reddit")); ?>"><i class="fa fa-reddit fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="linkedin share-item" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e($row->getDetailUrl()); ?>" target="_blank" original-title="<?php echo e(__("Linkedin")); ?>"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="tumblr share-item" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo e($row->getDetailUrl()); ?>&title=<?php echo e($translation->title); ?>&caption=<?php echo e($translation->title); ?>" target="_blank" original-title="<?php echo e(__("Tumblr")); ?>"><i class="fa fa-tumblr fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="pinterest share-item" href="http://pinterest.com/pin/create/link/?url=<?php echo e($row->getDetailUrl()); ?>" target="_blank" original-title="<?php echo e(__("Pinterest")); ?>"><i class="fa fa-pinterest fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="whatsapp share-item" href="https://api.whatsapp.com/send?phone=&text=<?php echo e($translation->title); ?>%20<?php echo e($row->getDetailUrl()); ?>" target="_blank" original-title="<?php echo e(__("Whatsapp")); ?>"><i class="fa fa-whatsapp fa-lg"></i></a>
                            </div>
                            <hr />
                        </div>
                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <?php echo $__env->make('Tour::frontend.layouts.details.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-form-enquiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-related-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="g-all-attribute is_pc">
                            <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-form-enquiry-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            <?php if($row->map_lat && $row->map_lng): ?>
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>],
                zoom:<?php echo e($row->map_zoom ?? "8"); ?>,
                ready: function (engineMap) {
                    engineMap.addMarker([<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>], {
                        icon_options: {
                            iconUrl:"<?php echo e(get_file_url(setting_item("hotel_icon_marker_map"),'full') ?? url('images/icons/png/pin.png')); ?>"
                        }
                    });
                }
            });
            <?php endif; ?>
        })

        // https://www.google.com/maps/dir/31.5968086,74.3470166/31.6088919,74.2299696" class="btn btn-primary mt-1
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
   window.location.href="https://www.google.com/maps/dir/"+position.coords.latitude+","+position.coords.longitude+"/<?php echo e($row->map_lat); ?>,<?php echo e($row->map_lng); ?>";
    }
    </script>
    <script>
        var bravo_booking_data = <?php echo json_encode($booking_data); ?>

        var bravo_booking_i18n = {
			no_date_select:'<?php echo e(__('Please select Start and End date')); ?>',
            no_guest_select:'<?php echo e(__('Please select at least one guest')); ?>',
            load_dates_url:'<?php echo e(route('space.vendor.availability.loadDates')); ?>',
            name_required:'<?php echo e(__("Name is Required")); ?>',
            email_required:'<?php echo e(__("Email is Required")); ?>',
        };
    </script>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("libs/fotorama/fotorama.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("libs/sticky/jquery.sticky.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/hotel/js/single-hotel.js?_ver='.config('app.version'))); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/modules/Hotel/Views/frontend/detail.blade.php ENDPATH**/ ?>