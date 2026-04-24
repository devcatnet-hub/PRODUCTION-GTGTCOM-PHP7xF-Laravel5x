@extends('masterin')
@section('title', 'Importar Listado de Personal')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                    <form method="POST" class="was-validated" enctype="multipart/form-data">
                        @csrf

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('supervisor_account') !!}
                                    Importar Listado de Personal
                                  </h3>

                              </div>

                            </br>

                              <![[[[[GROUP 01]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1">
                                      {!! GetHTML::Icons('icon') !!}
                                    </div>

                                    <div class="col-md-10">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="list" name="list" required>
                                        <label class="custom-file-label" for="list">Elegir un archivo.</label>
                                        <div class="invalid-feedback">Aun no se ha escogido ningún archivo para importar.</div>
                                      </div>
                                    </div>

                                    <div class="col-md-1"></div>

                              </div>

                              </br>

                              <![[[[[SEND]]]]]>

                              <div class="card-footer border-primary">

                                    <div class="form-row">
                                          <div class="col-md-12">
                                            <a href="/home" class="btn btn-default btn-sm">
                                                {!! GetHTML::Icons('cancel') !!} CANCEL
                                            </a>
                                            <button type="submit" class="btn btn-primary  btn-sm">
                                                {!! GetHTML::Icons('cloud_upload') !!} UPLOAD
                                            </button>
                                            <a href="/gtgtdownloadtemplatepersona" class="btn btn-success btn-sm">
                                                {!! GetHTML::Icons('cloud_download') !!} DESCARGAR PLANTILLA
                                            </a>
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

<div class="col-md-10" id="name">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="list" name="list" required>
    <label class="custom-file-label" for="list">Choose file</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
  </div>
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
