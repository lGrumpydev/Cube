@if(count($errors) > 0)

    <div class="container">
        <div class="alert alert-danger">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endif

@if(Session::has('message'))

<div class="container">
    <div class="alert alert-success">
        <div class="row">
            <div class="col-md-6">
                {{session::get('message')}}
            </div>
        </div>
    </div>
</div>

@endif