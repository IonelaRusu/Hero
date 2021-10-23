<?php

namespace App\Skills\Defence;

use App\Round;

/**
 * Class MagicShield
 * @package App\Skills\Defence
 */
class MagicShield extends DefenceSkill
{
    /**
     * MagicShield constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = ALL_SKILLS["defence"][0]["name"];
        $this->chance = ALL_SKILLS["defence"][0]["chance"];
    }

    /**
     * @param Round $round
     *
     * @return int
     */
    public function effect(Round $round): int
    {

        return $round->getDamage() / 2;
    }
}