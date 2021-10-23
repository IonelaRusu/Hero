<?php

namespace App\Skills;
use App\Round;

abstract class Skill
{
    protected int $chance;
    protected string $type;
    protected string  $name;

    abstract public function effect(Round $round): int;

    /**
     * @return int
     */
    public function getChance(): int
    {
        return $this->chance;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Skill
     */
    public function setType(string $type): Skill
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Skill
     */
    public function setName(string $name): Skill
    {
        $this->name = $name;

        return $this;
    }


}