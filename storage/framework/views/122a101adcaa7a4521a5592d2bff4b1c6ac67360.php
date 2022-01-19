<div class="card_twocheckout">
    <i class="icofont-ui-v-card bg"></i>
    <label>
        <span><?php echo e(__("Name on the Card")); ?></span>
        <input id="bravo_twocheckout_card_name" name="card_name" placeholder="<?php echo e(__("Card Name")); ?>">
    </label>
    <label>
        <span><?php echo e(__("Card Number")); ?></span>
        <input id="bravo_twocheckout_card_number" placeholder="<?php echo e(__("Card Number")); ?>">
        <i class="icofont-credit-card"></i>
    </label>
    <label class="item">
        <span><?php echo e(__("Expiration Month")); ?></span>
        <input id="bravo_twocheckout_card_expiry_month" placeholder="<?php echo e(__("Expiration Month")); ?>">
    </label>
    <label class="item">
        <span><?php echo e(__("Expiration Year")); ?></span>
        <input id="bravo_twocheckout_card_expiry_year" placeholder="<?php echo e(__("Expiration Year")); ?>">
    </label>
    <label class="item">
        <span><?php echo e(__("CVC")); ?></span>
        <input id="bravo_twocheckout_card_cvc" placeholder="<?php echo e(__("CVC")); ?>">
    </label>
    <input name="token" type="hidden" value="" id="bravo_twocheckout_token"/>
    <div class="card_twocheckout_msg"></div>
</div><?php /**PATH /var/www/html/plugins/PaymentTwoCheckout/Views/frontend/twocheckout.blade.php ENDPATH**/ ?>