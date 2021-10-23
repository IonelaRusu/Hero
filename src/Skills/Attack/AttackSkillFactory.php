<?php

namespace App\Skills\Attack;

use App\Skills\AbstractSkillFactory;
use App\Skills\Skill;

class AttackSkillFactory extends AbstractSkillFactory
{
    public function getSkill(string $skillName): ?Skill
    {
        if ($skillName === null) {
            return null;
        }

        if ($skillName === "RapidStrike") {
            return new RapidStrike();
        }

        return null;
    }
}