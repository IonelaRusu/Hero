<?php

namespace App\Skills\Defence;

use App\Skills\Skill;

abstract class DefenceSkill extends Skill
{
    public function __construct()
    {
        $this->type = 'defend';
    }
}