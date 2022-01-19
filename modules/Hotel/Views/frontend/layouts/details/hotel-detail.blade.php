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
<div class="g-header">
    <div class="left">
        @if($row->star_rate)
            <div class="star-rate">
                @for ($star = 1 ;$star <= $row->star_rate ; $star++)
                    <i class="fa fa-star"></i>
                @endfor
            </div>
        @endif
        <h1>{!! clean($translation->title) !!}</h1>
        @if($translation->address)
            <h2 class="address"><i class="fa fa-map-marker"></i>
                {{$translation->address}}
            </h2>
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
@if(count($our_promotions) > 0)
<div class="g-overview">
    <h3>{{__("Our Promotions")}}</h3>
    <div class="promotions owl-carousel owl-theme">
        @foreach ($our_promotions as $coupen)
   
        
            <div class="maincol"> 
                <div class="col1">
                    <h4 class="promotion_amount">{{$coupen->amount }} </h4> @if($coupen->discount_type == 'percent') <sup>%</sup> @else  <sup>RM</sup> @endif
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
<hr>
@include('Hotel::frontend.layouts.details.hotel-rooms')
<div class="g-all-attribute is_mobile">
    @include('Hotel::frontend.layouts.details.hotel-attributes')
</div>
<div class="g-rules">
    <h3>{{__("Rules")}}</h3>
    <div class="description">
        <div class="row">
            <div class="col-lg-4">
                <div class="key">{{__("Check In")}}</div>
            </div>
            <div class="col-lg-8">
                <div class="value">	{{$row->check_in_time}} </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="key">{{__("Check Out")}}</div>
            </div>
            <div class="col-lg-8">
                <div class="value">	{{$row->check_out_time}} </div>
            </div>
        </div>
        
        @if($translation->policy)
            <div class="row">
                <div class="col-lg-4">
                    <div class="key">{{__("Homestay Policies")}}</div>
                </div>
                <div class="col-lg-8">
                    @foreach($translation->policy as $key => $item)
                        <div class="item @if($key > 1) d-none @endif">
                            <div class="strong">{{$item['title']}}</div>
                            <div class="context">{!! $item['content'] !!}</div>
                        </div>
                    @endforeach
                    @if( count($translation->policy) > 2)
                        <div class="btn-show-all">
                            <span class="text">{{__("Show All")}}</span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    @endif
                </div>
            </div>
        @endif
        <hr>
        @if($translation->cancel_policy)
        @php $translation->cancel_policy = json_decode($translation->cancel_policy,true); @endphp
            <h3>{{__("Cancellation Policies")}}</h3>
            <div class="row">
                
                <div class="col-lg-4">
                    {{-- <div class="key">{{__("Our Cancellation Policies")}}</div> --}}
                </div>
                <div class="col-lg-8">
                    @foreach($translation->cancel_policy as $key => $item)
                        <div class="item @if($key > 1) d-none @endif">
                            <div class="strong">{{$item['cancel_name']}}</div>
                            <div class="context">{!! $item['cancel_content'] !!} price {!! $item['cancel_price'] !!} {!! $item['cancel_unit'] !!}</div>
                            {{-- <div class="context">{!! $item['cancel_price'] !!}</div>
                            <div class="context">{!! $item['cancel_unit'] !!}</div> --}}
                        </div>
                    @endforeach
                    @if( count($translation->cancel_policy) > 2)
                        <div class="btn-show-all">
                            <span class="text">{{__("Show All")}}</span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
<div class="bravo-hr"></div>
@includeIf("Hotel::frontend.layouts.details.hotel-surrounding")

@if($row->map_lat && $row->map_lng)
    <div class="g-location">
        <div class="location-title">
            <h3>{{__("Location")}}</h3>
            @if($translation->address)
                <div class="address">
                    <i class="icofont-location-arrow"></i>
                    {{$translation->address}}
                </div>
            @endif
        </div>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
       
     </div>
    <div class="col-12">
          <button  onclick="getLocation()" class="btn btn-primary" id="userLocation">Get Direction</button>
    </div>
@endif
<div class="bravo-hr"></div>
