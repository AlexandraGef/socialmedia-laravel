@extends ('templates.default')

@section('content')
    <h2>Twoje wynika dla: "{{ Request::input('szukaj') }}"</h2>
    @if (!$users->count())
        <p>Przykro Nam, ale nie znaleźliśmy pasujących wyników ;(</p>
        @else
    <div class="row">
        <div class="large-12 columns">
                @foreach($users as $user)
           @include('users.partials.usersblock')
                @endforeach
        </div>
    </div>
@endif
@stop