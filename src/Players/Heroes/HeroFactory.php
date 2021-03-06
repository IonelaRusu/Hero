<?php
declare(strict_types = 1);

namespace App\Players\Heroes;

use App\Players\AbstractPlayerFactory;
use App\Players\Player;

/**
 * Class HeroFactory
 * @package App\Players\Heroes
 */
class HeroFactory implements AbstractPlayerFactory
{
    /**
     * @param string|null $playerName
     *
     * @return Player|null
     */
    public function getPlayer(?string $playerName): ?Player
    {
        if ($playerName === null) {
            return null;
        }

        if ($playerName === Orderus::ORDERUS_NAME) {
            return new Orderus();
        }

        return null;
    }
}