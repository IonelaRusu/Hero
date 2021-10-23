<?php

namespace App\Players\Heroes;

use App\Stats;

/**
 * Class Orderus
 * @package App\Players\Heroes
 */
class Orderus extends Hero
{
    public function __construct()
    {
        parent::__construct();
        $this->name = "Orderus";
        $this->stats = new Stats(ORDERUS_STATS);
        $this->skills = $this->generateSkills(ORDERUS_SKILLS);
    }
}