<div class="d-block d-md-flex flex-center-between align-items-start mb-3">
    <div class="mb-3">
        <div class="d-block d-md-flex flex-horizontal-center mb-2 mb-md-0">
            <h4 class="font-size-23 font-weight-bold mb-1 mr-3"><?php echo clean($translation->title); ?></h4>
            <?php if($row->getReviewEnable()): ?>
                <span class="font-size-14 text-primary mr-2"><?php echo e($review_score['score_total']); ?>/5 <?php echo e($review_score['score_text']); ?></span>
                <span class="font-size-14 text-gray-1 ml-1"><?php echo e(__(":number reviews",['number'=>$review_score['total_review']])); ?></span>
            <?php endif; ?>

        </div>
        <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1">
            <?php if($translation->address): ?>
                <i class="icon flaticon-placeholder mr-2 font-size-20"></i>
                <?php echo e($translation->address); ?>

            <?php endif; ?>
            <?php if($row->map_lat && $row->map_lng): ?>
                <a target="_blank" href="https://www.google.com/maps/place/<?php echo e($row->map_lat); ?>,<?php echo e($row->map_lng); ?>/@<?php echo $row->map_lat ?>,<?php echo e($row->map_lng); ?>,<?php echo e(!empty($row->map_zoom) ? $row->map_zoom : 12); ?>z" class="ml-1 d-block d-md-inline">
                    - <?php echo e(__('View on map')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
    <ul class="list-group list-group-borderless list-group-horizontal custom-social-share">
        <li class="list-group-item px-1">
            <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                <i class="flaticon-like font-size-18 text-dark"></i>
            </a>
        </li>
        <li class="list-group-item px-1">
            <a href="#" class="height-45 width-45 border rounded border-width-2 flex-content-center">
                <i class="flaticon-share font-size-18 text-dark"></i>
            </a>
        </li>
    </ul>
</div>

<div class="py-4 border-top border-bottom mb-4">
    <ul class="list-group list-group-borderless list-group-horizontal flex-center-between text-center mx-md-4 flex-wrap">
        <?php if($row->square): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="flaticon-plans text-primary font-size-50 mb-1 d-block"></i>
                <div class="text-gray-1"><?php echo size_unit_format($row->square); ?></div>
            </li>
        <?php endif; ?>
        <li class="list-group-item text-lh-sm ">
            <i class="flaticon-door text-primary font-size-50 mb-1 d-block"></i>
            <div class="text-gray-1"> <?php echo e($row->max_guests); ?> <?php echo e(__("People")); ?></div>
        </li>
        <?php if($row->bathroom): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="flaticon-bathtub text-primary font-size-50 mb-1 d-block"></i>
                <div class="text-gray-1"> <?php echo e($row->bathroom); ?> <?php echo e(__("bathrooms")); ?></div>
            </li>
        <?php endif; ?>
        <?php if(!empty($row->bed)): ?>
            <li class="list-group-item text-lh-sm ">
                <i class="flaticon-bed-1 text-primary font-size-50 mb-1 d-block"></i>
                <div class="text-gray-1"><?php echo e($row->bed); ?> <?php echo e(__("beds")); ?></div>
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php if($translation->content): ?>
    <div class="border-bottom position-relative">
        <h5 class="font-size-21 font-weight-bold text-dark">
            <?php echo e(__("Description")); ?>

        </h5>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Flight::frontend.layouts.details.space-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('Flight::frontend.layouts.details.space-faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($row->map_lat && $row->map_lng): ?>
    <div class="border-bottom py-4">
        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
            <?php echo e(__("Location")); ?>

        </h5>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Flight::frontend.layouts.details.space-video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/modules/Flight/Views/frontend/layouts/details/space-detail.blade.php ENDPATH**/ ?>