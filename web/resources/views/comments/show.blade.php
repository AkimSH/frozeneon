<div style="padding-left: 50px">
    <p class="card-text" >
        {{$comment->user->personaname .' - '}}
        <small class="text-muted">{{$comment->text}}</small>
        <a role="button" @click="addLike('comment', comment.id)">
            <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
            </svg>
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
