<?php

namespace App\Players\Heroes;

use App\Players\AbstractPlayerFactory;
use App\Players\Player;

/**
 * Class HeroFactory
 * @package App\Players\Heroes
 */
class HeroFactory extends AbstractPlayerFactory
{
    /**
     * @param string $playerName
     *
     * @return Player|null
     */
    public function getPlayer(string $playerName): ?Player
    {
        if ($playerName === null) {
            return null;
        }

        if ($playerName === "Orderus") {
            return new Orderus();
        }

        return null;
    }
}