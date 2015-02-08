<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>


<?php

// POSTされたデータを取得します。
$beerName = isset($_POST["beerName"])? $_POST["beerName"] : "";
$beerName_JP = isset($_POST["beerName_JP"])? $_POST["beerName_JP"] : "";
$beerType = isset($_POST["beerType"])? $_POST["beerType"] : "";
$beerDescription = isset($_POST["beerDescription"])? $_POST["beerDescription"] : "";
$beerImage = isset($_POST["beerImage"])? $_POST["beerImage"] : "";
$beerImage_uploaded_path = isset($_POST["beerImage_uploaded_path"])? $_POST["beerImage_uploaded_path"] : "";

function generate_file_basename($str)
{
	$_str=str_replace(" ","_",$str); 
	return $_str ;
}

function create_xml($name_en,$name_jp,$type,$description,$image,$saveto)
{
	$dom = new DomDocument('1.0', 'UTF-8');

	$prefs = $dom->appendChild($dom->createElement('belgianbeer'));
	$pref = $prefs->appendChild($dom->createElement('beer'));

	$pref->setAttribute('name', $name_en);
	$pref->appendChild($dom->createElement('name_en', $name_en));
	$pref->appendChild($dom->createElement('name_jp', $name_jp));
	$pref->appendChild($dom->createElement('type', $type));
	$pref->appendChild($dom->createElement('description', $description));
	$pref->appendChild($dom->createElement('image', $image));

	$dom->formatOutput = true;
	$dom->save($saveto) ;
}

function create_zip_archive($dirname)
{
	$files = array_diff( scandir($dirname), array(".", "..") );

	$zip = new ZipArchive();
	$res = $zip->open($dirname . ".zip", ZipArchive::CREATE);
 	
	if($res === true){
	     foreach($files as $file){
	            $zip->addFile($dirname . "/" . $file);
	     }
    	     $zip->close();
	} else {
	    echo 'Error Code: ' . $res;
	}
}


$base_filename = generate_file_basename($beerName) ;

$tmp_dirname = "/tmp/" . $base_filename ;
$dirname = $base_filename ;

//rmdir ( $tmp_dirname ) ;
system ( "rm -rf" . " " . $tmp_dirname ) ;
mkdir ( $tmp_dirname ) ;
rename ($beerImage_uploaded_path, $tmp_dirname . "/" . $base_filename . ".jpg") ;

create_xml( $beerName, $beerName_JP, $beerType,
	    $base_filename . ".txt", $base_filename . ".jpg",
	    $tmp_dirname . "/" . "beer.xml" ) ;
file_put_contents( $tmp_dirname . "/" . $base_filename . ".txt" , $beerDescription) ;
chdir('/tmp/') ;
create_zip_archive($dirname) ;

chdir('../') ;

print "File /tmp/" . $base_filename . ".zip" . " was created." ;
?>

</body>
</html>
