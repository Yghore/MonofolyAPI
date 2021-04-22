<?php

namespace App\Http\Controllers\Api;

use App\Models\Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $mod, int $id = -1)
    {
        $allCards = [];
        if($id == -1)
        {

            $cards = DB::table('cards')->where('game', '=', $mod)->get(['case as Case', 'n_case as Id', 'n_buttons as button_number', 'title', 'desc_case as desc', 'buttons', 'quantity'])->toArray();
            foreach ($cards as $card) {
                $buttons = explode(',', $card->buttons);
                switch ($card->button_number) {
                    case 1:
                        $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'quantity' => [$card->quantity],'Button_1' => [$buttons[0]],];
                        break;
                    case 2:
                        $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'quantity' => [$card->quantity],'Button_1' => [$buttons[0]],'Button_2' => [$buttons[1]]];
                        break;
                    case 3:
                        $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'quantity' => [$card->quantity],'Button_1' => [$buttons[0]],'Button_2' => [$buttons[1]],'Button_3' => [$buttons[2]]];
                        break;                   
                    default:
                    $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'quantity' => [$card->quantity],'Button_1' => [$buttons[0]],];
                        break;
                }

                array_push($allCards, $formattedcards);
                
                
            }
            return $allCards;
        }
        $cards = DB::table('cards')->where([['game', '=', $mod], ['case', '=', $id]])->get(['case as Case', 'n_case as Id', 'n_buttons as button_number', 'title', 'desc_case as desc', 'buttons'])->toArray();
        foreach ($cards as $card) {
            $buttons = explode(',', $card->buttons);
            switch ($card->button_number) {
                case 1:
                    $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'Button_1' => [$buttons[0]],];
                    break;
                case 2:
                    $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'Button_1' => [$buttons[0]],'Button_2' => [$buttons[1]]];
                    break;
                case 3:
                    $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'Button_1' => [$buttons[0]],'Button_2' => [$buttons[1]],'Button_3' => [$buttons[2]]];
                    break;                   
                default:
                $formattedcards = ['Case' => $card->Case,'Id' => [$card->Id],'Button_number' => [$card->button_number],'title' => [$card->title],'desc' => [$card->desc],'Button_1' => [$buttons[0]],];
                    break;
            }
            
            array_push($allCards, $formattedcards);
        }
        return $allCards;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function show(Cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cards $cards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cards  $cards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cards $cards)
    {
        //
    }
}
