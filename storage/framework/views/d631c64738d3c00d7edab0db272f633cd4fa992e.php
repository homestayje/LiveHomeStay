<style>
    .promotions {
       display: flex;
   }
   .maincol {
       display: flex;
       flex-direction: row-reverse;
       flex: 1 1 33%;
       margin: 0 0.5%;
       background: linear-gradient(341deg, rgba(47,79,244,1) 0%, rgb(1 190 227) 99%);
       border-radius: 10px;
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
<div class="g-header">
    <div class="left">
        <?php if($row->star_rate): ?>
            <div class="star-rate">
                <?php for($star = 1 ;$star <= $row->star_rate ; $star++): ?>
                    <i class="fa fa-star"></i>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
        <h1><?php echo clean($translation->title); ?></h1>
        <?php if($translation->address): ?>
            <h2 class="address"><i class="fa fa-map-marker"></i>
                <?php echo e($translation->address); ?>

            </h2>
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
<?php if(count($our_promotions) > 0): ?>
<div class="g-overview">
    <h3><?php echo e(__("Our Promotions")); ?></h3>
    <div class="promotions owl-carousel owl-theme">
        <?php $__currentLoopData = $our_promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   
        
            <div class="maincol"> 
                <div class="col1">
                    <h4 class="promotion_amount"><?php echo e($coupen->amount); ?> </h4> <?php if($coupen->discount_type == 'percent'): ?> <sup>%</sup> <?php else: ?>  <sup>RM</sup> <?php endif; ?>
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
<hr>
<?php echo $__env->make('Hotel::frontend.layouts.details.hotel-rooms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="g-all-attribute is_mobile">
    <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="g-rules">
    <h3><?php echo e(__("Rules")); ?></h3>
    <div class="description">
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check In")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value">	<?php echo e($row->check_in_time); ?> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check Out")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value">	<?php echo e($row->check_out_time); ?> </div>
            </div>
        </div>
        
        <?php if($translation->policy): ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="key"><?php echo e(__("Homestay Policies")); ?></div>
                </div>
                <div class="col-lg-8">
                    <?php $__currentLoopData = $translation->policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item <?php if($key > 1): ?> d-none <?php endif; ?>">
                            <div class="strong"><?php echo e($item['title']); ?></div>
                            <div class="context"><?php echo $item['content']; ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if( count($translation->policy) > 2): ?>
                        <div class="btn-show-all">
                            <span class="text"><?php echo e(__("Show All")); ?></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <hr>
        <?php if($translation->cancel_policy): ?>
        <?php $translation->cancel_policy = json_decode($translation->cancel_policy,true); ?>
            <h3><?php echo e(__("Cancellation Policies")); ?></h3>
            <div class="row">
                
                <div class="col-lg-4">
                    
                </div>
                <div class="col-lg-8">
                    <?php $__currentLoopData = $translation->cancel_policy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item <?php if($key > 1): ?> d-none <?php endif; ?>">
                            <div class="strong"><?php echo e($item['cancel_name']); ?></div>
                            <div class="context"><?php echo $item['cancel_content']; ?> price <?php echo $item['cancel_price']; ?> <?php echo $item['cancel_unit']; ?></div>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if( count($translation->cancel_policy) > 2): ?>
                        <div class="btn-show-all">
                            <span class="text"><?php echo e(__("Show All")); ?></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="bravo-hr"></div>
<?php if ($__env->exists("Hotel::frontend.layouts.details.hotel-surrounding")) echo $__env->make("Hotel::frontend.layouts.details.hotel-surrounding", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($row->map_lat && $row->map_lng): ?>
    <div class="g-location">
        <div class="location-title">
            <h3><?php echo e(__("Location")); ?></h3>
            <?php if($translation->address): ?>
                <div class="address">
                    <i class="icofont-location-arrow"></i>
                    <?php echo e($translation->address); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
       
     </div>
    <div class="col-12">
          <button  onclick="getLocation()" class="btn btn-primary" id="userLocation">Get Direction</button>
    </div>
<?php endif; ?>
<div class="bravo-hr"></div>
<?php /**PATH /var/www/html/modules/Hotel/Views/frontend/layouts/details/hotel-detail.blade.php ENDPATH**/ ?>