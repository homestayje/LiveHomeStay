
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
   @media only screen and (max-width:767px) {
   
   
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
@if(count($our_promotions) > 0)
<div class="g-overview">
    <h3>{{__("Our Promotions")}}</h3>
    <div class="promotions owl-carousel owl-theme">
        @foreach ($our_promotions as $coupen)
   
        
            <div class="maincol"> 
                <div class="col1">
                    <h4 class="promotion_amount">{{$coupen->amount }} </h4> @if($coupen->discount_type == 'percent') <sup>%</sup> @else  @endif
                </div>
                <div class="col2">
                    <p class="promotion_date">{{ \Carbon\Carbon::parse($coupen->created_at)->format('d.m.Y')}} - {{\Carbon\Carbon::parse($coupen->end_date)->format('d.m.Y')}}</p>
                    <p class="promotion_coupen">PROMO: {{$coupen->code}}</p>
                    <p class="promotion_limited">Limited Price</p>
                </div>
            </div>
        
    @endforeach
    
       
    </div>
</div>
@endif
<div class="g-header">
    <div class="left">
        <h1>{!! clean($translation->title) !!}</h1>
        @if($translation->address)
            <p class="address"><i class="fa fa-map-marker"></i>
                {{$translation->address}}
            </p>
        @endif
    </div>
    <div class="right">
        @if($row->getReviewEnable())
            @if($review_score)
                <div class="review-score">
                    <div class="head">
                        <div class="left">
                            <span class="head-rating">{{$review_score['score_text']}}</span>
                            <span class="text-rating">{{__("from :number reviews",['number'=>$review_score['total_review']])}}</span>
                        </div>
                        <div class="score">
                            {{$review_score['score_total']}}<span>/5</span>
                        </div>
                    </div>
                    <div class="foot">
                        {{__(":number% of guests recommend",['number'=>$row->recommend_percent])}}
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
<div class="g-space-feature">
    <div class="row">
        @if(!empty($row->bed))
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-hotel"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("No. Bed")}}</h4>
                        <p class="value">
                            {{$row->bed}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if($row->bathroom)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-bathtub"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("No. Bathroom")}}</h4>
                        <p class="value">
                            {{$row->bathroom}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
            @if($row->square)
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-ruler-compass-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("Square")}}</h4>
                        <p class="value">
                            {!! size_unit_format($row->square) !!}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($row->location->name))
                @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-island-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">{{__("Location")}}</h4>
                        <p class="value">
                            {{$location->name ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@if($row->getGallery())
    <div class="g-gallery">
        <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
            @foreach($row->getGallery() as $key=>$item)
                <a href="{{$item['large']}}" data-thumb="{{$item['thumb']}}" data-alt="{{ __("Gallery") }}"></a>
            @endforeach
        </div>
        <div class="social">
            <div class="social-share">
                <span class="social-icon">
                    <i class="icofont-share"></i>
                </span>
                <ul class="share-wrapper">
                    <li>
                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                            <i class="fa fa-facebook fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                            <i class="fa fa-twitter fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                <i class="fa fa-heart-o"></i>
            </div>
        </div>
    </div>
@endif
@if($translation->content)
    <div class="g-overview">
        <h3>{{__("Description")}}</h3>
        <div class="description">
            <?php echo $translation->content ?>
        </div>
    </div>
@endif
@include('Space::frontend.layouts.details.space-attributes')
@if($translation->faqs)
<div class="g-faq">
    <h3> {{__("FAQs")}} </h3>
    @foreach($translation->faqs as $item)
        <div class="item">
            <div class="header">
                <i class="field-icon icofont-support-faq"></i>
                <h5>{{$item['title']}}</h5>
                <span class="arrow"><i class="fa fa-angle-down"></i></span>
            </div>
            <div class="body">
                {{$item['content']}}
            </div>
        </div>
    @endforeach
</div>
@endif
@includeIf("Hotel::frontend.layouts.details.hotel-surrounding")
@if($row->map_lat && $row->map_lng)
<div class="g-location">
    <h3>{{__("Location")}}</h3>
    <div class="location-map">
        <div id="map_content"></div>
    </div>
</div>
@endif
