<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class viewblank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:viewblank {page}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new blank with nav, footer, css, etc...';

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
        // copy ( string $source , string $dest , resource $context = ? ) : bool
        $directory = $this->argument('page');
        $dir = substr($directory, 0, strrpos($directory, "\\"));
        if(!file_exists(App::resourcePath('views/'.$dir)))
        {  
           mkdir(App::resourcePath('views/'.$dir), 0777, true); 
        }

       $result = copy(App::resourcePath('views\pattern.blade.php'), App::resourcePath('views\\'. $directory . '.blade.php'));
       $this->comment("<fg=green>View '". $directory .".blade.php' Created</>");
       return $result;
    }

}
