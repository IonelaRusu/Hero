<?php

namespace App;

class Stats
{
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

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

    /**
     * @param int $strength
     *
     * @return Stats
     */
    public function setStrength(int $strength): Stats
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * @param int $defence
     *
     * @return Stats
     */
    public function setDefence(int $defence): Stats
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * @param int $speed
     *
     * @return Stats
     */
    public function setSpeed(int $speed): Stats
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @param int $luck
     *
     * @return Stats
     */
    public function setLuck(int $luck): Stats
    {
        $this->luck = $luck;

        return $this;
    }

}