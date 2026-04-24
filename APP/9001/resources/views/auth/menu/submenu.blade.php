@extends('masterin')
@section('title', 'Administrar Usuarios')
@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-10">
        </br>
            <div class="card card-default">
                <div class="card-header"><h2 class="text-primary"><i class="material-icons">menu</i> Lista de Sub Menus del Menu {{$menu->title}}</h2></div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">

                        @if ($submenu->isEmpty())
                            <p> No hay Sub Menus.</p>
                        @else

                        <table class="table">

                              <thead>
                                  <tr>
                                      <th>Titulo del Sub Menu</th>
                                      <th>Link</th>
                                      <th>Orden</th>
                                      <th>Habilitado?</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>

                              <tbody>
                              @foreach($submenu as $submenu)
                                  <tr>
                                      @if ($submenu->title == 'dropdown-divider')
                                        <td>--------- Linea Divisoria ---------</td>
                                      @else
                                        <td>{!! $submenu->title !!}</td>
                                      @endif
                                      <td>{!! $submenu->link !!}</td>
                                      <td>{!! $submenu->order !!}</td>
                                      @if ($submenu->enabled == 1)
                                        <td>Habilitado</td>
                                      @elseif ($submenu->enabled == 0)
                                        <td>Inhabilitado</td>
                                      @endif
                                      <td>

                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">

                                              <a class="btn btn-outline-primary" data-toggle="collapse" href="#{!! $submenu->id !!}" role="button" aria-expanded="false" title="Editar Menu">
                                              <i class="material-icons">mode_edit</i>
                                              </a>

                                              @if ($submenu->title == 'dropdown-divider')
                                                  <a class="btn btn-outline-primary" href="/menudeleteline/{!! $submenu->id !!}/by/{!! $submenu->parent !!}" data-toggle="tooltip" data-placement="bottom" title="Borrar Linea">
                                                  <i class="material-icons">delete_forever</i>
                                                  </a>
                                              @else
                                                  <a class="btn btn-outline-primary" href="/menuconfirm/{!! $submenu->id !!}" data-toggle="tooltip" data-placement="bottom" title="Borrar Definitivo de Menu">
                                                  <i class="material-icons">delete_forever</i>
                                                  </a>
                                              @endif

                                            </div>
                                        </div>

                                      </td>

                                  </tr>

                                  <tr>
                                      <td colspan = "6">

                                        <div class="collapse" id="{!! $submenu->id !!}">
                                          <div class="card card-body">

                                                <form method="POST">
                                                  @csrf
                                                  <div class="form-row">
                                                    <div class="col-3">
                                                      <label for="title">Titulo del Menu</label>
                                                      <input type="text" class="form-control" id="title" name="title" value="{!! $submenu->title !!}">
                                                    </div>
                                                    <div class="col-2">
                                                      <label for="link">Link</label>
                                                      <input type="text" class="form-control" id="link" name="link" value="{!! $submenu->link !!}">
                                                    </div>
                                                    <div class="col-1">
                                                      <label for="order">Orden</label>
                                                      <input type="text" class="form-control" id="order" name="order" value="{!! $submenu->order !!}">
                                                    </div>
                                                    <div class="col-2">
                                                      <label for="enabled">Habilitado?</label>
                                                      <select id="enabled" name="enabled" class="form-control">
                                                        <option value="1">Habilitado</option>
                                                        <option value="0">Inhabilitado</option>
                                                      </select>
                                                    </div>
                                                    <div class="col-1"></div>
                                                      <input id="id" type="hidden" name="id" value="{!! $submenu->id !!}">
                                                      <input id="group" type="hidden" name="group" value="{!! $menu->group !!}">
                                                      <input id="idparent" type="hidden" name="idparent" value="{!! $menu->id !!}">
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

                                            <input id="icon" type="hidden" name="icon" value=".">
                                            <input id="group" type="hidden" name="group" value="{!! $menu->group !!}">
                                            <input id="group" type="hidden" name="parent" value="{!! $menu->id !!}">
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
                            <div class="col-md-9"></div>
                            <div class="col-md-3">

                                  <div class="collapse" id="Linea">
                                    <div class="card card-body">

                                      <form method="POST">
                                          @csrf
                                          <div class="form-row">

                                              <div class="col-8">
                                                <div class="floating-label floating-label-sm">
                                                    <label for="order">Orden</label>
                                                    <input type="text" class="form-control" id="order" name="order">
                                                </div>
                                              </div>

                                              <input id="icon" type="hidden" name="icon" value=".">
                                              <input id="title" type="hidden" name="title" value="dropdown-divider">
                                              <input id="link" type="hidden" name="link" value="#">
                                              <input id="enabled" type="hidden" name="enabled" value="1">
                                              <input id="group" type="hidden" name="group" value="{!! $menu->group !!}">
                                              <input id="group" type="hidden" name="parent" value="{!! $menu->id !!}">
                                              <input id="action" type="hidden" name="action" value="save">

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

                                  <a class="btn btn-primary" data-toggle="collapse" href="#Linea" role="button" aria-expanded="false"
                                   data-placement="bottom" title="Agregar un Linea Divisoria">
                                    <i class="material-icons">remove</i>
                                  </a>
                                  <a class="btn btn-primary" data-toggle="collapse" href="#Nuevo" role="button" aria-expanded="false"
                                   data-placement="bottom" title="Agregar un Nuevo Menu">
                                    <i class="material-icons">exposure_plus_1</i>
                                  </a>
                                  <a href="{{ url('/menumainmenus/'.$menu->group) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Regresar a Administrar Grupos">
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
