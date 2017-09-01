@extends ('templates.default')

@section('content')
<div class="row">
    <div class="large-6 columns">
        <h2>Twoi znajomi</h2>
        @if(!$friends->count())
            <p>Nie posiadasz znajomych.</p>
        @else
            @foreach($friends as $user)
                @include('users/partials/usersblock')
            @endforeach
        @endif
    </div>
    <div class="large-6 columns">
        <h2>Odpowiedzi na zaproszenia</h2>

    </div>
</div>


@stop