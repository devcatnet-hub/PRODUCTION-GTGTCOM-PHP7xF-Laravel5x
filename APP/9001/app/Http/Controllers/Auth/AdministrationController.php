<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\PasswordFormRequest;
use App\Http\Requests\Auth\UpdateFormRequest;
use RegBitacora;


class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $user = User::where('status','<>','Borrado')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return view('auth.list', compact('user'));
    }

    public function listdelete()
    {
        $user = User::where('status','=','Borrado')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return view('auth.list', compact('user'))->with('userdelete', 'hola');
    }

    public function search($search, $searchterm)
    {

      $user = User::where($searchterm, 'like', '%'.$search.'%')
                                      ->orderBy('id', 'desc')
                                      ->get();

      return view('auth.list', compact('user'))->with('usersearch', 'hola');

    }

    public function softdelete($id, $author)
    {
      $user = User::find($id);
      $user->status = 'Borrado';
      $user->attrib = 'inactivo';
      $user->author = $author;
      $user->save();

      RegBitacora::SetBitacora('SoftDelete', $author, 'Administracion de Usuarios', 'User: '.$user->username, 'Note: Null'); 

      return redirect('/userslist');
    }

    public function active($id, $author)
    {
      $user = User::find($id);
      $user->attrib = 'activo';
      $user->status = 'Activo';
      $user->author = $author;
      $user->save();

      RegBitacora::SetBitacora('Active', $author, 'Administracion de Usuarios', 'User: '.$user->username, 'Note: Null');

      return redirect('/userslist');
    }

    public function inactive($id, $author)
    {
      $user = User::find($id);
      $user->attrib = 'inactivo';
      $user->status = 'Inactivo';
      $user->author = $author;

      RegBitacora::SetBitacora('Inactive', $author, 'Administracion de Usuarios', 'User: '.$user->username, 'Note: Null');

      $user->save();
      return redirect('/userslist');
    }

    public function softundelete($id, $author)
    {
      $user = User::find($id);
      $user->status = 'Undelete';
      $user->attrib = 'activo';
      $user->author = $author;
      $user->save();

      RegBitacora::SetBitacora('SoftUndelete', $author, 'Administracion de Usuarios', 'User: '.$user->username, 'Note: Null');

      return redirect('/userslist');
    }

    public function changepassword($id, $author)
    {
      return view('auth.passwords.change')->with('id', $id)->with('author', $author);
    }

    public function storepassword(PasswordFormRequest $request)
    {
        $user = User::find($request->id);
        $user->status = 'Reset Password';
        $user->author = $request->author;
        $user->password = Hash::make($request->password);
        $user->save();

        RegBitacora::SetBitacora('Change Password', $request->author, 'Administracion de Usuarios', 'User: '.$user->username, 'Note: Null');

        return redirect('/userslist');
    }

    public function logout()
    {
      auth()->logout();
      return redirect('/home');
    }

    public function show($id)
    {
        $user = User::find($id);
        return \View::make('auth.show', compact('user'));
    }

    public function update(UpdateFormRequest $request)
    {
        $user = User::find($request->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->group = $request->group;
        $user->status = $request->status;
        $user->author = $request->author;
        $user->save();

        RegBitacora::SetBitacora('Update', $request->author, 'Administracion de Usuarios', 'User: '.$user->username, 'Note: Null');

        return redirect('/userslist');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        $nombreoperador = Auth::user()->username;

        $note = 'Note: First Name: '.$user->fname.' | Last Name: '.$user->lname.' | Username: '.$user->username.' | Group: '.$user->group.' | E-Mail: '.$user->email;

        RegBitacora::SetBitacora('HardDelete', $nombreoperador, 'Administracion de Usuarios', 'User: '.$user->username, $note);

        return redirect('/userslist');
    }

    public function confirmdestroy($id) {
        $user = User::find($id);

        $data = array(
                          'title' => "Verificar Eliminacion de Usuario ID: $id",
                          'icon' => 'supervisor_account',
                          'message' => "El Usuario con los siguientes datos esta a punto de ser borrado: </br></br> <strong>Nombre:</strong> $user->fname $user->lname  </br> <strong>Username:</strong> $user->username </br> <strong>Grupo:</strong> $user->group </br> <strong>E-Mail:</strong> $user->email </br> <strong>Estado:</strong> $user->attrib </br></br> Esta acción es de carácter definitivo, el usuario sera borrado de la base de datos de usuarios y no se podrá volver a usar. Solo debe de borrar un usuario si se esta seguro de que esto es lo que se desea hacer.",
                          'cancel' => 'back',
                          'confirm' => "/userdestroy/$id",
                          'delete' => 'Borrar Usuario',
                          'deleteicon' => 'delete_forever',
                        );


        return \View::make('utils.confirmbasic', compact('data'));
    }

}
