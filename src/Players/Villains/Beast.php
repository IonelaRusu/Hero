<?php

namespace App\Players\Villains;

use App\Stats;

class Beast extends Villain
{
    public function __construct()
    {
        parent::__construct();
        $this->name = 'Beast';
        $this->stats = new Stats(BEAST_STATS);
    }

    public function attack(): int
    {
        // TODO: Implement attack() method.
    }
}