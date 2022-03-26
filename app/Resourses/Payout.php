<?php

namespace App\Resourses;

/**
 * Payout classs gets a list of winnings and returns Payout sum
 *
 * @author mikheil0
 */



class Payout {
    private int $bet;
    private array $winnings;
    private int $payout = 0;
    
    const WINNINGRULES = [
        3 => 0.2,
        4 => 2,
        5 => 10
    ];


    public function __construct() {
        
    }
    
    public function setBet(int $bet): void {
        $this->bet = $bet;
    }

        
    public function setWinnings(array $winnings): void {
        $this->winnings = $winnings;
    }
    
    public function getWinningAmount(): int {
        
        foreach ($this->winnings AS $matchCount){
            
            $this->payout+= $this->bet * self::WINNINGRULES[$matchCount];
        }
        
        
        return $this->payout;
    }
    
    
}
