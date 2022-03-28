<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SlotGame;

const NOBETTEXT = 'Please set a bet';


class slotmachineCommand extends Command {

    protected $signature = 'slotmachine';
    protected $description = 'Plays slot machine';
    
    public function handle(SlotGame $game) {
        $game->setBet(100);
        
        if ($game->play()){
            $result = $game->getResult();
            
            $this->info(json_encode($result, JSON_PRETTY_PRINT));
        } else {
            $this->info(json_encode(NOBETTEXT, JSON_PRETTY_PRINT));
        }
        
    }

}
