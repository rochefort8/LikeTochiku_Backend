<?php header("Content-Type:text/html;charset=euc-jp"); ?>
<?php //error_reporting(E_ALL | E_STRICT);
##-----------------------------------------------------------------------------------------------------------------##
#
#  PHP�᡼��ץ���ࡡ�ե꡼�� �ǽ�������2014/12/12
#����¤����Ѥϼ�����Ǥ�ǹԤäƤ���������
#	
#  ���ΤȤ����ä��������Ϥ���ޤ��󤬡��Զ����������ޤ����鲼���ޤǤ�Ϣ����������
#  MailAddress: info@php-factory.net
#  name: K.Numata
#  HP: http://www.php-factory.net/
#
#  ���ס��������Ȥǥ����å��ܥå�������Ѥ�����ΤߤǤ���������
#  �����å��ܥå�������Ѥ������input�����˵��Ҥ���name°�����ͤ�ɬ������η��ˤ��Ƥ���������
#  �㡡name="�������Ȥ򤷤ä����ä���[]"  �Ȥ��Ʋ�������
#  name���ͤκǸ��[��]���դ��롣����ʤ���ʣ�����ͤ�����Ǥ��ޤ���
#
##-----------------------------------------------------------------------------------------------------------------##
if (version_compare(PHP_VERSION, '5.1.0', '>=')) {//PHP5.1.0�ʾ�ξ��Τߥ����ॾ��������
	date_default_timezone_set('Asia/Tokyo');//�����ॾ�������������ܰʳ��ξ��ˤ�Ŭ�����꤯��������
}
/*-------------------------------------------------------------------------------------------------------------------
* ���ʲ���������������
* ���͡�=�θ�ˤϿ����ʳ���ʸ����ʰ���������ˤϥ��֥륯�����ơ�������"�ס��ޤ��ϡ�'�פǰϤ�Ǥ��ޤ���
* �������򳰤������������ꤷ�ʤ��Ǥ������������Υ��ߥ�����;�פ������ʤ�����������
* ���ޤ���Ƭ�ˡ�$�פ��դ���ʸ������ѹ����ʤ��Ǥ���������������1�ޤ���0�����ꤷ�Ƥ����Τ�ɬ��Ⱦ�ѿ��������겼������
* ���᡼�륢�ɥ쥹��name°�����ͤ���Email�פǤϤʤ���硢�ʲ�ɬ������ս�Ρ�$Email�פ��ͤ��ѹ���������
* ��name°�����ͤ�Ⱦ�ѥ��ڡ����ϻ��ѤǤ��ޤ���
*�ʾ�Τ��Ȥ�ְ㤨�Ƥ��ޤ��ȥץ���बư��ʤ��ʤ�ޤ��Τ���ղ�������
-------------------------------------------------------------------------------------------------------------------*/


//---------------------------��ɬ�����ꡡɬ�����ꤷ�Ƥ���������-----------------------

//�����ȤΥȥåץڡ�����URL�����ǥե���ȤǤ�������λ��ˡ֥ȥåץڡ��������ץܥ���ɽ������ޤ��Τ�
$site_top = "http://www.php-factory.net/";

// �����ԥ᡼�륢�ɥ쥹 ���᡼���������᡼�륢�ɥ쥹(ʣ�����ꤹ����ϡ�,�פǶ��ڤäƤ������� �� $to = "aa@aa.aa,bb@bb.bb";)
$to = "xxxxxxxxxx@xxx.xxx";

//�ե�����Υ᡼�륢�ɥ쥹���ϲս��name°�����͡�name="����"���Ρ�����ʬ��
$Email = "Email";

/*------------------------------------------------------------------------------------------------
�ʲ����ѥ��ɻߤΤ�������ꡡ
��ͭ���ˤ���ˤϤ��Υե�����ȥե�����ڡ�����Ʊ��ɥᥤ����ˤ���ɬ�פ�����ޤ�
------------------------------------------------------------------------------------------------*/

//���ѥ��ɻߤΤ���Υ�ե�������å��ʥե�����ڡ�����Ʊ��ɥᥤ��Ǥ��뤫�ɤ����Υ����å���(����=1, ���ʤ�=0)
$Referer_check = 0;

//��ե�������å���֤���׾��Υɥᥤ�� ���ʲ���򻲹ͤ����֤��륵���ȤΥɥᥤ�����ꤷ�Ʋ�������
$Referer_check_domain = "php-factory.net";

