@extends('layouts.appsignup')
<link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
@section('title')
    welcome!
@endsection

@section('content')
    

    <div class="container">
        @include('includes.message-block')

            <div class="form-group d-flex text-center" style="height: 100vh" >
                <div class="col-md-4 col-md-offset-4 m-auto d-block caja">
                    <div style="">
                        <img style="height: 300px; width: 300px; margin: 20px;" class="card-img-top mx-auto d-block cubo" src="../images/CubeLogo.png" alt="">
                    </div>
                    <br>
                    <h3 style="color:#f7f7f7">Sign Up</h3>
                    <form action="{{ route('signup') }}" method="post">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label style="color:#f7f7f7" for="email">Your E-Mail</label>
                            <input style="background: #191919; color:#f7f7f7; border-color: #191919" class="form-control" type="text" name="email" id="email" value="{{ Request::old('email')}}">
                        </div>

                        <div class="form-group">
                            <label style="color:#f7f7f7" for="first_name">Your name</label>
                            <input style="background: #191919; color:#f7f7f7; border-color: #191919" class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name')}}"}}>
                        </div>

                        <div class="form-group">
                            <label style="color:#f7f7f7" for="email">Your Password</label>
                            <input style="background: #191919; color:#f7f7f7; border-color: #191919" class="form-control" type="password" name="password" id="password" >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-dark">Sign Up</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
    </div>
@endsection