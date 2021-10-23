<?php

namespace App\Skills;
use App\Round;

/**
 * Class Skill
 * @package App\Skills
 */
abstract class Skill
{
    /**
     * @var int
     */
    protected int $chance;
    /**
     * @var string
     */
    protected string $type;
    /**
     * @var string
     */
    protected string  $name;

    /**
     * @param Round $round
     *
     * @return int
     */
    abstract protected function effect(Round $round): int;

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