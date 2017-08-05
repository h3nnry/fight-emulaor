<?php
/**
 * Created by PhpStorm.
 * User: lunguandrei
 * Date: 17.06.17
 * Time: 12:40
 */

namespace Fight;

/**
 * Class Orderus - emag's hero
 * @package Fight
 */
class Orderus extends Character
{
    protected $health_min = 70;

    protected $health_max = 100;

    protected $strength_min = 70;

    protected $strength_max = 80;

    protected $defense_min = 45;

    protected $defense_max = 55;

    protected $speed_min = 40;

    protected $speed_max = 50;

    protected $luck_min = 10;

    protected $luck_max = 30;

    protected $defensive_skills = [self::MAGIC_SHIELD];

    protected $offensive_skills = [self::RAPID_STRIKE];

}