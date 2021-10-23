<?php

namespace App\Skills\Attack;

use App\Round;

class RapidStrike extends AttackSkill
{
    public function __construct()
    {
        parent::__construct();
        $this->name = ALL_SKILLS["attack"][0]["name"];
        $this->chance = ALL_SKILLS["attack"][0]["chance"];
    }

    public function effect(Round $round): int
    {
        return 2 * $round->getAttacker()->getStats()->getStrength();
    }
}