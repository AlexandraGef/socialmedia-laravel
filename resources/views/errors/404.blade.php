@extends ('templates.default')

@section('content')
    <h3>Ups... Wybrana strona nie istnieje</h3><br/>
    <a href="{{ route('home') }}">Wróć do strony głównej</a>

@stop