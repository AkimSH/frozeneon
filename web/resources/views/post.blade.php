@extends('layouts.app')

@section('content')


        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post {{ $post->id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif
                <div class="modal-body">
                    <div class="user">
                        <div class="avatar"><img src="{{$post->user->avatarfull}}" alt="Avatar"></div>
                        <div class="name">{{$post->user->personaname}}</div>
                    </div>
                    <div class="card mb-3">
                        <img src="{{URL::asset('images' . $post->img)}}" alt="">
                        <div class="card-body">
                            <div class="likes" @click="addLike('post', post.id)">
                                <div class="heart-wrap" v-if="!likes">
                                    <div class="heart">
                                        <svg class="bi bi-heart" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 01.176-.17C12.72-3.042 23.333 4.867 8 15z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span>{{$post->likes}}</span>
                                </div>
                                <div class="heart-wrap" v-else>
                                    <div class="heart">
                                        <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span>@{{likes}}</span>
                                </div>
                            </div>


                            @foreach($post->coments as $comment)

                                @include('comments.show', ['comment' => $comment])

                            @endforeach


                            <hr>
                            <form class="form-inline" action="/add_comment" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="form-group">
                                    <input type="text" size="100" required name="text" class="form-control" id="addComment">
                                </div>
                                <button type="submit" class="btn btn-primary" >Add comment</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="/" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>


        <script src="{{ asset('js/app.js') }}?v=12345677255676"></script>
@endsection
