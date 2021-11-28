
@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Equips Show') }}</div>
                
                <div class="card-body">                     
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" value="{{$equip->alat}}" name="alat" class="form-control" placeholder="Please enter equipment name" readonly> 
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"readonly>{{$equip->description}}</textarea>
                        </div>
                        <div>
                        <a class="btn btn-link" href="/equips/{{$equip->index}}">Back</a>
                        </div>
                @if($equip->attachment)        
                <a target="_blank"
                    href="{{$equip->attachment_url}}"
                    class="btn btn-link">
                    Open Attachment
                </a>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
