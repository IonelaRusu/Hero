<?php

namespace App;

use App\Players\Player;
use App\Strategies\StartStrategy;

class Battle
{
    protected StartStrategy $strategy;

    public function __construct(StartStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(StartStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getPlayersOrderByStrategy(Player $heroPlayer, Player $villainPlayer): array
    {
        return $this->strategy->getPlayersOrder($heroPlayer, $villainPlayer);
    }


    public function fight(Player $firstPlayer, Player $secondPlayer)
    {
        $roundNumber = 1;
        do {
            if ($roundNumber % 2 === 1) {
                $this->generateRound($firstPlayer, $secondPlayer, $roundNumber);
            } else {
                $this->generateRound($secondPlayer, $firstPlayer, $roundNumber);
            }

            $this->getFightDetails($firstPlayer, $secondPlayer, $roundNumber);

            $firstPlayerHealth = $firstPlayer->getStats()->getHealth();
            $secondPlayerHealth = $secondPlayer->getStats()->getHealth();

            if ($firstPlayerHealth === 0 || $secondPlayerHealth === 0) {
                break;
            }

            $roundNumber++;
        } while ($roundNumber <= 20);
    }

    private function generateRound(Player $attacker, Player $defender, $roundNumber)
    {
        $round = new Round($attacker, $defender, $roundNumber);

        $roundDefenderLuck = rand(0, 100);
        if ($roundDefenderLuck <= $defender->getStats()->getLuck()) {
            $round->setIsDefenderLucky(true);
        } else {
            $finalDamage = 0;
            $round->setIsDefenderLucky(false);
            $attackerStrength = $this->getAttackerStrengthInCurrentRound($attacker, $round);
            $defenderDefence = $defender->getStats()->getDefence();

            if ($attackerStrength > $defenderDefence) {
                $damage = $attackerStrength - $defenderDefence;
                $round->setDamage($damage);
                $finalDamage = $this->getDefenderDamageInCurrentRound($defender, $round);
            }

            $round->setDamage($finalDamage);
        }

        $round->printRoundEvents();
    }

    private function getAttackerStrengthInCurrentRound(Player $attacker, Round $round)
    {
        $attackerSkills = $attacker->getSkills();

        if (!empty($attackerSkills)) {
            foreach ($attackerSkills as $skill) {
                if ($skill->getType() === "attack") {
                    $attackerSkillChance = rand(0, 100);
                    if ($attackerSkillChance <= $skill->getChance()) {
                        $round->setAttackerSkillsUsed($skill->getName());
                        return $attacker->attack($round, $skill);
                    }
                }
            }
        }
        $round->setAttackerSkillsUsed(null);
        return $attacker->attack();

    }

    private function getDefenderDamageInCurrentRound(Player $defender, Round $round)
    {
        $defenderSkills = $defender->getSkills();

        if (!empty($defenderSkills)) {
            foreach ($defenderSkills as $skill) {
                if ($skill->getType() === "defence") {
                    $defenderSkillChance = rand(0, 100);
                    if ($defenderSkillChance <= $skill->getChance()) {
                        $round->setDefenderSkillsUsed($skill->getName());
                        return $defender->defend($round, $skill);
                    }
                }
            }
        }

        $round->setDefenderSkillsUsed(null);
        return $defender->defend($round);
    }

    private function getFightDetails(Player $firstPlayer, Player $secondPlayer, int $round)
    {
        $firstPlayerHealth = $firstPlayer->getStats()->getHealth();
        $secondPlayerHealth = $secondPlayer->getStats()->getHealth();

        if ($firstPlayerHealth === 0) {
            $secondPlayer->win();
            $firstPlayer->lose();
        }

        if ($secondPlayerHealth === 0) {
            $firstPlayer->win();
            $secondPlayer->lose();
        }

        if ($round === 20) {
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