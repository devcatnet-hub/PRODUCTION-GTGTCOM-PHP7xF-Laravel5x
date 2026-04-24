@extends('masterin')
@section('title', 'Administrar Usuarios')
@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-10">
        </br>
            <div class="card card-default">
                <div class="card-header"><h2 class="text-primary"><i class="material-icons">menu</i> Lista de Menus de Grupo {{$group}}</h2></div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">

                        @if ($menu->isEmpty())
                            <p> No hay Menus.</p>
                        @else

                        <table class="table">

                              <thead>
                                  <tr>
                                      <th>Icono</th>
                                      <th>Titulo del Menu</th>
                                      <th>Link</th>
                                      <th>Orden</th>
                                      <th>Habilitado?</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>

                              <tbody>
                              @foreach($menu as $menu)
                                  <tr>
                                      <td><i class="material-icons">{!! $menu->icon !!}</i></td>
                                      <td>{!! $menu->title !!}</td>
                                      <td>{!! $menu->link !!}</td>
                                      <td>{!! $menu->order !!}</td>
                                      @if ($menu->enabled == 1)
                                        <td>Habilitado</td>
                                      @elseif ($menu->enabled == 0)
                                        <td>Inhabilitado</td>
                                      @endif
                                      <td>

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">

                                              <a class="btn btn-outline-primary" data-toggle="collapse" href="#{!! $menu->id !!}" role="button" aria-expanded="false" title="Editar Menu">
                                              <i class="material-icons">mode_edit</i>
                                              </a>

                                              <a class="btn btn-outline-primary" href="/menuconfirm/{!! $menu->id !!}" data-toggle="tooltip" data-placement="bottom" title="Borrar Definitivo de Menu">
                                              <i class="material-icons">delete_forever</i>
                                              </a>

                                              @if ($menu->link == '#')
                                                <a class="btn btn-outline-primary" href="/menusubmenu/{!! $menu->id !!}" data-toggle="tooltip" data-placement="bottom" title="Administrar Sub Menus">
                                                <i class="material-icons">menu</i>
                                                </a>
                                              @endif

                                            </div>
                                        </div>

                                      </td>

                                  </tr>

                                  <tr>
                                      <td colspan = "6">

                                        <div class="collapse" id="{!! $menu->id !!}">
                                          <div class="card card-body">

                                                <form method="POST">
                                                  @csrf
                                                  <div class="form-row">
                                                    <div class="col-2">
                                                      <label for="order">Icono</label>
                                                      <input type="text" class="form-control" id="icon" name="icon" value="{!! $menu->icon !!}">
                                                    </div>
                                                    <div class="col-3">
                                                      <label for="title">Titulo del Menu</label>
                                                      <input type="text" class="form-control" id="title" name="title" value="{!! $menu->title !!}">
                                                    </div>
                                                    <div class="col-2">
                                                      <label for="link">Link</label>
                                                      <input type="text" class="form-control" id="link" name="link" value="{!! $menu->link !!}">
                                                    </div>
                                                    <div class="col-1">
                                                      <label for="order">Orden</label>
                                                      <input type="text" class="form-control" id="order" name="order" value="{!! $menu->order !!}">
                                                    </div>
                                                    <div class="col-2">
                                                      <label for="enabled">Habilitado?</label>
                                                      <select id="enabled" name="enabled" class="form-control">
                                                        <option value="1">Habilitado</option>
                                                        <option value="0">Inhabilitado</option>
                                                      </select>
                                                    </div>
                                                    <div class="col-1"></div>
                                                      <input id="id" type="hidden" name="id" value="{!! $menu->id !!}">
                                                      <input id="group" type="hidden" name="group" value="{!! $menu->group !!}">
                                                      <input id="action" type="hidden" name="action" value="update">
                                                      <input value="{{ Auth::user()->username }}" id="author" type="hidden" name="author">
                                                      <button type="submit" class="btn btn-primary"><i class="material-icons">save</i></button>
                                                  </div>
                                                </form>

                                          </div>
                                        </div>

                                      </td>
                                  </tr>

                              @endforeach
                              </tbody>

                          </table>

                          @endif

                          <div class="row">
                            <div class="col-md-12">

                              <div class="collapse" id="Nuevo">
                                <div class="card card-body">

                                      <form method="POST">
                                        @csrf
                                        <div class="form-row">

                                          <div class="col-2">
                                            <div class="floating-label floating-label-sm">
                                                <label for="icon">Icono</label>
                                                <input type="text" class="form-control" id="icon" name="icon">
                                            </div>
                                          </div>

                                          <div class="col-3">
                                            <div class="floating-label floating-label-sm">
                                                <label for="title">Titulo del Menu</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                          </div>

                                          <div class="col-2">
                                            <div class="floating-label floating-label-sm">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" id="link" name="link">
                                            </div>
                                          </div>

                                          <div class="col-1">
                                            <div class="floating-label floating-label-sm">
                                                <label for="order">Orden</label>
                                                <input type="text" class="form-control" id="order" name="order">
                                            </div>
                                          </div>

                                          <div class="col-2">
                                            <label for="enabled">Habilitado?</label>
                                            <select id="enabled" name="enabled" class="form-control">
                                              <option value="1">Habilitado</option>
                                              <option value="0">Inhabilitado</option>
                                            </select>
                                          </div>

                                          <div class="col-1"></div>

                                            <input id="group" type="hidden" name="group" value="{{$group}}">
                                            <input id="group" type="hidden" name="parent" value="0">
                                            <input id="action" type="hidden" name="action" value="save">
                                            <input value="{{ Auth::user()->username }}" id="author" type="hidden" name="author">
                                            <button type="submit" class="btn btn-primary"><i class="material-icons">save</i></button>


                                        </div>
                                      </form>

                                </div>
                              </div>

                            </div>
                          </div>

                        </br>

                          <div class="row">
                            <div class="col-md-1"></div>

                            <div class="col-md-9">

                              @foreach($errors -> all() as $error)
                                <div class="alert alert-primary" role="alert">
                                  <i class="material-icons">warning</i> {{$error}}
                                </div>
                              @endforeach

                              @if (session('status'))
                                <div class="alert alert-primary" role="alert">
                                  <i class="material-icons">warning</i> {{ session('status') }}
                                </div>
                              @endif

                            </div>

                            <div class="col-md-2">

                                <div class="btn-group" role="group" aria-label="Basic example">

                                  <a class="btn btn-primary" data-toggle="collapse" href="#Nuevo" role="button" aria-expanded="false"
                                   data-placement="bottom" title="Agregar un Nuevo Menu">
                                    <i class="material-icons">exposure_plus_1</i>
                                  </a>
                                  <a href="{{ url('/grouplist') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Regresar a Administrar Grupos">
                                    <i class="material-icons">cancel</i>
                                  </a>

                                </div>

                            </div>
                          </div>

                      </div>
                    </div>
                  </div>

                </div>

            </div>
        </div>
    </div>



</div>


@endsection
