<?php

namespace App;

/**
 * SlotGame - test task
 *
 * @author mikheil0
 */

use App\Resourses\Interfaces\IGame;

use App\Resourses\Board;
use App\Resourses\PayLine;
use App\Resourses\Payout;


class SlotGame implements IGame {
    private Board $board;
    private Payout $payout;
    
    private int $bet = 0;
    private int $winAmount = 0;
    

    public function __construct() {
        
    }
    
    public function setBet(int $bet):void {
        $this->bet = $bet;
    }
    
    public function getBet():int {
        return $this->bet;
    }
    
    public function getWin(): int {
        return $this->winAmount;
    }
    
    
    private function setWinAmount(int $winAmount): void {
        $this->winAmount = $winAmount;
    }
    

    public function play():bool {
        if ($this->bet) {
            //Please use to check test values from a task
            /*
            $this->board = new Board(['J', 'J', 'J', 'Q', 'K', 'cat', 'J', 'Q', 'monkey', 'bird', 'bird', 'bird', 'J', 'Q', 'A']);

            $this->board->setPayline(new PayLine([0, 3, 6, 9, 12]));
            $this->board->setPayline(new PayLine([1, 4, 7, 10, 13]));
            $this->board->setPayline(new PayLine([2, 5, 8, 11, 14]));
            $this->board->setPayline(new PayLine([0, 4, 8, 10, 12]));
            $this->board->setPayline(new PayLine([2, 4, 6, 10, 14]));
             * 
             */
            
            
            //using random values
            $this->board = new Board();

            $this->board->setPayline(new PayLine());
            $this->board->setPayline(new PayLine());
            $this->board->setPayline(new PayLine());
            $this->board->setPayline(new PayLine());
            $this->board->setPayline(new PayLine());
            
            
            $playResults = $this->board->getWinnings();
            
            //if we have winnings
            if (count($playResults)){
                $this->countPayout($playResults);
            }
            
            return true;
        }
        
        return false;
        
    }
    
    
    private function countPayout($winnings){
        $this->payout = new Payout();
        
        $this->payout->setBet($this->bet);
        $this->payout->setWinnings($winnings);
        
        $winningAmount = $this->payout->getWinningAmount();
        
        $this->setWinAmount($winningAmount);
    }


    public function getResult():array {
        $result = [];
        $result['board'] = $this->board->getBoardLine();
        $result['paylines'] = $this->board->getPaylines();
        $result['bet_amount'] = $this->getBet();
        $result['total_win'] = $this->getWin();
        
        return $result;
    }
    

    
}
