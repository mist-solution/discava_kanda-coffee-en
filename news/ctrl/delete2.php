<!doctype html>
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<title>削除 - お知らせ</title>
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<?php
require_once("wn_lib.php");

$delbutton = $_POST['delbutton'];
$title = $_POST['title'];

if ("$delbutton" != "削除実行"){
print<<<EOM
<body>
<h2>No.$no タイトル：$title</h2>
<div><p class='p1c' style='color:#00c;'><strong>削除しませんでした。</strong></p></div>
<br>
<br>
<p class='p1c'><a href="./">最初のページに戻る</a></p>
EOM;

} else {

$filename = $_POST['filename'];
$no = $_POST['no'];
$serviname_1 = $_POST['serviname_1'];
$serviname_2 = $_POST['serviname_2'];
$serviname_3 = $_POST['serviname_3'];
$title = $_POST['title'];
$servpname_1 = $_POST['servpname_1'];
$servpname_2 = $_POST['servpname_2'];
$servpname_3 = $_POST['servpname_3'];

# ==画像ありの場合、削除
if ($serviname_1 != ""){
	$serviname_1 = $ImgDir.$serviname_1;
	unlink ($serviname_1);
	$serviname_1 ="";
}

if ($serviname_2 != ""){
	$serviname_2 = $ImgDir.$serviname_2;
	unlink ($serviname_2);
	$serviname_2 ="";
}
if ($serviname_3 != ""){
	$serviname_3 = $ImgDir.$serviname_3;
	unlink ($serviname_3);
	$serviname_3 ="";
}
# ==PDFありの場合、削除
if ($servpname_1 != ""){
	unlink ($pdfdir.$servpname_1);
	$servpname_1 ="";
}

if ($servpname_2 != ""){
	unlink ($pdfdir.$servpname_2);
	$servpname_2 ="";
}

if ($servpname_3 != ""){
	unlink ($pdfdir.$servpname_3);
	$servpname_3 ="";
}


$old_file = fopen($filename,"r");
$tmp_file = fopen('../log/tmp_file.log',"w");

while (!feof($old_file)){
	$old_data = fgets($old_file);
	if ($old_data==""){break;}
	$chk_data = explode("<>",$old_data);

	if ($no == $chk_data[0]){
		fwrite($tmp_file, $new_data);
	} else {
		fwrite($tmp_file, $old_data);
	}
}
fclose($tmp_file);
fclose($old_file);
rename ('../log/tmp_file.log',$filename);

if (filesize($filename) == 0){
	unlink($logdir.$filename);
}

print<<<EOM
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<h2>No.$no タイトル：$title</h2>
<div><p class='p1c'>削除しました。</p></div>
<br>
<br>
<p class='p1c'><a href="./">最初のページに戻る</a></p>
EOM;
}
?>
</body>
</html>
