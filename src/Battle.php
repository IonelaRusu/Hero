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
        do  {
            if ($round % 2 === 1) {
                $roundDefenderLuck = rand(0,100);
                $roundDetails = [
                    'isDefenderLucky'   => false,
                    'specialSkillsUsed' => [],
                    'damage' => 0,
                ];

                $firstPlayer->attack();

                if ($roundDefenderLuck <= $secondPlayer->getStats()->getLuck()) {
                    $roundDetails['isDefenderLucky'] = true;
                } else {
                    $firstPlayerStrength = $firstPlayer->getStats()->getStrength();
                    $secondPlayerDefence = $secondPlayer->getStats()->getDefence();

                    $damage = $firstPlayerStrength - $secondPlayerDefence;
                    $secondPlayer->defend($damage);

                    $roundDetails['damage'] = $damage;
                }

                $this->printRoundEvents($firstPlayer, $secondPlayer, $roundDetails);
            } else {
                $roundDefenderLuck = rand(0,100);
                $roundDetails = [
                    'isDefenderLucky'   => false,
                    'specialSkillsUsed' => [],
                    'damage' => 0,
                ];

                $secondPlayer->attack();

                if ($roundDefenderLuck <= $secondPlayer->getStats()->getLuck()) {
                    $roundDetails['isDefenderLucky'] = true;
                } else {
                    $secondPlayerStrength = $secondPlayer->getStats()->getStrength();
                    $firstPlayerDefence = $firstPlayer->getStats()->getDefence();

                    $damage = $secondPlayerStrength - $firstPlayerDefence;
                    $firstPlayer->defend($damage);
                }

                $this->printRoundEvents($firstPlayer, $secondPlayer, $roundDetails);
            }

            $this->getBattleDetails($firstPlayer, $secondPlayer, $round);
            $round++;
        } while ($round > 20);
    }

    private function printRoundEvents($attacker, $defender, $roundDetails)
    {
        $attackerName = $attacker->getName();
        $defenderName = $defender->getName();

        echo $attackerName . 'attacks';

        if ($roundDetails['isDefenderLucky']) {
            echo $attackerName . ' miss his hit and the' . $defenderName . ' takes no damage';
        } else {
            if (!empty($roundDetails['specialSkills'])) {
                //for - iterate over them
                echo $attackerName. 'uses X skill';
            }


            echo $defenderName . 'takes ' .  $roundDetails['damage'] .' damage';
            echo $defenderName . 'has ' . $defender->getStats()->getHealth() .' left';
        }
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