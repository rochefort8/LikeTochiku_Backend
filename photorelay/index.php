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

	<h1>Belgian Beer</h1>

	<form name="form1" action="./confirm.php" method="post" enctype="multipart/form-data">
	  
	  <p>
	  Belgian Beer..
	  </p>
	  
	  <table class="contact_tbl">
	    <tr>
	      <th>コメント</th>
	      <td>
	        <input type="text" id="beerName_JP" name="beerName_JP" value="<?php echo htmlspecialchars($beerName_JP, ENT_QUOTES, "UTF-8");?>">
	      </td>
	    </tr>
	    <tr>
	      <th><span class="f_red"></span>画像</th>
	      <td>
	        <input type="file" name="beerImage" size="30" /><br />
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