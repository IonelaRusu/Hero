<?php

namespace App\Players\Villains;

use App\Players\AbstractPlayerFactory;
use App\Players\Player;

class VillainFactory extends AbstractPlayerFactory
{
    public function getPlayer(string $playerName): ?Player
    {
        if ($playerName === null) {
            return null;
        }

        if ($playerName === "Beast") {
            return new Beast();
        }

        return null;
    }
}