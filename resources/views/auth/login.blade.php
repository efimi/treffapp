@extends('layouts.master_static')

@section('content')
    <!-- Small modal -->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>

                            </div>
                            <div class="modal-header">

                                      <h4 class="modal-title text-center" id="gridModalLabel">PaderMeet Login: </h4>

                            </div>

                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Adresse</label>

                                        <div class="col-md-7">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Passwort</label>

                                        <div class="col-md-7">
                                            <input id="password" type="password" class="form-control" name="password" required>
                                            <input type="submit"
                                            <input type="submit"
                                                style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                                                    tabindex="-1" />

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <div class="col-md-offset-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ich will eingeloggt bleiben
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="form-group">
                                        <div class="col-md-offset-3">
                                            <button type="submit" class="btn btn-primary hidden">
                                                einloggen
                                            </button>

                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Passwort vergessen?
                                            </a>
                                            <a class="btn btn-link" href="{{ route('register') }}">
                                                Mit Mailadresse registrieren <span class="glyphicon glyphicon-envelope"></span>
                                            </a>
                                        </div>
                                    </div> --}}
                                </form>
                                <a class="btn btn-info"href="{{ route('auth/facebook')}}">Loging with facebook</a>

                        </div>

        </div>
      </div>
    </div>




@endsection
