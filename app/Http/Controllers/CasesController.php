<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function viewList()
    {
        return view('cases.list');
    }

    public function viewAdd()
    {
        return view('cases.add');
    }

    public function viewEdit()
    {
        return view('cases.edit');
    }
}
