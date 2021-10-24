<?php
declare(strict_types = 1);

namespace App\Players;

use App\Battle\Round;
use App\Skills\Skill;
use App\Skills\SkillFactoryProducer;
use Exception;

abstract class Player
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var Stats
     */
    protected Stats $stats;

    /**
     * @var SkillFactoryProducer
     */
    protected SkillFactoryProducer $skillFactoryProducer;

    /**
     * @var array
     */
    protected array $skills;

    /**
     * Player constructor.
     */
    public function __construct()
    {
        $this->skillFactoryProducer = new SkillFactoryProducer();
    }

    /**
     * @param Round|null $round
     * @param Skill|null $skill
     *
     * @return int
     */
    public function attack(Round $round = null, Skill $skill = null): int
    {
        if (!is_null($round) && !is_null($skill)) {
            return $skill->getEffect($round);
        }

        return $this->stats->getStrength();
    }

    /**
     * @param Round      $round
     * @param Skill|null $skill
     *
     * @return int
     */
    public function defend(Round $round, Skill $skill = null): int
    {
        $finalDamage = $round->getDamage();
        if (!is_null($round) && !is_null($skill)) {
            $finalDamage = $skill->getEffect($round);
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

    /**
     * @return Stats
     */
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

    /**
     * @param array $playerDefinedSkills
     *
     * @throws Exception
     * @return array
     */
    public function generateSkills(array $playerDefinedSkills): array
    {
        if (empty($playerDefinedSkills)) {
            return [];
        }

        $skills = [];
        foreach ($playerDefinedSkills as $skillType => $skill) {
            $typeSkillFactory = $this->skillFactoryProducer->getFactory($skillType);
            if (is_null($typeSkillFactory)) {
                throw new Exception("Skill could not be created!");
            }
            foreach ($skill as $skillName) {
                $newSkill = $typeSkillFactory->getSkill($skillName);

                if (is_null($newSkill)) {
                    throw new Exception("Skill could not be created!");
                }
                array_push($skills, $newSkill);
            }
        }

        return $skills;
    }

    public function __toString()
    {
        $skills = '';
        if (empty($this->skills)) {
            $skills = 'not available';
        } else {
            foreach ($this->skills as $skill) {
                $skills .= $skill;
            }
        }

        return "Player is: {$this->name}, a {$this->type} player with {$this->stats} and skills {$skills}";
    }
}
