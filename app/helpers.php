<?php 



use Illuminate\Support\Str;

if (! function_exists('menu_create_classic')) {
    function menu_create_classic($name, $icon = " ", $redirect = "/")
    {
        $active = "";
        if(str_contains(url()->current(), $redirect))
            {
                $active .= "active";
            }
        return '
        <li class="nav-item '. $active .'">
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
        $active = "";
        $activeurl = "";
        $show = "";
        foreach($sub as $items)
        {
            if(str_contains(url()->current(), $items[1]))
            {
                $active .= "active";
                $show .= "show";
                $activeurl = $items[1];
                break;
            }
        }
        $cat = "";
        $slug = str_replace(" ", "_", $title). Str::random(2);

        foreach ($sub as $items) 
        {
            if($items[1] == $activeurl){
                $cat .= ' <a class="collapse-item active" href="'. $items[1] .'">'. $items[0] .'</a>';
            }
            else 
            {
                $cat .= ' <a class="collapse-item" href="'. $items[1] .'">'. $items[0] .'</a>';
            }
           
        }
        return '
        <li class="nav-item '. $active .'">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#'. $slug .'"
            aria-expanded="true" aria-controls="'. $slug .'">
            <i class="fas '. $icon .'"></i>
            <span>'. $title .'</span>
        </a>
        <div id="'. $slug .'" class="collapse '. $show .'" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">'. $subtitle .'</h6>
                '. $cat .'
            </div>
            </div>
        </li>
        ';
    }
}





