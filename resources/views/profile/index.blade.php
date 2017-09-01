@extends ('templates.default')

@section('content')
 <div class="row">
     <div class="large-5 columns">
@include('users.partials.usersblock')
         <hr>
     </div>
     <div class="large-4 large-offset-3 columns">
         @if (Auth::user()->hasFriendRequestsPending($user))
             <p>Oczekiwanie na akceptację Twojego zaproszenia przez {{ $user->getNameOrUsername() }}</p>
             @elseif(Auth::user()->hasFriendRequestReceived($user))
             <a href="#" class="button">Akceptuj zaproszenie do znajomych</a>
             @elseif(Auth::user()->isFriendsWith($user))
             <p>Ty i {{ $user->getFirstNameOrUsername() }} jesteście znajomymi</p>
             @else
             <a href="#" class="button">Dodaj do znajomych</a>
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