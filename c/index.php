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
	      <th>名称(ローマ字）</th>
	      <td>
	        <input type="text" id="beerName" name="beerName" value="<?php echo htmlspecialchars($beerName, ENT_QUOTES, "UTF-8");?>">
	      </td>
	    </tr>
	    <tr>
	      <th>名称(日本語）</th>
	      <td>
	        <input type="text" id="beerName_JP" name="beerName_JP" value="<?php echo htmlspecialchars($beerName_JP, ENT_QUOTES, "UTF-8");?>">
	      </td>
	    </tr>
	    <tr>
	      <th><span class="f_red"></span> 種類</th>
	      <td>
	              <select name="beerType" id="beerType">
		                <option value=""></option>
				<option value="1">Trappist</option>
				<option value="2">Belgian White</option>
				<option value="3">Red</option>
				<option value="4">Lambic</option>
				<option value="5">Abbey</option>
				<option value="6">Golden Ale</option>
                                <option value="7">Saison</option>
                                <option value="7">Christmas</option>
                                <option value="99">Others</option>
                                </select>
	      </td>
	    </tr>
	    <tr>
	      <th><span class="f_red"></span>説明</th>
	      <td><textarea id="beerDescription" name="beerDescription" required><?php echo htmlspecialchars($beerDescription, ENT_QUOTES, "UTF-8");?></textarea></td>
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