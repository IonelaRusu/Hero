<?php

namespace App\Players\Heroes;

use App\Players\AbstractPlayerFactory;
use App\Skills\AbstractSkillFactory;
use App\Skills\SkillFactoryProducer;

class HeroFactory extends AbstractPlayerFactory
{
//    protected SkillFactoryProducer $skillFactoryProducer;
//
//    public function __construct()
//    {
//        $this->skillFactoryProducer = new SkillFactoryProducer();
//    }
    public function getPlayer(string $playerName): ?Hero
    {
//        $player = null;
        if ($playerName === null) {
            return null;
        }

        if ($playerName === 'Orderus') {
            return new Orderus();
        }

//        if (!is_null($player) && $player->canAddSpecialSkills()) {
//            $player->addHeroSkills();
//        }

//        return $player;
    }

//    private function addHeroSkills($player)
//    {
//        foreach(ORDERUS_SKILLS as $skillType) {
//            $typeSkillFactory =  $this->skillFactoryProducer->getFactory(key($skillType));
//            foreach($skillType as $skillName) {
//                $player->setSkill($typeSkillFactory->getSkill($skillName));
//            }
//        }
//    }
}