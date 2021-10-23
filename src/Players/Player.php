<?php

namespace App\Players;

use App\Round;
use App\Skills\Skill;
use App\Skills\SkillFactoryProducer;
use App\Stats;

abstract class Player
{
    protected string               $name;
    protected string               $type;
    protected Stats                $stats;
    protected SkillFactoryProducer $skillFactoryProducer;
    protected array                $skills;

    public function __construct()
    {
        $this->skillFactoryProducer = new SkillFactoryProducer();
    }

    public function attack(Round $round = null, Skill $skill = null): int
    {
        if (!is_null($round) && !is_null($skill)) {
            return $skill->effect($round);
        }

        return $this->stats->getStrength();
    }

    public function defend(Round $round, Skill $skill = null): int
    {
        $finalDamage = $round->getDamage();
        if (!is_null($round) && !is_null($skill)) {
            $finalDamage = $skill->effect($round);
        }

        $newHealth = $this->getStats()->getHealth() - $finalDamage;
        if ($newHealth < 0) {
            $this->getStats()->setHealth(0);
        } else {
            $this->getStats()->setHealth($newHealth);
        }

        return $finalDamage;
    }

    public function lose()
    {
        echo "<br>" . "<b>" . $this->name . " loses!" . "</b>" . "<br>";
    }

    public function win()
    {
        echo "<br>". "<b>" . $this->name . " wins!" . "</b>" . "<br>";
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    public function generateSkills($playerDefinedSkills): array
    {

        if (empty($playerDefinedSkills)) {
            return [];
        }

        $skills = [];
        foreach ($playerDefinedSkills as $skillType => $skill) {
            $typeSkillFactory = $this->skillFactoryProducer->getFactory($skillType);
            foreach ($skill as $skillName) {
                array_push($skills, $typeSkillFactory->getSkill($skillName));
            }
        }

        return $skills;
    }
}
