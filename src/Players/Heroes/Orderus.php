<?php
declare(strict_types = 1);

namespace App\Players\Heroes;

use App\Players\Stats;

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