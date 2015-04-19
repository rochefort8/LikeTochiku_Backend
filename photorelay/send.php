<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>

<?php

// POSTされたデータを取得します。
$text_param1 = isset($_POST["text_param1"])? $_POST["text_param1"] : "";
$file_param1 = isset($_POST["file_param1"])? $_POST["file_param1"] : "";

$file_param1_uploaded_path = isset($_POST["file_param1_uploaded_path"])? $_POST["file_param1_uploaded_path"] : "";

require '../parse-php-sdk/autoload.php';

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
    $obj = ParseObject::create("Photo");

   try {
     $file_image       = ParseFile::createFromFile( $image ,basename($image)) ;
     $obj->set( "image" , $file_image ) ;
     $obj->set( "caption" , $name ) ;
     $obj->save() ;
   } catch (\Parse\ParseException $e) {
      print $e ;
   }
}

upload_to_parse( $text_param1, $file_param1_uploaded_path,"", "" ) ;

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
