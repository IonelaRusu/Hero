<?php
declare(strict_types=1);

namespace App\Strategies;

use App\Players\Player;

class HighestSpeedStartStrategy implements StartStrategy
{
    public function getPlayersOrder(Player $heroPlayer, Player $villainPlayer): array
    {
        $heroPlayerSpeed = $heroPlayer->getStats()->getSpeed();
        $villainPlayerSpeed = $villainPlayer->getStats()->getSpeed();

        if ($heroPlayerSpeed === $villainPlayerSpeed) {
            return [];
        }

        if ($heroPlayerSpeed > $villainPlayerSpeed) {
            return ["order" => ["first" => $heroPlayer, "second" => $villainPlayer]];
        } else {
            return ["order" => ["first" => $villainPlayer, "second" => $heroPlayer]];
        }
    }
}