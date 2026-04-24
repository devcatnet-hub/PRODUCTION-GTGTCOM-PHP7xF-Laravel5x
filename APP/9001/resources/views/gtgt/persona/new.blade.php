@extends('masterin')
@section('title', 'Nuevo Usuario')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-2">
        <form enctype="multipart/form-data" method="post" class="was-validated">
         @csrf

            <img src="{{ asset("storage/sin.foto.png") }}" height="100%" width="100%" >            

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto" name="foto">
                <label class="custom-file-label" for="foto">Agregar foto.</label>
            </div>        

        </div>
        <div class="col-md-9">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">                    

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('person_add') !!}
                                    NUEVO USUARIO
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

                                    <div class="col-md-4" id="name">
                                    <label for="nombres" >Nombres: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }} "
                                                name="nombres" id="nombres"
                                                value="{{ old('nombres') }}"
                                                required
                                                autofocus>

                                                @if ($errors->has('nombres'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('nombres') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <label for="apellidos" >Apellidos: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }} "
                                                name="apellidos" id="apellidos"
                                                value="{{ old('apellidos') }}"
                                                required
                                                autofocus>

                                                @if ($errors->has('apellidos'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <label for="mailgt" >Usuario: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('mailgt') ? ' is-invalid' : '' }} "
                                                name="mailgt" id="mailgt"
                                                value="{{ old('mailgt') }}"
                                                required
                                                autofocus>@gt.gt.com

                                                @if ($errors->has('mailgt'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('mailgt') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[GROUP 02]]]]]>

                              <div class="form-row">

                                    <div class="col-md-4" id="name">
                                    <label for="departamento" >Area: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('departamento') ? ' is-invalid' : '' }} "
                                                name="departamento" id="departamento"
                                                value="{{ old('departamento') }}"
                                                required
                                                autofocus>

                                                @if ($errors->has('departamento'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('departamento') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <label for="puesto" >Cargo: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('puesto') ? ' is-invalid' : '' }} "
                                                name="puesto" id="puesto"
                                                value="{{ old('puesto') }}"
                                                required
                                                autofocus>

                                                @if ($errors->has('puesto'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('puesto') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <label for="jefeinmediato" >Jefe inmediato: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('jefeinmediato') ? ' is-invalid' : '' }} "
                                                name="jefeinmediato" id="jefeinmediato"
                                                value="{{ old('jefeinmediato') }}"
                                                autofocus>
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[GROUP 03]]]]]>

                              <div class="form-row">

                                    <div class="col-md-2">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-2" id="name">
                                    <label for="telcel" >Telefono(s): </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('telcel') ? ' is-invalid' : '' }} "
                                                name="telcel" id="telcel"
                                                value="{{ old('telcel') }}"
                                                autofocus>
                                    </div>

                                    <div class="col-md-2" id="name">
                                    <label for="dpi" >DPI: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('dpi') ? ' is-invalid' : '' }} "
                                                name="dpi" id="dpi"
                                                value="{{ old('dpi') }}"
                                                required
                                                autofocus>

                                                @if ($errors->has('dpi'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('dpi') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-5" id="name">
                                    <label for="direccion" >Direccion: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }} "
                                                name="direccion" id="direccion"
                                                value="{{ old('direccion') }}"
                                                autofocus>
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[GROUP 04]]]]]>

                              <div class="form-row">

                                    <div class="col-md-2">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <label for="personaemergencia" >En caso de emergencia avisar a: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('personaemergencia') ? ' is-invalid' : '' }} "
                                                name="personaemergencia" id="personaemergencia"
                                                value="{{ old('personaemergencia') }}"
                                                autofocus>
                                    </div>

                                    <div class="col-md-2" id="name">
                                    <label for="telcelemergencia" >Telefono de emergencia: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('telcelemergencia') ? ' is-invalid' : '' }} "
                                                name="telcelemergencia" id="telcelemergencia"
                                                value="{{ old('telcelemergencia') }}"                                              
                                                autofocus>
                                    </div>

                                    <div class="col-md-3" id="name">
                                    <label for="mailpe" >Mail personal: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('mailpe') ? ' is-invalid' : '' }} "
                                                name="mailpe" id="mailpe"
                                                value="{{ old('mailpe') }}"
                                                autofocus>
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[SEND]]]]]>

                              <div class="card-footer border-primary">

                                    <div class="form-row">
                                          <div class="col-md-12">
                                          @if ($back == 0)
                                            <a href="{{ url()->previous() }}" class="btn btn-default btn-sm">
                                                {!! GetHTML::Icons('cancel') !!} CANCEL
                                            </a>
                                          @elseif ($back == 1)
                                            <a href="/gtlistpersona/1/apellidos/asc" class="btn btn-success btn-sm">
                                                {!! GetHTML::Icons('backspace') !!} CANCEL
                                            </a>
                                          @endif
                                            <button type="submit" class="btn btn-primary  btn-sm">
                                                {!! GetHTML::Icons('save') !!} SAVE
                                            </button>
                                          </div>
                                    </div>

                              </div>

                              <input id="status" type="hidden" name="status" value="1">
                              

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
