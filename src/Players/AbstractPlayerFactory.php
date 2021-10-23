<?php

namespace App\Players;



abstract class AbstractPlayerFactory
{
   abstract public function getPlayer(string $playerName): ?Player;
}