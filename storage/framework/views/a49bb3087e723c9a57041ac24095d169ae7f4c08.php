
<div class="panel">
    <div class="panel-title"><strong><?php echo e(__("Cancellation Policy")); ?></strong></div>
    <div class="panel-body">
    
        <div class="form-group-item">
            <label class="control-label"><?php echo e(__('Clause')); ?></label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-3"><?php echo e(__("Name")); ?></div>
                    <div class="col-md-3"><?php echo e(__('Content')); ?></div>
                    <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                
                <?php if(!empty($translation->cancel_policy)): ?>
                   
                    <?php $translation->cancel_policy = json_decode($translation->cancel_policy,true); ?>
                   
                    <?php $__currentLoopData = $translation->cancel_policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    
                        <div class="item" data-number="<?php echo e($key); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="cancel_policy[<?php echo e($key); ?>][cancel_name]" class="form-control" value="<?php echo e($item['cancel_name']); ?>" placeholder="<?php echo e(__('Eg: What kind of foowear is most suitable ?')); ?>">
                                </div>
                                <div class="col-md-3">
                                    <textarea name="cancel_policy[<?php echo e($key); ?>][cancel_content]" class="form-control" placeholder="..."><?php echo e($item['cancel_content']); ?></textarea>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="cancel_policy[<?php echo e($key); ?>][cancel_price]" class="form-control" value="<?php echo e($item['cancel_price']); ?>" placeholder="<?php echo e(__('Eg: What kind of foowear is most suitable ?')); ?>">
                                </div>
                                <div class="col-md-2">
                                    <select name="cancel_policy[<?php echo e($key); ?>][cancel_unit]"
                                            class="form-control">
                                        <option <?php if($item['cancel_unit']=='%'): ?> selected
                                                <?php endif; ?> value="<?php echo e($item['cancel_unit']); ?>"><?php echo e(__('%')); ?></option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" __name__="cancel_policy[__number__][cancel_name]" class="form-control" placeholder="<?php echo e(__(' Cancellation policy name?')); ?>">
                        </div>
                        <div class="col-md-3">
                            <textarea __name__="cancel_policy[__number__][cancel_content]" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="col-md-3">
                            <input type="number" __name__="cancel_policy[__number__][cancel_price]" class="form-control" >
                        </div>
                        <div class="col-md-2">
                            <select __name__="cancel_policy[__number__][cancel_unit]"
                                    class="form-control">
                                <option value="%"><?php echo e(__('%')); ?></option>
                                
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/html/modules/Hotel/Views/admin/hotel/cancellation-policy.blade.php ENDPATH**/ ?>