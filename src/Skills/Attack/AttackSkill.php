<?php

namespace App\Skills\Attack;

use App\Skills\Skill;

/**
 * Class AttackSkill
 * @package App\Skills\Attack
 */
abstract class AttackSkill extends Skill
{
    const ATTACK_TYPE = 'attack';

    /**
     * AttackSkill constructor.
     */
    protected function __construct()
    {
        $this->type = self::ATTACK_TYPE;
    }
}