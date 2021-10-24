<?php
declare(strict_types = 1);

namespace App\Skills\Defence;

use App\Battle\Round;
use Exception;

/**
 * Class MagicShield
 * @package App\Skills\Defence
 */
class MagicShield extends DefenceSkill
{
    const MAGIC_SHIELD_NAME = 'MagicShield';

    /**
     * MagicShield constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = self::MAGIC_SHIELD_NAME;
        $this->chance = ALL_SKILLS["defence"][0]["chance"];
    }

    /**
     * @param Round $round
     *
     * @return int
     */
    public function getEffect(Round $round): int
    {
        return (int)floor($round->getDamage() / 2);
    }
}