//---------------------------��ɬ�����ꡡ�����ޤǡ�------------------------------------


//---------------------- Ǥ�����ꡡ�ʲ���ɬ�פ˱��������ꤷ�Ƥ������� ------------------------


// �����԰��Υ᡼��Ǻ��пͤ������ԤΥ᡼�륢�ɥ쥹�ˤ���(����=1, ���ʤ�=0)
// ������ϡ��᡼���������name°�����ͤ��$Email�פǻ��ꤷ���ͤˤ��Ƥ���������
//�᡼�顼�ʤɤ��ֿ�������������ʤΤǡ֤���פ���������Ǥ���
$userMail = 1;

// Bcc������᡼�륢�ɥ쥹(ʣ�����ꤹ����ϡ�,�פǶ��ڤäƤ������� �� $BccMail = "aa@aa.aa,bb@bb.bb";)
$BccMail = "";

// �����԰������������᡼��Υ����ȥ�ʷ�̾��
$subject = "�ۡ���ڡ����Τ��䤤��碌";

// ������ǧ���̤�ɽ��(����=1, ���ʤ�=0)
$confirmDsp = 1;

// ������λ��˼�ưŪ�˻���Υڡ���(���󥯥��ڡ����ʤ�)�˰�ư����(����=1, ���ʤ�=0)
// CVΨ����Ϥ��������ʤɤϥ��󥯥��ڡ����������Ѱդ���URL�򤳤β��ι��ܤǻ��ꤷ�Ƥ���������
// 0�ˤ���ȡ��ǥե���Ȥ�������λ���̤�ɽ������ޤ���
$jumpPage = 0;

// ������λ���ɽ������ڡ���URL�ʾ嵭��1�����ꤷ�����Τߡˢ�http����Ϥޤ�URL�ǻ��꤯��������
$thanksPage = "http://xxx.xxxxxxxxx/thanks.html";

// ɬ�����Ϲ��ܤ����ꤹ��(����=1, ���ʤ�=0)
$requireCheck = 0;

/* ɬ�����Ϲ���(���ϥե�����ǻ��ꤷ��name°�����ͤ���ꤷ�Ƥ����������ʾ嵭��1�����ꤷ�����Τߡ�
�ͤϥ��󥰥륯�����ơ������ǰϤߡ�ʣ���ξ��ϥ���ޤǶ��ڤäƤ����������ե�����¦�Ƚ��֤��碌����ɤ��Ǥ��� 
����η���name="����[]"�פξ��ˤ�ɬ������[]���ä���Τ���ꤷ�Ʋ�������*/
$require = array('��̾��','Email');


//----------------------------------------------------------------------
//  ��ư�ֿ��᡼������(START)
//----------------------------------------------------------------------

// ���пͤ��������Ƴ�ǧ�᡼��ʼ�ư�ֿ��᡼��ˤ�����(����=1, ����ʤ�=0)
// ������ϡ��ե�����¦�Υ᡼���������name°�����ͤ��嵭��$Email�פǻ��ꤷ���ͤ�Ʊ���Ǥ���ɬ�פ�����ޤ�
$remail = 0;

//��ư�ֿ��᡼������������ɽ�������̾���������ʤ���̾������̾�ʤɡʤ⤷��ư�ֿ��᡼���������̾��ʸ�����������礳���϶��ˤ��Ƥ���������
$refrom_name = "";

// ���пͤ�������ǧ�᡼���������Υ᡼��Υ����ȥ�ʾ嵭��1�����ꤷ�����Τߡ�
$re_subject = "�������꤬�Ȥ��������ޤ���";

//�ե�����¦�Ρ�̾���ײս��name°�����͡�����ư�ֿ��᡼��Ρ֡����͡פ�ɽ���ǻ��Ѥ��ޤ���
//���ꤷ�ʤ����ޤ���¸�ߤ��ʤ����ϡ������ͤ�ɽ������ʤ������Ǥ���������̵���ˤ��Ƥ�OK
$dsp_name = '��̾��';

//��ư�ֿ��᡼�����Ƭ��ʸ�� �����ܸ���ʬ�Τ��ѹ���
$remail_text = <<< TEXT

���䤤��碌���꤬�Ȥ��������ޤ�����
��ޤˤ��ֿ��פ��ޤ��ΤǺ����Ф餯���Ԥ�����������

�������Ƥϰʲ��ˤʤ�ޤ���

TEXT;


