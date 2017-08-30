<div class="media-object">
    <div class="media-object-section">
        <div class="thumbnail">
            <img src="#" alt="{{ $user->getNameOrUsername() }}">
        </div>
    </div>
    <div class="media-object-section">
        <h4><a href="#">{{ $user->getNameOrUsername() }}</a></h4>
        @if ($user->location)
            <p>{{ $user->location }}</p>
        @endif
    </div>
</div>