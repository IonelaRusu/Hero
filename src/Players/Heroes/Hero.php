<?php

namespace App\Players\Heroes;

use App\Players\Player;

/**
 * Class Hero
 * @package App\Players\Heroes
 */
abstract class Hero extends Player
{
    /**
     * Hero constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->type = "Hero";
    }
}