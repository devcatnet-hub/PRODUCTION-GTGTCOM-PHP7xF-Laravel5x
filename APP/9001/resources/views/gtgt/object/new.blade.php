@extends('masterin')
@section('title', 'Nuevo adjunto o dato de tipo: '.$categoria)
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                    <form enctype="multipart/form-data" method="post" class="was-validated">
                        @csrf

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('select_all') !!}
                                    Nuevo adjunto o dato de tipo: {{$categoria}}
                                  </h3>                      
                                  
                                  

                              </div>

                              <!--
                              <div class="card-header border-primary">

                                  <div class="stepper-horiz">

                                        <div class="stepper done">
                                          <div class="stepper-icon"><i class="material-icons">check</i></div>
                                          <span class="stepper-text">Name of step 1</span>
                                        </div>

                                        <div class="stepper active">
                                          <div class="stepper-icon"><span>2</span></div>
                                          <span class="stepper-text">Name of step 2</span>
                                        </div>

                                        <div class="stepper">
                                          <div class="stepper-icon"><span>3</span></div>
                                          <span class="stepper-text">Name of step 3</span>
                                        </div>

                                  </div>

                              </div>
                              -->

                            </br>

                            <![[[[[GROUP 01]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-6" id="name">
                                    <label for="nombre" >Nombre del Adjunto o Dato: </label>
                                        <input type="text"  
                                                class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} "
                                                name="nombre" id="nombre"
                                                value="{{ old('nombre') }}"
                                                placeholder="Ingrese un nombre que identifique al adjunto o dato"
                                                required
                                                autofocus>

                                                @if ($errors->has('nombre'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('nombre') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <label for="icono" >Icono: </label>
                                        <input type="text"  
                                                class="form-control{{ $errors->has('icono') ? ' is-invalid' : '' }} "
                                                name="icono" id="icono"
                                                value="{{ old('icono') }}"
                                                placeholder="Ingrese nombre de Icono"
                                                required
                                                autofocus>

                                                @if ($errors->has('icono'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('icono') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>
                              
                              </br>                              

                            @if ($oc[0] == 1)
                              <![[[[[NOTAS]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-10" id="name">
                                    <label for="notas">Agregue una nota descriptiva del adjunto o dato (opcional):</label>
                                        <textarea class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                            name="notas"  id="notas"
                                            rows="2" autofocus ></textarea>

                                        @if ($errors->has('notas'))
                                            <span class="text-danger">
                                                <small><strong>{{ $errors->first('notas') }}</strong></small>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>
                              
                              </br>
                            @endif

                            @if ($oc[1] == 1)
                              <![[[[[DOCUMENTO]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-10" id="name">

                                    <div class="custom-file"  id="name">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" id="documento" name="documento" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Adjunte un archivo...</label>
                                        <div class="invalid-feedback">No se adjuntado un archivo valido aun.</div>
                                    </div>

                                    </div>

                                    <div class="col-md-1"></div>                                    

                              </div>
                              
                              </br>
                            @endif

                            @if ($oc[2] == 1)
                              <![[[[[FOTO]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-10" id="name">

                                    <div class="custom-file"  id="name">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" id="foto" name="foto" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Adjunte una imagen...</label>
                                        <div class="invalid-feedback">No se adjuntado una imagen valida aun.</div>
                                    </div>

                                    </div>

                                    <div class="col-md-1"></div>                                    

                              </div>
                              
                              </br>
                            @endif

                            @if ($oc[3] == 1)
                              <![[[[[VALOR]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-10" id="name">
                                    <label for="valor" >Ingresar Dato Numerico: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }} "
                                                name="valor" id="valor"
                                                value="{{ old('valor') }}"
                                                placeholder="Ingresar un dato numerico no mayor de 8.2."
                                                required
                                                autofocus>

                                                @if ($errors->has('valor'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('valor') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>
                              
                              </br>
                            @endif

                            @if ($oc[4] == 1)
                              <![[[[[PORCENTUAL]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-10" id="name">
                                    <label for="porcentaje" >Ingresar valor Porcentual: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('porcentaje') ? ' is-invalid' : '' }} "
                                                name="porcentaje" id="porcentaje"
                                                value="{{ old('porcentaje') }}"
                                                placeholder="Ingresar un valor Porcentual no mayor de 8.2."
                                                required
                                                autofocus>

                                                @if ($errors->has('porcentaje'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('porcentaje') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>
                              
                              </br>
                            @endif

                            @if ($oc[5] == 1)
                              <![[[[[ALFANUMERICO]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-10" id="name">
                                    <label for="dato" >Ingresar Valor Alfanumerico: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('dato') ? ' is-invalid' : '' }} "
                                                name="dato" id="dato"
                                                value="{{ old('dato') }}"
                                                placeholder="Ingresar numeros, simbolos y letras y limite de 100 caracteres"
                                                required
                                                autofocus>

                                                @if ($errors->has('dato'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('dato') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>
                              
                              </br>
                            @endif

                              <![[[[[SEND]]]]]>

                              <div class="card-footer border-primary">

                                    <div class="form-row">
                                          <div class="col-md-12">
                                            <a href="{{ url()->previous() }}" class="btn btn-default btn-sm">
                                                {!! GetHTML::Icons('cancel') !!} CANCEL
                                            </a>
                                            <button type="submit" class="btn btn-primary  btn-sm">
                                                {!! GetHTML::Icons('save') !!} SAVE
                                            </button>
                                          </div>
                                    </div>

                              </div>

                              <input id="persona" type="hidden" name="persona" value="{{$persona}}">
                              <input id="categoria" type="hidden" name="categoria" value="{{$categoriaid}}">

                    </form>

                </div>
                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>

            </div>
        </div>
    </div>

</div>

</br></br>

@endsection


<!-- [[[[[[TEXT]]]]]]

<div class="col-md-2" id="name">
  <label for="name" >NAME: </label>
      <input type="text"
             class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} "
             name="name" id="name"
             value="{{ old('name') }}"
             placeholder="placeholder"
             required
             autofocus>

             @if ($errors->has('name'))
                 <span class="invalid-feedback">
                     <strong>{{ $errors->first('name') }}</strong>
                 </span>
             @endif
</div>

-->

<!-- [[[[[[EMAIL]]]]]]

<div class="col-md-2" id="name">
  <label for="name" >NAME: </label>
      <input type="email"
             class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} "
             name="name" id="name"
             value="{{ old('name') }}"
             placeholder="placeholder"
             required
             autofocus>

             @if ($errors->has('name'))
                 <span class="invalid-feedback">
                     <strong>{{ $errors->first('name') }}</strong>
                 </span>
             @endif
</div>

-->

<!-- [[[[[[DATEPICKER]]]]]]

<div class="col-md-0" id="othername">
  <label for="name">NAME:</label>
      <input id="name" name="name"
             class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
             value="{{ old('name') }}"
             placeholder="placeholder"
             required
             autofocus/>

             @if ($errors->has('name'))
                 <span class="text-danger">
                     <small><strong>{{ $errors->first('name') }}</strong></small>
                 </span>
             @endif

      <script>
          $('#name').datepicker({ format: 'yyyy mm dd' });
      </script>
</div>

-->

<!-- [[[[[[SELECT]]]]]]

<div class="col-md-2" id="name">
  <label for="name">NAME:</label>
      <select class="form-control" name="name">
          <option value="1">value</option>
          <option value="2">value</option>
      </select>
</div>

-->

<!-- [[[[[[TEXTAREA]]]]]]

<div class="col-md-10" id="name">
  <label for="name">NAME:</label>
      <textarea class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            name="name"  id="name"
            rows="2" required autofocus>
      </textarea>

      @if ($errors->has('name'))
          <span class="text-danger">
              <small><strong>{{ $errors->first('name') }}</strong></small>
          </span>
      @endif
</div>

-->

<!-- [[[[[[FILE]]]]]]

01:

<div class="custom-file"  id="name">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
</div>

02:

<div class="form-group" id="name">
    <label for="name">NAME:</label>
        <input type="file" class="form-control-file" id="name" name="name">

        @if ($errors->has('name'))
            <span class="text-danger">
                <small><strong>{{ $errors->first('name') }}</strong></small>
            </span>
        @endif
</div>

-->

<!-- [[[[[[SELECT MULTIPLE]]]]]]

<div class="col-md-0" id="name">
    <label for="name">NAME:</label>
        <select multiple class="custom-select" required>
            <option value="">Seleccionar...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <div class="invalid-feedback">No ha seleccionado ningún...</div>

        @if ($errors->has('name'))
            <span class="text-danger">
                <small><strong>{{ $errors->first('name') }}</strong></small>
            </span>
        @endif
</div>

-->

<!-- [[[[[[CHECKBOX]]]]]]

<div class="col-md-0" id="name">
    <input class="form-check-input" type="checkbox" value="" id="name">
    <label class="form-check-label" for="name">Agree to terms and conditions</label>
</div>

-->

<!-- [[[[[[HIDDEN]]]]]]

<input id="name" type="hidden" name="name" value="value">

-->
