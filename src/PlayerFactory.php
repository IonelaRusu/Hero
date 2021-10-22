<?php

namespace App;

use App\Players\Orderus;
use App\Players\Beast;

class PlayerFactory
{
    public function getPlayer(string $playerType)
    {
        if ($playerType === null) {
            return null;
        }

        if ($playerType === 'Orderus') {
            return new Orderus($playerType);
        } elseif ($playerType === 'Beast') {
            return new Beast($playerType);
        }

        return null;
    }

}