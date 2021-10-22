<?php

namespace App;

use App\Players\Heroes\Hero;
use App\Players\Player;
use App\Players\Villains\Villain;
use App\Strategies\StartStrategy;

class Battle
{
    protected StartStrategy $strategy;
    protected Hero          $heroPlayer;
    protected Villain       $villainPlayer;

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

    public function getPlayersOrderByStrategy(): array
    {
        return $this->strategy->getPlayersOrder($this->heroPlayer, $this->villainPlayer);
    }

    //Player common type
    public function fight(Player $firstPlayer, Player $secondPlayer)
    {
        $round = 1;
        while (1) {
            if ($round % 2 === 1) {
                $firstPlayer->attack();


                $firstPlayerStrength = $firstPlayer->getStats()->getStrength();
                $secondPlayerDefence = $secondPlayer->getStats()->getDefence();

                $damage = $firstPlayerStrength - $secondPlayerDefence;
                $secondPlayer->defend($damage);


                $this->getRoundDetails($firstPlayer, $secondPlayer);
            } else {
                $secondPlayer->attack();


                $secondPlayerStrength = $secondPlayer->getStats()->getStrength();
                $firstPlayerDefence = $firstPlayer->getStats()->getDefence();

                $damage = $secondPlayerStrength - $firstPlayerDefence;
                $firstPlayer->defend($damage);

                $this->getRoundDetails($secondPlayer, $firstPlayer);
            }

            $this->getBattleDetails($firstPlayer, $secondPlayer, $round);
        }
    }

    private function getRoundDetails($attacker, $defender)
    {
        echo $attacker . 'attacks';
        echo $attacker . 'uses X skill';

        echo $defender . 'takes Y damage';
        echo $defender . 'has Z health left';
    }

    private function getBattleDetails(Player $firstPlayer, Player $secondPlayer, int $round)
    {
        $firstPlayerHealth = $firstPlayer->getStats()->getHealth();
        $secondPlayerHealth = $secondPlayer->getStats()->getHealth();

        if ($firstPlayerHealth < 0) {
            $secondPlayer->win();
            $firstPlayer->lose();
        }

        if ($secondPlayerHealth < 0) {
            $firstPlayer->win();
            $secondPlayer->lose();
        }

        if ($round === 20) {
            // echo "Battle ended!";
            if ($firstPlayerHealth < $secondPlayerHealth) {
                $secondPlayer->win();
                $firstPlayer->lose();
            } else {
                $firstPlayer->win();
                $secondPlayer->lose();
            }
        }
    }
}