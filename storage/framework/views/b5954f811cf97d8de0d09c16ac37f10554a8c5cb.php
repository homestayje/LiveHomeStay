<?php if(!empty($booking->coupon_amount) and $booking->coupon_amount > 0): ?>
    <li>
        <div class="label">
            <?php echo e(__("Coupon")); ?>

        </div>
        <div class="val">
            -<?php echo e($booking->coupon_amount); ?>

        </div>
    </li>
<?php endif; ?><?php /**PATH /var/www/html/modules/Coupon/Views/frontend/booking/detail-coupon.blade.php ENDPATH**/ ?>