<!doctype html>
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<title>管理-神田珈琲園神田北口店 お知らせ</title>
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<div id="all">
<?php
ini_set('date.timezone', 'Asia/Tokyo');
mb_regex_encoding('UTF-8');
require_once("wn_lib.php");

$nowdate = time();

$date = date("Ym",$nowdate);
$start = date("Y/m/d",$nowdate);
(int)$todayn=date("Y",$nowdate)*10000 + date("m",$nowdate)*100 + date("d",$nowdate);
$filename = $logdir.$date.$fntail.".dat";	# filename生成

?>
<div class="title">管理 - 神田珈琲園神田北口店 お知らせ</div>
<input type="hidden" name="filename" value="$filename">

<div class="white" style="width:50%;float:left;"><p class="p1"><strong>書き込み</strong></p></div>
<div class="white" style="width:50%;float:left;"><p class="p1r"><a href="../manual/">使い方説明ページ</a></p></div>
<!--
<p class="p1" style="clear: both;"><a href="https://temp.kanda-coffee-en.com/ctrl/"><strong>⬅総合管理ページに戻る</strong></a></p>
-->
<form name="wnForm" action="write.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	
<div class="title2 box20" style="text-align: center;text-indent: 0;">タイトル</div>
<div class="title2 box80"><input name="title" type="text" value="" size="60"></div>

<div class="box15" style="text-align: center;"><p style="font-size:1.2em;">本文</p></div>
<div class="box85" style="display:flex;justify-content: center;align-items: center;"><textarea name="honbun" cols="80" rows="20"></textarea></div>
	<br class="clear">
<div class="title_l">公開期間</div>
<?php
	print "<div class='white box50' style='float:left;'>始&nbsp;<input name='start' type='text' size='25' value='$start'>から</div>";
	print "<div class='white box50' style='float:left;'>終&nbsp;<input name='expir' type='text' size='25' value='-'>まで</div>"
?>
<br class="clear">
<div><p class="p2">※公開期間の「始」を、来月以降の月日に設定することも出来ます。<br>
　その場合、書き込んだ記事はこのページの中には表示されません。<br>
　来月以降・前月以前の記事を修正するには、[各月のトピックス]をクリックしてください。</p>
</div>

<!--MAX_FILE_SIZE でファイルサイズを制限する-->
<input type="hidden" name="MAX_FILE_SIZE" value="20480000">
<div class="title2_l">写真(Jpeg画像)</div>
<p class="p1">写真(1)　<input name="img_file[]" type="file" size="50"></p>
<p class="p1">写真(2)　<input name="img_file[]" type="file" size="50"></p>
<p class="p1">写真(3)　<input name="img_file[]" type="file" size="50"></p>


<div class="title2_l">PDF文書</div>
<p class="p1">PDF(1)　<input name="pdf_file[]" type="file" size="50"></p>
<p class="p1">PDF(2)　<input name="pdf_file[]" type="file" size="50"></p>
<p class="p1">PDF(3)　<input name="pdf_file[]" type="file" size="50"></p>
<div class="title2" style="padding:2px;"><input name="mode" type="hidden" value="write">
<input name="button" type="submit" value="書き込み">&nbsp;
<input name="clear" type="reset" id="clear" value="クリア">
</div>
</form>

