<?php
declare(strict_types = 1);

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
     * @param string|null $playerType
     *
     * @return AbstractPlayerFactory|null
     */
    public function getFactory(?string $playerType): ?AbstractPlayerFactory
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