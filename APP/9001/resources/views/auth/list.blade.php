@extends('masterin')
@section('title', 'Administrar Usuarios')
@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-12">
        </br>
            <div class="card card-default">
                <div class="card-header"><h2 class="text-primary"><i class="material-icons">supervisor_account</i> Lista de Usuarios</h2></div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-md-12">

                                <form action="{{url('/usersearchredirect')}}">

                                      <div class="form-row">
                                          <div class="col-6"></div>
                                          <div class="col-2">
                                            <label for="inputState">Criterio de Busqueda</label>
                                            <select data-toggle="select" name='searchterm' id='searchterm' class="form-control">
                                                <option value="fname">Nombre</option>
                                                <option value="lname">Apellido</option>
                                                <option value="username">Username</option>
                                                <option value="group">Grupo</option>
                                                <option value="attrib">Activo/Inactivo</option>
                                                <option value="status">Estado</option>
                                                <option value="email">Direccion de E-Mail</option>
                                            </select>
                                          </div>
                                          <div class="col-2">
                                            <label for="inputAddress2">Buscar Usuario</label>
                                            <input type="text" placeholder="Buscar" id="search" name="search" class="form-control">
                                          </div>
                                          <div class="col-2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                @isset($usersearch)
                                                    <a href="{{ url('/userslist') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Limpiar Busqueda">
                                                      <i class="material-icons">cancel</i>
                                                    </a>
                                                @endisset
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Iniciar Busqueda">
                                                  <i class="material-icons">search</i>
                                                </button>
                                                @isset($userdelete)
                                                    <a href="{{ url('/userslist') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Cerrar Usuarios Borrados">
                                                      <i class="material-icons">cancel</i>
                                                    </a>
                                                @endisset
                                                <a class="btn btn-primary" href="/userlistdelete" data-toggle="tooltip" data-placement="bottom" title="Ver Usuarios Borrados">
                                                  <i class="material-icons">delete</i>
                                                </a>
                                                <a class="btn btn-primary" href="/register" data-toggle="tooltip" data-placement="bottom" title="Nuevo Usuario">
                                                  <i class="material-icons">note_add</i>
                                                </a>
                                            </div>
                                          </div>
                                      </div>
                                      </br></br>

                                  </form>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">

                        @if ($user->isEmpty())
                            <p> No hay Usuarios.</p>
                        @else

                          <table class="table">

                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Nombre</th>
                                      <th>Usuario</th>
                                      <th>Grupo</th>
                                      <th>Activo</th>
                                      <th>Ultima Accion</th>
                                      <th>E-Mail</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>

                              <tbody>
                              @foreach($user as $user)
                                  <tr>
                                      <td>{!! $user->id !!}</td>
                                      <td>{!! $user->fname !!} {!! $user->lname !!}</td>
                                      <td>{!! $user->username !!}</td>
                                      <td>{!! $user->group !!}</td>
                                      <td>{!! $user->attrib !!}</td>
                                      <td>{!! $user->status !!} por {!! $user->author !!}</td>
                                      @if ($user->username=='admin')
                                          <td></td>
                                      @else
                                          <td>{!! $user->email !!}</td>
                                      @endif
                                      <td>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                            @if ($user->username=='admin')
                                                <a class="btn btn-outline-primary" href="/userchangepassword/{!! $user->id !!}/by/{!! Auth::user()->username !!}" data-toggle="tooltip" data-placement="bottom" title="Cambiar Password">
                                                  <i class="material-icons">fingerprint</i>
                                                </a>
                                            @elseif ($user->username<>'admin' and $user->status<>'Borrado')
                                                <a class="btn btn-outline-primary" href="/useredit/{!! $user->id !!}" data-toggle="tooltip" data-placement="bottom" title="Editar Usuario">
                                                  <i class="material-icons">mode_edit</i>
                                                </a>
                                                <a class="btn btn-outline-primary" href="/usersoftdelete/{!! $user->id !!}/by/{!! Auth::user()->username !!}" data-toggle="tooltip" data-placement="bottom" title="Borrar Usuario">
                                                  <i class="material-icons">delete</i>
                                                </a>
                                                <a class="btn btn-outline-primary" href="/userchangepassword/{!! $user->id !!}/by/{!! Auth::user()->username !!}" data-toggle="tooltip" data-placement="bottom" title="Cambiar Password">
                                                  <i class="material-icons">fingerprint</i>
                                                </a>
                                                @if ($user->attrib=='activo')
                                                    <a class="btn btn-outline-primary" href="/userinactive/{!! $user->id !!}/by/{!! Auth::user()->username !!}" data-toggle="tooltip" data-placement="bottom" title="Deactivar Usuario">
                                                      <i class="material-icons">pause_circle_filled</i>
                                                    </a>
                                                @elseif ($user->attrib=='inactivo')
                                                    <a class="btn btn-outline-primary" href="/useractive/{!! $user->id !!}/by/{!! Auth::user()->username !!}" data-toggle="tooltip" data-placement="bottom" title="Activar Usuario">
                                                      <i class="material-icons">play_circle_filled</i>
                                                    </a>
                                                @endif
                                            @elseif ($user->username<>'admin' and $user->status=='Borrado')
                                                <a class="btn btn-outline-primary" href="/usersoftundelete/{!! $user->id !!}/by/{!! Auth::user()->username !!}" data-toggle="tooltip" data-placement="bottom" title="Recuperar Usuario">
                                                  <i class="material-icons">delete_sweep</i>
                                                </a>
                                                <a class="btn btn-outline-primary" href="/userconfirmdestroy/{!! $user->id !!}" data-toggle="tooltip" data-placement="bottom" title="Borrado Definitivo de Usuario">
                                                  <i class="material-icons">delete_forever</i>
                                                </a>
                                            @endif



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
