<?php

namespace App\Skills;

/**
 * Class AbstractSkillFactory
 * @package App\Skills
 */
abstract class AbstractSkillFactory
{
    /**
     * @param string $skillName
     *
     * @return Skill|null
     */
    abstract public function getSkill(string $skillName): ?Skill;
}