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
        $this->health = rand($intervalLimits['health']['min'], $intervalLimits['health']['max']);
        $this->strength = rand($intervalLimits['strength']['min'], $intervalLimits['health']['max']);;
        $this->defence = rand($intervalLimits['defence']['min'], $intervalLimits['health']['max']);;
        $this->speed = rand($intervalLimits['speed']['min'], $intervalLimits['health']['max']);;
        $this->luck = rand($intervalLimits['luck']['min'], $intervalLimits['health']['max']);;
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

}