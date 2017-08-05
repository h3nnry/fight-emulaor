<?php
/**
 * Created by PhpStorm.
 * User: lunguandrei
 * Date: 17.06.17
 * Time: 13:55
 */

function printMessage($message)
{
    echo (! defined('STDIN') ) ? '<pre>'. $message . '</pre>' . PHP_EOL : $message . PHP_EOL;
}