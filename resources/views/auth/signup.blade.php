@extends ('templates.default')

@section('content')
    <div class="row">
        <div class="medium-5 columns">
    <h2>Zarejestruj się</h2>
        </div>
    </div>
    <form class="form" role="form" method="post" action="{{ route ('auth.signup') }}" data-abide novalidate>

        <div class="row">
            <div class="medium-5 columns">
            <label>Podaj adres email
                <input type="email" name="email"  placeholder="Podaj email" value="{{Request::old('email') ?: ''}}" required>
                @if($errors->has('email'))
                    <span class="help-text" id="form-error">{{$errors->first('email')}}</span>
                @endif
                <span class="form-error">Proszę podać prawidłowy email !</span>
            </label>
            </div>
        </div>
        <div class="row">
            <div class="medium-5 columns">
            <label>Podaj login
                <input type="text" name="username" placeholder="Podaj login" value="{{Request::old('username') ?: ''}}" required>
                @if($errors->has('username'))
                    <p class="help-text" id="form-error2">{{$errors->first('username')}}</p>
                @endif
                <span class="form-error">Proszę podać login !</span>
            </label>
            </div>
        </div>
        <div class="row">
            <div class="medium-5 columns">
            <label>Podaj hasło
                <input type="password" name="password" placeholder="Podaj hasło" aria-describedby="form-error2" required pattern="[a-zA-Z]+">
                @if($errors->has('password'))
                    <p class="help-text" id="form-error2">{{$errors->first('password')}}</p>
                @endif
                <span class="form-error">Proszę podać hasło (Musi mięc conajmniej 6 znaków)!</span>
            </label>
            </div>
        </div>
        <div class="row">
                <div class="large-3 columns">
                    <button type="submit" class="button radius">Zarejestruj się</button>
                </div>
        </div>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>


@stop