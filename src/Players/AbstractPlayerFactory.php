<?php
declare(strict_types = 1);

namespace App\Players;

/**
 * Class AbstractPlayerFactory
 * @package App\Players
 */
interface AbstractPlayerFactory
{
    /**
     * @param string $playerName
     *
     * @return Player|null
     */
     public function getPlayer(string $playerName): ?Player;
}