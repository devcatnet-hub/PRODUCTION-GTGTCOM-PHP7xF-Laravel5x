@extends('masterout')
@section('title', 'Login')
@section('content')

<div class="container-fluid">

      <div class="row justify-content-center align-items-center catware-div-height">

            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">

                  <div class="card card-default">

                      <div class="card-header">

                            <h3 class="text-primary">{!! GetHTML::Icons('fingerprint') !!} Login</h3>

                      </div>

                      <div class="card-body">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-row justify-content-center">

                                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">

                                          <div class="form-group">
                                          <div class="floating-label">

                                          <label for="username">Username</label>
                                          <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                              @if ($errors->has('username'))
                                                  <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('username') }}</strong>
                                                  </span>
                                              @endif

                                          </div>
                                          </div>

                                    </div>

                                </div>

                                <div class="form-row justify-content-center">

                                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">

                                            <div class="form-group">
                                            <div class="floating-label">

                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif

                                            </div>
                                            </div>

                                      </div>

                                </div>

                                <div class="form-row justify-content-center">

                                      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">

                                        @if(config('catware.loginremenberme')=='yes')
                                            <br>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customControlAutosizing">Recordar mi Password</label>
                                            </div>
                                        @elseif(config('catware.loginremenberme')=='no')
                                            <br>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="disabledFieldsetCheck" disabled name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customControlAutosizing">Recordar mi Password no esta Habilitado</label>
                                            </div>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-row justify-content-center">

                                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 text-right">

                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                    </div>

                                </div>

                            </form>
                      </div>

                  </div>

                      <div class="form-row justify-content-center">

                          <div class="col-12 text-right">

                              <br>
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                  ¿Olvidaste tu Password?
                              </a>

                          </div>

                      </div>            

            </div>

      </div>

</div>

@endsection
