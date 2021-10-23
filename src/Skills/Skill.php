<?php

namespace App\Skills;
use App\Round;

abstract class Skill
{
    protected int $chance;
    protected int $type;
    protected int $name;

    abstract public function effect(Round $round): int;

    /**
     * @return int
     */
    public function getChance(): int
    {
        return $this->chance;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getName(): int
    {
        return $this->name;
    }

}