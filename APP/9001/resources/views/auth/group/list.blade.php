@extends('masterin')
@section('title', 'Administrar Usuarios')
@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8">
        </br>
            <div class="card card-default">
                <div class="card-header"><h2 class="text-primary"><i class="material-icons">group_work</i> Lista de Grupos</h2></div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">

                        @if ($grupo->isEmpty())
                            <p> No hay Grupos.</p>
                        @else

                          <table class="table">

                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Nombre</th>
                                      <th>Grupo</th>
                                      <th>Creado por:</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>

                              <tbody>
                              @foreach($grupo as $grupo)
                                  <tr>
                                      <td>{!! $grupo->id !!}</td>
                                      <td>{!! $grupo->name !!}</td>
                                      <td>{!! $grupo->group !!}</td>
                                      <td>{!! $grupo->author !!}</td>
                                      <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                            @if ($grupo->group<>'root')

                                                <a class="btn btn-outline-primary" href="/groupconfirmdestroy/{!! $grupo->id !!}" data-toggle="tooltip" data-placement="bottom" title="Borrado Definitivo de Grupo">
                                                  <i class="material-icons">delete_forever</i>
                                                </a>

                                            @endif
                                                <a class="btn btn-outline-primary" href="/menumainmenus/{!! $grupo->group !!}" data-toggle="tooltip" data-placement="bottom" title="Editar Menus">
                                                  <i class="material-icons">menu</i>
                                                </a>

                                            </div>
                                        </div>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>

                          </table>

                        @endif

                      </div>
                    </div>
                  </div>

                </div>

            </div>
        </div>
    </div>



</div>


@endsection
