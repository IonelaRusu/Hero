<?php

namespace App\Players\Heroes;

use App\Players\Player;

/**
 * Class Hero
 * @package App\Players\Heroes
 */
abstract class Hero extends Player
{
    const HERO_TYPE = 'Hero';

    /**
     * Hero constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->type = self::HERO_TYPE;
    }
}