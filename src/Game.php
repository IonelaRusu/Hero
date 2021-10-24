<?php
declare(strict_types = 1);

namespace App;

use App\Battle\Battle;
use App\Players\Heroes\Hero;
use App\Players\Heroes\Orderus;
use App\Players\PlayerFactoryProducer;
use App\Players\Player;
use App\Players\Villains\Beast;
use App\Players\Villains\Villain;
use App\Strategies\HighestLuckStartStrategy;
use App\Strategies\HighestSpeedStartStrategy;
use Exception;
use Monolog\Logger;

/**
 * Class Game
 * @package App
 */
class Game
{
    /**
     * @var PlayerFactoryProducer
     */
    private PlayerFactoryProducer $playerFactoryProducer;

    /**
     * @var Player|null
     */
    private ?Player $heroPlayer;

    /**
     * @var Player|null
     */
    private ?Player $villainPlayer;

    /**
     * @var Logger
     */
    private Logger $logger;

    /**
     * Game constructor.
     */
    public function __construct(Logger $logger)
    {
        $this->playerFactoryProducer = new PlayerFactoryProducer();
        $this->logger = $logger;
    }

    /**
     * @throws Exception
     */
    public function start()
    {
        $this->createPlayers();
        $this->initiateBattle();
    }

    /**
     * @throws Exception
     */
    private function createPlayers()
    {
        $heroPlayerFactory = $this->playerFactoryProducer->getFactory(Hero::HERO_TYPE);
        if (is_null($heroPlayerFactory)) {
            throw new Exception("Hero player could not be created!");
        }
        $this->heroPlayer = $heroPlayerFactory->getPlayer(Orderus::ORDERUS_NAME);
        if (is_null($this->heroPlayer)) {
            throw new Exception("Hero player could not be created!");
        }

        $villainPlayerFactory = $this->playerFactoryProducer->getFactory(Villain::VILLAIN_TYPE);
        if (is_null($villainPlayerFactory)) {
            throw new Exception("Villain player could not be created!");
        }
        $this->villainPlayer = $villainPlayerFactory->getPlayer(Beast::BEAST_NAME);
        if (is_null($this->villainPlayer)) {
            throw new Exception("Villain player could not be created!");
        }

        $this->logger->info((string)$this->heroPlayer);
        $this->logger->info((string)$this->villainPlayer);
    }

    /**
     * @throws Exception
     */
    private function initiateBattle()
    {
        $battle = new Battle(new HighestSpeedStartStrategy());
        $playersOrder = $battle->getPlayersOrderByStrategy($this->heroPlayer, $this->villainPlayer);
        if (empty($playersOrder)) {
            $battle->setStrategy(new HighestLuckStartStrategy());
            $playersOrder = $battle->getPlayersOrderByStrategy($this->heroPlayer, $this->villainPlayer);
            if (empty($playersOrder)) {
                throw new Exception("Could not establish players order!");
            }
        }
        $firstPlayer = $playersOrder["order"]["first"];
        $secondPlayer = $playersOrder["order"]["second"];

        $this->printGamePlayersOrder($firstPlayer, $secondPlayer);
        $battle->fight($firstPlayer, $secondPlayer);
    }

    /**
     * @param $firstPlayer
     * @param $secondPlayer
     */
    private function printGamePlayersOrder($firstPlayer, $secondPlayer)
    {
        if ($firstPlayer instanceof Player) {
            echo "First player is a " . "<b>" . $firstPlayer->getType() . "</b>"
                . " named " . "<b>" . $firstPlayer->getName() . "</b>" . "<br>";
        }
        if ($secondPlayer instanceof Player) {
            echo "Second player is a " . "<b>" . $secondPlayer->getType() . "</b>"
                . " named " . "<b>" . $secondPlayer->getName() . "</b>" . "<br>";
        }
    }
}