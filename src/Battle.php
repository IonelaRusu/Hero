<?php

namespace App;

use App\Players\Heroes\Hero;
use App\Players\Villains\Villain;
use App\Strategies\StartStrategy;

class Battle
{
    protected StartStrategy $strategy;
    protected Hero $heroPlayer;
    protected Villain $villainPlayer;

    public function __construct(Hero $heroPlayer, Villain $villainPlayer, StartStrategy $strategy)
    {
        $this->heroPlayer = $heroPlayer;
        $this->villainPlayer = $villainPlayer;
        $this->strategy = $strategy;
    }

    public function setStrategy(StartStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getThePlayersOrder(): array
    {
        return $this->strategy->getPlayersOrderStrategy($this->heroPlayer, $this->villainPlayer);
    }

    public function fight() {

    }
}