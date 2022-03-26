<?php

namespace App\Resourses\Interfaces;


interface IGame {
    
    public function setBet(int $bet):void;
    public function getBet():int;
    public function play():bool;
    public function getWin():int;
    
    
}
