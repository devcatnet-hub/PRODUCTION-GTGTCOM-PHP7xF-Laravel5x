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
                                      <th>

                                          <h3 class="text-primary">
                                            {!! GetHTML::Icons('list') !!}
                                            Reporte de Personal en Pantalla.
                                          </h3> 
                                      
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
                                      <th scope="col">Apellidos, Nombres</th>
                                      <th scope="col">Area</th>
                                      <th scope="col">Cargo</th>
                                      <th scope="col">e-Mail</th>
                                      <th scope="col">Telefono</th>
                                      <th scope="col">DPI</th>
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
                                      <td>{{$personas->telcel}}</td>
                                      <td>{{$personas->dpi}}</td>
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

          $('#departamentoDIV').show();

      }else if(sel.value=="apellidos"){ 

          $('#departamentoDIV').show();

      }else if(sel.value=="departamento"){

          $('#departamentoDIV').hide();

      }else if(sel.value=="puesto"){

          $('#departamentoDIV').show();

      }
}

</script>

@endsection
