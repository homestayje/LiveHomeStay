@extends('layouts.user')
@section('head')
@endsection
@section('content')
    <h2 class="title-bar">
        {{__("Bank Information")}}
    </h2>
    @include('admin.message')

    
    <form action="{{ route("user.account_info_update") }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{__("Name on bank account")}}</label>
                    <input type="text" name="bank_info_username" placeholder="{{__("Eg: John Smith")}}" @if(!empty($data['bank_info'])) value="{{$data['bank_info']['bank_info_username']}}" @endif class="form-control">
                </div>
                <div class="form-group">
                    <label>{{__("Bank account number")}}</label>
                    <input type="number" name="bank_info_accountnumber" placeholder="{{__("14 digit account no.")}}" @if(!empty($data['bank_info'])) value="{{$data['bank_info']['bank_info_accountnumber']}}" @endif class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <input type="submit" class="btn btn-primary" value="{{__("Save Bank Information")}}">
                <a href="{{ route("user.account_info_update") }}" class="btn btn-default">{{__("Cancel")}}</a>
            </div>
        </div>
    </form>
@endsection
@section('footer')

@endsection
