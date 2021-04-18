<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasesController extends Controller
{
    public function viewList($mod)
    {
        $cards = $this->getList($mod);
        return view('cases.list')
        ->with('cards', $cards);
    }

    public function viewAdd()
    {
        return view('cases.add');
    }

    public function viewEdit($mod, $id)
    {
        $card = $this->getCardWithModAndId($mod, $id);
        return view('cases.edit')
        ->with('card', $card);
    }

    private function getList($mod)
    {
        $cardsTable = DB::table('cards')->where('game', '=', $mod)->get();
        return $cardsTable;
        
    }

    private function getCardWithModAndId($mod, $id)
    {
        $card = DB::table('cards')->where('game', '=', $mod)->where('id', '=', $id)->first();
        return $card;
    }



}
