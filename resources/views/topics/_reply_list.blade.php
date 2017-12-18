
<div class="reply-list">
    @foreach ($replies as $index => $reply)
        <div class=" media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="avatar pull-left">
                <a href="{{ route('users.show', [$reply->user_id]) }}">
                    <img src="{{ $reply->user->avatar }}" class="media-object img-thumbnail" alt="{{ $reply->name }}" style="width:48px;height:48px;" />
                </a>

                <div class="infos">
                    <div class="media-heading">
                        <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name}}">
                            {{ $reply->user->name }}
                        </a>
                        <span> * </span>

                        <span class="meta" title="{{ $reply->created_at }}">
                            {{ $reply->created_at->diffForHumans() }}
                        </span>

                        @can('destroy', $reply)
                            <span class="meta pull-right">
                                <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-default btn-xs pull-left">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </form>
                            </span>
                        @endcan
                    </div>
                    <div class="reply-content">
                        {!! clean($reply->content, 'user_topic_body') !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
