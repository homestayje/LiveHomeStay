<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('module/vendor/css/vendor-register.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<div class="container">
    <div class="bravo-vendor-form-register py-5 <?php if(!empty($layout)): ?> <?php echo e($layout); ?> <?php endif; ?>">
        <div class="row">
            <div class="col-12 col-lg-5">
                <h1><?php echo e(__("Success Requested Become Vendor")); ?></h1>
                <p><?php echo e(__("Register success. Please wait for admin approval")); ?></p>
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-lg-6">
                <div class="bravo_gallery">
                    <div class="btn-group">
                        <span class="btn-transparent has-icon bravo-video-popup" <?php if(!empty($youtube)): ?> data-toggle="modal" <?php endif; ?> data-src="<?php echo e(handleVideoUrl($youtube)); ?>" data-target="#video-register">
                            <?php if($bg_image): ?>
                                <img src="<?php echo e(get_file_url($bg_image,'full')); ?>" class="img-fluid" alt="Youtube">
                            <?php endif; ?>
                            <?php if(!empty($youtube)): ?>
                                <div class="play-icon">
                                    <img src="<?php echo e(asset('module/vendor/img/ico-play.svg')); ?>" alt="Play background" class="img-fluid play-image">
                                </div>
                            <?php endif; ?>
                        </span>
                    </div>
                    <?php if(!empty($youtube)): ?>
                        <div class="modal fade" id="video-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content p-0">
                                    <div class="modal-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/modules/Vendor/Views/frontend/blocks/form-register/request_success.blade.php ENDPATH**/ ?>