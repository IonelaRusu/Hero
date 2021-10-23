<?php

namespace App\Players;

use App\Players\Heroes\Hero;
use App\Players\Villains\Villain;
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
     * @return AbstractPlayerFactory|null
     */
    public function getFactory($playerType): ?AbstractPlayerFactory
    {
        if ($playerType === null) {
            return null;
        }

        if ($playerType === Hero::HERO_TYPE) {
            return new HeroFactory();
        }

        if ($playerType === Villain::VILLAIN_TYPE) {
            return new VillainFactory();
        }

        return null;
    }
}