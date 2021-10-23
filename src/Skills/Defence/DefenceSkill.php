<?php

namespace App\Skills\Defence;

use App\Skills\Skill;

/**
 * Class DefenceSkill
 * @package App\Skills\Defence
 */
abstract class DefenceSkill extends Skill
{
    /**
     * DefenceSkill constructor.
     */
    protected function __construct()
    {
        $this->type = "defence";
    }
}