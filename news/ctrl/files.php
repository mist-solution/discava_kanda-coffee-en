<!doctype html>
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<title>月ごとのお知らせを選ぶ-神田珈琲園神田北口店</title>
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<div id="all">
<div class="title">月ごとのお知らせを選ぶ-神田珈琲園神田北口店</div>
<div class="box67"><p class="p1"><a href="./">最初のページ（書込）に戻る</a></p></div>
<div class="white box33"><p class="p1r"><a href="../manual/">使い方説明ページ</a></p></div>
<!--
<p class="p1" style="clear: both;"><a href="https://www.k-crk.com/ctrl/"><strong>⬅総合管理ページに戻る</strong></a></p>
-->

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
$logfile = $logdir."??????".$fntail.".dat";
# === ログ一覧 ===
$tou_filename = $logdir.$yea.$mon.$fntail.".dat";	# 当月filename生成
$filename = glob($logdir."??????".$fntail.".dat");
rsort ($filename);

foreach ($filename as $val){
	$fyea= substr($val,-12,4);
	$fmon = substr($val,-8,2);

	$file = fopen($val,'r');

	$data = fgets($file);
	$enc = mb_detect_encoding($data, "UTF-8,JIS,eucjp-win,SJIS");
	if ($enc == 'SJIS'){
		$data = mb_convert_encoding($data, "UTF-8", "SJIS");
	}
	$data = explode("<>",$data);
	fclose($file);
	
	$writetime = date("Y/m/d",$data[6]);
	if ($val==$tou_filename){
	print <<<EOM
<div><p class='p1'><a href="./">最初のページに戻る</a></p></div>
<hr>
EOM;
	} else {

	print <<<EOM
<div><p class="p1">書込開始:$writetime&nbsp;<a href="view.php?filename=$val">$fyea 年$fmon 月分</a>&nbsp;$data[1]</p></div>
<hr>
EOM;
	}
}
?>
</div>
</body>
</html>