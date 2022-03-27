<?php

namespace App\Resourses;

/**
 * PayLine Class generates random lines for a slot machine
 *
 * @author mikheil0
 */
use App\Resourses\Interfaces\IPayline;


class SlotPayLine implements IPayline {
    
    private array $payline = [];


    public function __construct(array $payline = null) {
        if (!$payline){
            $this->payline = $this->generateCombination();
        } else {
            $this->payline = $payline;
        }
        
    }
    
    public function getCombination():array {
        return $this->payline;
    }
    
    private function generateCombination():array {
        //random unique number array;
        $randomNumArray = range(0, 14);
        shuffle($randomNumArray);
        $array5 = array_slice($randomNumArray ,0,5);

        return $array5;
    }
    
    
    
    
    
}
