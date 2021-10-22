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
    protected function attack(): int
    {
        // TODO: Implement attack() method.
    }

    protected function defend(): int
    {
        // TODO: Implement defend() method.
    }

    protected function lose(): string
    {
        // TODO: Implement lose() method.
    }

    protected function win(): string
    {
        // TODO: Implement win() method.
    }
}