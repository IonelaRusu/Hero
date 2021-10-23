<?php

namespace App\Players;

use App\Players\Heroes\HeroFactory;
use App\Players\Villains\VillainFactory;

/**
 * Class PlayerFactoryProducer
 * @package App\Players
 */
class PlayerFactoryProducer
{
    /**
     * @param $playerType
     *
     * @return AbstractPlayerFactory
     */
    public function getFactory($playerType): AbstractPlayerFactory
    {
        if ($playerType === "Hero") {
            return new HeroFactory();
        } else {
            return new VillainFactory();
        }
    }
}