@extends('popup')
@section('title', 'Detalles Históricos del Hardware')
@section('content')

<div class="container-fluid">
</br>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-primary">
            

                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('history') !!}
                                    Historial del Equipo
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


                            @if ($hardwarehistory->isEmpty())
                                </br>
                                <p> No hay Historial para este Equipo.</p>
                            @else

                            <div class="table-responsive">

                                <table class="table table-borderless table-hover table-sm">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Fecha</th>
                                      <th scope="col">Descripción</th>
                                      <th scope="col">Notas</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($hardwarehistory as $hardwarehistorys)
                                    <tr>
                                      <th scope="row">{{$hardwarehistorys->fechaevento}}</th>
                                      <td>{{$hardwarehistorys->evento}}</td>
                                      <td>{{$hardwarehistorys->notas}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                            </div>

                            @endif

                            <div class="card-footer border-primary">

                            {{ $hardwarehistory->links() }}

                            </div>

                </div>
                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>

            </div>
        </div>
    </div>

</div>

</br></br>

@endsection
