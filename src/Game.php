<?php

namespace App;

use App\Players\FactoryProducer;
use App\Players\Heroes\Hero;
use App\Players\Villains\Villain;
use App\Strategies\HighestLuckStartStrategy;
use App\Strategies\HighestSpeedStartStrategy;
use App\Strategies\StartStrategy;

class Game
{
    protected FactoryProducer $factoryProducer;
    protected Battle $battle;
    protected ?Hero $heroPlayer;
    protected ?Villain $villainPlayer;

    public function __construct()
    {
        $this->factoryProducer = new FactoryProducer();
    }



//    public function start($playersOrder)
//    {
//        $firstPlayer = $this->playerFactory->getPlayer($playersOrder[0]);
//        $secondPlayer = $this->playerFactory->getPlayer($playersOrder[1]);
//        $this->battle = new Battle($firstPlayer, $secondPlayer);
//        $this->battle->fight();
//    }

    public function start() {
        $this->createPlayers();
        $this->initiateBattle();
    }

    private function createPlayers() {
        $heroPlayerFactory =  $this->factoryProducer->getFactory('Hero');
        $this->heroPlayer = $heroPlayerFactory->getPlayer('Orderus');
        //check if null and throw error

        $villainPlayerFactory = $this->factoryProducer->getFactory('Villain');
        $this->villainPlayer = $heroPlayerFactory->getPlayer('Beasts');
        //check if null and throw error
    }

    public function initiateBattle()
    {
        $battle = new Battle($this->heroPlayer, $this->villainPlayer, new HighestSpeedStartStrategy());
        $playersOrder = $battle->getThePlayersOrder();

        if (empty($playersOrder)) {
            $battle->setStrategy(new HighestLuckStartStrategy());
        }

        //check if still no players order, throw error

    }
}