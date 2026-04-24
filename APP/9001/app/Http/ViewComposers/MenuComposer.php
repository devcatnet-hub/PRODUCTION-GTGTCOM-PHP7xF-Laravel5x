<?php


namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\User as User;
use App\Menu as Menu;

class MenuComposer {

    public function compose(View $view)
    {
        $menu = Menu::orderBy('order', 'asc')->get();
        $view->with('menu', $menu);
    }

}