//��ư�ֿ��᡼��˽�̾�ʥեå����ˤ�ɽ��(����=1, ���ʤ�=0)�������԰��ˤ�ɽ������ޤ���
$mailFooterDsp = 0;

//�嵭�ǡ�1�פ��������ɽ�������̾�ʥեå����ˡ�FOOTER��FOOTER;�δ֤˵��Ҥ��Ƥ���������
$mailSignature = <<< FOOTER

��������������������������������������������
������ҡ�����������ƣ��Ϻ
��150-XXXX ����ԡ�������� �������ӥ��F��
TEL��03- XXXX - XXXX ��FAX��03- XXXX - XXXX
���ӡ�090- XXXX - XXXX ��
E-mail:xxxx@xxxx.com
URL: http://www.php-factory.net/
��������������������������������������������

FOOTER;


//----------------------------------------------------------------------
//  ��ư�ֿ��᡼������(END)
//----------------------------------------------------------------------

//�᡼�륢�ɥ쥹�η��������å���Ԥ����ɤ�����(����=1, ���ʤ�=0)
//���ǥե���Ȥϡ֤���ס��ä���ͳ���ʤ�����ѹ����ʤ��ǲ��������᡼���������name°�����ͤ��嵭��$Email�פǻ��ꤷ���ͤǤ���ɬ�פ�����ޤ���
$mail_check = 1;

//���ѱѿ�����Ⱦ���Ѵ���Ԥ����ɤ�����(����=1, ���ʤ�=0)
$hankaku = 0;

//���ѱѿ�����Ⱦ���Ѵ���Ԥ����ܤ�name°�����͡�name="����"�Ρ֡�������ʬ��
//��ʣ���ξ��ˤϥ���ޤǶ��ڤäƲ��������ʾ嵭�ǡ�1�פ���ꤷ�����Τ�ͭ����
//����η���name="����[]"�פξ��ˤ�ɬ������[]���ä���Τ���ꤷ�Ʋ�������
$hankaku_array = array('�����ֹ�','���');


//------------------------------- Ǥ�����ꤳ���ޤ� ---------------------------------------------


// �ʲ����ѹ����μ��Τ������Τ߼�����Ǥ�Ǥ��ꤤ���ޤ���


//----------------------------------------------------------------------
//  �ؿ��¹ԡ��ѿ������
//----------------------------------------------------------------------
$encode = "euc-jp";//���Υե������ʸ��������������ѹ��Բġ�

if(isset($_GET)) $_GET = sanitize($_GET);//NULL�Х��Ƚ���//
if(isset($_POST)) $_POST = sanitize($_POST);//NULL�Х��Ƚ���//
if(isset($_COOKIE)) $_COOKIE = sanitize($_COOKIE);//NULL�Х��Ƚ���//
if($encode == 'SJIS') $_POST = sjisReplace($_POST,$encode);//Shift-JIS�ξ��˸��Ѵ�ʸ�����ִ��¹�
$funcRefererCheck = refererCheck($Referer_check,$Referer_check_domain);//��ե�������å��¹�

//�ѿ������
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm ='';
$header ='';

if($requireCheck == 1) {
	$requireResArray = requireCheck($require);//ɬ�ܥ����å��¹Ԥ��֤��ͤ�������
	$errm = $requireResArray['errm'];
	$empty_flag = $requireResArray['empty_flag'];
}
//�᡼�륢�ɥ쥹�����å�
if(empty($errm)){
	foreach($_POST as $key=>$val) {
		if($val == "confirm_submit") $sendmail = 1;
		if($key == $Email) $post_mail = h($val);
		if($key == $Email && $mail_check == 1 && !empty($val)){
			if(!checkMail($val)){
				$errm .= "<p class=\"error_messe\">��".$key."�ۤϥ᡼�륢�ɥ쥹�η���������������ޤ���</p>\n";
				$empty_flag = 1;
			}
		}
	}
}
  
