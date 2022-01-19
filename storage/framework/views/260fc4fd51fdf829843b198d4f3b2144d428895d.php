
<style>
    .promotions {
       display: flex;
   }
   .maincol {
       display: flex;
       flex-direction: row-reverse;
       flex: 1 1 33%;
       margin: 0 0.5%;
       background: linear-gradient(347deg, rgba(47,79,244,1) 0%, rgba(54,20,27,1) 99%);
   }
   
   .col1 {
       width: 30%;
   }
   
   .col2 {
       width: 68%;
   }
   .col2 p {margin-bottom: 0px;}
   
   .col1 h4 {
       margin-bottom: 0px !important;
   }
   .col1 h4 {
       color: white !important;
   }
   .col2 {
       width: 60%;
       display: flex;
       align-items: flex-start;
       flex-direction: column;
   }
   .col1 {
       width: 36%;
       display: flex;
       justify-content: center;
       align-items: center;
       flex-direction: row-reverse;
   }
   .col2 p {
       color: white;
   }
   .maincol {
       padding: 15px 5px;
   }
   
   .col1 h4 {
       font-size: 46px !important;
       font-weight: 900 !important;
       margin-left: 5px;
   }
   
   .col1 sup {
       font-weight: 200 !important;
       font-size: 20px;
       position: relative;
       top: -25px;
       right: 5px;
       color: white;
   }
   
   .col1:after {content: '';position: absolute;background: white;width: 2px;height: 100%;top: 0;right: -5px;}
   
   .col1 {
       position: relative;
   }
   .col2 p {
       font-size: 14px;
       font-weight: bold;
   }
   @media  only screen and (max-width:767px) {
   
   
   .col1:after {
       content: '';
       position: absolute;
       background: white;
       width: 100%;
       height: 2px;
       bottom: 0;
       right: 0;
       top: unset;
   }
   
   .maincol {
   flex-direction: column;
   }
   
   .col1 {
       width: 100%;
   }
   
   .col2 {
       align-items: center !important;
       width: 100%;
   }
   
   .col2 p {
       text-align: center;
   }
   
   
   }
   </style>
<?php if(count($our_promotions) > 0): ?>
<div class="g-overview">
    <h3><?php echo e(__("Our Promotions")); ?></h3>
    <div class="promotions owl-carousel owl-theme">
        <?php $__currentLoopData = $our_promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   
        
            <div class="maincol"> 
                <div class="col1">
                    <h4 class="promotion_amount"><?php echo e($coupen->amount); ?> </h4> <?php if($coupen->discount_type == 'percent'): ?> <sup>%</sup> <?php else: ?>  <?php endif; ?>
                </div>
                <div class="col2">
                    <p class="promotion_date"><?php echo e(\Carbon\Carbon::parse($coupen->created_at)->format('d.m.Y')); ?> - <?php echo e(\Carbon\Carbon::parse($coupen->end_date)->format('d.m.Y')); ?></p>
                    <p class="promotion_coupen">PROMO: <?php echo e($coupen->code); ?></p>
                    <p class="promotion_limited">Limited Price</p>
                </div>
            </div>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
       
    </div>
</div>
<?php endif; ?>
<div class="g-header">
    <div class="left">
        <h1><?php echo clean($translation->title); ?></h1>
        <?php if($translation->address): ?>
            <p class="address"><i class="fa fa-map-marker"></i>
                <?php echo e($translation->address); ?>

            </p>
        <?php endif; ?>
    </div>
    <div class="right">
        <?php if($row->getReviewEnable()): ?>
            <?php if($review_score): ?>
                <div class="review-score">
                    <div class="head">
                        <div class="left">
                            <span class="head-rating"><?php echo e($review_score['score_text']); ?></span>
                            <span class="text-rating"><?php echo e(__("from :number reviews",['number'=>$review_score['total_review']])); ?></span>
                        </div>
                        <div class="score">
                            <?php echo e($review_score['score_total']); ?><span>/5</span>
                        </div>
                    </div>
                    <div class="foot">
                        <?php echo e(__(":number% of guests recommend",['number'=>$row->recommend_percent])); ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<div class="g-space-feature">
    <div class="row">
        <?php if(!empty($row->bed)): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-hotel"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("No. Bed")); ?></h4>
                        <p class="value">
                            <?php echo e($row->bed); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($row->bathroom): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-bathtub"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("No. Bathroom")); ?></h4>
                        <p class="value">
                            <?php echo e($row->bathroom); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <?php if($row->square): ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-ruler-compass-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Square")); ?></h4>
                        <p class="value">
                            <?php echo size_unit_format($row->square); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!empty($row->location->name)): ?>
                <?php $location =  $row->location->translateOrOrigin(app()->getLocale()) ?>
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-island-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name"><?php echo e(__("Location")); ?></h4>
                        <p class="value">
                            <?php echo e($location->name ?? ''); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php if($row->getGallery()): ?>
    <div class="g-gallery">
        <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
            <?php $__currentLoopData = $row->getGallery(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item['large']); ?>" data-thumb="<?php echo e($item['thumb']); ?>" data-alt="<?php echo e(__("Gallery")); ?>"></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="social">
            <div class="social-share">
                <span class="social-icon">
                    <i class="icofont-share"></i>
                </span>
                <ul class="share-wrapper">
                    <li>
                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Facebook")); ?>">
                            <i class="fa fa-facebook fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="https://twitter.com/share?url=<?php echo e($row->getDetailUrl()); ?>&amp;title=<?php echo e($translation->title); ?>" target="_blank" rel="noopener" original-title="<?php echo e(__("Twitter")); ?>">
                            <i class="fa fa-twitter fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="service-wishlist <?php echo e($row->isWishList()); ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
                <i class="fa fa-heart-o"></i>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if($translation->content): ?>
    <div class="g-overview">
        <h3><?php echo e(__("Description")); ?></h3>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->make('Space::frontend.layouts.details.space-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($translation->faqs): ?>
<div class="g-faq">
    <h3> <?php echo e(__("FAQs")); ?> </h3>
    <?php $__currentLoopData = $translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="header">
                <i class="field-icon icofont-support-faq"></i>
                <h5><?php echo e($item['title']); ?></h5>
                <span class="arrow"><i class="fa fa-angle-down"></i></span>
            </div>
            <div class="body">
                <?php echo e($item['content']); ?>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($row->map_lat && $row->map_lng): ?>
<div class="g-location">
    <h3><?php echo e(__("Location")); ?></h3>
    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/html/modules/Space/Views/frontend/layouts/details/space-detail.blade.php ENDPATH**/ ?>