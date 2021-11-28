
@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('message'))
                <div class ="alert {{session()->get('type')}}">
                     {{ session()->get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Equips Index') }}
                
                    <div class="float-right">
                        <form action="" method="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" value="{{request()->get('keyword')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                
                </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th>Creator</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($equips as $equip)
                                <tr>
                                    <td> {{$equip->id}} </td>
                                    <td> {{$equip->alat}} </td>
                                    <td> {{$equip->description}} </td>
                                    <td> {{$equip->created_at->diffForHumans()}} </td>
                                    <td> {{$equip->user->name}} </td>
                                    <td>
                                        <a class="btn btn-primary" href="/equips/{{$equip->id}}">Show</a>
                                        <a class="btn btn-success" href="/equips/{{$equip->id}}/edit">Edit</a>
                                        <a onclick="return confirm ('Anda pasti untuk padam?')" class="btn btn-danger" href="/equips/{{$equip->id}}/delete">Padam</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$equips->links()}}
                        <a class="btn btn-secondary" href="/equips/create">Tambah</a>                        
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
