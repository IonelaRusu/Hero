<?php

namespace App\Players;

use App\Stats;

abstract class Player
{
    protected string $name;
    protected Stats $stats;


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
}