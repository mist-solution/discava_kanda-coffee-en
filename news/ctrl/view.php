<!doctype html>
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<title>修正するお知らせを選ぶ - 神田珈琲園神田北口店 お知らせ</title>
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<div id="all">
<div class="title">修正するお知らせを選ぶ - 神田珈琲園神田北口店 お知らせ</div>
<?php
mb_regex_encoding('UTF-8');
require_once("wn_lib.php");

$yea = date("Y");
$mon = date("m");
$day = date("d");
$hou = date("H");
$min = date("i");
$sec = date("s");
$date = sprintf("%04d%02d",$yea,$mon);
(int)$todayn=$yea*10000+$mon*100+$day;

$filename	= $_GET{'filename'};
$fileyear	= substr($filename,-12,4);
$filemonth	= substr($filename,-8,2);

print <<<EOM
<p class='p1'><a href="./">最初のページに戻る</a></p>
<div class="box67"><p class="p1"><a href="./files.php">月ごとのお知らせを選ぶ（ファイル一覧）に戻る</a></p></div>
<div class="white box33"><p class="p1r"><a href="../manual/">使い方説明ページ</a></p></div>
<!--
<p class="p1" style="clear: both;"><a href="https://www.k-crk.com/ctrl/"><strong>⬅総合管理ページに戻る</strong></a></p>
-->
<div>$fileyear 年 $filemonth 月のお知らせ</div>
EOM;

if (file_exists($filename)){					#ファイルがあればログ10件まで表示
	$file = fopen($filename , "r");
	while (!feof($file)){

	$data = fgets($file);
		$enc = mb_detect_encoding($data, "UTF-8,JIS,eucjp-win,SJIS");
	if ($enc == 'SJIS'){
		$data = mb_convert_encoding($data, "UTF-8", "SJIS");
	}

		if ($data==""){break;}

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
		if (isset ( $data[17])){;
			$pdf_1 = $data[17];
		}
		if (isset ( $data[18])){;
			$pdf_2 = $data[18];
		}
		if (isset ( $data[19])){;
			$pdf_3 = $data[19];
		}
		$startn = preg_replace("/\//","",$start);
		$expirn = preg_replace("/\//","",$expir);

		print <<<EOM
<div style="dispray:box;">
<div class="box67" style="background:#eee;float:left;border-top:#666 1px solid;border-bottom:#666 1px solid">No. $no $nwtitle</div>
<div class="box33" style="background:#eee;float:left;text-align:right;border-top:#666 1px solid;border-bottom:#666 1px solid">
EOM;
echo (date("Y/m/d g:i 最終書込",$editd));
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
if ((isset($data[17]))&&(preg_match("/pdf/",$data[17]))){
	$link="$pdfdir".rawurlencode ($data[17]);
	print "PDF → <a class='pdf' href=$link>$data[17]</a>";
}
if ((isset($data[18]))&&(preg_match("/pdf/",$data[18]))){
	$link="$pdfdir".rawurlencode ($data[18]);
	print "<br>PDF → <a class='pdf' href=$link>$data[18]</a>";
}
if ((isset($data[19]))&&(preg_match("/pdf/",$data[19]))){
	$link="$pdfdir".rawurlencode ($data[19]);
	print "<br>PDF → <a class='pdf' href=$link>$data[19]</a>";
}
print "</div>";
if ($serviname_1 || $serviname_2 || $serviname_3){

print "<div>";
	
if ($serviname_1){
	$serviname_1 = $ImgDir.$serviname_1;
	print "<a href=\"javascript:window.open('pictup.php?no&$no&img=$serviname_1&w=$p1_ws&h=$p1_hs&title=$nwtitle (写真1)','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\">
	<img src=\"$serviname_1\" border=\"0\" alt=\"写真1\" width=\"$p1_ws\" height=\"$p1_hs\">
	</a>\n";
}
if ($serviname_2){
print "&nbsp;";
	$serviname_2 = $ImgDir.$serviname_2;
	print "<a href=\"javascript:window.open('pictup.php?no&$no&img=$serviname_2&w=$p2_ws&h=$p2_hs&title=$nwtitle (写真2）','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\">
	<img src=\"$serviname_2\" border=\"0\" alt=\"写真2\" width=\"$p2_ws\" height=\"$p2_hs\">
	</a>\n";
}
if ($serviname_3){
print "&nbsp;";
	$serviname_3 = $ImgDir.$serviname_3;
	print "<a href=\"javascript:window.open('pictup.php?no&$no&img=$serviname_2&w=$p3_ws&h=$p3_hs&title=$nwtitle (写真3）','pictUp','scrollbars=yes,resizable=yes,width=$uw,height=$uh')\">
	<img src=\"$serviname_3\" border=\"0\" alt=\"写真3\" width=\"$p3_ws\" height=\"$p3_hs\">
	</a>\n";
}

}
#$date = time();
#echo date("Y/m/d H:i:s",$date);
//結果：2014/05/03 23:05:31
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

<div class="box50" style="float:left;">[表示開始]&nbsp; $start</div>
<div class="box50" style="float:left;">[表示終了]&nbsp;$expir</div>
<br class="clear">
<div>[RemortHost]&nbsp;$host</div>
</div>
<br>
EOM;

	}
} else {										#ファイルがなければログ表示せず
	print <<<EOM
<div> $filename  当月は書き込みがありません。</div>
EOM;
}
?>
</body>
</html>
