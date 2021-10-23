<?php

namespace App\Players\Villains;

use App\Players\AbstractPlayerFactory;
use App\Players\Player;

/**
 * Class VillainFactory
 * @package App\Players\Villains
 */
class VillainFactory extends AbstractPlayerFactory
{
    /**
     * @param string $playerName
     *
     * @return Player|null
     */
    public function getPlayer(string $playerName): ?Player
    {
        if ($playerName === null) {
            return null;
        }

        if ($playerName === Beast::BEAST_NAME) {
            return new Beast();
        }

        return null;
    }
}