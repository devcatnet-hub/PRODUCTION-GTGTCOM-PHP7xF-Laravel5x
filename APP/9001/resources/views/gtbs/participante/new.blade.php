@extends('mastergtbs')
@section('title', 'Registro Grant Thornton - Business School')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                    <form method="POST"  class="was-validated">
                        @csrf

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-dark">

                                  <h2 class="text-dark">
                                        Grant Thornton - Business School
                                  </h2>
                                  <h3 class="text-dark">
                                        Tema: {{$tema->tema}}
                                  </h3>
                                  <h4 class="text-dark">
                                        {{$tema->nota}}
                                  </h4>
                                  <h3 class="text-dark">
                                        Fecha: {{$tema->fecha}}
                                  </h3>

                              </div>

                              </br>

                              

                            <![[[[[GROUP 01]]]]]>
                              
                            <div class="form-group row">
                                <div class="col-sm-1">
                                </div>
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                <input type="text" 
                                       class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} " 
                                       id="nombre" name="nombre"
                                       placeholder="Ingrese su nombre."
                                       value="{{ old('nombre') }}"
                                       required
                                       autofocus>

                                       @if ($errors->has('nombre'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                       @endif
                                </div>
                            </div>

                            <![[[[[GROUP 02]]]]]>
                              
                            <div class="form-group row">
                                <div class="col-sm-1">
                                </div>
                                <label for="empresa" class="col-sm-2 col-form-label">Empresa</label>
                                <div class="col-sm-8">
                                <input type="text" 
                                       class="form-control{{ $errors->has('empresa') ? ' is-invalid' : '' }} " 
                                       id="empresa" name="empresa" 
                                       placeholder="Ingrese la empresa para la cual labora."
                                       value="{{ old('empresa') }}"
                                       required
                                       autofocus>

                                       @if ($errors->has('empresa'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('empresa') }}</strong>
                                            </span>
                                       @endif
                                </div>
                            </div>

                            <![[[[[GROUP 03]]]]]>
                              
                            <div class="form-group row">
                                <div class="col-sm-1">
                                </div>
                                <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                                <div class="col-sm-8">
                                <input type="text" 
                                       class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }} " 
                                       id="cargo" name="cargo" 
                                       placeholder="Ingrese el cargo que desempeña."
                                       value="{{ old('cargo') }}"
                                       required
                                       autofocus>

                                       @if ($errors->has('cargo'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('cargo') }}</strong>
                                            </span>
                                       @endif
                                </div>
                            </div>

                            <![[[[[GROUP 04]]]]]>
                              
                            <div class="form-group row">
                                <div class="col-sm-1">
                                </div>
                                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-5">
                                <input type="text" 
                                       class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }} " 
                                       id="telefono" name="telefono" 
                                       placeholder=""
                                       value="{{ old('telefono') }}"
                                       required
                                       autofocus>

                                       @if ($errors->has('telefono'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('telefono') }}</strong>
                                            </span>
                                       @endif
                                </div>
                            </div>

                            <![[[[[GROUP 05]]]]]>
                              
                            <div class="form-group row">
                                <div class="col-sm-1">
                                </div>
                                <label for="email" class="col-sm-2 col-form-label">eMail</label>
                                <div class="col-sm-5">
                                <input type="text" 
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} " 
                                       id="email" name="email" 
                                       placeholder=""
                                       value="{{ old('email') }}"
                                       required
                                       autofocus>

                                       @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                       @endif
                                </div>
                            </div>

                              <![[[[[SEND]]]]]>

                              <div class="card-footer border-primary">

                                    <input id="tema" type="hidden" name="tema" value="{{$tema->id}}">

                                    <div class="form-row">
                                            <button type="submit" class="btn btn-primary  btn-sm">
                                                {!! GetHTML::Icons('save') !!} ENVIAR
                                            </button>
                                          </div>
                                    </div>

                              </div>

                    </form>

                </div>
                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>

            </div>
        </div>
    </div>

</div>

</br></br>

@endsection