#Hero

##Installation

```bash
composer install
```

##Short description of project structure
This Game first creates two players, one from each category: one player from the "Hero" category,
and another player from "Villain' category. Each player has its own Stats.
Once we have created the players, the battle is being initialized.

For starting a battle, it is necessary to establish the starting strategy based on which the players
will be ordered. Having a strategy, we can order the players and thus the fight can start.

A battle fight is made up of two ordered players. The fight contains at least one round.
The first player will be the attacker in the first round and will become a defender in the second round (and so on).
The second player will be a defender in the first round and will become an attacker in the second one.
Each player has a chance to miss their hit when attacking.
There also can be a future situation when the attacker's power is less than the defender's defense. In that case
the damage should be 0.

During each round the players can attack or defence using some special skills (if there are any).
In this project both Villains and Heroes can have special skills. Now our concrete players are
only the Orderus and Beast. Beasts have no special skills.

Special skills can be a part of "Defence" category (ex: MagicShield) or a part of "Attack" category (ex:RapidStrike).
Any skill must be in one of these two categories. Each special skill has a chance to be used or not per round.

The first player to reach at 0 health, loses the battle fight.
If the game reaches 20 rounds, it will be stopped and the healthiest player will win.

##Important concepts used:
 - Abstract Factory as design pattern, for both player creations and skill creations
 - Strategy as design pattern for managing the strategies for starting the battle fight.

##About implementation

- Players
The PlayerFactoryProducer class gets the right factory in order to create a player from
a certain category: Hero or Villain.

AbstractPlayerFactory is a common interface for VillainFactory and HeroFactory.
With the help of those factories a concrete player ca be instantiated.

The Player class is an abstraction which is extended by Hero and Villain abstract classes, which are
further extended by the concrete classes: Orerus and Beast.

Another concrete player can be added.

- Skills
The SkillFactoryProducer class gets the right factory to create a skill from
a certain category: Defence or Attack.

AbstractSkillFactory is a common interface for DefenceFactory and AttackFactory.
With the help of those factories a concrete skill ca be instantiated.

The Skill class is an abstraction which is extended by AttackSkill and DefenceSkill abstract classes, which are
further extended by the concrete classes: MagicShield and RapidStrike.

Another concrete skill can be added.

- Strategies
StartStrategy is a common interface for HighestLuckStartStrategy and HighestSpeedStartStrategy.

Another strategy can be added.

- Round
The Round class is introduce to fill the need for a connection between battle and special skills.
Maybe in the future, one complex special skill will be added, and that skill will involve knowing the information
about the current round, what skills the opponent used, what stats the opponent has or the number of the current round
in order to apply its effect properly.

- Chance and Luck
Both "Chance" and "Luck" are random numbers between an input interval limits which are compared to
other random numbers (every time one new).
The "Luck" comparison random number is generated on each round.
The "Chance" comparison random number is generated on each round, on each skill.

##Entry point
```bash
index.php
```

##How to run Unit Tests
```bash
./vendor/bin/phpunit tests
```

##Things to improve in the future
- a better config structure for inputs values
- more testing coverage and testing void functions through side effects


##Note
At each run the initial configuration of the players is logged.

