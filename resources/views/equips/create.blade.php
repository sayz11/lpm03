
@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Equips Create') }}</div>
                
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Equipment</label>
                            <input type="text" name="alat" class="form-control" placeholder="Please enter equipment name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Attachment</label>
                            <input type="file" name="attachment" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Store My Equipment Name!</button>
                            <a class="btn btn-link" href="{{ url()->previous() }}"> Back</a>
                        </div>


                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
