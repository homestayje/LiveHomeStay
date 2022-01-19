@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Coupon Management")}}</h1>
            <div class="title-actions mt-4">
                @if(empty($recovery))
                    <a href="{{ route("coupon.user.create") }}" class="btn btn-primary">{{__("Add new coupon")}}</a>
                @endif
            </div>
        </div>

        @include('admin.message')
        <div class="row">
            <div class="col-md-12">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{route('coupon.user.bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Bulk Actions ")}}</option>
                                    <option value="publish">{{__(" Publish ")}}</option>
                                    <option value="draft">{{__(" Move to Draft ")}}</option>
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}" class="btn btn-info btn-sm btn-icon dungdt-apply-form-btn ml-3" type="button">{{__('Apply')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-right">
                        <form method="get" action="" class="filter-form filter-form-left d-flex justify-content-start">
                           
                        </form>
                    </div>
                </div>
                <div class="panel mt-4">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="45px"><input type="checkbox" class="check-all"></th>
                                        <th> {{ __('Code')}}</th>
                                        <th> {{ __('Name')}}</th>
                                        <th> {{ __('Amount')}}</th>
                                        <th> {{ __('Discount Type')}}</th>
                                        <th> {{ __('End Date')}}</th>
                                        <th width="100px"> {{ __('Status')}}</th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($rows->total() > 0)
                                        @foreach($rows as $row)
                                            <tr class="{{$row->status}}">
                                                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                                </td>
                                                <td class="title">
                                                    <strong>{{$row->code}}</strong>
                                                </td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->amount}}</td>
                                                <td>{{$row->discount_type == 'percent' ? __("Percent") : __("Amount")}}</td>
                                                <td>{{ ($row->end_date) }}</td>
                                                <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
                                                <td>
                                                    <a href="{{route('coupon.user.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">{{__("No coupon found")}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between">
                            {{$rows->appends(request()->query())->links()}}
                            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://homestayje.com/libs/pusher.min.js"></script>
<script src="https://homestayje.com/dist/admin/js/manifest.js?_ver=2.2.0" ></script>
<script src="https://homestayje.com/dist/admin/js/vendor.js?_ver=2.2.0" ></script>
<script src="https://homestayje.com/libs/filerobot-image-editor/filerobot-image-editor.min.js?_ver=2.2.0"></script>

<script src="https://homestayje.com/dist/admin/js/app.js?_ver=2.2.0" ></script>
<script src="https://homestayje.com/libs/vue/vue.min.js"></script>

<script src="https://homestayje.com/libs/select2/js/select2.min.js" ></script>
<script src="https://homestayje.com/libs/bootbox/bootbox.min.js"></script>

<script src="https://homestayje.com/libs/daterange/moment.min.js"></script>
<script src="https://homestayje.com/libs/daterange/daterangepicker.min.js?_ver=2.2.0"></script>
@endsection




