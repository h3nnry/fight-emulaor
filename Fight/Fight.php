<?php

/**
 * Created by PhpStorm.
 * User: lunguandrei
 * Date: 17.06.17
 * Time: 13:10
 */

namespace Fight;

use Fight\Character;
use Fight\Orderus;
use Fight\Beast;

/**
 * Class Fight
 * @package Fight
 */
class Fight
{

    /**
     * @var Orderus
     */
    private $orderus;

    /**
     * @var Beast
     */
    private $beast;
    /**
     * @var Character
     */
    private $winner;

    /**
     * Fight constructor
     */
    public function __construct()
    {
        $this->orderus = new Orderus();
        $this->beast = new Beast();
        $this->startMessage();
    }

    /**
     * Run Fight
     * @return void
     */
    public function execute()
    {
        $this->fight();
        $this->endMessage();
    }

    /**
     * Dispay initial message
     * @return string
     */
    private function startMessage()
    {
        $message = <<<EOT
                                                          
-----------------------------------------------------------
Fighters:
-----------------------------------------------------------
{$this->orderus->getQualities()}
-----------------------------------------------------------
{$this->beast->getQualities()}
===========================================================
*********************** Start Fight ***********************
===========================================================
EOT;
         printMessage($message);
    }

    /**
     * Begin Fight
     *
     * @return void
     */
    private function fight()
    {
        $attacantsOrder = $this->getAttacantsOrder($this->orderus, $this->beast);
        $firstAttack = true;
        while ($this->checkHealth($attacantsOrder[0], $attacantsOrder[1])) {
            $attacantsOrder[0]->attack($attacantsOrder[1], $firstAttack);
            $firstAttack = false;
            $this->printAttackDetails($attacantsOrder[0], $attacantsOrder[1]);
            if (!$this->checkHealth($attacantsOrder[0], $attacantsOrder[1])) {
                break;
            }
            $attacantsOrder[1]->attack($attacantsOrder[0]);
            $this->printAttackDetails($attacantsOrder[1], $attacantsOrder[0]);
            if (!$this->checkHealth($attacantsOrder[0], $attacantsOrder[1])) {
                break;
            }
        }
        $this->displayWinner();
    }

    /**
     * @param \Fight\Orderus $orderus
     * @param \Fight\Beast $beast
     * @return array
     */
    private function getAttacantsOrder(Orderus $orderus, Beast $beast)
    {
        if (! ($orderus->getSpeed() > $beast->getSpeed())) {
            return [$orderus, $beast];
        } else if ($orderus->getSpeed() < $beast->getSpeed()) {
            return array($beast, $orderus);
        } else {
            if ($orderus->getLuck() >= $beast->getLuck()) {
                return array($orderus, $beast);
            } else {
                return array($beast, $orderus);
            }
        }
    }

    /**
     * @param \Fight\Character $character1
     * @param \Fight\Character $character2
     * @return bool
     */
    private function checkHealth(Character $character1, Character $character2)
    {
        if ($character1->getHealth() == 0) {
            $this->setWinner($character2);
            return false;
        } else if ($character2->getHealth() == 0) {
            $this->setWinner($character1);
            return false;
        }

        return true;
    }

    private function setWinner(Character $winner)
    {
        $this->winner = $winner;
    }

    private function displayWinner()
    {
        $winner = new \ReflectionClass($this->getWinner());

        $message = PHP_EOL . "================================================" . PHP_EOL;

            $message .= "The winner is - " . $winner->getShortName();

        $message .= PHP_EOL . "================================================" . PHP_EOL;

         printMessage($message);
    }

    /**
     * @return Character
     */
    private function getWinner()
    {
        return $this->winner;
    }

    /**
     * @param Character $character1
     * @param Character $character2
     */
    private function printAttackDetails(Character $character1, Character $character2)
    {

        $name_character1 = $this->getParentClassShortName($character1);
        $name_character2 = $this->getParentClassShortName($character2);
        $message = PHP_EOL . "-------------------------------------------" . PHP_EOL;
        $message .=  "$name_character1 is attacking $name_character2";
        $message .=  PHP_EOL. "$name_character2 health is now {$character2->getHealth()}";
        $message .= PHP_EOL . "-------------------------------------------" . PHP_EOL;
         printMessage($message);
    }

    /**
     * @param $obj
     * @return string
     */
    private function getParentClassShortName($obj)
    {
        $obj = new \ReflectionClass($obj);
        return $obj->getShortName();
    }

    private function endMessage()
    {
        $message = <<<EOT
===========================================================
************************ Game over ************************
===========================================================
EOT;
         printMessage($message);

    }

}