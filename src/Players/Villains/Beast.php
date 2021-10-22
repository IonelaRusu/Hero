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

    public function getStats(): Stats
    {
        return $this->stats;
    }
}