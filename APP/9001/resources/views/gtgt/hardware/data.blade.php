@extends('masterin')
@section('title', 'Reporte de Hardware en Pantalla.')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                              <![[[[[HEADER]]]]]>

                              <table class="table table-borderless table-hover table-sm">

                                  <tbody>
                                      <tr>
                                          <th width="70%">

                                              <h3 class="text-primary">
                                              {!! GetHTML::Icons('list') !!}
                                                Reporte de Hardware en Pantalla.
                                              </h3>
                                          
                                          </th>
                                          
                                      </tr>

                                  </tbody>

                                  </table> 

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

                            @if ($hardware->isEmpty())
                                <p> No hay Datos.</p>
                            @else

                            <div class="table-responsive">

                                <table class="table table-borderless table-hover table-sm">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">No. Inventario</th>
                                      <th scope="col">No. de Serie</th>
                                      <th scope="col">Tipo de Activo</th>
                                      <th scope="col">Marca</th>
                                      <th scope="col">Modelo</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($hardware as $hardwares)
                                    <tr>
                                      <th scope="row">{{$hardwares->inventario}}</th>
                                      <td>{{$hardwares->numeroserie}}</td>
                                      <td>{{$hardwares->tipo}}</td>
                                      <td>{{$hardwares->marca}}</td>
                                      <td>{{$hardwares->modelo}}</td>
                                      <td>{!! GTGTIT::Persona($hardwares->status, $hardwares->persona) !!}</td>
                                      <td>
                                      <div class="btn-group btn-group-sm" role="group" aria-label="First group"> 
                                          
                                          <button class="btn btn-primary btn-sm"
                                          onClick="PU{{$hardwares->id}}=window.open('/gthistoryhardware/{{$hardwares->id}}','PU{{$hardwares->id}}','width=800,height=500');"
                                          {!! GetHTML::Tooltip('Ver detalles históricos del Hardware.' ) !!}>
                                                        {!! GetHTML::Icons('history') !!}
                                          </button>

                                      </div> 
                                      
                                      </td>
                                    </tr>

                                    @endforeach
                                  </tbody>
                                </table>

                            </div>

                            @endif

                            <div class="card-footer border-primary">

                                  

                            </div>

                </div>
                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>

            </div>
        </div>
    </div>

</div>

</br></br>

<script>
function showCustom(sel) {

      if (sel.value=="numeroserie") { 

          $('#termDIV').show();
          $('#tipoDIV').hide();
          $('#marcaDIV').hide();
          $('#modeloDIV').hide();

      }else if(sel.value=="inventario"){ 

          $('#termDIV').show();
          $('#tipoDIV').hide();
          $('#marcaDIV').hide();
          $('#modeloDIV').hide();

      }else if(sel.value=="tipo"){

          $('#termDIV').hide();
          $('#tipoDIV').show();
          $('#marcaDIV').hide();
          $('#modeloDIV').hide();

      }else if(sel.value=="marca"){

          $('#termDIV').hide();
          $('#tipoDIV').hide();
          $('#marcaDIV').show();
          $('#modeloDIV').hide();

      }else if(sel.value=="modelo"){

          $('#termDIV').hide();
          $('#tipoDIV').hide();
          $('#marcaDIV').hide();
          $('#modeloDIV').show();

      }
}
</script>

@endsection
