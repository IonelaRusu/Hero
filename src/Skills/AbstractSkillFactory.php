<?php

namespace App\Skills;

abstract class AbstractSkillFactory
{
    abstract public function getSkill(string $skillName): ?Skill;
}