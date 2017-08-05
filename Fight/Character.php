<?php
/**
 * Created by PhpStorm.
 * User: lunguandrei
 * Date: 17.06.17
 * Time: 11:15
 */

namespace Fight;

/**
 * Class Character
 * @package Fight
 */
class Character
{

    /**
     * Skill type offensive
     *
     * @var string
     */
    const SKILL_TYPE_OFFENSIVE = 'offensive';

    /**
     * Skill type defensive
     *
     * @var string
     */
    const SKILL_TYPE_DEFENSIVE = 'defensive';

    /**
     * Character's rapid strike skill
     *
     * @var string
     */
    const RAPID_STRIKE = 'rapid-strike';

    /**
     * Character's magic shield skill
     *
     * @var string
     */
    const MAGIC_SHIELD = 'magic-shield';

    public $skills = [
        self::RAPID_STRIKE => array(
            'name' => 'Rapid Strike',
            'type' => self::SKILL_TYPE_OFFENSIVE,
            'chance' => 10
        ),
        self::MAGIC_SHIELD => array(
            'name' => 'Magic shield',
            'type' => self::SKILL_TYPE_DEFENSIVE,
            'reduce_damage' => 50,
            'chance' => 20
        )
    ];

    /**
     * Character's defensive skills
     *
     * @var array
     */
    protected $defensive_skills = [];

    /**
     * Character's offensive
     *
     * @var array
     */
    protected $offensive_skills = [];

    /**
     * Character's health min value
     *
     * @var integer
     */
    protected $health_min;

    /**
     * Character's health max value
     *
     * @var integer
     */
    protected $health_max;

    /**
     * Character's health value
     *
     * @var integer
     */
    protected $health;

    /**
     * Character's strength min value
     *
     * @var integer
     */
    protected $strength_min;

    /**
     * Character's strength max value
     *
     * @var integer
     */
    protected $strength_max;

    /**
     * Character's strength value
     *
     * @var integer
     */
    protected $strength;

    /**
     * Character's defense min value
     *
     * @var integer
     */
    protected $defense_min;

    /**
     * Character's defense max value
     *
     * @var integer
     */
    protected $defense_max;

    /**
     * Character's defense value
     *
     * @var integer
     */
    protected $defense;

    /**
     * Character's speed min value
     *
     * @var integer
     */
    protected $speed_min;

    /**
     * Character's speed max value
     *
     * @var integer
     */
    protected $speed_max;

    /**
     * Character's speed value
     *
     * @var integer
     */
    protected $speed;

    /**
     * Character's luck min value
     *
     * @var integer
     */
    protected $luck_min;

    /**
     * Character's luck max value
     *
     * @var integer
     */
    protected $luck_max;

    /**
     * Character's luck value
     *
     * @var integer
     */
    protected $luck;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Initialize Character's qualities.
     *
     * @return void
     */
    protected function init()
    {
        $this->initQuality('health');
        $this->initQuality('strength');
        $this->initQuality('defense');
        $this->initQuality('speed');
        $this->initQuality('luck');
    }

    /**
     * Initialize Character's quality
     *
     * @param string $attribute Name
     *
     * @return void
     */
    protected function initQuality($attribute)
    {
        $minimum = strtolower($attribute) . '_min';
        $maximum = strtolower($attribute) . '_max';
        $setter = 'set' . ucfirst(strtolower($attribute));

        $value = rand($this->$minimum, $this->$maximum);
        $this->$setter($value);
    }

    /**
     * Set Character's health
     *
     * @param integer $health
     *
     * @return Character
     */
    public function setHealth($health)
    {
        if ($health < $this->health_min || $health > $this->health_max) {
            throw new \RuntimeException(
                get_called_class() . " health must range from " . $this->health_min . " to " . $this->health_max
            );
        } elseif (! is_int($health)) {
            throw new \RuntimeException(
                get_called_class() . " heatlh must be an integer."
            );
        }

        $this->health = $health;

        return $this;
    }

    /**
     * Return Character's health
     *
     * @return integer
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set Character's strength
     *
     * @param integer $strength
     *
     * @return Character
     */
    public function setStrength($strength)
    {
        if ($strength < $this->strength_min || $strength > $this->strength_max) {
            throw new \RuntimeException(
                get_called_class() . " strength must range from " . $this->strength_min . " to " . $this->strength_max
            );
        } elseif (! is_int($strength)) {
            throw new \RuntimeException(
                get_called_class() . " strength must be an integer."
            );
        }

        $this->strength = $strength;

        return $this;
    }

