<?php
declare(strict_types = 1);

namespace App\Strategies;

use App\Players\Player;

class HighestLuckStartStrategy implements StartStrategy
{
    public function getPlayersOrder(Player $heroPlayer, Player $villainPlayer): array
    {
        if ($heroPlayer->getStats()->getLuck() === $villainPlayer->getStats()->getLuck()) {
            return [];
        }

        if ($heroPlayer->getStats()->getLuck() > $villainPlayer->getStats()->getLuck()) {
            return ["order" => ["first" => $heroPlayer, "second" => $villainPlayer]];
        } else {
            return ["order" => ["first" => $villainPlayer, "second" => $heroPlayer]];
        }
    }
}