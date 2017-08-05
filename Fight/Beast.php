<?php
/**
 * Created by PhpStorm.
 * User: lunguandrei
 * Date: 17.06.17
 * Time: 12:50
 */

namespace Fight;

/**
 * Class Beast
 * @package Fight
 */
class Beast extends Character
{
    protected $health_min = 60;

    protected $health_max = 90;

    protected $strength_min = 60;

    protected $strength_max = 90;

    protected $defense_min = 40;

    protected $defense_max = 60;

    protected $speed_min = 40;

    protected $speed_max = 60;

    protected $luck_min = 25;

    protected $luck_max = 40;
}