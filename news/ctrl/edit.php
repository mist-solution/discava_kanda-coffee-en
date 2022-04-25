<!doctype html>
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<title>編集・修正-神田珈琲園神田北口店 お知らせ</title>
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<div id="all">
<?php
mb_language('Ja');
mb_regex_encoding('UTF-8');
#echo mb_internal_encoding (); 
require_once("wn_lib.php");
$yea = date("Y");
$mon = date("m");
$day = date("d");
$hou = date("H");
$min = date("i");
$sec = date("s");

$filename = $_GET{'filename'};
$nyea = substr($filename,-12,4);
$nmon = substr($filename,-8,2);
$no = $_GET{'no'};

#	print $filename;
# === ログ読出 ===
$file = fopen($filename,"r");
	while (!feof($file)){

		$fdat = fgets($file);
		$enc = mb_detect_encoding($fdat, "UTF-8,JIS,eucjp-win,SJIS");
	if ($enc == 'SJIS'){
		$fdat = mb_convert_encoding($fdat, "UTF-8", "SJIS");
	}
		if ($enc == 'SJIS-WIN'){
			$fdat = mb_convert_encoding($fdat, "UTF-8", "SJIS");
#			print "後<BR>".$fdat;
		}
#	print $enc;
#	print "前<BR>".$fdat;
#	print $enc."<BR>";

		$data = explode("<>",$fdat);

	if ($data[0]==$no){break;}
#		print $data[0]."!!!<br>";
	}
fclose($file);

		$nwtitle = $data[1];

		$data[2] = mb_ereg_replace("<br>","\n",$data[2]);
		$data[2] = mb_ereg_replace("<BR>","\n",$data[2]);
		$nwmsg = $data[2];

		$indate =$data[3];
		$start = $data[4];
		$expir = $data[5];
#		$editd = $data[6];
		$editd = date("Y/m/d H:i:s",$_SERVER['REQUEST_TIME']);
# $p1_ws = $p1_hs = $p2_ws = $p2_hs = $p3_ws = $p3_hs = "";
	
		$host = $data[16];
#	echo $data[16];
		if (isset ( $data[17])){;
			$pdf_1 = $data[17];
		}
#	echo $data[17];
		if (isset ( $data[18])){;
			$pdf_2 = $data[18];
		}
#	echo $data[18];
		if (isset ( $data[19])){;
			$pdf_3 = $data[19];
		}
#	echo $data[19];
		$startn = preg_replace("/\//","",$start);
		$expirn = preg_replace("/\//","",$expir);

print <<<EOM

<div class="title">編集・修正-神田珈琲園神田北口店 お知らせ</div>
<div class="white box67"><p class="p1"><strong>編集・修正</strong></p></div>
<div class="white box33"><p class="p1r"><a href="../manual/">使い方説明ページ</a></p></div>
<p class='p1'><a href="./">最初のページに戻る</a></p>
<!--
<p class="p1" style="clear: both;"><a href="https://www.k-crk.com/ctrl/"><strong>⬅総合管理ページに戻る<!--->
</strong></a></p>

<form name="wnForm" action="edit2.php" method="post" enctype="multipart/form-data">

	
<div class="title2 box15" style="text-align: center;text-indent: 0;">タイトル</div>
<div class="title2 box85"><input name="title" type="text" value="$nwtitle" size="80"></div>
<input name="filename" type="hidden" value="$filename">
<input name="no" type="hidden" value="$no">
<input name="indate" type="hidden" value="$indate">
<div class="box15" style="text-align: center;"><p style="font-size:1.2em;">本文</p></div>
<div class="box85" style="display:flex;justify-content: center;align-items: center;"><textarea name="honbun" cols="80" rows="20">$nwmsg</textarea></div>
<br class="clear">

<div class="title_l">公開期間</div>
EOM;

# print $filename;

print "<div class='white box50' style='float:left;'>始&nbsp;<input name='start' type='text' size='25' value='$start'>から</div>";
print "<div class='white box50' style='float:left;'>終&nbsp;<input name='expir' type='text' size='25' value='-'>まで</div>";

