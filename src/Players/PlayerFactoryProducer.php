<?php

namespace App\Players;

use App\Players\Heroes\HeroFactory;
use App\Players\Villains\VillainFactory;

class PlayerFactoryProducer
{
    public function getFactory($playerType): AbstractPlayerFactory
    {
        if ($playerType === "Hero") {
            return new HeroFactory();
        } else {
            return new VillainFactory();
        }
    }
}