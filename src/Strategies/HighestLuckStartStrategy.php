<?php
declare(strict_types=1);

namespace App\Strategies;

use App\Players\Player;

class HighestLuckStartStrategy implements StartStrategy
{
    public function getPlayersOrder(Player $heroPlayer, Player $villainPlayer): array
    {
        $heroPlayerLuck = $heroPlayer->getStats()->getLuck();
        $villainPlayerLuck = $villainPlayer->getStats()->getLuck();

        if ($heroPlayerLuck === $villainPlayerLuck) {
            return [];
        }

        if ($heroPlayerLuck > $villainPlayerLuck) {
            return ["order" => ["first" => $heroPlayer, "second" => $villainPlayer]];
        } else {
            return ["order" => ["first" => $villainPlayer, "second" => $heroPlayer]];
        }
    }
}