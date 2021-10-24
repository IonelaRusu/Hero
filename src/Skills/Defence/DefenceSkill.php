<?php
declare(strict_types = 1);

namespace App\Skills\Defence;

use App\Skills\Skill;

/**
 * Class DefenceSkill
 * @package App\Skills\Defence
 */
abstract class DefenceSkill extends Skill
{
    const DEFENCE_TYPE = 'defence';

    /**
     * DefenceSkill constructor.
     */
    protected function __construct()
    {
        $this->type = self::DEFENCE_TYPE;
    }
}