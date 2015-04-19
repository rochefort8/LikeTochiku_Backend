<?php
$text_param1 = isset($_POST["text_param1"])? $_POST["text_param1"] : "";
$file_param1 = isset($_FILES["file_param1"]["name"])? $_FILES["file_param1"]["name"] : "" ; 

if (is_uploaded_file($_FILES["file_param1"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["file_param1"]["tmp_name"], "/tmp/" . $_FILES["file_param1"]["name"])) {
    chmod("/tmp/" . $_FILES["file_param1"]["name"], 0644);
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}
$file_param1_uploaded_path = "/tmp/" . $_FILES["file_param1"]["name"] ;
?>

<head>

<meta charset = "UTF-8">
<title>画用紙リレー</title>
<link rel="stylesheet" href="./contact.css" type="text/css" />
</head>

<body>
<div class="main">
<div id="contactInfo">

     <h1>お問い合わせ（確認）</h1>

     <form name="form1" action="./send.php" method="post">
     <input type="hidden" name="text_param1"  value="<?php echo htmlspecialchars($text_param1, ENT_QUOTES, "UTF-8");?>">
     <input type="hidden" name="file_param1" value="<?php echo htmlspecialchars($file_param1, ENT_QUOTES, "UTF-8");?>">
     <input type="hidden" name="file_param1_uploaded_path" 
     	    value="<?php echo htmlspecialchars($file_param1_uploaded_path, ENT_QUOTES, "UTF-8");?>">
     <table  class="contact_tbl">

     <tr>
       <th>Comment</th>
         <td><?php echo htmlspecialchars($text_param1, ENT_QUOTES, "UTF-8");?></td>
     </tr>
     <tr>
       <th>画像</th>
       <td><?php echo nl2br(htmlspecialchars($file_param1, ENT_QUOTES, "UTF-8"));?></td>
     </tr>
     </table>

    <div id="btn_area">
      <input type="button" name="back_btn" value="戻る"
         onclick="form1.action='./index.php';form1.submit();" class="btn"> &nbsp;&nbsp;
      <input type="submit" name="next_btn" value="送信" class="btn">
    </div>
</form>

</div><!--/contactInfo-->
</div><!--/main-->
</body>
</html>