@section('head')
    <link href="{{ asset('module/vendor/css/vendor-register.css?_ver='.config('app.version')) }}" rel="stylesheet">
@endsection
<div class="container">
    <div class="bravo-vendor-form-register py-5 @if(!empty($layout)) {{ $layout }} @endif">
        <div class="row">
            <div class="col-12 col-lg-5">
                <h1>{{ __("You already request become vendor")  }}</h1>
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-lg-6">
                <div class="bravo_gallery">
                    <div class="btn-group">
                        <span class="btn-transparent has-icon bravo-video-popup" @if(!empty($youtube)) data-toggle="modal" @endif data-src="{{ handleVideoUrl($youtube) }}" data-target="#video-register">
                            @if($bg_image)
                                <img src="{{get_file_url($bg_image,'full')}}" class="img-fluid" alt="Youtube">
                            @endif
                            @if(!empty($youtube))
                                <div class="play-icon">
                                    <img src="{{asset('module/vendor/img/ico-play.svg')}}" alt="Play background" class="img-fluid play-image">
                                </div>
                            @endif
                        </span>
                    </div>
                    @if(!empty($youtube))
                        <div class="modal fade" id="video-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content p-0">
                                    <div class="modal-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