if(($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1){
	
	//���пͤ��Ϥ��᡼��򥻥å�
	if($remail == 1) {
		$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode);
		$reheader = userHeader($refrom_name,$to,$encode);
		$re_subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS",$encode))."?=";
	}
	//�����԰����Ϥ��᡼��򥻥å�
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp);
	$header = adminHeader($userMail,$post_mail,$BccMail,$to);
	$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";
	
	mail($to,$subject,$adminBody,$header);
	if($remail == 1) mail($post_mail,$re_subject,$userBody,$reheader);
}
else if($confirmDsp == 1){ 

/*��������������ǧ���̤Υ쥤�����Ȣ��Խ��ġ����ꥸ�ʥ�Υǥ������Ŭ�Ѳ�ǽ��������*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
<title>��ǧ����</title>
<style type="text/css">
/* ��ͳ���Խ������� */
#formWrap {
	width:700px;
	margin:0 auto;
	color:#555;
	line-height:120%;
	font-size:90%;
}
table.formTable{
	width:100%;
	margin:0 auto;
	border-collapse:collapse;
}
table.formTable td,table.formTable th{
	border:1px solid #ccc;
	padding:10px;
}
table.formTable th{
	width:30%;
	font-weight:normal;
	background:#efefef;
	text-align:left;
}
p.error_messe{
	margin:5px 0;
	color:red;
}
</style>
</head>
<body>

<!-- �� Header�䤽��¾����ƥ�Ĥʤɡ�����ͳ���Խ��� ��-->

<!-- ��************ ��������ɽ���������Խ��ϼ�����Ǥ�� ************ ��-->
<div id="formWrap">
<?php if($empty_flag == 1){ ?>
<div align="center">
<h4>���Ϥ˥��顼������ޤ��������򤴳�ǧ�ξ�����ץܥ���ˤƽ����򤪴ꤤ�פ��ޤ���</h4>
<?php echo $errm; ?><br /><br /><input type="button" value=" �����̤���� " onClick="history.back()">
</div>
<?php }else{ ?>
<h3>��ǧ����</h3>
<p align="center">�ʲ������ƤǴְ㤤���ʤ���С�����������ץܥ���򲡤��Ƥ���������</p>
<form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="POST">
<table class="formTable">
<?php echo confirmOutput($_POST);//�������Ƥ�ɽ��?>
</table>
<p align="center"><input type="hidden" name="mail_set" value="confirm_submit">
<input type="hidden" name="httpReferer" value="<?php echo h($_SERVER['HTTP_REFERER']);?>">
<input type="submit" value="���������롡">
<input type="button" value="�����̤����" onClick="history.back()"></p>
</form>
<?php } ?>
</div><!-- /formWrap -->
<!-- �� *********** �������Ƴ�ǧ�������Խ��ϼ�����Ǥ�� ************ ��-->

<!-- �� Footer����¾����ƥ�Ĥʤɡ����Խ��� ��-->
</body>
</html>
<?php
/* ������������ǧ���̤Υ쥤�����ȡ������ꥸ�ʥ�Υǥ������Ŭ�Ѳ�ǽ��������*/
}

if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) { 

/* ������������λ���̤Υ쥤�����ȡ��Խ��� ��������λ��˻���Υڡ����˰�ư���ʤ����Τ�ɽ����������*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
<title>��λ����</title>
</head>
<body>
<div align="center">
<?php if($empty_flag == 1){ ?>
<h4>���Ϥ˥��顼������ޤ��������򤴳�ǧ�ξ�����ץܥ���ˤƽ����򤪴ꤤ�פ��ޤ���</h4>
<div style="color:red"><?php echo $errm; ?></div>
<br /><br /><input type="button" value=" �����̤���� " onClick="history.back()">
</div>
</body>
</html>
<?php }else{ ?>
�������꤬�Ȥ��������ޤ�����<br />
����������˴�λ���ޤ�����<br /><br />
<a href="<?php echo $site_top ;?>">�ȥåץڡ��������&raquo;</a>
</div>
<?php copyright(); ?>
<!--  CVΨ���¬�����礳����Analytics�����ɤ�Ž���դ� -->
</body>
</html>
<?php 
/* ������������λ���̤Υ쥤������ �Խ��� ��������λ��˻���Υڡ����˰�ư���ʤ����Τ�ɽ����������*/
  }
}
//��ǧ����̵���ξ���ɽ��������Υڡ����˰�ư��������ξ�硢���顼�����å������̵꤬����л���ڡ����إ�����쥯��
else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) { 
	if($empty_flag == 1){ ?>
<div align="center"><h4>���Ϥ˥��顼������ޤ��������򤴳�ǧ�ξ�����ץܥ���ˤƽ����򤪴ꤤ�פ��ޤ���</h4><div style="color:red"><?php echo $errm; ?></div><br /><br /><input type="button" value=" �����̤���� " onClick="history.back()"></div>
<?php 
	}else{ header("Location: ".$thanksPage); }
}

