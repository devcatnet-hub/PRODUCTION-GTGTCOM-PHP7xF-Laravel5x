@extends('masterin')
@section('title', 'Administrar Usuarios')
@section('content')

@if (Auth::user()->group<>'root')
    {!! redirect('/userlogout') !!}
@endif

<div class="container">

    <div class="row justify-content-center align-items-center catware-div-height">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header"><h2 class="text-primary">{!! GetHTML::Icons('fingerprint') !!} Resetear Password</h2></div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="author" value="{{ $author }}">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    Resetear Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
