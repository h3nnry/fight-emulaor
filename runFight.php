<?php
/**
 * Created by PhpStorm.
 * User: lunguandrei
 * Date: 18.06.17
 * Time: 13:55
 */

require './autoload.php';
require './Fight/util.php';

use Fight\Fight;

$fight = new Fight();
$fight->execute();
exit(1);