    /**
     * Return Character's strength
     *
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set Character's defense
     *
     * @param integer $defense
     *
     * @return Character
     */
    public function setDefense($defense)
    {
        if ($defense < $this->defense_min || $defense > $this->defense_max) {
            throw new \RuntimeException(
                get_called_class() . " defense must range from " . $this->defense_min . " to " . $this->defense_max
            );
        } elseif (! is_int($defense)) {
            throw new \RuntimeException(
                get_called_class() . " defense must be an integer."
            );
        }

        $this->defense = $defense;

        return $this;
    }

    /**
     * Return Character's defense
     *
     * @return integer
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set Character's speed
     *
     * @param integer $speed
     *
     * @return Character
     */
    public function setSpeed($speed)
    {
        if ($speed < $this->speed_min || $speed > $this->speed_max) {
            throw new \RuntimeException(
                get_called_class() . " speed must range from " . $this->speed_min . " to " . $this->speed_max
            );
        } elseif (! is_int($speed)) {
            throw new \RuntimeException(
                get_called_class() . " speed must be an integer."
            );
        }

        $this->speed = $speed;

        return $this;
    }

    /**
     * Return Character's speed
     *
     * @return integer
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set Character's luck
     *
     * @param integer $luck
     *
     * @return Character
     */
    public function setLuck($luck)
    {

        if ($luck < $this->luck_min || $luck > $this->luck_max) {
            throw new \RuntimeException(
                get_called_class() . " luck must range from " . $this->luck_min . " to " . $this->luck_max
            );
        } elseif (! is_int($luck)) {
            throw new \RuntimeException(
                get_called_class() . " luck must be an integer."
            );
        }

        $this->luck = $luck;

        return $this;
    }

    /**
     * Return Character's luck
     *
     * @return integer
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param Character $character
     * @param bool $firtsAttack
     */
    public function attack(Character $character, $firtsAttack = false)
    {
        if (!$firtsAttack && $character->avoidAttack()) {
            $message =  PHP_EOL . "{$this->getParentClassShortName($character)} is lucky and avoid the opponent attack!" . PHP_EOL;
            printMessage($message);
            return false;
        }

        $doubleAttack = false;
        if (count($this->offensive_skills) > 0) {
            $offensive_skill = array_rand($this->offensive_skills);
            $chance  = $this->getChance();
            if ($chance <= $this->skills[$this->offensive_skills[$offensive_skill]]['chance']) {
                $doubleAttack = true;
            }
        }
        $damage = $this->getStrength() - $character->getDefense();

        $avoidAttackSpecialSkill = $this->avoidAttackSpecialSkill();

        if ($avoidAttackSpecialSkill > 0) {
            $damage -= $damage * $avoidAttackSpecialSkill / 100;
        }

        if ($doubleAttack) {
            $damage *= 2;
            $message =  PHP_EOL . "{$this->getParentClassShortName($character)} is using {$this->skills[self::RAPID_STRIKE]['name']}!" . PHP_EOL;
            printMessage($message);
        }

        $character->decreaseHealth($damage);
    }

    /**
     * @return bool
     */
    protected function avoidAttack()
    {
        $chance  = $this->getChance();

        if ($chance <= $this->getLuck()) {
            return true;
        }

        return false;
    }

    /**
     * @return int
     */
    protected function avoidAttackSpecialSkill()
    {
        if (count($this->defensive_skills) > 0) {
            $defensive_skill = array_rand($this->defensive_skills);
            $chance  = $this->getChance();

            if ($chance <= $this->skills[$this->defensive_skills[$defensive_skill]]['chance']) {
                $message =  PHP_EOL . "{$this->getParentClassShortName($this)} is using defensive skill - {$this->skills[$this->defensive_skills[$defensive_skill]]['name']}!" . PHP_EOL;
                printMessage($message);
                return $this->skills[$this->defensive_skills[$defensive_skill]]['reduce_damage'];
            }
        }

        return 0;
    }

    /**
     * @return int
     */
    protected function getChance()
    {
        return rand(0, 100);
    }

    /**
     * @param $damage
     * @return $this
     */
    public function decreaseHealth($damage)
    {
        $this->health = $this->health - $damage;

        ($this->health <= 0) && $this->health = 0;

        return $this;
    }

    /**
     * @return string
     */
    public function getQualities()
    {
        return $this->getParentClassShortName(get_called_class()) . ":" . PHP_EOL .
            "Health: ".$this->getHealth() . PHP_EOL .
            "Strength: ".$this->getStrength() . PHP_EOL .
            "Defense: ".$this->getDefense() . PHP_EOL .
            "Speed: ".$this->getSpeed() . PHP_EOL .
            "Luck: ".$this->getLuck() . PHP_EOL;
    }

    /**
     * @param $obj
     * @return string
     */
    public function getParentClassShortName($obj)
    {
        $obj = new \ReflectionClass(get_called_class());
        return $obj->getShortName();
    }
}