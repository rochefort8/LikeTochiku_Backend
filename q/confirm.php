<?php

$title = isset($_POST["title"])? $_POST["title"] : "";
$difficulty = isset($_POST["difficulty"])? $_POST["difficulty"] : "";
$quiz = isset($_POST["quiz"])? $_POST["quiz"] : "";
$quiz_image = isset($_POST["quiz_image"])? $_POST["quiz_image"] : "";
$choice1 = isset($_POST["choice1"])? $_POST["choice1"] : "";
$choice2 = isset($_POST["choice2"])? $_POST["choice2"] : "";
$choice3 = isset($_POST["choice3"])? $_POST["choice3"] : "";
$answer = isset($_POST["answer"])? $_POST["answer"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";

$quiz_image = isset($_FILES["quiz_image"]["name"])? $_FILES["quiz_image"]["name"] : "" ; 
$answer_image = isset($_FILES["answer_image"]["name"])? $_FILES["answer_image"]["name"] : "" ; 
$quiz_image_uploaded_path = "/tmp/" . $_FILES["quiz_image"]["name"] ;
$answer_image_uploaded_path = "/tmp/" . $_FILES["answer_image"]["name"] ;

if (is_uploaded_file($_FILES["quiz_image"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["quiz_image"]["tmp_name"], "/tmp/" . $_FILES["quiz_image"]["name"])) {
    chmod("/tmp/" . $_FILES["quiz_image"]["name"], 0644);
  } else {
  }
} else {

}

if (is_uploaded_file($_FILES["answer_image"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["answer_image"]["tmp_name"], "/tmp/" . $_FILES["answer_image"]["name"])) {
    chmod("/tmp/" . $_FILES["answer_image"]["name"], 0644);
  } else {
  }
} else {

}

// ----- 入力チェック -----
$err_msg = array();	// エラーメッセージを格納する配列

// ----- 画面表示 -----
require_once("header.php");
?>
<body>
<div class="main">
<div id="contactInfo">

	<h1>（確認）</h1>

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
	  <input type="hidden" name="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="difficulity" value="<?php echo htmlspecialchars($difficulty, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="quiz" value="<?php echo htmlspecialchars($quiz, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="choice1" value="<?php echo htmlspecialchars($choice1, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="choice2" value="<?php echo htmlspecialchars($choice2, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="choice3" value="<?php echo htmlspecialchars($choice3, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="answer" value="<?php echo htmlspecialchars($answer, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="description" value="<?php echo htmlspecialchars($description, ENT_QUOTES, "UTF-8");?>">

	  <input type="hidden" name="quiz_image" value="<?php echo htmlspecialchars($quiz_image, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="answer_image" value="<?php echo htmlspecialchars($answer_image, ENT_QUOTES, "UTF-8");?>">

	  <input type="hidden" name="quiz_image_uploaded_path" value="<?php echo htmlspecialchars($quiz_image_uploaded_path, ENT_QUOTES, "UTF-8");?>">
	  <input type="hidden" name="answer_image_uploaded_path" value="<?php echo htmlspecialchars($answer_image_uploaded_path, ENT_QUOTES, "UTF-8");?>">

	  <table  class="contact_tbl">
	    <tr>
	      <th>タイトル</th>
	      <td>
	        <?php echo htmlspecialchars($title, ENT_QUOTES, "UTF-8");?>
	      </td>
	    </tr>
	    <tr>
	      <th>難易度</th>
	      <td><?php echo htmlspecialchars($difficulty, ENT_QUOTES, "UTF-8");?></td>
	    </tr>
	    <tr>
	      <th>クイズ</th>
	      <td><?php echo nl2br(htmlspecialchars($quiz, ENT_QUOTES, "UTF-8"));?></td>
	    </tr>
	    <tr>
	      <th>クイズ画像</th>
	      <td><?php echo nl2br(htmlspecialchars($quiz_image, ENT_QUOTES, "UTF-8"));?></td>	    </tr>
	    <tr>
	      <th>選択肢1</th>
	      <td><?php echo nl2br(htmlspecialchars($choice1, ENT_QUOTES, "UTF-8"));?></td>
	    </tr>
	    <tr>
	      <th>選択肢2</th>
	      <td><?php echo nl2br(htmlspecialchars($choice2, ENT_QUOTES, "UTF-8"));?></td>
	    </tr>
	    <tr>
	      <th>選択肢3</th>
	      <td><?php echo nl2br(htmlspecialchars($choice3, ENT_QUOTES, "UTF-8"));?></td>
	    </tr>
	    <tr>
	      <th>回答</th>
	      <td><?php echo nl2br(htmlspecialchars($answer, ENT_QUOTES, "UTF-8"));?></td>
	    </tr>
	    <tr>
	      <th>解説</th>
	      <td><?php echo nl2br(htmlspecialchars($description, ENT_QUOTES, "UTF-8"));?></td>
	    </tr>
	    <tr>
	      <th>回答画像</th>
	      <td><?php echo nl2br(htmlspecialchars($answer_image, ENT_QUOTES, "UTF-8"));?></td>	    </tr>
	    <tr>

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