// �ʲ����ѹ����μ��Τ������Τ߼�����Ǥ�Ǥ��ꤤ���ޤ���

//----------------------------------------------------------------------
//  �ؿ����(START)
//----------------------------------------------------------------------
function checkMail($str){
	$mailaddress_array = explode('@',$str);
	if(preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) ==2){
		return true;
	}else{
		return false;
	}
}
function h($string) {
	global $encode;
	return htmlspecialchars($string, ENT_QUOTES,$encode);
}
function sanitize($arr){
	if(is_array($arr)){
		return array_map('sanitize',$arr);
	}
	return str_replace("\0","",$arr);
}
//Shift-JIS�ξ��˸��Ѵ�ʸ�����ִ��ؿ�
function sjisReplace($arr,$encode){
	foreach($arr as $key => $val){
		$key = str_replace('��','��',$key);
		$resArray[$key] = $val;
	}
	return $resArray;
}
//�����᡼���POST�ǡ����򥻥åȤ���ؿ�
function postToMail($arr){
	global $hankaku,$hankaku_array;
	$resArray = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//Ϣ����ܤν���
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');
			
		}else{ $out = $val; }//�����å��ܥå�����������ɵ������ޤ�
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		
		//���Ѣ�Ⱦ���Ѵ�
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		if($out != "confirm_submit" && $key != "httpReferer") {
			$resArray .= "�� ".h($key)." �� ".h($out)."\n";
		}
	}
	return $resArray;
}
//��ǧ���̤��������ƽ����Ѵؿ�
function confirmOutput($arr){
	global $hankaku,$hankaku_array;
	$html = '';
	foreach($arr as $key => $val) {
		$out = '';
		if(is_array($val)){
			foreach($val as $key02 => $item){ 
				//Ϣ����ܤν���
				if(is_array($item)){
					$out .= connect2val($item);
				}else{
					$out .= $item . ', ';
				}
			}
			$out = rtrim($out,', ');
			
		}else{ $out = $val; }//�����å��ܥå�����������ɵ������ޤ�
		if(get_magic_quotes_gpc()) { $out = stripslashes($out); }
		$out = nl2br(h($out));//���ɵ� ���ԥ����ɤ�<br>�������Ѵ�
		$key = h($key);
		
		//���Ѣ�Ⱦ���Ѵ�
		if($hankaku == 1){
			$out = zenkaku2hankaku($key,$out,$hankaku_array);
		}
		
		$html .= "<tr><th>".$key."</th><td>".$out;
		$html .= '<input type="hidden" name="'.$key.'" value="'.str_replace(array("<br />","<br>"),"",$out).'" />';
		$html .= "</td></tr>\n";
	}
	return $html;
}

//���Ѣ�Ⱦ���Ѵ�
function zenkaku2hankaku($key,$out,$hankaku_array){
	global $encode;
	if(is_array($hankaku_array) && function_exists('mb_convert_kana')){
		foreach($hankaku_array as $hankaku_array_val){
			if($key == $hankaku_array_val){
				$out = mb_convert_kana($out,'a',$encode);
			}
		}
	}
	return $out;
}
//����Ϣ��ν���
function connect2val($arr){
	$out = '';
	foreach($arr as $key => $val){
		if($key === 0 || $val == ''){//����̤������0�ˡ��ޤ������Ƥ����Τξ��ˤ�Ϣ��ʸ�����ղä��ʤ��ʷ��ޤ�Ĵ�٤�ɬ�פ����
			$key = '';
		}elseif(strpos($key,"��") !== false && $val != '' && preg_match("/^[0-9]+$/",$val)){
			$val = number_format($val);//��ۤξ��ˤ�3�头�Ȥ˥���ޤ��ɲ�
		}
		$out .= $val . $key;
	}
	return $out;
}

