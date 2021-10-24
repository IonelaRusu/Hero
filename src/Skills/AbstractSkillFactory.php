<?php
declare(strict_types = 1);

namespace App\Skills;

/**
 * Class AbstractSkillFactory
 * @package App\Skills
 */
interface AbstractSkillFactory
{
    /**
     * @param string $skillName
     *
     * @return Skill|null
     */
     public function getSkill(string $skillName): ?Skill;
}