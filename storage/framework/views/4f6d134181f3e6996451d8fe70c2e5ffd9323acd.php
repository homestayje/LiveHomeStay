
<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h2 class="title-bar">
        <?php echo e(__("Bank Information")); ?>

    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <form action="<?php echo e(route("user.account_info_update")); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(__("Name on bank account")); ?></label>
                    <input type="text" name="bank_info_username" placeholder="<?php echo e(__("Eg: John Smith")); ?>" <?php if(!empty($data['bank_info'])): ?> value="<?php echo e($data['bank_info']['bank_info_username']); ?>" <?php endif; ?> class="form-control">
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Bank account number")); ?></label>
                    <input type="number" name="bank_info_accountnumber" placeholder="<?php echo e(__("14 digit account no.")); ?>" <?php if(!empty($data['bank_info'])): ?> value="<?php echo e($data['bank_info']['bank_info_accountnumber']); ?>" <?php endif; ?> class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <input type="submit" class="btn btn-primary" value="<?php echo e(__("Save Bank Information")); ?>">
                <a href="<?php echo e(route("user.account_info_update")); ?>" class="btn btn-default"><?php echo e(__("Cancel")); ?></a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/modules/User/Views/frontend/bank-info.blade.php ENDPATH**/ ?>