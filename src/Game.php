<?php

namespace App;

use App\Players\FactoryProducer;
use App\Players\Heroes\Hero;
use App\Players\Player;
use App\Players\Villains\Villain;
use App\Strategies\HighestLuckStartStrategy;
use App\Strategies\HighestSpeedStartStrategy;

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
        $battle = new Battle(new HighestSpeedStartStrategy());
        $playersOrder = $battle->getPlayersOrderByStrategy($this->heroPlayer, $this->villainPlayer);

        if (empty($playersOrder)) {
            $battle->setStrategy(new HighestLuckStartStrategy());
            $playersOrder = $battle->getPlayersOrderByStrategy($this->heroPlayer, $this->villainPlayer);

            if (empty($playersOrder)) {
                //check if still no players order, throw error
            }
            $firstPlayer = $playersOrder['order']['first'];
            $secondPlayer = $playersOrder['order']['second'];

            $this->printGamePlayersOrder($firstPlayer, $secondPlayer);
            $battle->fight($firstPlayer, $secondPlayer);
        }
    }
    private function printGamePlayersOrder($firstPlayer, $secondPlayer) {

        if ($firstPlayer instanceof Player) {
            echo "First player is a" . $firstPlayer->getType() . " named " . $firstPlayer->getName();
        }
        if ($secondPlayer instanceof Player) {
            echo "Second player is a" . $firstPlayer->getType() . " named " . $firstPlayer->getName();
        }
    }
}