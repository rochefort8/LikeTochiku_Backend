<?php

$beerName = isset($_POST["beerName"])? $_POST["beerName"] : "";
$beerName_JP = isset($_POST["beerName_JP"])? $_POST["beerName_JP"] : "";
$beerType = isset($_POST["beerType"])? $_POST["beerType"] : "";
$beerDescription = isset($_POST["beerDescription"])? $_POST["beerDescription"] : "";
//$beerImage = isset($_POST["beerImage"])? $_POST["beerImage"] : "";
$beerImage = isset($_FILES["beerImage"]["name"])? $_FILES["beerImage"]["name"] : "" ; 
$beerImage_uploaded_path = "/tmp/" . $_FILES["beerImage"]["name"] ;

if (is_uploaded_file($_FILES["beerImage"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["beerImage"]["tmp_name"], "/tmp/" . $_FILES["beerImage"]["name"])) {
    chmod("/tmp/" . $_FILES["beerImage"]["name"], 0644);
//    echo $_FILES["beerImage"]["name"] . "をアップロードしました。";

  } else {
//    echo "ファイルをアップロードできません。";
  }
} else {
//  echo "ファイルが選択されていません。";
}



// ----- 入力チェック -----
$err_msg = array();	// エラーメッセージを格納する配列

// (1)必須チェック

//if(strlen($mail) == 0){
//	$err_msg[] = "E-mailを入力してください。";
//}
//if(strlen($naiyou) == 0){
//	$err_msg[] = "お問い合わせ内容を入力してください。";
//}
// (2)フォーマットチェック
//if(count($err_msg) == 0){

//	if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)) {
//		$err_msg[] = "正しいE-mailを入力してください。";
//	}
//}

// ----- 画面表示 -----
require_once("header.php");
?>
<body>
<div class="main">
<div id="contactInfo">

	<h1>お問い合わせ（確認）</h1>

	<?php if(count($err_msg) > 0){?>
	<div class="error">
		入力エラーがあります。<br>
		<ul>
			<?php foreach($err_msg as $msg){?>
				<li><?php echo $msg;?></li>
			<?php }?>
		</ul>
	</div>
	<?php }else{ ?>
		<p>
		この内容でよろしければ、「送信」をクリックしてください。
		<br>メールアドレスに間違いがあると回答を返信できませんので十分ご確認ください。
		</p>
	<?php }?>

	<form name="form1" action="./send.php" method="post">
	  <input type="hidden" name="beerName" value="<?php echo htmlspecialchars($beerName, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="beerName_JP" value="<?php echo htmlspecialchars($beerName_JP, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="beerType" value="<?php echo htmlspecialchars($beerType, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="beerDescription" value="<?php echo htmlspecialchars($beerDescription, ENT_QUOTES, "UTF-8");?>">

	  <input type="hidden" name="beerImage" value="<?php echo htmlspecialchars($beerImage, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="beerImage_uploaded_path" value="<?php echo htmlspecialchars($beerImage_uploaded_path, ENT_QUOTES, "UTF-8");?>">

	  <table  class="contact_tbl">
	    <tr>
	      <th>Comment</th>
	      <td><?php echo htmlspecialchars($beerName_JP, ENT_QUOTES, "UTF-8");?></td>
	    </tr>
	    <tr>
	      <th>画像</th>
	      <td><?php echo nl2br(htmlspecialchars($beerImage, ENT_QUOTES, "UTF-8"));?></td>
	    </tr>
	  </table>
	  <div id="btn_area">
		  <input type="button" name="back_btn" value="戻る"
		         onclick="form1.action='./index.php';form1.submit();" class="btn">
		  &nbsp;&nbsp;
		  <?php if(count($err_msg) == 0){?>
		  <input type="submit" name="next_btn" value="送信" class="btn">
		  <?php }?>
	  </div>
	</form>

</div><!--/contactInfo-->
</div><!--/main-->
</body>
</html>