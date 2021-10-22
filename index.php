<?php

use App\Game;

require_once realpath("vendor/autoload.php");

$game = new Game();
$game->start();
