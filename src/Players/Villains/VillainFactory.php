<?php

namespace App\Players\Villains;

use App\Players\AbstractPlayerFactory;

class VillainFactory extends AbstractPlayerFactory
{
    public function getPlayer(string $playerName): ?Villain
    {
        if ($playerName === null) {
            return null;
        }

        if ($playerName === 'Beast') {
            return new Beast();
        }

        return null;
    }
}