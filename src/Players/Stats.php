<?php
declare(strict_types = 1);

namespace App\Players;

/**
 * Class Stats
 * @package App
 */
class Stats
{
    /**
     * @var int
     */
    protected $health;

    /**
     * @var int
     */
    protected $strength;

    /**
     * @var int
     */
    protected $defence;

    /**
     * @var int
     */
    protected $speed;

    /**
     * @var int
     */
    protected $luck;

    /**
     * Stats constructor.
     *
     * @param $statsLimits
     */
    public function __construct($statsLimits)
    {
        $this->health = rand($statsLimits["health"]["min"], $statsLimits["health"]["max"]);
        $this->strength = rand($statsLimits["strength"]["min"], $statsLimits["strength"]["max"]);
        $this->defence = rand($statsLimits["defence"]["min"], $statsLimits["defence"]["max"]);
        $this->speed = rand($statsLimits["speed"]["min"], $statsLimits["speed"]["max"]);
        $this->luck = rand($statsLimits["luck"]["min"], $statsLimits["luck"]["max"]);
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param int $health
     *
     * @return Stats
     */
    public function setHealth(int $health): Stats
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return " Strength: {$this->strength}, Health: {$this->health}, Speed: {$this->speed}," .
            " Defence: {$this->defence}, Luck: {$this->luck} ";
    }
}