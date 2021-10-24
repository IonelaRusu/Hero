<?php
declare(strict_types = 1);

namespace App\Strategies;

use App\Players\Player;

class HighestSpeedStartStrategy implements StartStrategy
{

    public function getPlayersOrder(Player $heroPlayer, Player $villainPlayer): array
    {
        if ($heroPlayer->getStats()->getSpeed() === $villainPlayer->getStats()->getSpeed()) {
            return [];
        }

        if ($heroPlayer->getStats()->getSpeed() > $villainPlayer->getStats()->getSpeed()) {
            return ["order" => ["first" => $heroPlayer, "second" => $villainPlayer]];
        } else {
            return ["order" => ["first" => $villainPlayer, "second" => $heroPlayer]];
        }
    }
}