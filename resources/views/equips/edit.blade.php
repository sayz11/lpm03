
@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Equips Create') }}</div>
                
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Equipment</label>
                            <input type="text" name="alat" class="form-control" placeholder="Please enter equipment name" value="{{$equip->alat}}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{$equip->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit My Equipment Name!</button>
                        </div>
                        <div>
                        <a class="btn btn-link" href="/equips/{{$equip->index}}">Back</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
