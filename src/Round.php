<?php

namespace App;

use App\Players\Player;
use App\Skills\Skill;

class Round
{
    protected Player $attacker;
    protected Player $defender;
    protected int $damage;
    protected array $attackerSkillsUsed;
    protected array $defenderSkillsUsed;
    protected int $isDefenderLucky;

    public function __construct(Player $attacker, Player $defender)
    {
        $this->attacker = $attacker;
        $this->defender = $defender;
    }

    /**
     * @return Player
     */
    public function getAttacker(): Player
    {
        return $this->attacker;
    }

    /**
     * @return Player
     */
    public function getDefender(): Player
    {
        return $this->defender;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param Player $attacker
     *
     * @return Round
     */
    public function setAttacker(Player $attacker): Round
    {
        $this->attacker = $attacker;

        return $this;
    }

    /**
     * @param Player $defender
     *
     * @return Round
     */
    public function setDefender(Player $defender): Round
    {
        $this->defender = $defender;

        return $this;
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
     * @return array
     */
    public function getAttackerSkillsUsed(): array
    {
        return $this->attackerSkillsUsed;
    }

    /**
     * @param array $attackerSkillsUsed
     *
     * @return Round
     */
    public function setAttackerSkillsUsed(array $attackerSkillsUsed): Round
    {
        $this->attackerSkillsUsed = $attackerSkillsUsed;

        return $this;
    }

    /**
     * @return array
     */
    public function getDefenderSkillsUsed(): array
    {
        return $this->defenderSkillsUsed;
    }

    /**
     * @param array $defenderSkillsUsed
     *
     * @return Round
     */
    public function setDefenderSkillsUsed(array $defenderSkillsUsed): Round
    {
        $this->defenderSkillsUsed = $defenderSkillsUsed;

        return $this;
    }

    /**
     * @return int
     */
    public function getIsDefenderLucky(): int
    {
        return $this->isDefenderLucky;
    }

    /**
     * @param int $isDefenderLucky
     *
     * @return Round
     */
    public function setIsDefenderLucky(int $isDefenderLucky): Round
    {
        $this->isDefenderLucky = $isDefenderLucky;

        return $this;
    }

    public function printRoundEvents()
    {
        $attackerName = $this->attacker->getName();
        $defenderName = $this->defender->getName();

        echo $attackerName . 'attacks';

        if ($this->isDefenderLucky) {
            echo $attackerName . ' miss his hit and the' . $defenderName . ' takes no damage';
        } else {
            if (!empty($roundDetails['specialSkills'])) {
                //for - iterate over them
                echo $attackerName . 'uses X skill';
            }

            echo $defenderName . 'takes ' . $this->damage . ' damage';
            echo $defenderName . 'has ' . $this->defender->getStats()->getHealth() . ' left';
        }
    }

    public function applySkill(Skill $skill) {
//        $skill->effect()

    }

}