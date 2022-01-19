<?php if(!empty($model_tag)): ?>
<div class="sidebar-widget widget_tag_cloud">
    <div class="sidebar-title"><h2><?php echo e($item->title); ?></h2></div>
    <div class="tagcloud">
        <?php
            $list_tags = \Modules\News\Models\NewsTag::getTags();
        ?>
        <ul>
            <?php if($list_tags): ?>
                <?php $__currentLoopData = $list_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $translation = $tag->translateOrOrigin(app()->getLocale()) ?>
                    <a href="<?php echo e($tag->getDetailUrl(app()->getLocale())); ?>" class="tag-cloud-link"><?php echo e($translation->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7111890470817134"
     crossorigin="anonymous"></script>
<!-- HZhomestayje -->
<ins class="adsbygoogle"
     style="display:block;margin-left:87px;"
     data-ad-client="ca-pub-7111890470817134"
     data-ad-slot="8146202924"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script><?php /**PATH /var/www/html/modules/News/Views/frontend/layouts/sidebars/tag.blade.php ENDPATH**/ ?>