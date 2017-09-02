@extends ('templates.default')

@section('content')
   <div class="row">
       <div class="large-6 columns">
           <form role="form" action="{{route ('status.post')}}" method="post">
               <textarea placeholder="Co słychać {{Auth::user()->getFirstNameOrUsername()}} ?" name="status" rows="2"></textarea>
               @if($errors->has('status'))
                   <p class="help-text" id="form-error2">{{$errors->first('status')}}</p>
               @endif
               <button type="submit" class="button">Aktualizuj status</button>
               <input type="hidden" name="_token" value="{{ Session::token() }}">
           </form>
<hr>
       </div>
   </div>
    <div class="row">
        <div class="large-5 columns">
@if (!$statuses->count())
    <p>Twoja tablica jest narazie pusta</p>
    @else
            @foreach($statuses as $status)
                    <div class="media-object">
                        <div class="media-object-section">
                            <div class="thumbnail">
                                <a href="{{ route('profile.index',['username' => $status->user->username]) }}">
                                <img alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user->getAvatarUrl() }} ">
                                </a>
                            </div>
                        </div>
                        <div class="media-object-section">
                            <a href="{{ route('profile.index',['username' => $status->user->username]) }}"><h4>{{ $status->user->getNameOrUsername() }}</h4></a>
                            <p>{{ $status->body }}</p>
                            <ul class="menu">
                                <li>{{ $status->created_at->diffForHumans() }}</li>
                                <li><a href="#">Lubię</a></li>
                                <li>10 likes</li>
                            </ul>
                        </div>
                    </div>
                    <h3>Komentarze</h3>
                @foreach($status->replies as $reply)
                        <div class="comment-section-container">
                            <div class="comment-section-author menu">
                                <a href="{{ route('profile.index',['username'=> $reply->user->username]) }}"><img src="{{$reply->user->getAvatarUrl() }}" alt="{{ $reply->user->getNameOrUsername() }}"></a>
                                <h5><a href="{{ route('profile.index',['username'=> $reply->user->username]) }}">{{$reply->user->getNameOrUsername() }}</a></h5>
                            </div>
                            <div class="comment-section-text">
                                <p>{{ $reply -> body }}
                                </p>
                            </div>
                            <div class="comment-section-like-date menu">
                                <p>{{ $reply->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                    @endforeach

                <form role="form" action="{{ route('status.reply',['statusId' => $status->id]) }}" method="post">
                    <textarea name="reply-{{$status->id }}" rows="2" placeholder="Napisz komentarz"></textarea>
                    @if($errors->has("reply-{$status->id}"))
                        <p class="help-text" id="form-error2">{{$errors->first("reply-{$status->id}")}}</p>
                    @endif
                    <input type="submit" value="Skomentuj" class="button small">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
                @endforeach
    {!! $statuses->render() !!}
    @endif
        </div>
    </div>

@stop