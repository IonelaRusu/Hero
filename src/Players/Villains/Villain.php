<?php

namespace App\Players\Villains;

use App\Players\Player;

/**
 * Class Villain
 * @package App\Players\Villains
 */
abstract class Villain extends Player
{
    const VILLAIN_TYPE = 'Villain';

    /**
     * Villain constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->type = self::VILLAIN_TYPE;
    }
}