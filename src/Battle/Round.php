<?php

namespace App;

use App\Players\Player;

class Round
{
    /**
     * @var Player
     */
    private Player $attacker;

    /**
     * @var Player
     */
    private Player $defender;

    /**
     * @var int
     */
    private int $damage;

    /**
     * @var string|null
     */
    private ?string $attackerSkillsUsed;

    /**
     * @var string|null
     */
    private ?string $defenderSkillsUsed;

    /**
     * @var bool
     */
    private bool $isDefenderLucky;

    /**
     * @var int
     */
    private int $roundNumber;

    /**
     * Round constructor.
     *
     * @param Player $attacker
     * @param Player $defender
     * @param int    $roundNumber
     */
    public function __construct(Player $attacker, Player $defender, int $roundNumber)
    {
        $this->attacker = $attacker;
        $this->defender = $defender;
        $this->roundNumber = $roundNumber;
    }

    /**
     * @return Player
     */
    public function getAttacker(): Player
    {
        return $this->attacker;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     *
     * @return Round
     */
    public function setDamage(int $damage): Round
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * @param string|null $attackerSkillsUsed
     *
     * @return Round
     */
    public function setAttackerSkillsUsed(?string $attackerSkillsUsed): Round
    {
        $this->attackerSkillsUsed = $attackerSkillsUsed;

        return $this;
    }

    /**
     * @param string|null $defenderSkillsUsed
     *
     * @return Round
     */
    public function setDefenderSkillsUsed(?string $defenderSkillsUsed): Round
    {
        $this->defenderSkillsUsed = $defenderSkillsUsed;

        return $this;
    }

    /**
     * @param bool $isDefenderLucky
     *
     * @return Round
     */
    public function setIsDefenderLucky(bool $isDefenderLucky): Round
    {
        $this->isDefenderLucky = $isDefenderLucky;

        return $this;
    }

    /**
     *  Print round events
     */
    public function printRoundEvents()
    {
        $attackerName = $this->attacker->getName();
        $defenderName = $this->defender->getName();

        echo "<br>" . "<b>" . "------- Round " . $this->roundNumber . "</b>" . " begins: -------" . "<br>";
        echo "<b>", $attackerName . "</b>" . " attacks" . "<br>";

        if ($this->isDefenderLucky) {
            echo "<b>" . $attackerName . "</b>" . " miss his hit and the " . "<b>" . $defenderName . "</b>"
                . " takes no damage" . "<br>";

            echo "<b>" . $defenderName . "</b>" . " still has "
                . $this->defender->getStats()->getHealth() . " health" . "<br>";

        } else {
            if (!empty($this->attackerSkillsUsed)) {
                echo "<b>" . $attackerName . "</b>" . " uses " . $this->attackerSkillsUsed . " skill" . "<br>";
            }

            if (!empty($this->defenderSkillsUsed)) {
                echo "<b>" . $defenderName . "</b>" . " uses " . $this->defenderSkillsUsed . " skill" . "<br>";
            }

            if ($this->damage === 0) {
                echo  "<b>" . $attackerName . "</b>" . " has the strength " . $this->attacker->getStats()->getStrength()
                    . " which is lower than " . "<b>" . $defenderName . "</b>" . " defence which is "
                    . $this->defender->getStats()->getDefence() . " so there is no damage " . "<br>";
                echo "<b>" . $defenderName . "</b>" . " takes " . $this->damage . " damage" . "<br>";
            } else {
                echo "<b>" . $defenderName . "</b>" . " takes " . $this->damage . " damage" . "<br>";
            }

            echo "<b>" . $defenderName . "</b>" . " has "
                . $this->defender->getStats()->getHealth() . " health left" . "<br>";
        }
    }
}