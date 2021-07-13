@extends('layouts.app')

@section('title', 'User')

@section('content')
    @include('includes.message-block')


    <img style="height: 200px; width: 200px; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$user->avatar}}" alt="Card image cap">
    <div class="text-center">

        <h5 style="color:#f7f7f7" class="title">{{$user->first_name}}</h5>
        <p style="color:#f7f7f7">{{$user->status}}</p>
        @if(Auth::user() == $user)
            <a href="/users/{{$user->id}}/edit" class="btn btn-dark">Editar</a>
        @endif
        
               

        <!--<form method="POST" action="/trainers/{{$user->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Eliminar">
            </div>
        </form>-->

    </div> 
    

@endsection