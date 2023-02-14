<div class="row">
    <div class="col-sm-2" title="{{$comment->user->name}}">
        <a href="{{auth()->check() && $comment->post->user_id == auth()->id() ? 'profile' : 'profile/'.$comment->post->user_id}}"><img class="card-img"
                        src="{{$comment->user->avatar}}" alt="{{$comment->user->name}}">
        </a>
    </div>
    <div class="col-sm-10">
        {{$comment->text}}
        <footer class="blockquote-footer">
                    <span>
                        {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}
                    </span>
        </footer>

    </div>
</div>
