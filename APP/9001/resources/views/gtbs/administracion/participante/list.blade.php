@extends('masterin')
@section('title', 'Ver Participantes')
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

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('menu') !!}
                                    FECHA: {{$tema->fecha}} | AREA: {{$tema->responsable}} | TEMA: {{$tema->tema}}
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

                            @if ($participante->isEmpty())
                                <p> No hay Datos.</p>
                            @else

                            <div class="table-responsive">

                                <table class="table table-borderless table-hover table-sm">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Empresa</th>
                                      <th scope="col">Cargo</th>
                                      <th scope="col">Telefono</th>
                                      <th scope="col">eMail</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($participante as $participantes)
                                    <tr>
                                      <th scope="row">{{$participantes->nombre}}</th>
                                      <td>{{$participantes->empresa}}</td>
                                      <td>{{$participantes->cargo}}</td>
                                      <td>{{$participantes->telefono}}</td>
                                      <td>{{$participantes->email}}</td>
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

@endsection
