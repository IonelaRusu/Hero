<?php

namespace App\Players\Villains;

use App\Players\Player;

/**
 * Class Villain
 * @package App\Players\Villains
 */
abstract class Villain extends Player
{
    /**
     * Villain constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->type = "Villain";
    }
}