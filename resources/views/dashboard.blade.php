@extends('layouts.app')


@section('title')
    Dashboard
@endsection

@section('content')
@include('includes.message-block')
<div class="background">
    <section class="row new-post" >
        
        <div class="col-md-6 col-md-offset-3">
            <div class="card" >
                <div class="card-header">
                    <header>
                        <h3 style="color:#f7f7f7">Make a Post</h3>
                    </header>
                </div>           
                <div class="card-body">

                    <form action="{{ route('post.create') }}" method="post">
                        <div class="form-group">
                            <textarea  class="form-control text-white" style="background: #191919; border-color: #191919" name="body" id="body" cols="30" rows="5" placeholder="Your post"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-dark">Create a post</button>
                        <input type="hidden" value="{{ Session::token()}}" name="_token">
                    </form>
                </div>
            </div>
        </div>
        
    </section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <br>
                <h3 style="color:#f7f7f7">Other Post</h3>
            </header>

            @foreach($posts as $post)
            
            <div class="card" >
                <div class="card-header">
                    <article class="post" data-postid="{{ $post->id }}">
                        <div class="card-header">
                            <span style="color:#f7f7f7">Posted by</span> <a style="text-decoration: none" href="/users/{{ $post->user->id}}">{{ $post->user->first_name}}</a> <span style="color:#f7f7f7">on {{ $post->created_at}}</span>
                        </div>

                            <p style="color:#f7f7f7"> {{ $post->body }}</p>

                        <div class="interaction">
                            <a style="text-decoration: none" href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? '💔' : '❤️' : '❤️' }}</a> 
                            <span style="color:#b0b0b0">| Likes: </span> 
                            <p style="display:inline; color:#b0b0b0 ">{{$post->likes_count}}</p>

                            @if(Auth::user() == $post->user)
                            <span style="color:#b0b0b0">|</span>
                            <a style="text-decoration: none" href="#" class="edit">Edit</a> <span style="color:#b0b0b0">|</span>
                            <a style="text-decoration: none" href="{{ route('post.delete', ['post_id' => $post->id])}}">Delete</a>
                            @endif
                        </div>
                    </article>
                </div>
            </div>
            <br>
            @endforeach

        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit post</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="post-body">Edit the Post</label>
                        <textarea class="form-control" name="post-body" id="post-body" rows="10"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('postedits') }}';
        var urlLike = '{{ route('like') }}';
    </script>
      


</div>
@endsection