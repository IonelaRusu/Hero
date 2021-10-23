<?php

namespace App\Skills\Defence;

use App\Skills\AbstractSkillFactory;
use App\Skills\Skill;

class DefenceSkillFactory extends AbstractSkillFactory
{
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
