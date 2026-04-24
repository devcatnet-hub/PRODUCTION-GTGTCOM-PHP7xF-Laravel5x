@extends('masterin')
@section('title', 'Generador de reportes de Personal')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                    <form method="POST"  class="was-validated">
                        @csrf

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('people') !!}
                                    Generador de reportes de Personal.
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

                                    <div class="col-md-2">
                                      {!! GetHTML::Icons('filter_1') !!}
                                    </div>

                                    <div class="col-md-8" id="name">
                                    <label for="status">Estado:</label>
                                        <select class="form-control" name="status" id="status">                                            
                                            <option value="1">Personal Activo</option>
                                            <option value="0">Personal Inactivo</option>
                                            <option value="all">Todos los Usuarios</option>
                                        </select>
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[GROUP 02]]]]]>

                              <div class="form-row">

                                    <div class="col-md-2">
                                      {!! GetHTML::Icons('filter_2') !!}
                                    </div>

                                    <div class="col-md-6" id="name">
                                    <label for="departamento">Departamento:</label>
                                            <select class="form-control form-control-sm" id="departamento" name="departamento">
                                            <option value="all" selected>Todos</option>
                                            @foreach($departamento as $departamentos)
                                                <option value="{{$departamentos->departamento}}">{{$departamentos->departamento}}</option>
                                            @endforeach
                                            </select>
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[GROUP 03]]]]]>

                              <div class="form-row">

                                    <div class="col-md-2">
                                      {!! GetHTML::Icons('filter_3') !!}
                                    </div>

                                    <div class="col-md-6" id="name">
                                    <label for="departamento">Puesto:</label>
                                            <select class="form-control form-control-sm" id="puesto" name="puesto">
                                            <option value="all" selected>Todos</option>
                                            @foreach($puesto as $puestos)
                                                <option value="{{$puestos->puesto}}">{{$puestos->puesto}}</option>
                                            @endforeach
                                            </select>
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[GROUP 04]]]]]>

                              <div class="form-row">

                                    <div class="col-md-2">
                                      
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <input class="form-check-input" type="radio" name="export" id="pantalla" value="1" checked>
                                    <label class="form-check-label" for="pantalla">
                                        Visualizar en pantalla
                                    </label>
                                    </div>

                                    <div class="col-md-4" id="name">
                                    <input class="form-check-input" type="radio" name="export" id="excel" value="2">
                                    <label class="form-check-label" for="excel">
                                        Exportar a Excel
                                    </label>
                                    </div>

                              </div>

                              </br>

                              <![[[[[SEND]]]]]>

                              <div class="card-footer border-primary">

                                    <div class="form-row">
                                          <div class="col-md-12">
                                            <a href="/gtlistpersona/1/apellidos/asc" class="btn btn-default btn-sm">
                                                {!! GetHTML::Icons('cancel') !!} CANCEL
                                            </a>
                                            <button type="submit" class="btn btn-primary  btn-sm">
                                                {!! GetHTML::Icons('cloud_download') !!} VIEW\DOWNLOAD
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
