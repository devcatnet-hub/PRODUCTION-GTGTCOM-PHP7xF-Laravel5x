@extends('masterindate')
@section('title', 'Template')
@section('content')

<div class="container-fluid">

    </br></br>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary">

                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>
                <div class="card-body">

                              <![[[[[HEADER]]]]]>

                              <div class="card-header border-primary">

                                  <h3 class="text-primary">
                                    {!! GetHTML::Icons('menu') !!}
                                    TITULO
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

                            @if ($data->isEmpty())
                                <p> No hay Datos.</p>
                            @else

                            <div class="table-responsive">

                                <table class="table table-borderless table-hover table-sm">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">title</th>
                                      <th scope="col">title</th>
                                      <th scope="col">title</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data as $data)
                                    <tr>
                                      <th scope="row">{{$data->data}}</th>
                                      <td>{{$data->data}}</td>
                                      <td>{{$data->data}}</td>
                                      <td>@{{$data->data}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                            </div>

                            @endif

                            <div class="card-footer border-primary">

                                  <h3>FOOTER</h3>

                            </div>

                </div>
                <![[[[[[[[[[[[[[[[[[[[[[[[[[LIST]]]]]]]]]]]]]]]]]]]]]]]]]]>

            </div>
        </div>
    </div>

</div>

</br></br>

@endsection
