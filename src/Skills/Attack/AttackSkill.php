<?php

namespace App\Skills\Attack;

use App\Skills\Skill;

/**
 * Class AttackSkill
 * @package App\Skills\Attack
 */
abstract class AttackSkill extends Skill
{
    /**
     * AttackSkill constructor.
     */
    protected function __construct()
    {
        $this->type = "attack";
    }
}