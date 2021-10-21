<?php

namespace App;

use App\Players\Player;

class Battle
{
    protected Player $firstPlayer;
    protected Player $secondPlayer;

    public function __construct(Player $firstPlayer, Player $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    public function fight() {

    }
}