<div class="title box50" style="float:left;">今月の「新着情報」</div>
<div class="title3 box50" style="float:right;"><a href="files.php">各月の 新着情報</a></div>
<?php
# $p1_w=$p1_h=$p2_w=$p2_h=$p3_w=$p3_h="";
if (file_exists($filename)){					#ファイルがあればログ表示
	$file = fopen($filename,"r");

while (!feof($file)){

		$data = fgets($file);
		if ($data==""){break;}

		$enc = mb_detect_encoding($data, "sjis,utf-8");
		if ($enc == 'sjis'){
			$data = mb_convert_encoding($data, "UTF-8", $enc);
		}
		
		$data = explode("<>",$data);
		$no = $data[0];
		
		$nwtitle = $data[1];
		$nwmsg = $data[2];
		$indate =$data[3];
		$start = $data[4];
		$expir = $data[5];
		$editd = $data[6];
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

if ((isset($data[17]))&&(preg_match("/pdf/i",$data[17]))){
			$pdf_1 = ($data[17]);
		} else {
			$pdf_1 = "";
}
if ((isset($data[18]))&&(preg_match("/pdf/i",$data[18]))){
			$pdf_2 = ($data[18]);
		} else {
			$pdf_2 = "";
}
if ((isset($data[19]))&&(preg_match("/pdf/i",$data[19]))){
			$pdf_3 = ($data[19]);
		} else {
			$pdf_3 = "";
}
		$startn = preg_replace("/\//","",$start);
		$expirn = preg_replace("/\//","",$expir);
	
		print <<<EOM
<div class="widebox">
<div class="box67" style="background:#eee;float:left;border-top:#666 1px solid;border-bottom:#666 1px solid">No. $no $nwtitle</div>
<div class="box33" style="background:#eee;float:left;text-align:right;border-top:#666 1px solid;border-bottom:#666 1px solid">
EOM;
echo (date("Y/m/d G:i 最終書込",$editd));
print <<<EOM
</div>
</div>
EOM;
if ($todayn > $expirn && $expirn != 0){
	print <<<EOM
<div>
<strong class="red">&nbsp;この記事は、もう公開ページに表示されていません。($expirn まで公開)</strong>
EOM;
}
if ($todayn < $startn){
	print <<<EOM
<strong class="blue">&nbsp;この記事はまだ、公開ページに表示されません。($startn から公開)</strong>
</div>
EOM;
}
print "<div style='margin:10px;'><p class=\"p2\">$nwmsg</p></div>\n";
print "<div>";
if ($pdf_1){
	$link="$pdfdir".("$pdf_1");
	print "PDF(1) → <a href='$link'>$pdf_1</a><input type='hidden' name='pdf_1' value='$link'>";
}
if ($pdf_2){
	$link="$pdfdir".("$pdf_2");
	print "<br>PDF(2) → <a href='$link'>$pdf_2</a><input type='hidden' name='pdf_2' value='$link'>";
}
if ($pdf_3){
	$link="$pdfdir".("$pdf_3");
	print "<br>PDF(3) → <a href='$link'>$pdf_3</a><input type='hidden' name='pdf_3' value='$link'>";
}
print "</div>";
if ($serviname_1 || $serviname_2 || $serviname_3){

print "<div>";
	
if ($serviname_1){
	$serviname_1 = $ImgDir.$serviname_1;
	print "<a href=\"javascript:window.open('pictup.php?no&$no&img=$serviname_1&w=$p1_ws&h=$p1_hs&title=$nwtitle (写真1)&width=$uw&height=$uh','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\">
	<img src=\"$serviname_1\" border=\"0\" alt=\"写真1\" width=\"$p1_ws\" height=\"$p1_hs\">
	</a>\n";
}
if ($serviname_2){
print "&nbsp;";
	$serviname_2 = $ImgDir.$serviname_2;
	print "<a href=\"javascript:window.open('pictup.php?no&$no&img=$serviname_2&w=$p2_ws&h=$p2_hs&title=$nwtitle (写真2)&width=$uw&height=$uh','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\">
	<img src=\"$serviname_2\" border=\"0\" alt=\"写真2\" width=\"$p2_ws\" height=\"$p2_hs\">
	</a>\n";
}
if ($serviname_3){
print "&nbsp;";
	$serviname_3 = $ImgDir.$serviname_3;
	print "<a href=\"javascript:window.open('pictup.php?no&$no&img=$serviname_3&w=$p3_ws&h=$p3_hs&title=$nwtitle (写真3)&width=$uw&height=$uh','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\">
	<img src=\"$serviname_3\" border=\"0\" alt=\"写真3\" width=\"$p3_ws\" height=\"$p3_hs\">
	</a>\n";
}
}
$firstdate = date("Y/m/d H:i",$indate);
$editdate = date("Y/m/d H:i",$editd);
print <<<EOM

<div class="gray">

<div class="box15" style="float:left;">[最初の書込]&nbsp;</div>
<div class="box25" style="float:left;">$firstdate</div>
<div class="box15" style="float:left;">[修正]&nbsp;</div>
<div class="box25" style="float:left;">$editdate</div>
<div class="box15" style="float:left;">
<a href="$editpage?filename=$filename&no=$no"><img src="b_edit.jpg" style="margin-top:3px;" alt="修正ボタン"></a>
&nbsp;<A href="$deletepage?filename=$filename&no=$no"><img src="b_del.jpg" style="margin-top:3px;" alt="削除ボタン"></a>
</div>

<div class="box50" style="float:left;">[表示開始]&nbsp;$start</div>
<div class="box50" style="float:left;">[表示終了]&nbsp;$expir</div>
<br class="clear">
<div>[RemortHost]&nbsp;$host</div>
</div>
EOM;
}
	
} else { #ファイルがなければログ表示せず
	print <<<EOM
<div><p>今月はまだ書き込みがありません。</p></div>
EOM;
}
?>
</div>
</body>
</html>
