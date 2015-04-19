<head>

<meta charset = "UTF-8">
<title>画用紙リレー</title>
<link rel="stylesheet" href="./contact.css" type="text/css" />
</head>

<body>
<div class="main">
<div id="contactInfo">

     <form name="form1" action="./confirm.php" method="post" enctype="multipart/form-data">

     <p>とーち君クイズ 入力フォーム</p>	  
	  
     <table class="contact_tbl">

       <tr>
         <th>タイトル</th>
         <td>
         <input type="text" id="text_param1" name="text_param1" size=30
  	   	  value="<?php echo htmlspecialchars($text_param1, ENT_QUOTES, "UTF-8");?>">
         </td>
       </tr>

       <tr>
         <th>難易度</th>
         <td>
	   <select name="text_param2" id="text_param2">
			<option value="1">高</option>
			<option value="2">中</option>
			<option value="3">低</option>
           </select>
         </td>
       </tr>

       <tr>
         <th>クイズ</th>
         <td>
	 <textarea id="text_param3" name="text_param3" required><?php echo htmlspecialchars($text_param3, ENT_QUOTES, "UTF-8");?></textarea>
         </td>
       </tr>

       <tr>
         <th><span class="f_red"></span>画像</th>
         <td>
           <input type="file" id="file_param1" name="file_param1" size="30" /><br />
         </td>
       </tr>


       <tr>
         <th>選択肢1</th>
         <td>
         <input type="text" id="text_param4" name="text_param4" size=30
  	   	  value="<?php echo htmlspecialchars($text_param4, ENT_QUOTES, "UTF-8");?>">
         </td>
       </tr>

       <tr>
         <th>選択肢2</th>
         <td>
         <input type="text" id="text_param5" name="text_param5" size=30
  	   	  value="<?php echo htmlspecialchars($text_param5, ENT_QUOTES, "UTF-8");?>">
         </td>
       </tr>

       <tr>
         <th>選択肢3</th>
         <td>
         <input type="text" id="text_param6" name="text_param6" size=30
  	   	  value="<?php echo htmlspecialchars($text_param6, ENT_QUOTES, "UTF-8");?>">
         </td>
       </tr>

       <tr>
         <th>正解</th>
         <td>
	   <select name="text_param7" id="text_param7">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
           </select>
         </td>
       </tr>

       <tr>
         <th>説明</th>
         <td>
         <input type="text" id="text_param8" name="text_param8" size=30
  	   	  value="<?php echo htmlspecialchars($text_param8, ENT_QUOTES, "UTF-8");?>">
         </td>
       </tr>

       <tr>
         <th><span class="f_red"></span>回答の画像</th>
         <td>
           <input type="file" id="file_param2" name="file_param2" size="30" /><br />
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