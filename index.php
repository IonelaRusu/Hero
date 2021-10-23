<?php

use App\Game;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/src/config.php";
//require_once realpath("vendor/autoload.php");
//require_once realpath("src/config.php");

$logger = new Logger("default");
$logger->pushHandler(new StreamHandler(__DIR__ . "/logs/app.log", Logger::DEBUG));

$game = new Game($logger);
$game->start();
