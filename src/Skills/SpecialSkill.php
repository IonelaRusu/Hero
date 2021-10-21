<?php

namespace App\Skills;

abstract class SpecialSkill
{
    abstract protected function effect(): int;
}