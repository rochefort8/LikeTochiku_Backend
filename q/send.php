<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>


<?php


// POSTされたデータを取得します。
$title = isset($_POST["title"])? $_POST["title"] : "";
$difficulty = isset($_POST["difficulty"])? $_POST["difficulty"] : "";
$quiz = isset($_POST["quiz"])? $_POST["quiz"] : "";
$quiz_image = isset($_POST["quiz_image"])? $_POST["quiz_image"] : "";
$choice1 = isset($_POST["choice1"])? $_POST["choice1"] : "";
$choice2 = isset($_POST["choice2"])? $_POST["choice2"] : "";
$choice3 = isset($_POST["choice3"])? $_POST["choice3"] : "";
$answer = isset($_POST["answer"])? $_POST["answer"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";


$quiz_image = isset($_POST["quiz_image"])? $_POST["quiz_image"] : "";
$answer_image = isset($_POST["answer_image"])? $_POST["answer_image"] : "";

$quiz_image_uploaded_path = isset($_POST["quiz_image_uploaded_path"])? $_POST["quiz_image_uploaded_path"] : "";
$answer_image_uploaded_path = isset($_POST["answer_image_uploaded_path"])? $_POST["answer_image_uploaded_path"] : "";

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

    $obj->set( "title" , $title ) ;
    $obj->set( "quiz" , $quiz ) ;
    $file_quiz_image  = ParseFile::createFromFile( $quiz_image_uploaded_path ,basename($quiz_image_uploaded_path )) ;

    $obj->set( "quiz_image" , $file_quiz_image ) ;
    $obj->set( "choice1" , $choice1 ) ;
    $obj->set( "choice2" , $choice2 ) ;
    $obj->set( "choice3" , $choice3 ) ;

    $obj->set( "answer" , $answer ) ;
    $file_answer_image  = ParseFile::createFromFile( $answer_image_uploaded_path ,basename($answer_image_uploaded_path )) ;
    $obj->set( "answer_image" , $file_answer_image ) ;
    $obj->set( "description" , $description ) ;
    $obj->save() ;


$upload_success=1 ;

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
