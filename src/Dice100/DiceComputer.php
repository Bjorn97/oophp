<?php
namespace bjan\Dice100;

use bjan\Dice100\DicePlayers;

/**
 * 
 */
class DiceComputer extends DicePlayers
{
    public function __construct()
    {
        
    }
    public function turn()
    {
        while (rand(1,4) != 1) {
            $this->roll();
        }
        $this->playerscore += $this->total;
        if ($this->playerscore >= 100) {
            return 3;
        }
    }
}
