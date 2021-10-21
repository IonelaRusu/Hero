<?php

namespace App;

use App\Strategies\StartStrategy;

class Game
{
    protected StartStrategy $strategy;
    protected Battle $battle;
    protected PlayerFactory $playerFactory;

    public function __construct(StartStrategy $strategy)
    {
        $this->strategy = $strategy;
        $this->playerFactory = new PlayerFactory();
    }

    public function setStrategy(StartStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getThePlayersOrder(): array
    {
        return $this->strategy->getPlayersOrderStrategy();
    }

    public function start($playersOrder)
    {
        $firstPlayer = $this->playerFactory->getPlayer($playersOrder[0]);
        $secondPlayer = $this->playerFactory->getPlayer($playersOrder[1]);
        $this->battle = new Battle($firstPlayer, $secondPlayer);
        $this->battle->fight();
    }
}