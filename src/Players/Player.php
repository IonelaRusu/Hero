<?php

namespace App\Players;

use App\Stats;

abstract class Player
{
    protected string $name;
    protected string $type;
    protected Stats $stats;

    abstract public function attack(): int;

    public function defend(int $damage): int
    {
        $newHealth = $this->getStats()->getHealth() - $damage;
        $this->getStats()->setHealth($newHealth);
    }

    public function lose(): string
    {
        return $this->name . " wins!";
    }

    public function win(): string
    {
        return $this->name . " loses!";
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }
}