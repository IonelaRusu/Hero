<?php

namespace App\Skills\Defence;

use App\Skills\AbstractSkillFactory;
use App\Skills\Skill;

/**
 * Class DefenceSkillFactory
 * @package App\Skills\Defence
 */
class DefenceSkillFactory extends AbstractSkillFactory
{
    /**
     * @param string $skillName
     *
     * @return Skill|null
     */
    public function getSkill(string $skillName): ?Skill
    {
        if ($skillName === null) {
            return null;
        }

        if ($skillName === "MagicShield") {
            return new MagicShield();
        }

        return null;
    }
}
