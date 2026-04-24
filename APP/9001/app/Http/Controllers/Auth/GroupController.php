<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Auth\CreateGroupFormRequest;
use RegBitacora;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CreateGroupFormRequest $request)
    {
        $grupo = new Grupo;
        $grupo->create($request->all());

        RegBitacora::SetBitacora('New Group', $request->author, 'Administracion de Grupos', 'Group: '.$request->group, 'Note: Null');

        return redirect('/groupnew');
    }

    public function list()
    {
        $grupo = Grupo::orderBy('id', 'asc')->get();
        return view('auth.group.list', compact('grupo'));
    }

    public function destroy($id) {
        $grupo = Grupo::find($id);
        $grupo->delete();

        $nombreoperador = Auth::user()->username;

        $note = 'Note: Group Name: '.$grupo->name.' | Short Name: '.$grupo->group.'';

        RegBitacora::SetBitacora('HardDelete', $nombreoperador, 'Administracion de Grupos', 'Group: '.$grupo->group, $note);

        return redirect('/grouplist');
    }

    public function confirmdestroy($id) {
        $grupo = Grupo::find($id);

        $data = array(
                          'title' => "Verificar Eliminacion de Grupo ID: $id",
                          'icon' => 'group_work',
                          'message' => "El grupo con la siguiente información esta a punto de ser Borrrado Definitivamente: </br></br> <strong>Nombre:</strong> $grupo->name </br> <strong>Grupo:</strong> $grupo->group </br></br> Esta acción es de carácter definitivo, el grupo sera borrado de la base de datos de grupos y no se podrá volver a usar, sin embargo los usuarios que pertenezcan al grupo no serán afectados ni cambiaran sus propiedades pero deberán ser asignados a un nuevo grupo que administre la aplicación relacionada con el grupo borrado o el funcionamiento de los usuarios dentro de dicha aplicación no sera la correcta.  Solo debe de borrar un grupo si se esta seguro de que esto es lo que se desea hacer.",
                          'cancel' => 'back',
                          'confirm' => "/groupdestroy/$id",
                          'delete' => 'Borrar Usuario',
                          'deleteicon' => 'delete_forever',
                        );


        return \View::make('utils.confirmbasic', compact('data'));
    }

}
