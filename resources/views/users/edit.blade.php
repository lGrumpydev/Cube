@extends('layouts.app')

@section('title', 'Users Edit')

@section('content')
    <form class="form-group" method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
        
        @method('PUT')
        @csrf
        

    <div class="container">


        <img style="height: 200px; width: 200px;  margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$user->avatar}}" alt="Card image cap">
        
        <br>
        <div class="form-group text-center">
            <label style="color:#f7f7f7" for="">Avatar</label>
            <input style="background: #191919; color:#f7f7f7; border-color: #191919" type="file" name="avatar" class="form-control">
        </div>

        <br>
        <div class="form-group text-center">
            <label style="color:#f7f7f7" for="">Name</label>
            <input style="background: #191919; color:#f7f7f7; border-color: #191919" type="text" name="first_name" value="{{$user->first_name}}" class="form-control">
        </div>

        <br>
        <div class="form-group text-center">
            <label style="color:#f7f7f7" for="">Status</label>
            <input style="background: #191919; color:#f7f7f7; border-color: #191919" type="text" name="status" value="{{$user->status}}" class="form-control">
        </div>

        <br>
        <button type="sbumit" class="btn btn-dark">Actualizar</button>
    </div>
    </form>
@endsection