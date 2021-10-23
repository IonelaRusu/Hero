<?php
//SKILLS
const ALL_SKILLS = [
    "attack"  => [
        ["name" => "RapidStrike", "chance" => 10],
    ],
    "defence" => [
        ["name" => "MagicShield", "chance" => 20],
    ],
];

//Heroes
//Orderus
const ORDERUS_STATS = [
    "health"   => [
        "min" => 70,
        "max" => 100,
    ],
    "strength" => [
        "min" => 70,
        "max" => 80,
    ],
    "defence"  => [
        "min" => 45,
        "max" => 55,
    ],
    "speed"    => [
        "min" => 40,
        "max" => 50,
    ],
    "luck"     => [
        "min" => 10,
        "max" => 30,
    ],
];

const ORDERUS_SKILLS = [
    "attack" => [ALL_SKILLS["attack"][0]["name"]],
    "defence" => [ALL_SKILLS["defence"][0]["name"]],
];

//Villains
//BEAST

const BEAST_STATS = [
    "health"   => [
        "min" => 60,
        "max" => 90,
    ],
    "strength" => [
        "min" => 60,
        "max" => 90,
    ],
    "defence" => [
        "min" => 40,
        "max" => 90,
    ],
    "speed"   => [
        "min" => 40,
        "max" => 60,
    ],
    "luck"    => [
        "min" => 25,
        "max" => 40,
    ],
];

const BEAST_SKILLS = [];

