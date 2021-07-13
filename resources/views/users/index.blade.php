@extends('layouts.app')

@section('title', 'Users')

@section('content')
   
<div class="container">
    <div class="row">
        @foreach($users as $user)
            @if(Auth::user() != $user)
                <div class="col-sm">
                    <div class="card text-center" style="width: 18rem; margin-top: 70px;">
                        <img style="height: 100px; width: 100px; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="images/{{$user->avatar}}" alt="">
                        <div class="card-body">

                            <h5 style="color:#f7f7f7" class="card-title">{{$user->first_name}}</h5>
                            <p style="color:#f7f7f7" class="card-text">{{$user->status}}</p>
                            <a href="/users/{{$user->id}}" class="btn btn-secondary">Ver más</a>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection