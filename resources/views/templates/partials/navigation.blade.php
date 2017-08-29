
<div class="top-bar">
    <div class="top-bar-left">

        <ul class="dropdown menu" data-dropdown-menu>
            <li class="menu-text">Bevy</li>
            <!-- @if (Auth::check()) -->
            <li><a href="#">Timeline</a></li>
            <li><a href="#">Friends</a></li>

            <li><input type="search" placeholder="Search"></li>
            <li><button type="button" class="button">Search</button></li>
        </ul>
    <!-- @endif -->
    </div>
    <div class="top-bar-right">
        <ul class="menu">
        <!--@if(Auth::check()) -->
        <li><a href="#">Dayle<!-- {{Auth::user()->getNameOrUsername() }}
                    --></a></li>
        <li><a href="#">Update profile</a></li>
        <li><a href="#">Sign out</a></li>
        <!-- @else -->
        <li><a href="#">Sign up</a></li>
        <li><a href="#">Sign in</a></li>
        <!-- @endif -->
    </ul>
    </div>
</div>