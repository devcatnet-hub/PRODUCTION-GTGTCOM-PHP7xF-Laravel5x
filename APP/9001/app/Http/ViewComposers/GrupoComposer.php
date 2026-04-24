<?php


namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\User as User;
use App\Grupo as Grupo;

class GrupoComposer {

    public function compose(View $view)
    {
        $grupo = Grupo::all();
        $view->with('grupo', $grupo);
    }

}
