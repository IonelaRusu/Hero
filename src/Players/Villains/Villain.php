<?php

namespace App\Players\Villains;

use App\Stats;

abstract class Villain
{
    protected string $name;
    protected string $type;
    protected Stats $stats;

    public function __construct()
    {
        $this->type = 'Villain';
    }

    abstract protected function attack(): int;

    abstract protected function defend(): int;

    protected function lose(): string
    {
        // TODO: Implement lose() method.
    }

    protected function win(): string
    {
        // TODO: Implement win() method.
    }
}