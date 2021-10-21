<?php

namespace App\Players;

abstract class Player
{
    protected string $name;

    public function __construct($name)
    {
        $this->name = $name;
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
}