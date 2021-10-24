<?php
declare(strict_types = 1);

namespace App\Skills;

use App\Skills\Attack\AttackSkill;
use App\Skills\Attack\AttackSkillFactory;
use App\Skills\Defence\DefenceSkill;
use App\Skills\Defence\DefenceSkillFactory;

class SkillFactoryProducer
{
    /**
     * @param $skillType
     *
     * @return AbstractSkillFactory|null
     */
    public function getFactory($skillType): ?AbstractSkillFactory
    {
        if ($skillType === null) {
            return null;
        }

        if ($skillType === AttackSkill::ATTACK_TYPE) {
            return new AttackSkillFactory();
        }

        if ($skillType === DefenceSkill::DEFENCE_TYPE) {
            return new DefenceSkillFactory();
        }

        return null;
    }
}