//�����԰������᡼��إå�
function adminHeader($userMail,$post_mail,$BccMail,$to){
	$header = '';
	if($userMail == 1 && !empty($post_mail)) {
		$header="From: $post_mail\n";
		if($BccMail != '') {
		  $header.="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$post_mail."\n";
	}else {
		if($BccMail != '') {
		  $header="Bcc: $BccMail\n";
		}
		$header.="Reply-To: ".$to."\n";
	}
		$header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
		return $header;
}
//�����԰������᡼��ܥǥ�
function mailToAdmin($arr,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp){
	$adminBody="��".$subject."�פ���᡼�뤬�Ϥ��ޤ���\n\n";
	$adminBody .="����������������������������\n\n";
	$adminBody.= postToMail($arr);//POST�ǡ�����ؿ����饻�å�
	$adminBody.="\n����������������������������\n";
	$adminBody.="�������줿������".date( "Y/m/d (D) H:i:s", time() )."\n";
	$adminBody.="�����Ԥ�IP���ɥ쥹��".@$_SERVER["REMOTE_ADDR"]."\n";
	$adminBody.="�����ԤΥۥ���̾��".getHostByAddr(getenv('REMOTE_ADDR'))."\n";
	if($confirmDsp != 1){
		$adminBody.="�䤤��碌�Υڡ���URL��".@$_SERVER['HTTP_REFERER']."\n";
	}else{
		$adminBody.="�䤤��碌�Υڡ���URL��".@$arr['httpReferer']."\n";
	}
	if($mailFooterDsp == 1) $adminBody.= $mailSignature;
	return mb_convert_encoding($adminBody,"JIS",$encode);
}

//�桼���������᡼��إå�
function userHeader($refrom_name,$to,$encode){
	$reheader = "From: ";
	if(!empty($refrom_name)){
		$default_internal_encode = mb_internal_encoding();
		if($default_internal_encode != $encode){
			mb_internal_encoding($encode);
		}
		$reheader .= mb_encode_mimeheader($refrom_name)." <".$to.">\nReply-To: ".$to;
	}else{
		$reheader .= "$to\nReply-To: ".$to;
	}
	$reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
	return $reheader;
}
//�桼���������᡼��ܥǥ�
function mailToUser($arr,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode){
	$userBody = '';
	if(isset($arr[$dsp_name])) $userBody = h($arr[$dsp_name]). " ��\n";
	$userBody.= $remail_text;
	$userBody.="\n����������������������������\n\n";
	$userBody.= postToMail($arr);//POST�ǡ�����ؿ����饻�å�
	$userBody.="\n����������������������������\n\n";
	$userBody.="����������".date( "Y/m/d (D) H:i:s", time() )."\n";
	if($mailFooterDsp == 1) $userBody.= $mailSignature;
	return mb_convert_encoding($userBody,"JIS",$encode);
}
//ɬ�ܥ����å��ؿ�
function requireCheck($require){
	$res['errm'] = '';
	$res['empty_flag'] = 0;
	foreach($require as $requireVal){
		$existsFalg = '';
		foreach($_POST as $key => $val) {
			if($key == $requireVal) {
				
				//Ϣ�����ι��ܡ�����ˤΤ����ɬ�ܥ����å�
				if(is_array($val)){
					$connectEmpty = 0;
					foreach($val as $kk => $vv){
						if(is_array($vv)){
							foreach($vv as $kk02 => $vv02){
								if($vv02 == ''){
									$connectEmpty++;
								}
							}
						}
						
					}
					if($connectEmpty > 0){
						$res['errm'] .= "<p class=\"error_messe\">��".h($key)."�ۤ�ɬ�ܹ��ܤǤ���</p>\n";
						$res['empty_flag'] = 1;
					}
				}
				//�ǥե����ɬ�ܥ����å�
				elseif($val == ''){
					$res['errm'] .= "<p class=\"error_messe\">��".h($key)."�ۤ�ɬ�ܹ��ܤǤ���</p>\n";
					$res['empty_flag'] = 1;
				}
				
				$existsFalg = 1;
				break;
			}
			
		}
		if($existsFalg != 1){
				$res['errm'] .= "<p class=\"error_messe\">��".$requireVal."�ۤ�̤����Ǥ���</p>\n";
				$res['empty_flag'] = 1;
		}
	}
	
	return $res;
}
//��ե�������å�
function refererCheck($Referer_check,$Referer_check_domain){
	if($Referer_check == 1 && !empty($Referer_check_domain)){
		if(strpos($_SERVER['HTTP_REFERER'],$Referer_check_domain) === false){
			return exit('<p align="center">��ե�������å����顼���ե�����ڡ����Υɥᥤ��Ȥ��Υե�����Υɥᥤ�󤬰��פ��ޤ���</p>');
		}
	}
}
function copyright(){
	echo '<a style="display:block;text-align:center;margin:15px 0;font-size:11px;color:#aaa;text-decoration:none" href="http://www.php-factory.net/" target="_blank">- PHP��˼ -</a>';
}
//----------------------------------------------------------------------
//  �ؿ����(END)
//----------------------------------------------------------------------
?>