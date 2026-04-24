@extends('masterin')
@section('title', $data['title'])
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                              <![[[[[HEADER]]]]]>

                              <table class="table table-borderless table-hover table-sm">

                                  <tbody>
                                      <tr>
                                          <th width="30%">

                                              <h3 class="text-primary">
                                                {!! GetHTML::Icons('laptop') !!}
                                                {{$data['title']}}
                                              </h3>
                                          
                                          </th>
                                          <th width="70%">                                          

                                          <div class="btn-group btn-group-sm" role="group" aria-label="First group">

                                              <div class="collapse" id="search">
                                              <div class="card card-body">

                                              <form method="post">
                                              @csrf
                                                <div class="row">
                                                  <div class="col" id="termDIV">
                                                      <input type="text" 
                                                            class="form-control mb-2 form-control-sm"  
                                                            id="term" 
                                                            name="term" 
                                                            placeholder="Buscar en…">
                                                  </div>
                                                  <div class="col">
                                                      <select class="form-control form-control-sm" id="search" name="search" onChange="showCustom(this)">
                                                          <option value="numeroserie" selected >Numero de Serie</option>
                                                          <option value="inventario">Inventario</option>
                                                          <option value="tipo">Tipo</option>
                                                          <option value="marca">Marca</option>
                                                          <option value="modelo">Modelo</option>
                                                      </select>
                                                  </div>
                                                  <div class="col" id="tipoDIV" style="display:none;">
                                                      <select class="form-control form-control-sm" id="tipo" name="tipo">
                                                      <option value=" " selected></option>
                                                      @foreach($tipohardware as $tipohardwares)
                                                          <option value="{{$tipohardwares->tipo}}">{{$tipohardwares->tipo}}</option>
                                                      @endforeach
                                                      </select> 
                                                  </div>
                                                  <div class="col" id="marcaDIV" style="display:none;">
                                                      <select class="form-control form-control-sm" id="marca" name="marca">
                                                      <option value=" " selected></option>
                                                      @foreach($marcahardware as $marcahardwares)
                                                          <option value="{{$marcahardwares->marca}}">{{$marcahardwares->marca}}</option>
                                                      @endforeach
                                                      </select> 
                                                  </div>
                                                  <div class="col" id="modeloDIV" style="display:none;">
                                                      <select class="form-control form-control-sm" id="modelo" name="modelo">
                                                      <option value=" " selected></option>
                                                      @foreach($modelohardware as $modelohardwares)
                                                          <option value="{{$modelohardwares->modelo}}">{{$modelohardwares->modelo}}</option>
                                                      @endforeach
                                                      </select> 
                                                  </div>
                                                  <div class="col">
                                                      <button type="submit" class="btn btn-primary btn-sm">
                                                          {!! GetHTML::Icons('search') !!}
                                                      </button>
                                                  </div>
                                                </div>
                                              </form>

                                              </div>
                                              </div> 
                                          
                                              <a class="btn btn-outline-primary" 
                                                  data-toggle="collapse" 
                                                  href="#search" 
                                                  role="button" 
                                                  aria-expanded="false" 
                                                  aria-controls="collapseExample"
                                                  {!! GetHTML::Tooltip('Buscar usuario.') !!}>
                                                    {!! GetHTML::Icons('search') !!}
                                              </a>

                                              @if ($data['search'] == 1)
                                              <a href="/gtlisthardware/1" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Cerrar busqueda.') !!}>
                                                    {!! GetHTML::Icons('block') !!}
                                              </a>
                                              @endif
                                              @if ($data['search'] <> 1)
                                                  @if ($data['opt'] == 1)
                                                  <a href="/gtlisthardware/0" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Ver Hardware disponible.') !!}>
                                                        {!! GetHTML::Icons('remove_from_queue') !!}
                                                  </a>
                                                  <a href="/gtnewhardware/0" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Agregar Hardware.') !!}>
                                                        {!! GetHTML::Icons('add_to_queue') !!}
                                                  </a>
                                                  <a href="/gtlisthardware/2" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Ver Hardware dado de Baja.') !!}>
                                                        {!! GetHTML::Icons('desktop_access_disabled') !!}
                                                  </a>
                                                  @elseif ($data['opt'] == 0)                                            
                                                  <a href="/gtlisthardware/1" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Ver Hardware asignado.') !!}>
                                                        {!! GetHTML::Icons('laptop') !!}
                                                  </a>
                                                  <a href="/gtlisthardware/2" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Ver Hardware dado de Baja.') !!}>
                                                        {!! GetHTML::Icons('desktop_access_disabled') !!}
                                                  </a>
                                                  @elseif ($data['opt'] == 2)
                                                  <a href="/gtlisthardware/1" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Ver Hardware asignado.') !!}>
                                                        {!! GetHTML::Icons('laptop') !!}
                                                  </a>
                                                  <a href="/gtlisthardware/0" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Ver Hardware disponible.') !!}>
                                                        {!! GetHTML::Icons('remove_from_queue') !!}
                                                  </a>
                                                  @endif     
                                              @endif

                                                <a href="/gtreporthardware" class="btn btn-outline-primary"
                                                    {!! GetHTML::Tooltip('Generador de reportes.') !!}>
                                                        {!! GetHTML::Icons('list') !!}
                                                </a>
                                          </div>

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
                                      <th scope="col">Marca | Modelo</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($hardware as $hardwares)
                                    <tr>
                                      <th scope="row">{{$hardwares->inventario}}</th>
                                      <td>{{$hardwares->numeroserie}}</td>
                                      <td>{{$hardwares->tipo}}</td>
                                      <td>{{$hardwares->marca. ' | ' .$hardwares->modelo}}</td>
                                      <td>
                                      <div class="btn-group btn-group-sm" role="group" aria-label="First group"> 

                                          <a href="/gtviewhardware/1/{{$hardwares->id}}" class="btn btn-primary btn-sm"
                                          {!! GetHTML::Tooltip('Editar Hardware.') !!}>
                                              {!! GetHTML::Icons('edit') !!}
                                          </a>

                                          <a class="btn btn-primary" data-toggle="collapse" href="#details{{$hardwares->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"
                                          {!! GetHTML::Tooltip('Mas detalles.' ) !!}>
                                                        {!! GetHTML::Icons('info') !!}
                                          </a>
                                          
                                          <button class="btn btn-primary btn-sm"
                                          onClick="PU{{$hardwares->id}}=window.open('/gthistoryhardware/{{$hardwares->id}}','PU{{$hardwares->id}}','width=800,height=500');"
                                          {!! GetHTML::Tooltip('Ver detalles históricos del Hardware.' ) !!}>
                                                        {!! GetHTML::Icons('history') !!}
                                          </button>

                                          @if ($data['back'] == 2)
                                              <a href="/gtlosshardware/{{$hardwares->id}}" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Dar de baja definitiva a Hardware.') !!}>
                                                    {!! GetHTML::Icons('print_disabled') !!}
                                              </a>
                                          @endif

                                          @if ($data['back'] == 0)
                                              <a href="/gtaddhardware/{{$data['idpersona']}}/{{$data['back']}}/{{$hardwares->id}}" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Asignar Hardware.') !!}>
                                                    {!! GetHTML::Icons('add_circle') !!}
                                              </a>

                                              <a href="/gtlosshardware/{{$hardwares->id}}" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Dar de baja definitiva a Hardware.') !!}>
                                                    {!! GetHTML::Icons('print_disabled') !!}
                                              </a>
                                          @endif

                                      </div> 
                                      
                                      </td>
                                    </tr>
                                    
                                    <tr><td colspan="5">

                                        <div class="collapse" id="details{{$hardwares->id}}">
                                            <div class="card card-body">
                                            HD: {{$hardwares->hd}} | RAM: {{$hardwares->ram}} | CPU: {{$hardwares->cpu}} | LED: {{$hardwares->led}} | Red: {{$hardwares->red}} | Otros: {{$hardwares->otro}} </br>
                                            Nota: 0 = N/A
                                            </div>
                                        </div>                                    
                                                                        
                                    </td></tr>

                                    @endforeach
                                  </tbody>
                                </table>

                            </div>

                            @endif

                            <div class="card-footer border-primary">

                                  {{ $hardware->links() }}

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
