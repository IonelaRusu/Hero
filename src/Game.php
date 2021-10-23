<?php

namespace App;

use App\Players\PlayerFactoryProducer;
use App\Players\Heroes\Hero;
use App\Players\Player;
use App\Players\Villains\Villain;
use App\Strategies\HighestLuckStartStrategy;
use App\Strategies\HighestSpeedStartStrategy;
use Exception;
use Monolog\Logger;

class Game
{
    protected PlayerFactoryProducer $playerFactoryProducer;
    protected Battle                $battle;
    protected ?Hero                 $heroPlayer;
    protected ?Villain              $villainPlayer;
    protected Logger                $logger;

    public function __construct(Logger $logger)
    {
        $this->playerFactoryProducer = new PlayerFactoryProducer();
        $this->logger = $logger;
    }

    public function start()
    {
        $this->createPlayers();
        $this->initiateBattle();
    }

    private function createPlayers()
    {
        $heroPlayerFactory = $this->playerFactoryProducer->getFactory("Hero");
        $this->heroPlayer = $heroPlayerFactory->getPlayer("Orderus");
        //        if ($this->heroPlayer) {
        ////        //check if null and throw error
        ////            $this->logger->error("Hero player could not be crated");
        ////            throw new Exception("Hero player could not be crated");
        //        }

        $villainPlayerFactory = $this->playerFactoryProducer->getFactory("Villain");
        $this->villainPlayer = $villainPlayerFactory->getPlayer("Beast");
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
        }
        $firstPlayer = $playersOrder["order"]["first"];
        $secondPlayer = $playersOrder["order"]["second"];

        $this->printGamePlayersOrder($firstPlayer, $secondPlayer);
        $battle->fight($firstPlayer, $secondPlayer);
    }

    private function printGamePlayersOrder($firstPlayer, $secondPlayer)
    {
        if ($firstPlayer instanceof Player) {
            echo "First player is a " . "<b>" . $firstPlayer->getType() . "</b>"
                . " named " . "<b>" . $firstPlayer->getName() . "</b>" . "<br>";
        }
        if ($secondPlayer instanceof Player) {
            echo "Second player is a " . "<b>" . $secondPlayer->getType() . "</b>"
                . " named " . "<b>" . $secondPlayer->getName() . "</b>" . "<br>";
        }
    }
}