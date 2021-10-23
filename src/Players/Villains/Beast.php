<?php

namespace App\Players\Villains;

use App\Stats;

/**
 * Class Beast
 * @package App\Players\Villains
 */
class Beast extends Villain
{
    /**
     * Beast constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = "Beast";
        $this->stats = new Stats(BEAST_STATS);
        $this->skills = $this->skills = $this->generateSkills(BEAST_SKILLS);
    }
}