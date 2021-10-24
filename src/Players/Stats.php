<?php

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
     * @param $intervalLimits
     */
    public function __construct($intervalLimits)
    {
        $this->health = rand($intervalLimits["health"]["min"], $intervalLimits["health"]["max"]);
        $this->strength = rand($intervalLimits["strength"]["min"], $intervalLimits["strength"]["max"]);
        $this->defence = rand($intervalLimits["defence"]["min"], $intervalLimits["defence"]["max"]);
        $this->speed = rand($intervalLimits["speed"]["min"], $intervalLimits["speed"]["max"]);
        $this->luck = rand($intervalLimits["luck"]["min"], $intervalLimits["luck"]["max"]);
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
}