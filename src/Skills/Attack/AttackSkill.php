<?php

namespace App\Skills\Attack;

use App\Skills\Skill;

abstract class AttackSkill extends Skill
{
    public function __construct()
    {
        $this->type = 'attack';
    }
}