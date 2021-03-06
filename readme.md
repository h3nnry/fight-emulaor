## Fight emulation

You can run the fight in command line by running php ./runFight.php in project map
or in the browser accessing localhost/runFight.php

##The story
Once upon a time there was a great hero, called Orderus, with some strengths and weaknesses, as
all heroes have.
After battling all kinds of monsters for more than a hundred years, Orderus now has the following
stats:
<br/>● Health: 70 - 100
<br/>● Strength: 70 - 80
<br/>● Defense: 45 – 55
<br/>● Speed: 40 – 50
<br/>● Luck: 10% - 30% (0% means no luck, 100% lucky all the time)
Also, he possesses 2 skills:
<br/>● Rapid strike: Strike twice while it’s his turn to attack; there’s a 10% chance he’ll use this skill
every time he attacks
<br/>● Magic shield: Takes only half of the usual damage when an enemy attacks; there’s a 20%
change he’ll use this skill every time he defends
##Gameplay
As Orderus walks the ever-green forests of Emagia, he encounters some wild beasts, with the
following properties:
<br/>● Health: 60 - 90
<br/>● Strength: 60 - 90
<br/>● Defense: 40 – 60
<br/>● Speed: 40 – 60
<br/>● Luck: 25% - 40%
You’ll have to simulate a battle between Orderus and a wild beast, either at command line or using a
web browser. On every battle, Orderus and the beast must be initialized with random properties,
within their ranges.
The first attack is done by the player with the higher speed. If both players have the same speed,
than the attack is carried on by the player with the highest luck. After an attack, the players switch
roles: the attacker now defends and the defender now attacks.
The damage done by the attacker is calculated with the following formula:
Damage = Attacker strength – Defender defense
The damage is subtracted from the defender’s health. An attacker can miss their hit and do no
damage if the defender gets lucky that turn.
Orderus’ skills occur randomly, based on their chances, so take them into account on each turn.

##Game over
The game ends when one of the players remain without health or the number of turns reaches 20.
The application must output the results each turn: what happened, which skills were used (if any),
the damage done, defender’s health left.
If we have a winner before the maximum number of rounds is reached, he must be declared.
Rules
Emagia is a land where magic does happen. Still, for this magic to work, you’ll have to follow these
rules:
<br/>● Write code in plain PHP, without any frameworks (you are free to use 3rd parties like
PHPUnit, UI libs / frameworks)
<br/>● Make sure your application is decoupled, code reusable and scalable. For example, can a
new skill easily be added to our hero?
<br/>● Is your code bug-free and tested?
<br/>● There’s no time limit, take your time for the best approach you can think of