<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu');
    }
    public function menus(){
        $menu=Config::get('menu.links');
        return $menu;
    }
}
