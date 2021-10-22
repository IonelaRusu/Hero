<?php

namespace App\Players\Heroes;

use App\Players\Player;
use App\Stats;

abstract class Hero extends Player
{
//    protected string $name;
//    protected string $type;
//    protected Stats $stats;

    public function __construct()
    {
        $this->type = 'Hero';
    }

//    abstract protected function attack(): int;
//
//    abstract protected function defend(): int;
//
//    protected function lose()
//    {
//        echo $this->name . " loses!";
//    }
//
//    protected function win()
//    {
//        echo $this->name . " wins!";
//    }
}