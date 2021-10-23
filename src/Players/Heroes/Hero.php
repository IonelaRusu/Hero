<?php

namespace App\Players\Heroes;

use App\Players\Player;

abstract class Hero extends Player
{
    public function __construct()
    {
        $this->type = 'Hero';
    }
}