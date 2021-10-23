<?php

namespace App\Players\Villains;

use App\Players\Player;

abstract class Villain extends Player
{
    public function __construct()
    {
        parent::__construct();
        $this->type = "Villain";
    }
}