<?php

$beerName = $_POST['beerName'] ;
$beerName_JP = $_POST['beerName_JP'] ;
$beerType = $_POST['beerType'] ;
$beerDescription = $_POST['beerDescription'] ;

require_once(__DIR__ . '/php-console/src/PhpConsole/__autoload.php');
if(PhpConsole\Connector::getInstance()->isActiveClient()) {

}

PhpConsole\Helper::register();

PC::debug($beerName);
PC::debug($beerType);
PC::debug($beerDescription);

?>
