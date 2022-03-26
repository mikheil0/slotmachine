<?php

namespace App\Resourses;

/**
 * Board class compares boardline with a paylines and returns winning matches
 *
 * @author mikheil0
 */


class Board {
    
    private const BOARDSYMBOLS = ['9', '10', 'J', 'Q', 'K', 'A', 'cat', 'dog', 'monkey', 'bird'];
    private const BOARDMATRIX = [0, 3, 6, 9, 12, 1, 4, 7, 10, 13, 2, 5, 8, 11, 14];
    
    private array $boardline = [];
    private array $paylines = [];
    private array $winnings = [];

    public function __construct(array $boardline = null) {
        if ($boardline){
            $this->boardline = $boardline;
        } else {
            $this->boardline = $this->generateBoard();
        }
    }
    
    
    public function getBoardLine():array {
        return $this->boardline;
    }
    
    public function getPaylines(): array {
        return $this->paylines;
    }
    
    
    public function getWinnings(): array {
        return $this->winnings;
    }
   

    public function setPayline(PayLine $payline): void {
        $combination = $payline->getCombination();
        
        $matches = $this->checkWinningMatches($combination);
        
        //if matches more then two symbols - winning
        if ($matches > 2) {
            $this->paylines[] = [$combination, $matches];
            $this->winnings[] = $matches;
        }
        
    }
    
        
    
    private function checkWinningMatches($payline):int {
        //transform matrix to standard array sequence
        $matrix = array_flip(self::BOARDMATRIX);
        
        foreach ($payline as $value) {
            $n = $matrix[$value];
            
            $boardline = $this->getBoardLine();
            //adding board values to array
            $boardPaylineValues[] = $boardline[$n];
        }
        
        
        //counting same values
        $sameValues = array_count_values($boardPaylineValues);
        //sorting desc by values
        arsort($sameValues);
        //getting only values
        $values = array_values($sameValues);
        //first = maximum matches
        $maxValue = array_shift($values);
        
        return $maxValue;
        
    }
    
    private function generateBoard():array {
        $ar = [];
        $symbCount = count(self::BOARDSYMBOLS) - 1;
        
        for ($i = 0; $i <= 14; $i++){
            $ar[] = self::BOARDSYMBOLS[rand(0, $symbCount)];
        }
        
        return $ar;
        
    }
    
    
}
