<?php 

use Illuminate\Support\Str;

if (! function_exists('menu_create_classic')) {
    function menu_create_classic($name, $icon = " ", $redirect = "/")
    {
        return '
        <li class="nav-item">
        <a class="nav-link" href="'. $redirect .'">
            <i class="fas '. $icon .'"></i>
            <span>'. $name .'</span></a>
        </li>
        ';
    }
}

if (! function_exists('menu_create_divider')) {
    function menu_create_divider()
    {
        return '
        <hr class="sidebar-divider">
        ';
    }
}

if (! function_exists('menu_create_title')) {
    function menu_create_title($title = " ")
    {
        return '
        <div class="sidebar-heading">
        '. $title .'
        </div>
        ';
    }
}


if (! function_exists('menu_create_dropdown')) {
    function menu_create_dropdown($title = "", $icon = "", $subtitle = "", $sub = [["OTHER", "OTHER/"], ["OTHER2", "OTHER2/"]])
    {
        $cat = "";
        $slug = Str::random(8);

        foreach ($sub as $items) 
        {
            $cat .= ' <a class="collapse-item" href="'. $items[1] .'">'. $items[0] .'</a>';
        }
        return '
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#'. $slug .'"
            aria-expanded="true" aria-controls="'. $slug .'">
            <i class="fas '. $icon .'"></i>
            <span>'. $title .'</span>
        </a>
        <div id="'. $slug .'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">'. $subtitle .'</h6>
                '. $cat .'
            </div>
            </div>
        </li>
        ';
    }
}





