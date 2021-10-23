<?php

namespace App\Players\Villains;

use App\Players\Player;
use App\Stats;

abstract class Villain extends Player
{
    public function __construct()
    {
        $this->type = 'Villain';
    }
}