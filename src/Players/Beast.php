<?php

namespace App\Players;

use App\Stats;

class Beast extends Player
{
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->stats = new Stats(BEAST_STATS);
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