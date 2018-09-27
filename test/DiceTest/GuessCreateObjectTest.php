<?php

namespace bjan\Dice100;

use bjan\Dice100\DicePlayers;
use PHPUnit\Framework\TestCase;

class GuessCreateObjectTest extends TestCase
{
    public function testempty()
    {
        $this->assertTrue(true);
    }
    
    public function testsetplayerroll()
    {
        $var = new DicePlayers();
        $this->assertEquals($var->getplayerroll(), $var->setplayerroll(5));
    }

    public function testgetplayerroll()
    {
        $var = new DicePlayers();
        $this->assertEquals($var->getplayerroll(), $var->setplayerroll(5));
    }
    
    public function testsetplayerscore()
    {
        $var = new DicePlayers();
        $this->assertEquals($var->getplayerscore(), $var->setplayerscore(5));
    }
    public function testgetplayerscore()
    {
        $var = new DicePlayers();
        $this->assertEquals($var->getplayerscore(), $var->setplayerscore(5));
    }
    public function testgettotal()
    {
        $var = new DicePlayers();
        $this->assertEquals($var->gettotal(), $var->setplayertotal(5));
    }
}
