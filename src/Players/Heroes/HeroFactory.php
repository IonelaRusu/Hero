<?php

namespace App\Players\Heroes;

use App\Players\AbstractPlayerFactory;
use App\Players\Player;

class HeroFactory extends AbstractPlayerFactory
{

    public function getPlayer(string $playerName): ?Player
    {
        if ($playerName === null) {
            return null;
        }

        if ($playerName === "Orderus") {
            return new Orderus();
        }
    }
}