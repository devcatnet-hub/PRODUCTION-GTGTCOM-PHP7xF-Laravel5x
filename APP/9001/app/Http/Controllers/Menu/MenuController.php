<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Menu;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Menu\MainMenuFormRequest;
use App\Http\Requests\Menu\SubMenuFormRequest;
use RegBitacora;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $grupo = Grupo::orderBy('id', 'asc')
                      ->get();
        return view('auth.menu.list', compact('grupo'));
    }

    public function mainmenus($group)
    {
        $menu = Menu::where('group', '=', $group)
                      ->where('parent', '=', 0)
                      ->orderBy('order', 'asc')
                      ->get();
        return view('auth.menu.mainmenu', compact('menu'))->with('group', $group);
    }

    public function submenus($id)
    {
        $submenu = Menu::where('parent', '=',$id)
                    ->orderBy('order', 'asc')
                    ->get();
        $menu = Menu::find($id);
        return view('auth.menu.submenu', compact('submenu', 'menu'));
    }

    public function editmainmenus(MainMenuFormRequest $request)
    {

        if ($request->action=='update'){

              $menu = Menu::find($request->id);
              $menu->icon = $request->icon;
              $menu->title = $request->title;
              $menu->link = $request->link;
              $menu->order = $request->order;
              $menu->enabled = $request->enabled;
              $menu->save();
              $ruta = '/menumainmenus/'.$request->group;

              RegBitacora::SetBitacora('Update Main Menu', $request->author, 'Administracion de Grupos', 'MainMenu: '.$request->title, 'Note: Null');

              return redirect($ruta);

        }
        elseif($request->action=='save'){

              $menu = new Menu;
              $menu->icon = $request->icon;
              $menu->title = $request->title;
              $menu->link = $request->link;
              $menu->order = $request->order;
              $menu->enabled = $request->enabled;
              $menu->group = $request->group;
              $menu->parent = $request->parent;
              $menu->save();
              $ruta = '/menumainmenus/'.$request->group;

              RegBitacora::SetBitacora('New Main Menu', $request->author, 'Administracion de Grupos', 'MainMenu: '.$request->title, 'Note: Null');

              return redirect($ruta);

        }
    }

    public function editsubmenus(SubMenuFormRequest $request)
    {

        if ($request->action=='update'){

              $menu = Menu::find($request->id);
              $menu->title = $request->title;
              $menu->link = $request->link;
              $menu->order = $request->order;
              $menu->enabled = $request->enabled;
              $menu->save();
              $ruta = '/menusubmenu/'.$request->idparent;

              RegBitacora::SetBitacora('Update Sub Menu', $request->author, 'Administracion de Grupos', 'SubMenu: '.$request->title, 'Note: Null');

              return redirect($ruta);

        }
        elseif($request->action=='save'){

              $menu = new Menu;
              $menu->icon = $request->icon;
              $menu->title = $request->title;
              $menu->link = $request->link;
              $menu->order = $request->order;
              $menu->enabled = $request->enabled;
              $menu->group = $request->group;
              $menu->parent = $request->parent;
              $menu->save();
              $ruta = '/menusubmenu/'.$request->parent;

              RegBitacora::SetBitacora('New Sub Menu', $request->author, 'Administracion de Grupos', 'SubMenu: '.$request->title, 'Note: Null');

              return redirect($ruta);

        }
    }

    /*public function confirm(Request $request)
    {
        $submenu = Menu::where('parent', '=',$request->id)
                    ->get();
        $menu = Menu::find($request->id);

        if (sizeof($submenu) == 0){
            return view('auth.menu.confirm', compact('submenu', 'menu'))->with('sonless', 'NOesPadre');
        }else{
            return view('auth.menu.confirm', compact('submenu', 'menu'))->with('sons', 'esPadre');
        }
    }*/

    public function confirm(Request $request)
    {
        $submenu = Menu::where('parent', '=', $request->id)
                    ->get();
        $menu = Menu::find($request->id);

        if (sizeof($submenu) == 0) {
              $data = array(
                          'title' => "Verificar Borrado de Menu ID: $request->id",
                          'icon' => 'menu',
                          'message' => "El Menu con la siguiente información esta a punto de ser Borrrado Definitivamente: </br></br> <strong>Nombre:</strong> $menu->title </br> <strong>Grupo:</strong> $menu->group </br></br> Esta acción es de carácter definitivo, el menú sera borrado de la base de datos de menús y no se podrá volver a usar, solo realice esto si esta seguro de que es lo que desea hacer.",
                          'cancel' => 'back',
                          'confirm' => "/menudestroy/$request->id",
                          'delete' => 'Borrar Menu',
                          'deleteicon' => 'delete_forever',
                        );
          } else {
              $data = array(
                          'title' => "Verificar Borrado de Menu ID: $request->id",
                          'icon' => 'menu',
                          'message' => 'El Menú que esta tratando de eliminar cuenta con sub menús por lo que no se puede eliminar directamente, Cuando termine de eliminar estos sub menús se podrá eliminar el menú principal, recuerde que esta es una acción definitiva y no se puede revertir, solo se debe de realizar si ese esta seguro de que es lo que desea.',
                          'cancel' => 'back',
                          'confirm' => "null",
                          'delete' => ' ',
                          'deleteicon' => ' ',
                        );
          }

          return \View::make('utils.confirmbasic', compact('data'));
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        $nombreoperador = Auth::user()->username;

        RegBitacora::SetBitacora('Delete Menu', $nombreoperador, 'Administracion de Grupos', 'Menu: '.$menu->title, 'Note: Null');

        if ($menu->parent==0) {
            $ruta = '/menumainmenus/'.$menu->group;
            return redirect($ruta);
        }
        elseif ($menu->parent<>0){
            $ruta = '/menusubmenu/'.$menu->parent;
            return redirect($ruta);
        }
    }

    public function destroyline($id, $parent)
    {
        $menu = Menu::find($id);
        $menu->delete();
        $ruta = '/menusubmenu/'.$parent;
        return redirect($ruta);

    }
}
