<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewList()
    {
        return view('users.list');
    }

    public function viewAdd()
    {
        return view('users.add');
    }

    public function viewEdit()
    {
        return view('users.edit');
    }

}
