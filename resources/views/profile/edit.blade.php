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
                        <input type="text" name="first_name" id="first_name" value="{{Request::old('first_name') ?: Auth::user()->first_name }}">
                            @if($errors->has('first_name'))
                                <span class="help-text" id="form-error">{{$errors->first('first_name')}}</span>
                            @endif
                        </label>
                </div>
                <div class="large-6 columns">
                        <label>Nazwisko
                        <input type="text" name="last_name" id="last_name" value="{{Request::old('last_name') ?: Auth::user()->last_name}}">
                            @if($errors->has('last_name'))
                                <span class="help-text" id="form-error">{{$errors->first('last_name')}}</span>
                            @endif
                        </label>
                </div>
                <div class="large-12 columns">
                        <label>Miejsce zamieszkania
                        <input type="text" name="location" id="location" value="{{Request::old('location') ?: Auth::user()->location }}">
                            @if($errors->has('location'))
                                <span class="help-text" id="form-error">{{$errors->first('location')}}</span>
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