<?php

$beerName = isset($_POST["beerName"])? $_POST["beerName"] : "";
$beerName_JP = isset($_POST["beerName_JP"])? $_POST["beerName_JP"] : "";
$beerType = isset($_POST["beerType"])? $_POST["beerType"] : "";
$beerDescrition = isset($_POST["beerDescription"])? $_POST["beerDescription"] : "";
$beerImage = isset($_POST["beerImage"])? $_POST["beerImage"] : "";

require_once("header.php");
?>
<body>
<div class="main">
<div id="contactInfo">

	<h1>とーち君クイズ 入力フォーム</h1>

	<form name="form1" action="./confirm.php" method="post" enctype="multipart/form-data">
	  
	  <table class="contact_tbl">
	    <tr>
	      <th>タイトル</th>
	      <td>
	        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($beerName, ENT_QUOTES, "UTF-8");?>">
	      </td>
	    </tr>
	    <tr>
	      <th><span class="f_red"></span>難易度</th>
	      <td>
	              <select name="difficulty" id="difficulty">
				<option value="1">高</option>
				<option value="2">中</option>
				<option value="3">低</option>
                                </select>
	      </td>
	    </tr>
	    <tr>
	      <th><span class="f_red"></span>クイズ</th>
	      <td><textarea id="quiz" name="quiz" required><?php echo htmlspecialchars($beerDescription, ENT_QUOTES, "UTF-8");?></textarea></td>
	    </tr>


	    <tr>
	      <th><span class="f_red"></span>クイズ画像</th>
	      <td>
	        <input type="file" name="quiz_image" size="30" /><br />
	      </td>
	    </tr>
	    <tr>
	      <th>選択肢1</th>
	      <td>
	        <input type="text" id="choice1" name="choice1" value="<?php echo htmlspecialchars($beerName, ENT_QUOTES, "UTF-8");?>">
	      </td>
	    </tr>

	    <tr>
	      <th>選択肢2</th>
	      <td>
	        <input type="text" id="choice2" name="choice2" value="<?php echo htmlspecialchars($beerName, ENT_QUOTES, "UTF-8");?>">
	      </td>
	    </tr>

	    <tr>
	      <th>選択肢3</th>
	      <td>
	        <input type="text" id="choice3" name="choice3" value="<?php echo htmlspecialchars($beerName, ENT_QUOTES, "UTF-8");?>">
	      </td>
	    </tr>
	    <tr>
	      <th><span class="f_red"></span>難易度</th>
	      <td>
	              <select name="answer" id="answer">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
                                </select>
	      </td>
	    </tr>
	    <tr>
	      <th><span class="f_red"></span>解説</th>
	      <td><textarea id="description" name="description" required><?php echo htmlspecialchars($beerDescription, ENT_QUOTES, "UTF-8");?></textarea></td>
	    </tr>

	    <tr>
	      <th><span class="f_red"></span>回答画像</th>
	      <td>
	        <input type="file" name="answer_image" size="30" /><br />
	      </td>
	    </tr>

	  </table>
	  <div id="btn_area">
	  	<input type="submit" name="next_btn" value="次へ" class="btn">
	  </div>

	</form>
	  
</div><!--/contactInfo-->
</div><!--/main-->
</body>
</html>