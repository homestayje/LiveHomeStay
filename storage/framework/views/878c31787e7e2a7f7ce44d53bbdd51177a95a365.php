<div class="bravo-list-news">
    <div class="container">
        <?php if($title): ?>
            <div class="title">
                <?php echo e($title); ?>

                <?php if(!empty($desc)): ?>
                    <div class="sub-title">
                        <?php echo e($desc); ?>

                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="list-item">
            <div class="row news">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6">
                        <?php echo $__env->make('News::frontend.blocks.list-news.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="wrapper bravo_wrap">
                    <div class="page-template-content">
                        <div class="carousel bravo-list-news">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-<?php echo e($col ?? 3); ?> col-md-6">
                                <?php echo $__env->make('News::frontend.blocks.list-news.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div><?php /**PATH /var/www/html/modules/News/Views/frontend/blocks/list-news/index.blade.php ENDPATH**/ ?>