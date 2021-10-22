<?php

namespace App\Strategies;

use App\Players\Heroes\Hero;
use App\Players\Villains\Villain;

interface StartStrategy
{
    public function getPlayersOrder(Hero $heroPlayer, Villain $villainPlayer): array;
}
