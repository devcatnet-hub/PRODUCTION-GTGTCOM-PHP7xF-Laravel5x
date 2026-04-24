@extends('masterin')
@section('title', 'Editar Usuario')
@section('content')

<div class="container-fluid">

    </br></br>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-default">
                <div class="card-header"><h2 class="text-primary">{!! GetHTML::Icons('supervisor_account') !!} Editar Usuario</h2></div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{!! $user->fname !!}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">Apellido</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{!! $user->lname !!}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-md-4 col-form-label text-md-right">Grupo</label>

                            <div class="col-md-6">
                              <select class="form-control" name="group">
                                @foreach($grupo as $grupo)
                                    <option value="{{ $grupo->group }}">{{ $grupo->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                                <input id="status" type="hidden" name="status" value="Editado">

                                <input id="id" type="hidden" name="id" value="{!! $user->id !!}">

                                <input id="author" type="hidden" value="{!! Auth::user()->username !!}" name="author">


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
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
