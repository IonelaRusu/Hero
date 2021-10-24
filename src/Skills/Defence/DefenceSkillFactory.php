<?php
declare(strict_types = 1);

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
     * @param string|null $skillName
     *
     * @return Skill|null
     */
    public function getSkill(?string $skillName): ?Skill
    {
        if ($skillName === null) {
            return null;
        }

        if ($skillName === MagicShield::MAGIC_SHIELD_NAME) {
            return new MagicShield();
        }

        return null;
    }
}
