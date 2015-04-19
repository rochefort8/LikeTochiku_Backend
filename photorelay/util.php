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
