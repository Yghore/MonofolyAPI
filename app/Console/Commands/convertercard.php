<?php

namespace App\Console\Commands;

ini_set('memory_limit', '256');

use App\Models\Cards;
use Illuminate\Console\Command;

class convertercard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:converted';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert json card to db card';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $directory = $this->ask('JSON CARD Directory : ');
        $game = $this->ask('Game ? : ');
        for ($i=0; $i < 40; $i++) { 
            $this->comment("Carte n". $i);
            $path = $directory . "/Card_". $i . ".json";
            if(file_exists($path)){
            $file = file_get_contents($path);
                if($file != "ERROR_404")
                {
                    $json = json_decode($file, true);

                    $buttons = "";
                    $maxi = $json['Button_number'][0];
                    for ($ibutton =0; $ibutton < $maxi; $ibutton++) { 
                        if(isset($json['Button_'. ($ibutton + 1)][0]))
                        {
                            $buttons .= $json['Button_'. ($ibutton + 1)][0] . (($json['Button_number'][0] > $ibutton + 1) ? "," : "");
                        }
                    }
                    
                    Cards::create([
                        'game' => $game,
                        'case' => $i,
                        'n_case' => $json['Id'][0],
                        'quantity' => $json['quantity'][0],
                        'title' => $json['title'][0],
                        'desc_case' => $json['desc'][0],
                        'n_buttons' => $json['Button_number'][0],
                        'buttons' => $buttons,
                    ]);
                }
            }
        }
    }
}
