@extends ('templates.default')

@section('content')
    <div class="row">
        <div class="large-6 columns">
            <h2>Edytuj profil</h2>
        </div>
    </div>
    <div class="row">
        <div class="large-6 columns">
            <form role="form" method="post" action="{{route('profile.edit')}}">
                <div class="large-6 columns">
                        <label>Imię
                        <input type="text" name="imie" id="first_name" value="{{Auth::user()->first_name ?: Request::old('imie')}}">
                            @if($errors->has('imie'))
                                <span class="help-text" id="form-error">{{$errors->first('imie')}}</span>
                            @endif
                        </label>
                </div>
                <div class="large-6 columns">
                        <label>Nazwisko
                        <input type="text" name="nazwisko" id="last_name" value="{{Auth::user()->last_name ?: Request::old('nazwisko')}}">
                            @if($errors->has('nazwisko'))
                                <span class="help-text" id="form-error">{{$errors->first('nazwisko')}}</span>
                            @endif
                        </label>
                </div>
                <div class="large-12 columns">
                        <label>Miejsce zamieszkania
                        <input type="text" name="miasto" id="location" value="{{Auth::user()->location ?: Request::old('miasto')}}">
                            @if($errors->has('miasto'))
                                <span class="help-text" id="form-error">{{$errors->first('miasto')}}</span>
                            @endif
                        </label>
                </div>
                <div class="large-12 columns">
                        <button type="submit" class="success button">Edytuj</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@stop