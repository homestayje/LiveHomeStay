@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
    <div class="bravo_detail_hotel">
        @include('Hotel::frontend.layouts.details.hotel-banner')
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        @php $review_score = $row->review_data @endphp
                        @include('Hotel::frontend.layouts.details.hotel-detail')
                        <div class="col-md-12 p-0">
                            <div class="share" style="font-size: 14px;color: #1a2b48;"> {{__("Share")}} 
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" original-title="{{__("Facebook")}}"><i class="fa fa-facebook fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="twitter share-item" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" original-title="{{__("Twitter")}}"><i class="fa fa-twitter fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="reddit share-item" href="https://reddit.com/submit?url={{$row->getDetailUrl()}}&title={{$translation->title}}" target="_blank" original-title="{{__("Reddit")}}"><i class="fa fa-reddit fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="linkedin share-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{$row->getDetailUrl()}}" target="_blank" original-title="{{__("Linkedin")}}"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="tumblr share-item" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl={{$row->getDetailUrl()}}&title={{$translation->title}}&caption={{$translation->title}}" target="_blank" original-title="{{__("Tumblr")}}"><i class="fa fa-tumblr fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="pinterest share-item" href="http://pinterest.com/pin/create/link/?url={{$row->getDetailUrl()}}" target="_blank" original-title="{{__("Pinterest")}}"><i class="fa fa-pinterest fa-lg"></i></a>
                                <a style="margin-left: 8px;margin-right: 8px;color: #5e6d77;" class="whatsapp share-item" href="https://api.whatsapp.com/send?phone=&text={{$translation->title}}%20{{$row->getDetailUrl()}}" target="_blank" original-title="{{__("Whatsapp")}}"><i class="fa fa-whatsapp fa-lg"></i></a>
                            </div>
                            <hr />
                        </div>
                        @include('Hotel::frontend.layouts.details.hotel-review')
                    </div>
                    <div class="col-md-12 col-lg-3">
                        @include('Tour::frontend.layouts.details.vendor')
                        @include('Hotel::frontend.layouts.details.hotel-form-enquiry')
                        @include('Hotel::frontend.layouts.details.hotel-related-list')
                        <div class="g-all-attribute is_pc">
                            @include('Hotel::frontend.layouts.details.hotel-attributes')
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('Hotel::frontend.layouts.details.hotel-form-enquiry-mobile')
    </div>
@endsection
@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {
                            iconUrl:"{{get_file_url(setting_item("hotel_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
            @endif
        })

        // https://www.google.com/maps/dir/31.5968086,74.3470166/31.6088919,74.2299696" class="btn btn-primary mt-1
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
   window.location.href="https://www.google.com/maps/dir/"+position.coords.latitude+","+position.coords.longitude+"/{{$row->map_lat}},{{$row->map_lng}}";
    }
    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
			no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one guest')}}',
            load_dates_url:'{{route('space.vendor.availability.loadDates')}}',
            name_required:'{{ __("Name is Required") }}',
            email_required:'{{ __("Email is Required") }}',
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/hotel/js/single-hotel.js?_ver='.config('app.version')) }}"></script>
@endsection


