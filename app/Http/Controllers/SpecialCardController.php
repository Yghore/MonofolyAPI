<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialCardController extends Controller
{
    public function viewList()
    {
        return view('specialcards.list');
    }

    public function viewAdd()
    {
        return view('specialcards.add');
    }

    public function viewEdit()
    {
        return view('specialcards.edit');
    }


    private function getList()
    {
        $cardsTable = DB::table('cards')->get();
        
    }

}
