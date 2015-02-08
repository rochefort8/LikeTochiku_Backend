<?php

require 'parse-php-sdk/autoload.php';

date_default_timezone_set('Asia/Tokyo');

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseFile;
  
ParseClient::initialize('rLfiUPlbIE5orN0Al07gpotnvIpqwTUpoQlkhjO0',
	'LnIgqdYSz8krs6iKBdH5XtGqglkyjzuSEHTnNbEC', 
	'jtNDkVGTpaVeregAuvlTYOUCErbKnSMgE7F6x9Fo');


    $file = ParseFile::createFromFile("/tmp/BELLE_VUE_KRIEK/BELLE_VUE_KRIEK.jpg","BELLE_VUE_KRIEK.jpg") ;
    $obj = ParseObject::create("TestFileObject");
    $obj->set("file", $file);
    $obj->save();

?>