<div class="media-object">
    <div class="media-object-section">
        <div class="thumbnail">
            <a href="{{ route('profile.index', ['username' => $user-> username]) }}"><img src="{{ $user->getAvatarUrl() }}" alt="{{ $user->getNameOrUsername() }}"></a>
        </div>
    </div>
    <div class="media-object-section">
        <h4><a href="{{ route('profile.index', ['username' => $user-> username]) }}">{{ $user->getNameOrUsername() }}</a></h4>
        @if ($user->location)
            <p>{{ $user->location }}</p>
        @endif
    </div>
</div>