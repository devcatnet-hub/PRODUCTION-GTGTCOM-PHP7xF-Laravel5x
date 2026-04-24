@extends('masterin')
@section('title', 'Información.')
@section('content')

<div class="container-fluid">

</br>
    
<div class="card text-white bg-primary mb-3">
<div class="card-body">

<h3>
    {!! GetHTML::Icons('info') !!}
    {{$persona['nombres'].' '.$persona['apellidos']}}

    <span class="float-right">
    <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">
        {!! GetHTML::Icons('backspace') !!} BACK
    </a>
    </span>

</h3>

</div>
</div>
    
<div class="card border-primary mb-3">
<div class="card-body">

<h3 class="text-primary">
    {!! GetHTML::Icons('person') !!}
    Datos Personales.
</h3> 

  <div class="row">
    <div class="col-2">

        <img src="{{ asset("storage/$persona->foto") }}" height="100%" width="100%" >

    </div>
    <div class="col-10">

        <table class="table table-borderless table-hover table-sm">
          <tbody>
            <tr>
              <th width="10%" class="table-dark">Usuario:</th>
              <td width="20%">{{$persona['mailgt']}}@gt.gt.com</td>
              <td width="10%" class="table-dark">Area:</td>
              <td width="20%">{{$persona['departamento']}}</td>
              <td width="10%" class="table-dark">Puesto:</td>
              <td width="20%">{{$persona['puesto']}}</td>
            </tr>
            <tr>
              <th width="10%" class="table-dark">Telefono:</th>
              <td width="20%">{{$persona['telcel']}}</td>
              <td width="10%" class="table-dark">DPI:</td>
              <td width="20%">{{$persona['dpi']}}</td>
              <td width="10%" class="table-dark">Direccion:</td>
              <td width="20%">{{$persona['direccion']}}</td>
            </tr>
            <tr>
              <th width="10%" class="table-dark">Jefe Inmediato:</th>
              <td width="20%">{{$persona['jefeinmediato']}}</td>
            </tr>
          </tbody>
        </table>

    </div>
  </div>


</div>
</div>

<div class="row">

  <div class="col-sm-7">
    <div class="card border-primary">
      <div class="card-body">
          <h3 class="text-primary">
          {!! GetHTML::Icons('laptop') !!}
          Inventario de Hardware.
          </h3>

          </br>

          @if ($hardware->isEmpty())
                                <p> No hay Datos.</p>
                            @else

                            <div class="table-responsive">

                                <table class="table table-borderless table-hover table-sm">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col" width="10%">No. Inventario</th>
                                      <th scope="col" width="10%">No. de Serie</th>
                                      <th scope="col" width="20%">Tipo de Activo</th>
                                      <th scope="col" width="20%">Marca | Modelo</th>
                                      <th scope="col" width="40%">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($hardware as $hardwares)
                                    <tr>
                                      <td>{{$hardwares->inventario}}</td>
                                      <td>{{$hardwares->numeroserie}}</td>
                                      <td>{{$hardwares->tipo}}</td>
                                      <td>{{$hardwares->marca. ' | ' .$hardwares->modelo}}</td>
                                      <td>
                                      <div class="btn-group btn-group-sm" role="group" aria-label="First group"> 

                                          <a class="btn btn-primary" data-toggle="collapse" href="#details{{$hardwares->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"
                                          {!! GetHTML::Tooltip('Mas información.' ) !!}>
                                                        {!! GetHTML::Icons('info') !!}
                                          </a>

                                          <a href="/gtcardhardware/{{$hardwares->id}}/1" class="btn btn-primary btn-sm"
                                            {!! GetHTML::Tooltip('Generar tarjeta de responsabilidad.') !!}>
                                                {!! GetHTML::Icons('layers') !!}
                                          </a>

                                          <a href="/gtcardhardware/{{$hardwares->id}}/0" class="btn btn-primary btn-sm"
                                            {!! GetHTML::Tooltip('Generar constancia de devolución.') !!}>
                                                {!! GetHTML::Icons('layers_clear') !!}
                                          </a>

                                          <a href="/gtremovehardware/{{$data['idpersona']}}/{{$hardwares->id}}" class="btn btn-primary btn-sm"
                                            {!! GetHTML::Tooltip('Retirar equipo a '. $data['persona']) !!}>
                                                {!! GetHTML::Icons('remove_circle') !!}
                                          </a>

                                          <button class="btn btn-primary btn-sm"
                                          onClick="PU{{$hardwares->id}}=window.open('/gthistoryhardware/{{$hardwares->id}}','PU{{$hardwares->id}}','width=800,height=500');"
                                          {!! GetHTML::Tooltip('Ver detalles históricos del Hardware.' ) !!}>
                                                        {!! GetHTML::Icons('history') !!}
                                          </button>

                                      </div> 
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
      </div>
    </div>
  </div>

  <div class="col-sm-5">
    <div class="card border-primary">
      <div class="card-body">
          <h3 class="text-primary">
          {!! GetHTML::Icons('select_all') !!}
          Adjuntos y Datos.

