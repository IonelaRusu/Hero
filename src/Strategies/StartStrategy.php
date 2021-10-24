<?php
declare(strict_types = 1);

namespace App\Strategies;

use App\Players\Player;

interface StartStrategy
{
    public function getPlayersOrder(Player $heroPlayer, Player $villainPlayer): array;
}
