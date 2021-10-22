<?php

namespace App\Players\Heroes;

use App\Players\AbstractPlayerFactory;

class HeroFactory extends AbstractPlayerFactory
{
    public function getPlayer(string $playerName): ?Hero
    {
        if ($playerName === null) {
            return null;
        }

        if ($playerName === 'Orderus') {
            return new Orderus();
        }

        return null;
    }
}