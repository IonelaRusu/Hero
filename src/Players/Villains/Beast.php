<?php

namespace App\Players\Villains;

use App\Players\Stats;

/**
 * Class Beast
 * @package App\Players\Villains
 */
class Beast extends Villain
{
    const BEAST_NAME = "Beast";

    /**
     * Beast constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = self::BEAST_NAME;
        $this->stats = new Stats(BEAST_STATS);
        $this->skills = $this->skills = $this->generateSkills(BEAST_SKILLS);
    }
}