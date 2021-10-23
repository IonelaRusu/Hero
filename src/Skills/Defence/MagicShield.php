<?php

namespace App\Skills\Defence;

use App\Stats;
use App\Round;

class MagicShield extends DefenceSkill
{
    public function __construct()
    {
        parent::__construct();
        $this->name = ALL_SKILLS["defence"][0]["name"];
        $this->chance = ALL_SKILLS["defence"][0]["chance"];
    }

    public function effect(Round $round): int
    {

        return $round->getDamage() / 2;
    }
}