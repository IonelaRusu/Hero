<?php
declare(strict_types = 1);

namespace App\Skills\Attack;

use App\Battle\Round;

/**
 * Class RapidStrike
 * @package App\Skills\Attack
 */
class RapidStrike extends AttackSkill
{
    const RAPID_STRIKE_NAME = 'RapidStrike';

    /**
     * RapidStrike constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = self::RAPID_STRIKE_NAME;
        $this->chance = ALL_SKILLS["attack"][0]["chance"];
    }

    /**
     * @param Round $round
     *
     * @return int
     */
    public function getEffect(Round $round): int
    {
        return 2 * $round->getAttacker()->getStats()->getStrength();
    }
}