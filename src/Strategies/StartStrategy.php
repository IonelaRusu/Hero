<?php

namespace App\Strategies;

use App\Players\Player;

interface StartStrategy
{
    public function getPlayersOrder(Player $heroPlayer, Player $villainPlayer): array;
}
