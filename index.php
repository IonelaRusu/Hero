<?php

use App\Game;
use \App\Strategies\HighestSpeedStartStrategy;
use \App\Strategies\HighestLuckStartStrategy;

require_once realpath("vendor/autoload.php");

$game = new Game(new HighestSpeedStartStrategy());
$playersOrder = $game->getThePlayersOrder();

if (empty($playersOrder)) {
    $game->setStrategy(new HighestLuckStartStrategy());
    $playersOrder = $game->getThePlayersOrder();
}

$game->start($playersOrder);