print <<<EOM
<br class="clear">
<div><p class="p2">※公開期間の「始」を、来月以降の月日に設定することも出来ます。<br>
　その場合、書き込んだ記事はこのページの中には表示されません。<br>
　来月以降・前月以前の記事を修正するには、[各月のトピックス]をクリックしてください。</p>
</div>
<div class="title2_l">写真(Jpeg画像)</div>
EOM;
print "<p class='p1c'>";

print "※写真(1)&nbsp;<input name='img_file[]' type='file' size='50'>";
if ($data[7] != ""){
	 print "あり<input type='checkbox' name='p1_del' value='1'>削除";
}
	 print "<input type='hidden' name='serviname_1' value='$data[7]'>";
	 print "<input type='hidden' name='p1_ws' value='$data[8]'>";
	 print "<input type='hidden' name='p1_hs' value='$data[9]'>";

print "<br>※写真(2)&nbsp;<input name='img_file[]' type='file' size='50'>";

if ($data[10] != ""){
	 print "あり<input type='checkbox' name='p2_del' value='1'>削除";
}
	 print "<input type='hidden' name='serviname_2' value='$data[10]'>";
	 print "<input type='hidden' name='p2_ws' value='$data[11]'>";
	 print "<input type='hidden' name='p2_hs' value='$data[12]'>";

print "<br>※写真(3)&nbsp;<input name='img_file[]' type='file' size='50'>";

if ($data[13] != ""){
	 print "あり<input type='checkbox' name='p3_del' value='1'>削除";
}
	 print "<input type='hidden' name='serviname_3' value='$data[13]'>";
	 print "<input type='hidden' name='p3_ws' value='$data[14]'>";
	 print "<input type='hidden' name='p3_hs' value='$data[15]'>";
print "</p>";

print "<div class='title2_l'>PDF文書</div>";
print "<p class='p1'>PDF(1)";
if (preg_match("/pdf/",$data[17])){
	print "<input name='servpname_1' type='hidden' value='$data[17]'>\n";
	$link="$pdfdir".rawurlencode ($data[17]);
	print "あり<input type='checkbox' name='pdfdel1' value='1'>削除 / 現状 → <a class='pdf' href=$link>$data[17]</a> / 差替 → <input name='pdf_file[]' type='file' size='50'></p>\n";
} else {
$data[17] = "";
print "なし / 差替 → <input name='pdf_file[]' type='file' size='50'>\n";
print "<input name='servpname_1' type='hidden' value=''>\n";
}
print "</p>";
print "<p class='p1'>PDF(2)";
if (preg_match("/pdf/",$data[18])){
	print "<input name='servpname_2' type='hidden' value='$data[18]'>\n";
	$link="$pdfdir".rawurlencode ($data[18]);
	print "あり<input type='checkbox' name='pdfdel2' value='1'>削除 / 現状 → <a class='pdf' href=$link>$data[18]</a> / 差替 → <input name='pdf_file[]' type='file' size='50'></p>\n";
} else {
$data[18] = "";
print "なし / 差替 → <input name='pdf_file[]' type='file' size='50'>";
print "<input name='servpname_2' type='hidden' value=''>";
}
print "</p>";
print "<p class='p1'>PDF(3)";
if (preg_match("/pdf/",$data[19])){
	print "<input name='servpname_3' type='hidden' value='$data[19]'>";
	$link="$pdfdir".rawurlencode ($data[19]);
	print "あり<input type='checkbox' name='pdfdel3' value='1'>削除 / 現状 → <a class='pdf' href=$link>$data[19]</a>  / 差替 → <input name='pdf_file[]' type='file' size='50'></p>\n";
} else {
$data[19] = "";
print "なし / 差替 → <input name='pdf_file[]' type='file' size='50'>";
print "<input name='servpname_3' type='hidden' value=''>";
}
print "</p>";

print <<<EOM
<hr>
<div style="padding:2px;text-align:center;"><input name="mode" type="hidden" value="write">
<input name="button" type="submit" value="書き込み">&nbsp;
<input name="clear" type="reset" id="clear" value="クリア">
</div>
</form>
EOM;
print <<<EOM
EOM;
?>
</form>
</div>
</body>
</html>
