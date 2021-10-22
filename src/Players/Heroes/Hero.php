<?php

namespace App\Players\Heroes;

use App\Stats;

abstract class Hero
{
    protected string $name;
    protected string $type;
    protected Stats $stats;

    public function __construct()
    {
        $this->type = 'Hero';
    }

    abstract protected function attack(): int;

    abstract protected function defend(): int;

    protected function lose(): string
    {
        return $this->name . " wins!";
    }

    protected function win(): string
    {
        return $this->name . " loses!";
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }
}