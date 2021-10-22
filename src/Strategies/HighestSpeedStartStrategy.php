<?php

namespace App\Strategies;

use App\Players\Heroes\Hero;
use App\Players\Villains\Villain;

class HighestSpeedStartStrategy implements StartStrategy
{

    public function getPlayersOrder(Hero $heroPlayer, Villain $villainPlayer): array
    {
        if ($heroPlayer->getStats()->getSpeed() === $villainPlayer->getStats()->getSpeed()) {
            return [];
        }

        if ($heroPlayer->getStats()->getSpeed() > $villainPlayer->getStats()->getSpeed()) {
            return ['order' => ['first' => $heroPlayer, 'second' => $villainPlayer]];
        } else {
            return ['order' => ['first' => $villainPlayer, 'second' => $heroPlayer]];
        }
    }
}