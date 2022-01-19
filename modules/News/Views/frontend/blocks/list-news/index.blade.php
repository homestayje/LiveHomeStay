<div class="bravo-list-news">
    <div class="container">
        @if($title)
            <div class="title">
                {{$title}}
                @if(!empty($desc))
                    <div class="sub-title">
                        {{$desc}}
                    </div>
                @endif
            </div>
        @endif
        <div class="list-item">
            <div class="row news">
                @foreach($rows as $row)
                    <div class="col-lg-3 col-md-6">
                        @include('News::frontend.blocks.list-news.loop')
                    </div>
                @endforeach
            </div>
            <div class="wrapper bravo_wrap">
                    <div class="page-template-content">
                        <div class="carousel bravo-list-news">
                        @foreach($rows as $row)
                            <div class="col-lg-{{$col ?? 3}} col-md-6">
                                @include('News::frontend.blocks.list-news.loop')
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>