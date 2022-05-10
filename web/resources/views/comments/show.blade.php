<div style="padding-left: 50px">
    <p class="card-text" >
        {{$comment->user->personaname .' - '}}
        <small class="text-muted">{{$comment->text}}</small>
            <a role="button" href="/get-like/like_comment/{{$comment->id}}" @click="addLike('comment', comment.id)">
                @if($comment->likes == 0)
                    <svg class="bi bi-heart" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 01.176-.17C12.72-3.042 23.333 4.867 8 15z" clip-rule="evenodd"/>
                    </svg>
                @else
                    <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
                    </svg>
                @endif
                {{ $comment->likes }}
            </a>
    </p>
    <form class="form-inline" action="/add_comment" method="post">
        {{csrf_field()}}
        <input type="hidden" name="post_id" value="{{$comment->assign_id}}">
        <input type="hidden" name="reply_id" value="{{$comment->id}}">
        <div class="form-group">
            <input type="text" required name="text" class="form-control" id="addComment">
        </div>
        <button type="submit" class="btn btn-primary" >Add comment</button>
    </form>
    @if (!empty($comment->comments))
        @foreach($comment->comments as $child_comment)
            @include('comments.show', ['comment' => $child_comment])
        @endforeach
    @endif
</div>
