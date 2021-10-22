<?php

namespace App\Strategies;

use App\Players\Heroes\Hero;
use App\Players\Villains\Villain;

class HighestLuckStartStrategy implements StartStrategy
{
    public function getPlayersOrder(Hero $heroPlayer, Villain $villainPlayer): array
    {
        if ($heroPlayer->getStats()->getLuck() === $villainPlayer->getStats()->getLuck()) {
            return [];
        }

        if ($heroPlayer->getStats()->getLuck() > $villainPlayer->getStats()->getLuck()) {
            return ['order' => ['first' => $heroPlayer, 'second' => $villainPlayer]];
        } else {
            return ['order' => ['first' => $villainPlayer, 'second' => $heroPlayer]];
        }
    }
}