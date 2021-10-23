<?php

namespace App\Skills;

use App\Skills\Attack\AttackSkillFactory;
use App\Skills\Defence\DefenceSkillFactory;

class SkillFactoryProducer
{
    /**
     * @param $skillType
     *
     * @return AbstractSkillFactory
     */
    public function getFactory($skillType): AbstractSkillFactory
    {
        if ($skillType === "attack") {
            return new AttackSkillFactory();
        }
        if ($skillType === "defence") {
            return new DefenceSkillFactory();
        }
    }
}