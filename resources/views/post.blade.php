
<div class="card" style="width: 100%" data-post="{{$post->id}}">
    <div class="card-header">
        <a href="{{auth()->check() && $post->user_id == auth()->id() ? 'profile' : 'profile/'.$post->user_id}}">
            <img width="50" height="50"
                 src="{{asset($post->user->image) }}"
                 alt="">
            {{$post->user->name}}
        </a>
    </div>
    @if($post->image)
        <img class="card-img-top" src="{{$post->avatar}}"
             alt="Card image cap">
    @endif
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>
                {{$post->text}}
            </p>
            <footer class="blockquote-footer">
                            <span>
                                {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                            </span>
                @auth
                    <i class="fal fa-heart pressLove {{$post->likes->contains('user_id',auth()->id()) ? 'redHeart' : ''}} float-right">{{$post->likes->count()}}</i>
                @else
                    <i class="fal fa-heart pressLove float-right">{{$post->likes->count()}}</i>
                @endauth
            </footer>
        </blockquote>
    </div>
    <div class="card-footer">
        <div class="comments">
            @foreach($post->comments as $comment)
                @include('comment',compact('comment'))
            @endforeach
        </div>
        <div class="form-group" data-id="{{$post->id}}">
            <textarea name="comment" id="commentText" class="form-control" rows="3"></textarea>
            <input type="button" value="Comment" class="btn btn-info float-right postComment">
        </div>
    </div>
</div>
