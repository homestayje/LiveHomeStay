
<div class="panel">
    <div class="panel-title"><strong>{{__("Cancellation Policy")}}</strong></div>
    <div class="panel-body">
    
        <div class="form-group-item">
            <label class="control-label">{{__('Clause')}}</label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-3">{{__("Name")}}</div>
                    <div class="col-md-3">{{__('Content')}}</div>
                    <div class="col-md-3">{{__('Price')}}</div>
                    <div class="col-md-2"></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                
                @if(!empty($translation->cancel_policy))
                   
                    @php $translation->cancel_policy = json_decode($translation->cancel_policy,true); @endphp
                   
                    @foreach($translation->cancel_policy as $key=>$item)

                    
                        <div class="item" data-number="{{$key}}">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="cancel_policy[{{$key}}][cancel_name]" class="form-control" value="{{$item['cancel_name']}}" placeholder="{{__('Eg: What kind of foowear is most suitable ?')}}">
                                </div>
                                <div class="col-md-3">
                                    <textarea name="cancel_policy[{{$key}}][cancel_content]" class="form-control" placeholder="...">{{$item['cancel_content']}}</textarea>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="cancel_policy[{{$key}}][cancel_price]" class="form-control" value="{{$item['cancel_price']}}" placeholder="{{__('Eg: What kind of foowear is most suitable ?')}}">
                                </div>
                                <div class="col-md-2">
                                    <select name="cancel_policy[{{$key}}][cancel_unit]"
                                            class="form-control">
                                        <option @if($item['cancel_unit']=='%') selected
                                                @endif value="{{$item['cancel_unit']}}">{{__('%')}}</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" __name__="cancel_policy[__number__][cancel_name]" class="form-control" placeholder="{{__(' Cancellation policy name?')}}">
                        </div>
                        <div class="col-md-3">
                            <textarea __name__="cancel_policy[__number__][cancel_content]" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="col-md-3">
                            <input type="number" __name__="cancel_policy[__number__][cancel_price]" class="form-control" >
                        </div>
                        <div class="col-md-2">
                            <select __name__="cancel_policy[__number__][cancel_unit]"
                                    class="form-control">
                                <option value="%">{{__('%')}}</option>
                                
                            </select>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>