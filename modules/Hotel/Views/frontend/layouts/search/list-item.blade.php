

<div class="row">
    <div class="col-lg-3 col-md-12">
        @include('Hotel::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <h2 class="text">
                    @if($rows->total() > 1)
                        {{ __(":count homestays found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count homestay found",['count'=>$rows->total()]) }}
                    @endif
                </h2>
                <div class="control">
                    @include('Hotel::frontend.layouts.search.orderby')
                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            @php $layout = setting_item("hotel_layout_item_search",'list') @endphp
                            @if($layout == "list")
                                <div class="col-lg-12 col-md-12">
                                    @include('Hotel::frontend.layouts.search.loop-list')
                                </div>
                            @else
                                <div class="col-lg-4 col-md-12">
                                    @include('Hotel::frontend.layouts.search.loop-grid')
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Homestay not found")}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <span class="count-string">{{ __("Showing :from - :to of :total Homestay",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>


<br>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7111890470817134"
     crossorigin="anonymous">
</script>
<!-- homestayje banner ad 900x90 -->

<ins class="adsbygoogle"
     style="display:inline-block;width:900px;height:90px;margin-left:250px;"
     data-ad-client="ca-pub-7111890470817134"
     data-ad-slot="9586490680">
</ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>