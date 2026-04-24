@extends('masterindatetime')
@section('title', 'Editar Hardware')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[FORM]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                    <form method="POST"  class="was-validated">
                        @csrf

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('laptop') !!}
                                    Editar Hardware
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
                                                                      
                                    <div class="col-md-1" id="name">
                                    <label for="inventario" ># de Inventario: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('inventario') ? ' is-invalid' : '' }} "
                                                name="inventario" id="inventario"
                                                value="{{$edithardware->inventario}}"
                                                disabled="disabled"
                                                autofocus>

                                                @if ($errors->has('inventario'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('inventario') }}</strong>
                                                    </span>
                                                @endif
                                    </div>  

                                    <div class="col-md-2" id="name">
                                    <label for="tipo" >Tipo de Hardware: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} "
                                                name="tipo" id="tipo"
                                                value="{{$edithardware->tipo}}"
                                                placeholder=""
                                                required
                                                autofocus
                                                list='tipoitems'>

                                                @if ($errors->has('tipo'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('tipo') }}</strong>
                                                    </span>
                                                @endif

                                                <datalist id="tipoitems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->tipo}}">{{$hardwares->tipo}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div>

                                    <div class="col-md-2" id="name">
                                    <label for="numeroserie" ># de Serie: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('numeroserie') ? ' is-invalid' : '' }} "
                                                name="numeroserie" id="numeroserie"
                                                value="{{$edithardware->numeroserie}}"
                                                disabled="disabled"
                                                autofocus>

                                                @if ($errors->has('numeroserie'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('numeroserie') }}</strong>
                                                    </span>
                                                @endif
                                    </div> 

                                    <div class="col-md-2" id="name">
                                    <label for="marca" >Marca: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }} "
                                                name="marca" id="marca"
                                                value="{{$edithardware->marca}}"
                                                placeholder=" "
                                                autofocus
                                                list='marcaitems'>

                                                <datalist id="marcaitems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->marca}}">{{$hardwares->marca}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div> 

                                    <div class="col-md-2" id="name">
                                    <label for="modelo" >Modelo: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }} "
                                                name="modelo" id="modelo"
                                                value="{{$edithardware->modelo}}"
                                                placeholder=" "
                                                autofocus
                                                list='modeloitems'>

                                                <datalist id="modeloitems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->modelo}}">{{$hardwares->modelo}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div> 

                                    <div class="col-md-3" id="name">
                                    <label for="seriecargador" ># de Serie Cargador: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('seriecargador') ? ' is-invalid' : '' }} "
                                                name="seriecargador" id="seriecargador"
                                                value="{{$edithardware->seriecargador}}"
                                                placeholder=" "
                                                autofocus>
                                    </div>                                     

                              </div>

                              </br>

                              <![[[[[GROUP 02]]]]]>

                              <div class="form-row">

                                    <div class="col-md-1"></div>

                                    <div class="col-md-2">
                                      <label for="fechadecompra">Fecha de Compra:</label>
                                          <input id="fechadecompra" name="fechadecompra"
                                                 class="form-control{{ $errors->has('fechadecompra') ? ' is-invalid' : '' }}"   
                                                 value="{{$edithardware->fechadecompra}}"                                              
                                                 autofocus/>

                                          <script>
                                              $('#fechadecompra').datepicker({ format: 'yyyy-mm-dd' });
                                          </script>
                                    </div>

                                    <div class="col-md-1" id="name">
                                    <label for="hd" >HD: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('hd') ? ' is-invalid' : '' }} "
                                                name="hd" id="hd"
                                                value="{{$edithardware->hd}}"
                                                placeholder=" "
                                                autofocus
                                                list='hditems'>

                                                <datalist id="hditems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->hd}}">{{$hardwares->hd}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div> 

                                    <div class="col-md-1" id="name">
                                    <label for="ram" >RAM: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('ram') ? ' is-invalid' : '' }} "
                                                name="ram" id="ram"
                                                value="{{$edithardware->ram}}"
                                                placeholder=" "
                                                autofocus
                                                list='ramitems'>

                                                <datalist id="ramitems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->ram}}">{{$hardwares->ram}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div> 

                                    <div class="col-md-1" id="name">
                                    <label for="cpu" >CPU: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('cpu') ? ' is-invalid' : '' }} "
                                                name="cpu" id="cpu"
                                                value="{{$edithardware->cpu}}"
                                                placeholder=" "
                                                autofocus
                                                list='cpuitems'>

                                                <datalist id="cpuitems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->cpu}}">{{$hardwares->cpu}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div> 

                                    <div class="col-md-1" id="name">
                                    <label for="led" >Monitor: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('led') ? ' is-invalid' : '' }} "
                                                name="led" id="led"
                                                value="{{$edithardware->led}}"
                                                placeholder=" "
                                                autofocus
                                                list='leditems'>

                                                <datalist id="leditems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->led}}">{{$hardwares->led}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div> 

                                    <div class="col-md-1" id="name">
                                    <label for="lector" >DVD: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('lector') ? ' is-invalid' : '' }} "
                                                name="lector" id="lector"
                                                value="{{$edithardware->lector}}"
                                                placeholder=" "
                                                autofocus
                                                list='lectoritems'>

                                                <datalist id="lectoritems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->lector}}">{{$hardwares->lector}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div>

                                    <div class="col-md-2" id="name">
                                    <label for="red" >Network: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('red') ? ' is-invalid' : '' }} "
                                                name="red" id="red"
                                                value="{{$edithardware->red}}"
                                                placeholder=" "
                                                autofocus
                                                list='reditems'>

                                                <datalist id="reditems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->red}}">{{$hardwares->red}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div>

                                    <div class="col-md-2" id="name">
                                    <label for="otro" >Otros: </label>
                                        <input type="text"
                                                class="form-control{{ $errors->has('otro') ? ' is-invalid' : '' }} "
                                                name="otro" id="otro"
                                                value="{{$edithardware->otro}}"
                                                placeholder=" "
                                                autofocus
                                                list='otroitems'>

                                                <datalist id="otroitems">
                                                    @foreach($hardware as $hardwares)
                                                        <option value="{{$hardwares->otro}}">{{$hardwares->otro}}</option>
                                                    @endforeach
                                                </datalist>
                                    </div>

                              </div>

                              </br>
                              

                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Agregar detalles.
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
        
                            <![[[[[GROUP 03]]]]]>

                            <div class="form-row">

                                <div class="col-md-2" id="name"></div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="thd" name="thd" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->thd) !!}> 
                                    <label class="form-check-label" for="thd">Tiene HD?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fhd" name="fhd" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fhd) !!}>
                                    <label class="form-check-label" for="fhd">Funciona HD?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tram" name="tram" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tram) !!}>
                                    <label class="form-check-label" for="tram">Tiene RAM?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fram" name="fram" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fram) !!}>
                                    <label class="form-check-label" for="fram">Funciona RAM?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tled" name="tled" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tled) !!}>
                                    <label class="form-check-label" for="tled">Tiene Monitor?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fled" name="fled" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fled) !!}>
                                    <label class="form-check-label" for="fled">Funciona Monitor?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tkey" name="tkey" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tkey) !!}>
                                    <label class="form-check-label" for="tkey">Tiene Teclado?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fkey" name="fkey" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fkey) !!}>
                                    <label class="form-check-label" for="fkey">Funciona Teclado?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tmouse" name="tmouse" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tmouse) !!}>
                                    <label class="form-check-label" for="tmouse">Tiene Mouse?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fmouse" name="fmouse" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fmouse) !!}>
                                    <label class="form-check-label" for="fmouse">Funciona Mouse?</label>

                                </div>

                            </div>

                            </br>

                                <![[[[[GROUP 04]]]]]>

                                <div class="form-row">

                                    <div class="col-md-2" id="name"></div>

                                    <div class="col-md-2" id="name">

                                        <input type="checkbox" class="form-check-input" id="tcpu" name="tcpu" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tcpu) !!}> 
                                        <label class="form-check-label" for="tcpu">Tiene CPU?</label>
                                        </br>
                                        <input type="checkbox" class="form-check-input" id="fcpu" name="fcpu" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fcpu) !!}>
                                        <label class="form-check-label" for="fcpu">Funciona CPU?</label>

                                    </div>

                                    <div class="col-md-2" id="name">

                                        <input type="checkbox" class="form-check-input" id="tboard" name="tboard" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tboard) !!}> 
                                        <label class="form-check-label" for="tboard">Tiene Board?</label>
                                        </br>
                                        <input type="checkbox" class="form-check-input" id="fboard" name="fboard" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fboard) !!}>
                                        <label class="form-check-label" for="fboard">Funciona Board?</label>

                                    </div>

                                    <div class="col-md-2" id="name">

                                        <input type="checkbox" class="form-check-input" id="tlector" name="tlector" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tlector) !!}> 
                                        <label class="form-check-label" for="tlector">Tiene Lector Optico?</label>
                                        </br>
                                        <input type="checkbox" class="form-check-input" id="flector" name="flector" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->flector) !!}>
                                        <label class="form-check-label" for="flector">Funciona Lector Optico?</label>

                                    </div>

                                    <div class="col-md-2" id="name">

                                        <input type="checkbox" class="form-check-input" id="tcargador" name="tcargador" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tcargador) !!}> 
                                        <label class="form-check-label" for="tcargador">Tiene Cargador?</label>
                                        </br>
                                        <input type="checkbox" class="form-check-input" id="fcargador" name="fcargador" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fcargador) !!}>
                                        <label class="form-check-label" for="fcargador">Funciona Cargador?</label>

                                    </div>

                                    <div class="col-md-2" id="name">

                                        <input type="checkbox" class="form-check-input" id="tred" name="tred" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tred) !!}> 
                                        <label class="form-check-label" for="tred">Tiene Tarjeta Red?</label>
                                        </br>
                                        <input type="checkbox" class="form-check-input" id="fred" name="fred" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fred) !!}>
                                        <label class="form-check-label" for="fred">Funciona Tarjeta Red?</label>

                                    </div>

                                </div>

                            </br>

                            <![[[[[GROUP 05]]]]]>

                            <div class="form-row">

                                <div class="col-md-2" id="name"></div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tsound" name="tsound" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tsound) !!}> 
                                    <label class="form-check-label" for="tsound">Tiene Tarjeta Sonido?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fsound" name="fsound" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fsound) !!}>
                                    <label class="form-check-label" for="fsound">Funciona Tarjeta Sonido?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tvideo" name="tvideo" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tvideo) !!}> 
                                    <label class="form-check-label" for="tvideo">Tiene Tarjeta de Video?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fvideo" name="fvideo" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fvideo) !!}>
                                    <label class="form-check-label" for="fvideo">Funciona Tarjeta de Video?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tprinter" name="tprinter" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tprinter) !!}>
                                    <label class="form-check-label" for="tprinter">Tiene Impresora?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fprinter" name="fprinter" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fprinter) !!}>
                                    <label class="form-check-label" for="fprinter">Funciona Imrpesora?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tbocinas" name="tbocinas" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tbocinas) !!}> 
                                    <label class="form-check-label" for="tbocinas">Tiene Bocinas?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fbocinas" name="fbocinas" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fbocinas) !!}>
                                    <label class="form-check-label" for="fbocinas">Funciona Bocinas?</label>

                                </div>

                                <div class="col-md-2" id="name">

                                    <input type="checkbox" class="form-check-input" id="tcañonera" name="tcañonera" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->tcañonera) !!}> 
                                    <label class="form-check-label" for="tcañonera">Tiene Proyector?</label>
                                    </br>
                                    <input type="checkbox" class="form-check-input" id="fcañonera" name="fcañonera" value="1" 
                                    {!! GetHTML::CheckboxSelected($edithardware->fcañonera) !!}>
                                    <label class="form-check-label" for="fcañonera">Funciona Proyector?</label>

                                </div>

                            </div>


                    </div>
                    </div>
                </div>

                </br>

                              <![[[[[SEND]]]]]>

                              <div class="card-footer border-primary">

                                    <div class="form-row">
                                          <div class="col-md-12">
                                            <a href="/gtlisthardware/1" class="btn btn-default btn-sm">
                                                {!! GetHTML::Icons('cancel') !!} CANCEL
                                            </a>
                                            <button type="submit" class="btn btn-primary  btn-sm">
                                                {!! GetHTML::Icons('save') !!} SAVE
                                            </button>
                                          </div>
                                    </div>

                              </div>

                              <input id="persona" type="hidden" name="persona" value="{{$edithardware->persona}}">
                              <input id="status" type="hidden" name="status" value="{{$edithardware->status}}">
                              <input id="id" type="hidden" name="id" value="{{$edithardware->id}}">

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
