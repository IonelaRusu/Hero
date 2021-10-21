<?php

namespace App\Strategies;

class HighestSpeedStartStrategy implements StartStrategy
{
    public function getPlayersOrderStrategy(): array
    {
        return ['Orderus', 'Beast'];
    }
}