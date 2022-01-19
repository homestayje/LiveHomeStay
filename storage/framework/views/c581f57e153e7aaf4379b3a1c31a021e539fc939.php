<?php $userInfo = Auth::user() ?>
<form action="<?php echo e(route('social.post.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
<div class="bravo-post-item create-post">
    <div class="post-header"><?php echo e(__("Add new post")); ?></div>
    <div class="post-body">
        <div class="post-author">
            <div class="media mb-2">
                <div class="media-left mr-3">
                    <a class="s-user-avatar">
                        <?php if($avatar_url = $userInfo->getAvatarUrl()): ?>
                            <img class="avatar" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($userInfo->getDisplayName()); ?>">
                        <?php else: ?>
                            <span class="s-avatar-text"><?php echo e(ucfirst($userInfo->getDisplayName()[0])); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="media-body">
                    <textarea name="content" placeholder="<?php echo e(__("How are you feeling today?")); ?>" class="form-control mb-1"  cols="30" rows="2"></textarea>
                    <div class="list-files-uploaded mb-1">

                    </div>
                    <ul class="list-unstyled post-add-files">
                        <li><a href="#" class="btn text-center btn-light btn-sm"><i class="svg-icon picture-icon"></i></a></li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-block"><?php echo e(__("Share")); ?></button>
        </div>
    </div>
</div>
</form>
<?php /**PATH /var/www/html/modules/Social/Views/frontend/posts/create.blade.php ENDPATH**/ ?>