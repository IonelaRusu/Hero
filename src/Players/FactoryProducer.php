<?php

namespace App\Players;

use App\Players\Heroes\HeroFactory;
use App\Players\Villains\VillainFactory;

class FactoryProducer
{
    public function getFactory($playerType) {
        if($playerType === 'Hero'){
            return new HeroFactory();
        }else{
            return new VillainFactory();
        }
    }

}