<div class="container">
    <div class="bravo-list-space layout_{{$style_list}}">
        @if($title)
        <div class="title">
            {{$title}}
        </div>
        @endif
        @if($desc)
            <div class="sub-title">
                {{$desc}}
            </div>
        @endif
        <div class="list-item">
            @if($style_list === "normal")
                <div class="row hotel">
                    @foreach($rows as $row)
                        <div class="col-lg-{{$col ?? 3}} col-md-6">
                            @include('Space::frontend.layouts.search.loop-gird')
                        </div>
                    @endforeach
                </div>
                <div class="wrapper bravo_wrap">
                    <div class="page-template-content">
                        <div class="carousel bravo-list-space">
                        @foreach($rows as $row)
                            <div class="col-lg-{{$col ?? 3}} col-md-6">
                                @include('Space::frontend.layouts.search.loop-gird')
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @if($style_list === "carousel")
                <div class="owl-carousel">
                    @foreach($rows as $row)
                        @include('Space::frontend.layouts.search.loop-gird')
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>