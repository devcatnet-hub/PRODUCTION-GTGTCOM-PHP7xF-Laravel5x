@extends('masterin')
@section('title', 'Administrar Personal')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                              <table class="table table-borderless table-hover table-sm">

                              <tbody>
                                  <tr>
                                      <th width="30%">

                                          <h3 class="text-primary">
                                            {!! GetHTML::Icons('people') !!}
                                            Administrar Personal
                                          </h3> 
                                      
                                      </th>
                                      <th width="70%">                                          

                                      <div class="btn-group btn-group-sm" role="group" aria-label="First group">

                                          <div class="collapse" id="search">
                                          <div class="card card-body">

                                          <form method="post">
                                          @csrf
                                            <div class="row">
                                              <div class="col">
                                                  <input type="text" 
                                                        class="form-control mb-2 form-control-sm"  
                                                        id="term" 
                                                        name="term" 
                                                        placeholder="Buscar en…">
                                              </div>
                                              <div class="col">
                                                  <select class="form-control form-control-sm" id="search" name="search" onChange="showCustom(this)">
                                                      <option value="nombres" selected >Nombres</option>
                                                      <option value="apellidos">Apellidos</option>
                                                      <option value="departamento">Area</option>
                                                      <option value="puesto">Cargo</option>
                                                  </select>
                                              </div>
                                              <div class="col" id="departamentoDIV" style="display:none;">
                                                  <select class="form-control form-control-sm" id="departamento" name="departamento">
                                                  <option value="nodata" selected></option>
                                                  @foreach($departamento as $departamentos)
                                                      <option value="{{$departamentos->departamento}}">{{$departamentos->departamento}}</option>
                                                  @endforeach
                                                  </select> 
                                              </div>
                                              <div class="col" id="puestoDIV" style="display:none;">
                                                  <select class="form-control form-control-sm" id="puesto" name="puesto">
                                                  <option value="nodata" selected></option>
                                                  @foreach($puesto as $puestos)
                                                      <option value="{{$puestos->puesto}}">{{$puestos->puesto}}</option>
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

                                          @if ($search == 1)
                                          <a href="/gtlistpersona/1/apellidos/asc" class="btn btn-outline-primary"
                                            {!! GetHTML::Tooltip('Cerrar busqueda.') !!}>
                                                {!! GetHTML::Icons('block') !!}
                                          </a>
                                          @endif
                                          @if ($search <> 1)
                                              @if ($opt == 1)
                                              <a href="/gtlistpersona/0/apellidos/asc" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Ver usuarios inactivos.') !!}>
                                                    {!! GetHTML::Icons('person_outline') !!}
                                              </a>
                                              <a href="/gtnewpersona/1" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Agregar usuario.') !!}>
                                                    {!! GetHTML::Icons('person_add') !!}
                                              </a>
                                              <a href="/gtlistpersona/2/apellidos/asc" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Ver Recycle Bin.') !!}>
                                                    {!! GetHTML::Icons('delete') !!}
                                              </a>
                                              @elseif ($opt == 0)                                            
                                              <a href="/gtlistpersona/1/apellidos/asc" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Ver usuarios activos.') !!}>
                                                    {!! GetHTML::Icons('person') !!}
                                              </a>
                                              <a href="/gtlistpersona/2/apellidos/asc" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Ver Recycle Bin.') !!}>
                                                    {!! GetHTML::Icons('delete') !!}
                                              </a>
                                              @elseif ($opt == 2)
                                              <a href="/gtlistpersona/1/apellidos/asc" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Ver usuarios activos.') !!}>
                                                    {!! GetHTML::Icons('person') !!}
                                              </a>
                                              <a href="/gtlistpersona/0/apellidos/asc" class="btn btn-outline-primary"
                                                {!! GetHTML::Tooltip('Ver usuarios inactivos.') !!}>
                                                    {!! GetHTML::Icons('person_outline') !!}
                                              </a>
                                              @endif     
                                          @endif

                                          <a href="/gtreportpersona" class="btn btn-outline-primary"
                                            {!! GetHTML::Tooltip('Generador de reportes.') !!}>
                                                {!! GetHTML::Icons('list') !!}
                                          </a>
                                      </div>

                                      </th>
                                  </tr>

                              </tbody>

                              </table>                     

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

                            @if ($persona->isEmpty())
                                <p> No hay Datos.</p>
                            @else                            

                            <div class="table-responsive">

                                <table class="table table-borderless table-hover table-sm">
                                  <thead class="thead-dark">                                    
                                    <tr>
                                      <th scope="col">
                                      
                                      @if ($search <> 1)
                                          @if ($order == "apellidos")                                              
                                              <a href="/gtlistpersona/{{$opt}}/apellidos/asc">{!! GetHTML::Icons('arrow_upward') !!}</a>                                         
                                              Apellidos 
                                              <a href="/gtlistpersona/{{$opt}}/apellidos/desc">{!! GetHTML::Icons('arrow_downward') !!}</a>
                                              ,
                                              <a href="/gtlistpersona/{{$opt}}/nombres/asc">{!! GetHTML::Icons('arrow_upward') !!}</a>                                         
                                              Nombres 
                                              <a href="/gtlistpersona/{{$opt}}/nombres/desc">{!! GetHTML::Icons('arrow_downward') !!}</a>
                                          @else 
                                              <a href="/gtlistpersona/{{$opt}}/nombres/asc">{!! GetHTML::Icons('arrow_upward') !!}</a>                                         
                                              Nombres 
                                              <a href="/gtlistpersona/{{$opt}}/nombres/desc">{!! GetHTML::Icons('arrow_downward') !!}</a>
                                              y
                                              <a href="/gtlistpersona/{{$opt}}/apellidos/asc">{!! GetHTML::Icons('arrow_upward') !!}</a>                                         
                                              Apellidos 
                                              <a href="/gtlistpersona/{{$opt}}/apellidos/desc">{!! GetHTML::Icons('arrow_downward') !!}</a>
                                          @endif
                                      @else

                                      Apellidos, Nombres
                                      
                                      @endif

                                      </th>
                                      <th scope="col">

                                      @if ($search <> 1)
                                          <a href="/gtlistpersona/{{$opt}}/departamento/asc">{!! GetHTML::Icons('arrow_upward') !!}</a>
                                          Area                                          
                                          <a href="/gtlistpersona/{{$opt}}/departamento/desc">{!! GetHTML::Icons('arrow_downward') !!}</a>
                                      @else
                                      
                                      Area

                                      @endif

                                      </th>
                                      <th scope="col">

                                      @if ($search <> 1)
                                          <a href="/gtlistpersona/{{$opt}}/puesto/asc">{!! GetHTML::Icons('arrow_upward') !!}</a>
                                          Cargo                                         
                                          <a href="/gtlistpersona/{{$opt}}/puesto/desc">{!! GetHTML::Icons('arrow_downward') !!}</a>
                                      @else
                                      
                                      Cargo

                                      @endif
                                    
                                      </th>
                                      <th scope="col">

                                      @if ($search <> 1)
                                          <a href="/gtlistpersona/{{$opt}}/mailgt/asc">{!! GetHTML::Icons('arrow_upward') !!}</a>
                                          e-Mail                                         
                                          <a href="/gtlistpersona/{{$opt}}/mailgt/desc">{!! GetHTML::Icons('arrow_downward') !!}</a>
                                      @else

                                      e-Mail

                                      @endif


                                      </th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($persona as $personas)
                                    <tr>
                                        @if ($order == "apellidos")
                                            <th scope="row">{{$personas->apellidos}}, {{$personas->nombres}}</th>
                                        @else                                          
                                            <th scope="row">{{$personas->nombres}} {{$personas->apellidos}}</th>
                                        @endif
                                      <td>{{$personas->departamento}}</td>
                                      <td>{{$personas->puesto}}</td>
                                        @if ($personas->mailgt != "SD")
                                            <td>{{$personas->mailgt}}@gt.gt.com</td>
                                        @else
                                            <td>Sin correo asignado</td>
                                        @endif
                                      <td>
                                      
                                        <div class="btn-group btn-group-sm" role="group" aria-label="First group">  
                                            
                                        <a href="/gtinfopersona/{{$personas->id}}" class="btn btn-primary btn-sm"
                                          {!! GetHTML::Tooltip('Información.') !!}>
                                              {!! GetHTML::Icons('info') !!}
                                        </a>

                                        @if ($personas->status <> 2)
                                              <a href="/gteditpersona/{{$personas->id}}/0" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Editar usuario.') !!}>
                                                    {!! GetHTML::Icons('mode_edit') !!}
                                              </a>
                                        @endif

                                        @if ($personas->status == 1)
                                              <a href="/gtdisablepersona/{{$personas->id}}/0" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Inactivar usuario.') !!}>
                                                    {!! GetHTML::Icons('person_outline') !!}
                                              </a>
                                        @elseif ($personas->status == 0)
                                              <a href="/gtenablepersona/{{$personas->id}}/1" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Activar usuario.') !!}>
                                                    {!! GetHTML::Icons('person') !!}
                                              </a>
                                        @elseif ($personas->status == 2)
                                              <a href="/gtundeletepersona/{{$personas->id}}/0" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Undelete usuario.') !!}>
                                                    {!! GetHTML::Icons('delete_outline') !!}
                                              </a>
                                        @endif

                                        @if ($personas->status == 1)    
                                              <a href="/gttoassignhardware/{{$personas->id}}/0" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Asignar equipo.') !!}>
                                                    {!! GetHTML::Icons('laptop') !!}
                                              </a>  
                                        @endif 
                                              
                                        @if ($personas->status == 0)
                                              <a href="/gtdeletepersona/{{$personas->id}}/2" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Borrar usuario.') !!}>
                                                    {!! GetHTML::Icons('delete') !!}
                                              </a>
                                        @endif

                                        @if ($personas->status == 2)
                                              <a href="/gtdeleleteforeverpersona/{{$personas->id}}" class="btn btn-primary btn-sm"
                                                {!! GetHTML::Tooltip('Borrar totalmente') !!}>
                                                    {!! GetHTML::Icons('delete_forever') !!}
                                              </a>
                                        @endif

                                        </div>

                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                            </div>
                            
                            

                            @endif

                            <div class="card-footer border-primary">

                            {{ $persona->links() }}
                                 
                            </div>

                </div>
               
                   

            </div>
        </div>
    </div>

</div>

</br></br>

<script>
function showCustom(sel) {

      if (sel.value=="nombres") { 

          $('#departamentoDIV').hide();
          $('#puestoDIV').hide();

      }else if(sel.value=="apellidos"){ 

          $('#departamentoDIV').hide();
          $('#puestoDIV').hide();

      }else if(sel.value=="departamento"){

          $('#departamentoDIV').show();
          $('#puestoDIV').hide();

      }else if(sel.value=="puesto"){

          $('#departamentoDIV').hide();
          $('#puestoDIV').show();

      }
}

</script>

@endsection
