<?php

namespace App\Players;

/**
 * Class AbstractPlayerFactory
 * @package App\Players
 */
abstract class AbstractPlayerFactory
{
    /**
     * @param string $playerName
     *
     * @return Player|null
     */
    abstract public function getPlayer(string $playerName): ?Player;
}