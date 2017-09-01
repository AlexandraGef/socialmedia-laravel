
<div class="top-bar">
    <div class="top-bar-left">
        <form class="top-bar-left" role="search" action="{{ route('search.results') }}">
        <ul class="menu">
            <li class="menu-text"><a href="{{ route('home') }}">Bevy</a></li>
        @if (Auth::check())
            <li><a href="{{ route('home') }}">Timeline</a></li>
            <li><a href="{{ route('friend.index') }}">Znajomi</a></li>
            <li><input type="search" name="szukaj" placeholder="Szukaj znajomych"></li>
            <li><button type="submit" class="button">Szukaj</button></li>

        @endif
        </ul>
        </form>


    </div>
    <div class="top-bar-right">
        <ul class="menu">
        @if(Auth::check())
        <li><a href="{{route('profile.index',['username'=> Auth::user()->username])}}">{{ Auth::user()->getNameOrUsername() }}</a></li>
        <li><a href="{{route ('profile.edit')}}">Edytuj profil</a></li>
        <li><a href="{{ route('auth.signout') }}">Wyloguj</a></li>
        @else
        <li><a href="{{ route('auth.signup') }}">Zarejestruj</a></li>
        <li><a href="{{ route('auth.signin') }}">Zaloguj</a></li>
        @endif
        </ul>
    </div>
</div>