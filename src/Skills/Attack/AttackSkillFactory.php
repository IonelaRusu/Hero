<?php
declare(strict_types = 1);

namespace App\Skills\Attack;

use App\Skills\AbstractSkillFactory;
use App\Skills\Skill;

class AttackSkillFactory extends AbstractSkillFactory
{
    /**
     * @param string|null $skillName
     *
     * @return Skill|null
     */
    public function getSkill(?string $skillName): ?Skill
    {
        if ($skillName === null) {
            return null;
        }

        if ($skillName === RapidStrike::RAPID_STRIKE_NAME) {
            return new RapidStrike();
        }

        return null;
    }
}