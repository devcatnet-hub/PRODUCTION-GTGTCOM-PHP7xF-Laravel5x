@extends('masterin')
@section('title', 'Editar adjunto o dato de tipo: '.$categoria)
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
                                    Editar adjunto o dato de tipo: {{$categoria}}
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
                                    <label for="nombre" >Editar Nombre del Adjunto o Dato: </label>
                                        <input type="text"  
                                                class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} "
                                                name="nombre" id="nombre"
                                                value="{{ $object->nombre }}"
                                                required
                                                autofocus>

                                                @if ($errors->has('nombre'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('nombre') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-3" id="name">
                                    <label for="icono" >Editar Icono: </label>
                                        <input type="text"  
                                                class="form-control{{ $errors->has('icono') ? ' is-invalid' : '' }} "
                                                name="icono" id="icono"
                                                value="{{ $object->icono }}"
                                                required
                                                autofocus>                                                

                                                @if ($errors->has('icono'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('icono') }}</strong>
                                                    </span>
                                                @endif
                                    </div>

                                    <div class="col-md-1">
                                    <label for="icono" >Icono: </label>
                                    <h3>{!! GetHTML::Icons($object->icono) !!}</h3>                                        
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
                                    <label for="notas">Editar una nota descriptiva del adjunto o dato (opcional):</label>
                                        <textarea class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                            name="notas"  id="notas"
                                            rows="2" autofocus >{{$object->notas}}</textarea>

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

                                    <div class="col-md-5" id="name">

                                    <div class="custom-file"  id="name">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" id="documento" name="documento">
                                        <label class="custom-file-label" for="validatedCustomFile"></label>
                                    </div>

                                    </div>

                                    <div class="col-md-5">Documento actual: {{$object->documento}} <a href="{{ Storage::url($object->documento) }}" target='_blank'>[View]</a></div>  

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

                                    <div class="col-md-5" id="name">

                                    <div class="custom-file"  id="name">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" id="foto" name="foto">
                                        <label class="custom-file-label" for="validatedCustomFile"></label>
                                    </div>

                                    </div>

                                    <div class="col-md-5">Foto/Imagen actual: {{$object->foto}} <a href="{{ Storage::url($object->foto) }}" target='_blank'>[View]</a></div>  

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
                                    <label for="valor" >Editar Dato Numerico: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }} "
                                                name="valor" id="valor"
                                                value="{{$object->valor}}"
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
                                    <label for="porcentaje" >Editar valor Porcentual: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('porcentaje') ? ' is-invalid' : '' }} "
                                                name="porcentaje" id="porcentaje"
                                                value="{{$object->porcentaje}}"
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
                                    <label for="dato" >Editar Dato Alfanumerico: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('dato') ? ' is-invalid' : '' }} "
                                                name="dato" id="dato"
                                                value="{{$object->dato}}"
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

                              <input id="id" type="hidden" name="id" value="{{$object->id}}">

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
