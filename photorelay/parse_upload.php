<?php

require 'parse-php-sdk/autoload.php';

date_default_timezone_set('Asia/Tokyo');

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseFile;
  
ParseClient::initialize(
	'rLfiUPlbIE5orN0Al07gpotnvIpqwTUpoQlkhjO0',
	'LnIgqdYSz8krs6iKBdH5XtGqglkyjzuSEHTnNbEC', 
	'jtNDkVGTpaVeregAuvlTYOUCErbKnSMgE7F6x9Fo'
	);


	try {

    $file = ParseFile::createFromFile("/tmp/ROCHEFORT_10/ROCHEFORT_10.jpg","ROCHEFORT_10.jpg") ;


    $obj = ParseObject::create("BelgianBeer");
    $obj->set("file", $file);

    $obj->save();

} catch (ParseException $ex) {
    echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
}

?>
