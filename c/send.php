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

function upload_to_parse( $name, $image, $description, $archive )
{
    $obj = ParseObject::create("BelgianBeer");

    $file_image       = ParseFile::createFromFile( $image ,basename($image)) ;

    $obj->set( "image" , $name ) ;
    $obj->set( "caption" , $description ) ;
    $obj->save() ;
}

$base_filename = generate_file_basename($beerName) ;

$tmp_dirname = "/tmp/" . $base_filename ;
$dirname = $base_filename ;

//rmdir ( $tmp_dirname ) ;
//system ( "rm -rf" . " " . $tmp_dirname ) ;
mkdir ( $tmp_dirname ) ;
rename ($beerImage_uploaded_path, $tmp_dirname . "/" . $base_filename . ".jpg") ;

create_xml( $beerName, $beerName_JP, $beerType,
	    $base_filename . ".txt", $base_filename . ".jpg",
	    $tmp_dirname . "/" . "beer.xml" ) ;
file_put_contents( $tmp_dirname . "/" . $base_filename . ".txt" , $beerDescription) ;
chdir('/tmp/') ;
create_zip_archive($dirname) ;

$image = $tmp_dirname . "/" . $base_filename . ".jpg" ;
$description = $tmp_dirname . "/" . $base_filename . ".txt" ;
$archive = "/tmp/" . $base_filename . ".zip" ;

upload_to_parse( $beerName, $image, $description, $archive ) ;

$upload_success = true ;

require_once("header.php");
?>

<body>
<div class="main">
<div id="contactInfo">

<?php if($upload_success){ ?>
	<h1>お問い合わせ（完了）</h1>
	<div id="thanks">
		<p>
			お問い合わせを送信しました。<br>
			後日担当者から、ご連絡を差し上げます。今しばらくお待ちくださいませ。<br>
			<br>
			※日程によりましては、お返事に時間がかかる場合がございます。何卒ご了承くださいませ。
		</p>
	</div>
<?php } ?>

<?php if(!$upload_success){ ?>
	<h1>お問い合わせ（送信失敗）</h1>
	<p>
		<span class="error">送信に失敗しました。</span>
	</p>
<?php } ?>
	  <div id="btn_area">
		  <input type="button" name="back_btn" value="戻る"
		         onclick="location.href='./index.php'"" class="btn">

	  </div>

</div><!--/contactInfo-->
</div><!--/main-->

</body>
</html>
