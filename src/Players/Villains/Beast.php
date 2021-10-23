<?php

namespace App\Players\Villains;

use App\Stats;

class Beast extends Villain
{
    public function __construct()
    {
        parent::__construct();
        $this->name = "Beast";
        $this->stats = new Stats(BEAST_STATS);
        $this->skills = $this->skills = $this->generateSkills(BEAST_SKILLS);
    }
}