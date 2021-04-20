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
        ->with([
            'cards' => $cards,
            'mod' => $mod,
        ]);
    }

    public function viewAdd($mod)
    {
        return view('cases.add')
        ->with('mod', $mod);
    }

    public function viewEdit($mod, $id)
    {
        $card = $this->getCardWithModAndId($mod, $id);
        return view('cases.edit')
        ->with('card', $card);
    }


    public function editCard(Request $request, string $mod, int $id)
    {

        $validated = $request->validate([
            'title' => 'required|max:20',
            'quantity' => 'required|max:6',
            'n_buttons' => 'required|integer|max:3|min:1',
            'button_1' => 'required|string|max:8',
            'desc_case' => 'required|string|max:150',
            'quantity' => 'required|max:6',
        ]);


        $data = $request->all();
        $formattedData['n_buttons'] = $data['n_buttons'];
        $formattedData['title'] = $data['title'];
        $formattedData['quantity'] = $data['quantity'];
        $buttons = "";
        for ($i=0; $i < $data['n_buttons']; $i++) { 
            if(isset($data['button_' . ($i + 1)]))
            {
                $buttons .= $data['button_'. ($i + 1)] . (($data['n_buttons'] > $i + 1) ? "," : "");
            }
            
        }
        $formattedData['buttons'] = $buttons;
        $formattedData['desc_case'] = $data['desc_case'];
        
        DB::table('cards')->where([['game', '=', $mod], ['id', '=', $id]])->update($formattedData);
        return redirect(route('cases.list', $mod))->withSuccess('La cases a été édité avec succès !');
    }


    public function addCard(Request $request, $mod)
    {
        $validated = $request->validate([
            'id' => 'required|integer|max:41',
            'n_case' => 'required|integer|max:8',
            'title' => 'required|max:20',
            'quantity' => 'required|max:6',
            'n_buttons' => 'required|integer|max:3|min:1',
            'button_1' => 'required|string|max:8',
            'desc_case' => 'required|string|max:150',
            'quantity' => 'required|max:6',
        ]);


        $data = $request->all();
        $formattedData['game'] = $mod;
        $formattedData['n_case'] = $data['n_case'];
        $formattedData['case'] = $data['id'];
        $formattedData['n_buttons'] = $data['n_buttons'];
        $formattedData['title'] = $data['title'];
        $formattedData['quantity'] = $data['quantity'];
        $buttons = "";
        for ($i=0; $i < $data['n_buttons']; $i++) { 
            if(isset($data['button_' . ($i + 1)]))
            {
                $buttons .= $data['button_'. ($i + 1)] . (($data['n_buttons'] > $i + 1) ? "," : "");
            }
            
        }
        $formattedData['buttons'] = $buttons;
        $formattedData['desc_case'] = $data['desc_case'];
        DB::table('cards')->insert($formattedData);
        return redirect(route('cases.list', $mod))->withSuccess('La cases a été ajouté avec succès !');
    }

    public function removeCard($id, $mod)
    {
        DB::table('cards')->delete($id);
        return redirect(route('cases.list', $mod))->withSuccess('La cases à bien été supprimé !');
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
