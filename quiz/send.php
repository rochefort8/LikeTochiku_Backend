<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>

<?php

// POSTされたデータを取得します。
$text_param1 = isset($_POST["text_param1"])? $_POST["text_param1"] : "";
$text_param2 = isset($_POST["text_param2"])? $_POST["text_param2"] : "";
$text_param3 = isset($_POST["text_param3"])? $_POST["text_param3"] : "";
$text_param4 = isset($_POST["text_param4"])? $_POST["text_param4"] : "";
$text_param5 = isset($_POST["text_param5"])? $_POST["text_param5"] : "";
$text_param6 = isset($_POST["text_param6"])? $_POST["text_param6"] : "";
$text_param7 = isset($_POST["text_param7"])? $_POST["text_param7"] : "";
$text_param8 = isset($_POST["text_param8"])? $_POST["text_param8"] : "";

$file_param1 = isset($_POST["file_param1"])? $_POST["file_param1"] : "";
$file_param1 = isset($_POST["file_param2"])? $_POST["file_param2"] : "";

$file_param1_uploaded_path = isset($_POST["file_param1_uploaded_path"])? $_POST["file_param1_uploaded_path"] : "";
$file_param2_uploaded_path = isset($_POST["file_param2_uploaded_path"])? $_POST["file_param2_uploaded_path"] : "";

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

    $obj = ParseObject::create("Quiz");

    $obj->set( "title" , $text_param1 ) ;
    $obj->set( "difficulty" , $text_param2 ) ;
    $obj->set( "quiz" , $text_param3 ) ;

    $file1 = ParseFile::createFromFile( $file_param1_uploaded_path ,basename($file_param1_uploaded_path )) ;
    $obj->set( "quiz_image" , $file1 ) ;

    $obj->set( "choice1" , $text_param4 ) ;
    $obj->set( "choice2" , $text_param5 ) ;
    $obj->set( "choice3" , $text_param6 ) ;
    $obj->set( "answer" , $text_param7 ) ;

    $file2  = ParseFile::createFromFile( $file_param2_uploaded_path ,basename($file_param2_uploaded_path )) ;
    $obj->set( "answer_image" , $file2 ) ;

    $obj->set( "description" , $text_param8 ) ;
    $obj->save() ;

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
