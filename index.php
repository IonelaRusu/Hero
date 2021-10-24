<?php
declare(strict_types = 1);

use App\Game;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/src/config.php";

$logger = new Logger("default");
$logger->pushHandler(new StreamHandler(__DIR__ . "/logs/app.log", Logger::DEBUG));

try {
    $game = new Game($logger);
    $game->start();
} catch (Exception $e) {
    $logger->error($e->getMessage());
    echo 'Message: ' . $e->getMessage();
}

