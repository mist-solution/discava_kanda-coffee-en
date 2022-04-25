<!doctype html>
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" /><title>削除-神田珈琲園神田北口店 お知らせ</title>
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<div id="all">
<?php
	ini_set('memory_limit', '256M');
	ini_set('date.timezone', 'Asia/Tokyo');
	require_once("wn_lib.php");
mb_regex_encoding('UTF-8');

$filename = $_GET{'filename'};
$nyea = substr($filename,-12,4);
$nmon = substr($filename,-8,2);
$no = $_GET{'no'};

$no = $_GET{'no'};

$ImgDir = "../img/";
$pdfdir = "../pdf/";

$yea = date("Y");
$mon = date("m");
$day = date("d");
$hou = date("H");
$min = date("i");
$sec = date("s");
$date = sprintf("%04d%02d",$yea,$mon);
(int)$todayn=$yea*10000+$mon*100+$day;



# === ログ読み出し ===
$file = fopen($filename,"r");
	while (!feof($file)){
		$fdat = fgets($file);
		$chk = explode("<>",$fdat);
		if ($chk[0]==$no){break;}
	}
fclose($file);
$enc = mb_detect_encoding($fdat, "SJIS,utf-8");
if ($enc == 'SJIS'){
	$fdat = mb_convert_encoding($fdat, "UTF-8", "SJIS");
}

$data = explode("<>",$fdat);

$no = $data[0];
$nwtitle = $data[1];
$nwmsg = $data[2];
$indate = localtime($data[3]);
$firstdate = (string)($indate[5]+1900)."/".(string)sprintf("%02d",$indate[4]+1)."/".(string)$indate[3];
$start = $data[4];$expir = $data[5];
$editd = localtime($data[6]);
$editdate = (string)($editd[5]+1900)."/".(string)sprintf("%02d",$editd[4]+1)."/".(string)$editd[3];

$serviname_1 = $data[7];
$p1_ws = $data[8];
$p1_hs = $data[9];
$serviname_2 = $data[10];
$p2_ws = $data[11];
$p2_hs = $data[12];
$serviname_3 = $data[13];
$p3_ws = $data[14];
$p3_hs = $data[15];
$host = $data[16];

if ((!empty($data[17]))&&(preg_match("/pdf/",$data[17]))){
	$servpname_1 = $data[17];
	$link="$pdfdir".rawurlencode ($data[17]);
} else {
	$servpname_1 = "";
}

if ((!empty($data[18]))&&(preg_match("/pdf/",$data[18]))){
		$servpname_2 = $data[18];
		$link="$pdfdir".rawurlencode ($data[18]);
} else {
	$servpname_2 = "";
}

if ((!empty($data[19]))&&(preg_match("/pdf/",$data[19]))){
		$servpname_3 = $data[19];
		$link="$pdfdir".rawurlencode ($data[19]);
} else {
	$servpname_3 = "";
}

$startn = preg_replace("/\//","",$start);
$expirn = preg_replace("/\//","",$expir);

print <<<EOM

<div class="title">削除 - 神田珈琲園神田北口店 お知らせ</div>
<div class="white box67"><p class="p1"><strong>削除</strong></p></div>
<div class="white box33"><p class="p1r">使い方説明ページ</p></div>

<form name="wnForm" action="delete2.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="no" value="$no">
<input type="hidden" name="filename" value="$filename">
<input type="hidden" name="serviname_1" value="$serviname_1">
<input type="hidden" name="serviname_2" value="$serviname_2">
<input type="hidden" name="serviname_3" value="$serviname_3">

<input type="hidden" name="servpname_1" value="$servpname_1">
<input type="hidden" name="servpname_2" value="$servpname_2">
<input type="hidden" name="servpname_3" value="$servpname_3">

<div class="title2 box20" style="text-align: left;">タイトル</div>
<div class="title2 box80" style="text-align: left;">$nwtitle</div>
<input name="filename" type="hidden" value="$filename">
<input name="title" type="hidden" value="$nwtitle">
<input name="no" type="hidden" value="$no">
<input name="firstdate" type="hidden" value="$firstdate">
<div>$nwmsg</div>
<br class="clear">
EOM;

