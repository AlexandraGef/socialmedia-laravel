@extends ('templates.default')

@section('content')
 <div class="row">
     <div class="large-5 columns">
@include('users.partials.usersblock')
         <hr>
     </div>
     <div class="large-4 large-offset-3 columns">
<h4>Znajomi użytkownika {{ $user->getFirstNameOrUsername() }}</h4>
         @if(!$user->friends()->count())
             <p>{{$user->getFirstNameOrUsername() }} nie posiada żadnych zanjomych.</p>
             @else
             @foreach($user->friends() as $user)
                 @include('users/partials/usersblock')
             @endforeach
         @endif
     </div>
 </div>

@stop