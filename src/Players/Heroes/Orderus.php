<?php

namespace App\Players\Heroes;

use App\Stats;

/**
 * Class Orderus
 * @package App\Players\Heroes
 */
class Orderus extends Hero
{
    const ORDERUS_NAME = "Orderus";

    /**
     * Orderus constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = self::ORDERUS_NAME;
        $this->stats = new Stats(ORDERUS_STATS);
        $this->skills = $this->generateSkills(ORDERUS_SKILLS);
    }
}