<span class="float-right">



  <div class="dropdown">
        <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" type="button" {!! GetHTML::Tooltip('Agregar adjuntos o datos.' ) !!}>{!! GetHTML::Icons('post_add') !!}</button>
        <div class="dropdown-menu dropdown-menu-right">
        @foreach($objectcategory as $objectcategorys)
            <a class="btn btn-light btn-sm btn-block" href="/gtnewobject/{!! $objectcategorys->id !!}/{{$persona['id']}}">{!! $objectcategorys->categoria !!}</a>
        @endforeach
        </div>
  </div>


</span>

          </h3></br>

                  @if ($object->isEmpty())
                      <p> No hay Datos.</p>
                  @else

                  <div class="accordion" id="objectaccordion">
                  @foreach($object as $objects)
                  
                    <h5 class="mb-0">
                      <button class="btn btn-flat" type="button" data-toggle="collapse" data-target="#collapse{{$objects->id}}"O aria-expanded="true" aria-controls="collapse{{$objects->id}}">
                      {!! GetHTML::Icons($objects->icono) !!} {{$objects->nombre}}
                      </button>
                    </h5>

                  <div id="collapse{{$objects->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                    <ul class="list-group list-group-flush">  

                        @if ($objects->notas <> 'ND')
                        <li class="list-group-item"><strong>{!! GetHTML::Icons('notes') !!} Notas:</strong> {{$objects->notas}}</li>
                        @endif

                        @if ($objects->documento <> 'ND')
                        <li class="list-group-item"><strong>{!! GetHTML::Icons('attachment') !!} Adjunto:</strong> <a href="{{ Storage::url($objects->documento) }}" target='_blank'>Download</a> </li>
                        @endif

                        @if ($objects->foto <> 'ND')
                        <li class="list-group-item"><strong>{!! GetHTML::Icons('insert_photo') !!} Foto/Imagen:</strong> <a href="{{ Storage::url($objects->foto) }}" target='_blank'>Download</a> </li>
                        @endif

                        @if ($objects->dato <> 'ND')
                        <li class="list-group-item"><strong>{!! GetHTML::Icons('text_fields') !!} Dato:</strong> {{ $objects->dato }} </li>
                        @endif

                        @if ($objects->valor <> '0.00')
                        <li class="list-group-item"><strong>{!! GetHTML::Icons('exposure_plus_1') !!} Valor:</strong> {{ $objects->valor }} </li>
                        @endif

                        @if ($objects->porcentaje <> '0.00')
                        <li class="list-group-item"><strong>{!! GetHTML::Icons('pie_chart') !!} Porcentaje:</strong> {{ $objects->porcentaje }} </li>
                        @endif

                        <li class="list-group-item">

                        <div class="btn-group btn-group-sm" role="group" aria-label="First group"> 

                            <a href="/gteditobject/{{$objects->id}}" class="btn btn-primary btn-sm"
                              {!! GetHTML::Tooltip('Editar adjunto o dato') !!}>
                                  {!! GetHTML::Icons('edit') !!}
                            </a>

                            <a href="/gtdeleteobject/{{$objects->id}}" class="btn btn-primary btn-sm"
                              {!! GetHTML::Tooltip('Borrar adjunto o dato') !!}>
                                  {!! GetHTML::Icons('delete') !!}
                            </a>

                        </div>

                        </li>

                    </ul>
                    </div>
                  </div>

                  @endforeach
                  </div>

                  @endif
      </div>
    </div>
  </div>

</div>

</br>
</br>

@endsection
