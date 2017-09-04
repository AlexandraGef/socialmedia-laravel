@extends ('templates.default')

@section('content')
 <div class="row">
     <div class="large-5 columns">
@include('users.partials.usersblock')
         <hr>
         <div class="row">
             <div class="large-12 columns">
                 @if (!$statuses->count())
                     <p>{{$user->getFirstNameOrUsername() }} jeszcze niczego nie udostępniłaś/eś !</p>
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
                                     @if ($status->user->id !== Auth::user()->id)
                                     <li><a href="{{ route('status.like',['statusId' => $status->id]) }}">Lubię</a></li>
                                     @endif
                                     <li>&nbsp&nbsp{{ $status->likes()->count() }}&nbsplubie</li>
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
                                 <ul class="comment-section-like-date menu">
                                     <li>{{ $reply->created_at->diffForHumans() }}</li>
                                     @if ($reply->user->id !== Auth::user()->id)
                                         <li><a href="{{ route('status.like',['statusId' => $reply->id]) }}">Lubię</a></li>
                                     @endif
                                     <li>&nbsp&nbsp{{ $reply->likes()->count() }}&nbsplubie</li>
                                 </ul>
                             </div>

                         @endforeach
                    @if($authUserIsFriend || Auth::user()->id === $status->user->id)
                         <form role="form" action="{{ route('status.reply',['statusId' => $status->id]) }}" method="post">
                             <textarea name="reply-{{$status->id }}" rows="2" placeholder="Napisz komentarz"></textarea>
                             @if($errors->has("reply-{$status->id}"))
                                 <p class="help-text" id="form-error2">{{$errors->first("reply-{$status->id}")}}</p>
                             @endif
                             <input type="submit" value="Skomentuj" class="button small">
                             <input type="hidden" name="_token" value="{{ Session::token() }}">
                         </form>
                         @endif
                     @endforeach

                 @endif
             </div>
         </div>

     </div>
     <div class="large-4 large-offset-3 columns">
         @if (Auth::user()->hasFriendRequestsPending($user))
             <p>Oczekiwanie na akceptację Twojego zaproszenia przez {{ $user->getNameOrUsername() }}</p>
             @elseif(Auth::user()->hasFriendRequestReceived($user))
             <a href="{{route('friend.accept', ['username'=>$user->username])}}" class="button">Akceptuj zaproszenie do znajomych</a>
             @elseif(Auth::user()->isFriendsWith($user))
             <p>Ty i {{ $user->getFirstNameOrUsername() }} jesteście znajomymi</p>
             @elseif(Auth::user()->id !== $user->id)
             <a href="{{route('friend.add', ['username'=> $user->username])}}" class="button">Dodaj do znajomych</a>
         @endif
<h4>Znajomi użytkownika {{ $user->getFirstNameOrUsername() }}</h4>
         @if(!$user->friends()->count())
             <p>{{$user->getFirstNameOrUsername() }} nie posiada znajomych.</p>
             @else
             @foreach($user->friends() as $user)
                 @include('users/partials/usersblock')
             @endforeach
         @endif
     </div>
 </div>

@stop