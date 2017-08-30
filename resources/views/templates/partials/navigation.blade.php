
<div class="top-bar">
    <div class="top-bar-left">

        <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text"><a href="{{ route('home') }}">Bevy</a></li>
        @if (Auth::check())
            <li><a href="#">Timeline</a></li>
            <li><a href="#">Znajomi</a></li>
            <li><input type="search" placeholder="Szukaj znajomych"></li>
            <li><button type="button" class="button">Szukaj</button></li>
        @endif
        </ul>

    </div>
    <div class="top-bar-right">
        <ul class="menu">
        @if(Auth::check())
        <li><a href="#">{{ Auth::user()->getNameOrUsername() }}</a></li>
        <li><a href="#">Edytuj profil</a></li>
        <li><a href="{{ route('auth.signout') }}">Wyloguj</a></li>
        @else
        <li><a href="{{ route('auth.signup') }}">Zarejestruj</a></li>
        <li><a href="{{ route('auth.signin') }}">Zaloguj</a></li>
        @endif
        </ul>
    </div>
</div>