print "<div class='title_l'>写真</div>";
print "<div>";
if ($serviname_1 || $serviname_2 || $serviname_3){
if ($serviname_1){
	print "<input type='hidden' name='$serviname_1' value='1'>";
	$serviname_1 = $ImgDir.$serviname_1;
	print "<a href=\"#\" onClick=\"javascript:window.open('pictup.php?&img=$serviname_1&w=$p1_ws&h=$p1_hs&title=$nwtitle (写真1)','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\"><img src=\"$serviname_1\" border=\"0\" alt=\"写真1\" width=\"$p1_ws\" height=\"$p1_hs\"></a>\n";
}
if ($serviname_2){
	print "<input type='hidden' name='$serviname_2' value='1'>";
	$serviname_2 = $ImgDir.$serviname_2;
	print "&nbsp;<A href=\"#\" onClick=\"javascript:window.open('pictup.php?&img=$serviname_2&w=$p2_ws&h=$p2_hs&title=$nwtitle (写真2)','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\"><img src=\"$serviname_2\" border=\"0\" alt=\"写真2\" width=\"$p2_ws\" height=\"$p2_hs\"></A>\n";
}
if ($serviname_3){
	print "<input type='hidden' name='$serviname_3' value='1'>";
	$serviname_3 = $ImgDir.$serviname_3;
	print "&nbsp;<A href=\"#\" onClick=\"javascript:window.open('pictup.php?&img=$serviname_3&w=$p3_ws&h=$p3_hs&title=$nwtitle (写真3)','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\"><img src=\"$serviname_3\" border=\"0\" alt=\"写真3\" width=\"$p3_ws\" height=\"$p3_hs\"></A>\n";
}
	print "<div><small>(写真は、それぞれクリックすると拡大表\示します。)</small></div>\n";
} else {
	print "<div><small>(写真なし)</small></div>\n";
}
print "</div>\n";

print "<div class='title_l'>PDF</div>";
print "<div>";
if ($servpname_1 || $servpname_2 || $servpname_3){
if ($servpname_1){
	$servpname_1 = $pdfdir.$servpname_1;
	$link="$pdfdir".rawurlencode ($servpname_1);
	print "PDF(1) → <a href='$link'>$servpname_1</a><input type='hidden' name='pdf_1' value='$link'>";
}
if ($servpname_2){
	$servpname_2 = $pdfdir.$servpname_2;
	$link="$pdfdir".rawurlencode ($servpname_2);
	print "PDF(2) → <a href='$link'>$servpname_2</a><input type='hidden' name='pdf_1' value='$link'>";
}
if ($servpname_3){
	$servpname_3 = $pdfdir.$servpname_3;
	$link="$pdfdir".rawurlencode ($servpname_3);
	print "PDF(3) → <a href='$link'>$servpname_3</a><input type='hidden' name='pdf_1' value='$link'>";
}
} else {
	print "<div><small>(PDFなし)</small></div>\n";
}
print "</div>\n";

print <<<EOM

<div class="gray">

<div class="box15" style="float:left;">[最初の書込]&nbsp;</div>
<div class="box25" style="float:left;">$firstdate</div>
<div class="box15" style="float:left;">[修正]&nbsp;</div>
<div class="box25" style="float:left;">$editdate</div>
<div class="box50" style="float:left;">[表示開始]&nbsp;$start</div>
<div class="box50" style="float:left;">[表示終了]&nbsp;$expir</div>
<br class="clear">
<div>[RemortHost]&nbsp;$host</div>
</div>
<br>
<div class="title2" style="padding:2px;"><input name="mode" type="hidden" value="delete">
<input name="delbutton" type="submit" value="削除実行">&nbsp;<input name="delbutton" type="submit" value="削除しない">
</div>
EOM;

?>
</FORM>
</DIV>
</BODY>
</HTML>
