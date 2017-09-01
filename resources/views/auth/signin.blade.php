@extends ('templates.default')

@section('content')
    <div class="row">
        <div class="medium-5 columns">
            <h2>Zaloguj się</h2>
        </div>
    </div>
    <form class="form" role="form" method="post" action="{{ route ('auth.signin') }}" data-abide novalidate>

        <div class="row">
            <div class="medium-5 columns">
                <label>Podaj adres email
                    <input type="email" name="email"  placeholder="Podaj email" value="{{Request::old('email') ?: ''}}" required>
                    @if($errors->has('email'))
                        <span class="help-text" id="form-error">{{$errors->first('email')}}</span>
                    @endif
                </label>
            </div>
        </div>
        <div class="row">
            <div class="medium-5 columns">
                <label>Podaj hasło
                    <input type="password" name="password" placeholder="Podaj hasło" aria-describedby="form-error2" required >
                    @if($errors->has('password'))
                        <span class="help-text" id="form-error">{{$errors->first('password')}}</span>
                    @endif
                </label>
            </div>
        </div>
        <div class="row">
            <fieldset class="medium-5 columns">
              <fieldset>
                  <label>
                      <input type="checkbox" name="remember">
                      Zapamiętaj mnie
                  </label>
              </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <button type="submit" class="button radius">Zaloguj się</button>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>


@stop