<div class="form-group">
    <label><?php echo e(__("Name")); ?></label>
    <input type="text" value="<?php echo e($row->name??''); ?>" placeholder="<?php echo e(__("Name")); ?>" name="name" class="form-control">
</div>
<div class="form-group">
    <label><?php echo e(__("Code")); ?></label>
    <input type="text" value="<?php echo e($row->code??''); ?>" placeholder="<?php echo e(__("Code")); ?>" name="code" class="form-control">
</div>

<div class="form-group">
    <label class="control-label"><?php echo e(__("Description")); ?></label>
    <div class="">
        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($row->content); ?></textarea>
    </div>
</div>
<div class="form-group">
    <label><?php echo e(__("Location")); ?></label>
    <select name="location_id" class="form-control">
        <option value=""><?php echo e(__("-- Please Select --")); ?></option>
        <?php
        $traverse = function ($array, $prefix = '') use (&$traverse, $row) {
            foreach ($array as $value) {
                if ($value->id == $row->id) {
                    continue;
                }
                $selected = '';
                if ($row->location_id == $value->id)
                    $selected = 'selected';
                printf("<option value='%s' %s>%s</option>", $value->id, $selected, $prefix . ' ' . $value->name);
                $traverse($value->children, $prefix . '-');
            }
        };
        $traverse($locations);
        ?>
    </select>
</div>
<div class="form-group">
    <label><?php echo e(__("Address")); ?></label>
    <input type="text" value="<?php echo e($row->address??''); ?>" placeholder="<?php echo e(__("Address")); ?>" name="address" class="form-control">
</div>
<div class="form-group form-index-hide">
    <label class="control-label"><?php echo e(__("Location Map")); ?></label>
    <p><i><?php echo e(__('Click onto map to place Location address')); ?></i></p>
    <div class="control-map-group">
        <div id="map_content" class="<?php echo e(!empty($map_full)?'mr-0 w-100':''); ?>"></div>
        <div class="g-control  <?php echo e(!empty($map_full)?'position-static w-100 d-flex justify-content-between':''); ?>" >
            <div class="form-group">
                <label><?php echo e(__("Map Lat")); ?>:</label>
                <input type="text" name="map_lat" class="form-control" value="<?php echo e($row->map_lat); ?>">
            </div>
            <div class="form-group">
                <label><?php echo e(__("Map Lng")); ?>:</label>
                <input type="text" name="map_lng" class="form-control" value="<?php echo e($row->map_lng); ?>">
            </div>
            <div class="form-group">
                <label><?php echo e(__("Map Zoom")); ?>:</label>
                <input type="text" name="map_zoom" class="form-control" value="<?php echo e($row->map_zoom ?? "8"); ?>">
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/modules/Flight/Views/admin/airport/form.blade.php ENDPATH**/ ?>