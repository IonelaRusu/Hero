<?php

namespace App\Players\Heroes;

use App\Stats;

class Orderus extends Hero
{
    public function __construct()
    {
        parent::__construct();
        $this->name = 'Orderus';
        $this->stats = new Stats(ORDERUS_STATS);
    }

    public function attack(): int
    {
//       return $this->stats->getStrength();
    }
}