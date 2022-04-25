<!doctype html>
<?php
	ini_set('memory_limit', '256M');
	require_once("wn_lib.php");

		$title = $_POST['title'];
		$honbun = $_POST['honbun'];
	
		$start = $_POST['start'];
		$expir = $_POST['expir'];
		$editd = date("Y/m/d H:i:s",$_SERVER['REQUEST_TIME']);
		$nowdate = time();

		$pdf_1 = $pdf_2 = $pdf_3 = "";
		$imgfile_1 = $imgfile_2 = $imgfile_3 ="";
		$p1_w = $p1_h = $p2_w = $p2_h = $p3_w = $p3_h="";
		$p1_ws=$p1_hs=$p2_ws=$p2_hs=$p3_ws=$p3_hs="";

		$serviname_1 = $_FILES["img_file"]["name"][0];
		$serviname_2 = $_FILES["img_file"]["name"][1];
		$serviname_3 = $_FILES["img_file"]["name"][2];

		$servpname_1 = $_FILES["pdf_file"]["name"][0];
		$servpname_2 = $_FILES["pdf_file"]["name"][1];
		$servpname_3 = $_FILES["pdf_file"]["name"][2];


$date = date("Ym",$nowdate);
(int)$todayn=date("Y",$nowdate)*10000 + date("m",$nowdate)*100 + date("d",$nowdate);

# === 採番 ===
$nofile = fopen ( '../log/num.dat' , "r");
$no = fgets($nofile);
fclose($nofile);

$no++;

$nofile = fopen ( '../log/num.dat' , "w");
fwrite($nofile , $no);
fclose($nofile);

# === データ準備 ===
# ... 表示終了日付 1桁は頭に0 ...
if ($expir){
	if ($expir == "-"){
		$expir == "-";
	} else {
		$expym[] =  explode("/",$expir);
	}
} else {
	$expir = "-";
}
// PDF1
	if ((file_exists($pdfdir.$_FILES["pdf_file"]["name"][0])) && ($_FILES["pdf_file"]["name"][0])){
print<<<EOM
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<h2>No.$no タイトル：$title</h2>
EOM;
print<<<EOM
既に同一ファイル名のPDFがあります。<br>同一ファイル名のPDFはアップロード出来ません。(1)<br>
<p class='p1c red'>修正・編集を中止しました。</p>
<br>
<br>
<p class='p1c'><a href="javascript:history.back();">前のページに戻る</a></p>
<p class="p2c" style="clear: both;"><a href="https://www.k-crk.com/ctrl/"><strong>⬅総合管理ページに戻る</strong></a></p>
</body>
</html>
EOM;
exit;
	}
if  (($_FILES["pdf_file"]["name"][0]) != ""){
	if (file_exists($_FILES["pdf_file"]["tmp_name"][0])){
		$path = $_FILES['pdf_file']['tmp_name'][0];
		$mime = shell_exec('file -bi '.escapeshellcmd($path));
		$mime = trim($mime);
		$mime = preg_replace("/ [^ ]*/", "", $mime);
	//ファイルのMINEタイプをチェック
	if ($mime == "application/pdf;"){ // windowsではコメントアウト
			move_uploaded_file($_FILES["pdf_file"]["tmp_name"][0],$pdfdir.$_FILES["pdf_file"]["name"][0]);
	} else { // windowsではコメントアウト
		echo "ng $mime <br>"; // windowsではコメントアウト
		exit; // windowsではコメントアウト
	} // windowsではコメントアウト
	$servpname_1 = $_FILES["pdf_file"]["name"][0];
	} else {
	$servpname_1 = $_POST['servpname_1'];
	}
}

// PDF2
//一時ファイルができているか（アップロードされているか）チェック
	if ((file_exists($pdfdir.$_FILES["pdf_file"]["name"][1])) && ($_FILES["pdf_file"]["name"][1])){
print<<<EOM
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<link href="../../shinrin.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<h2>No.$no タイトル：$title</h2>
EOM;
print $_FILES["pdf_file"]["name"][1];
print<<<EOM
 既に同一ファイル名のPDFがあります。<br>同一ファイル名のPDFはアップロード出来ません。(2)<br>
<p class='p1c red'>修正・編集を中止しました。</p>
<br>
<br>
<p class='p1c'><a href="javascript:history.back();">編集ページに戻る</a></p>
</body>
</html>
EOM;
exit;
	}
if (($_FILES["pdf_file"]["name"][1])){
if($servpname_2){unlink ($pdfdir.$servpname_2);};
//一時ファイルができているか（アップロードされているか）チェック
#	if (file_exists($pdfdir.$servpname_2)){
#		unlink ($pdfdir.$servpname_2);
#	}
	if (file_exists($_FILES["pdf_file"]["tmp_name"][1])){
		$path = $_FILES['pdf_file']['tmp_name'][1];
		$mime = shell_exec('file -bi '.escapeshellcmd($path));
		$mime = trim($mime);
		$mime = preg_replace("/ [^ ]*/", "", $mime);
	//ファイルのMINEタイプをチェック
	if ($mime == "application/pdf;"){ // windowsではコメントアウト
			move_uploaded_file($_FILES["pdf_file"]["tmp_name"][1],$pdfdir.$_FILES["pdf_file"]["name"][1]);
	} else { // windowsではコメントアウト
		echo "ng $mime <br>"; // windowsではコメントアウト
		exit; // windowsではコメントアウト
	} // windowsではコメントアウト
	$servpname_2 = $_FILES["pdf_file"]["name"][1];
	} else {
	$servpname_2 = $_POST['servpname_2'];
	}
}
// PDF3
	if ((file_exists($pdfdir.$_FILES["pdf_file"]["name"][2])) && ($_FILES["pdf_file"]["name"][2])){
print<<<EOM
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<link href="../../shinrin.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<h2>No.$no タイトル：$title</h2>
EOM;
print $_FILES["pdf_file"]["name"][1];
print<<<EOM
既に同一ファイル名のPDFがあります。<br>同一ファイル名のPDFはアップロード出来ません。(3)<br>
<p class='p1c red'>修正・編集を中止しました。</p>
<br>
<br>
<p class='p1c'><a href="javascript:history.back();">編集ページに戻る</a></p>
</body>
</html>
EOM;
exit;
	}
if (($_FILES["pdf_file"]["name"][2])){
	//一時ファイルができているか（アップロードされているか）チェック
if($servpname_3){unlink ($pdfdir.$servpname_3);};
	if (file_exists($_FILES["pdf_file"]["tmp_name"][2])){
		$path = $_FILES['pdf_file']['tmp_name'][2];
		$mime = shell_exec('file -bi '.escapeshellcmd($path));
		$mime = trim($mime);
		$mime = preg_replace("/ [^ ]*/", "", $mime);
//ファイルのMINEタイプをチェック
	if ($mime == "application/pdf;"){ // windowsではコメントアウト
			move_uploaded_file($_FILES["pdf_file"]["tmp_name"][2],$pdfdir.$_FILES["pdf_file"]["name"][2]);
	} else { // windowsではコメントアウト
		echo "ng $mime <br>"; // windowsではコメントアウト
		exit; // windowsではコメントアウト
	} // windowsではコメントアウト
	$servpname_3 = $_FILES["pdf_file"]["name"][2];
	} else {
	$servpname_3 = $servpname_2 = $_POST['servpname_3'];
	}
}

// 画像（写真） //
$min_width = 640; // 幅の最低サイズ
$min_height = 480; // 高さの最低サイズ

// Jpeg1 //
//一時ファイルができているか（アップロードされているか）チェック
	if (is_uploaded_file($_FILES["img_file"]["tmp_name"][0])) {
        $file1 = $_FILES["img_file"]["tmp_name"][0]; // 元画像ファイル
        $file2 = "../img/".$no."p_1.jpg"; // 画像保存先のパス
		$serviname_1 = $no."p_1.jpg"; // 画像保存先のパス
        $in = ImageCreateFromJPEG($file1); // 元画像ファイル読み込み
        $width = ImageSx($in); // 画像の幅を取得
        $height = ImageSy($in); // 画像の高さを取得
        $image_type = exif_imagetype($file1); // 画像タイプ判定用

        if ($image_type == IMAGETYPE_JPEG){ // JPGかどうか判定
            if($width >= $min_width|$height >= $min_height){
                if($width == $height) {
					$p1_w = $min_width;
					$p1_ws =$min_width / 4;
                    $p1_h = $min_height;
					$p1_hs =$min_height / 4;
                } else if($width > $height) {//横長の場合
                    $p1_w = $min_width;
                    $p1_h = $height*($min_width/$width);
                    $p1_ws = $min_width / 4;
                    $p1_hs = $height*($min_width/$width) / 4;
                } else if($width < $height) {//縦長の場合
                    $p1_w = $width*($min_height/$height);
                    $p1_h = $min_height;
                    $p1_ws = $width*($min_height/$height) / 4;
                    $p1_hs = $min_height / 4;
                }
                //　画像生成
                $out = ImageCreateTrueColor($p1_w , $p1_h);
                ImageCopyResampled($out, $in,0,0,0,0, $p1_w, $p1_h, $width, $height);
                ImageJPEG($out, $file2);
            } else {
                echo "サイズが幅".$min_width."×高さ".$min_height."以上の画像をご用意ください";
            }
        } else {
            echo "JPG画像をご用意ください";
        }
}
// Jpeg2 //
//一時ファイルができているか（アップロードされているか）チェック
    if (is_uploaded_file($_FILES["img_file"]["tmp_name"][1])) {
        $file1 = $_FILES["img_file"]["tmp_name"][1]; // 元画像ファイル
        $file2 = "../img/".$no."p_2.jpg"; // 画像保存先のパス
 		$serviname_2 = $no."p_2.jpg"; // 画像保存先のパス
       $in = ImageCreateFromJPEG($file1); // 元画像ファイル読み込み
        $width = ImageSx($in); // 画像の幅を取得
        $height = ImageSy($in); // 画像の高さを取得
        $image_type = exif_imagetype($file1); // 画像タイプ判定用

        if ($image_type == IMAGETYPE_JPEG){ // JPGかどうか判定
            if($width >= $min_width|$height >= $min_height){
                if($width == $height) {
					$p2_w = $min_width;
					$p2_ws =$min_width / 4;
                    $p2_h = $min_height;
					$p2_hs =$min_height / 4;
              } else if($width > $height) {//横長の場合
                    $p2_w = $min_width;
                    $p2_h = $height*($min_width/$width);
                    $p2_ws = $min_width / 4;
                    $p2_hs = $height*($min_width/$width) / 4;
                } else if($width < $height) {//縦長の場合
                    $p2_w = $width*($min_height/$height);
                    $p2_h = $min_height;
                    $p2_ws = $width*($min_height/$height) / 4;
                    $p2_hs = $min_height / 4;
                }
                //　画像生成
                $out = ImageCreateTrueColor($p2_w , $p2_h);
                ImageCopyResampled($out, $in,0,0,0,0, $p2_w, $p2_h, $width, $height);
                ImageJPEG($out, $file2);
            } else {
                echo "サイズが幅".$min_width."×高さ".$min_height."以上の画像をご用意ください";
            }
        } else {
            echo "JPG画像をご用意ください";
        }
}
// Jpeg3 //
//一時ファイルができているか（アップロードされているか）チェック
	if (is_uploaded_file($_FILES["img_file"]["tmp_name"][2])) {
        $file1 = $_FILES["img_file"]["tmp_name"][2]; // 元画像ファイル
        $file2 = "../img/".$no."p_3.jpg"; // 画像保存先のパス
		$serviname_3 = $no."p_3.jpg"; // 画像保存先のパス//一時ファイルができているか（アップロードされているか）チェック
        $in = ImageCreateFromJPEG($file1); // 元画像ファイル読み込み
        $width = ImageSx($in); // 画像の幅を取得
        $height = ImageSy($in); // 画像の高さを取得
        $image_type = exif_imagetype($file1); // 画像タイプ判定用

        if ($image_type == IMAGETYPE_JPEG){ // JPGかどうか判定
            if($width >= $min_width|$height >= $min_height){
                if($width == $height) {
                    $p3_w = $min_width;
                    $p3_h = $min_height;
					$p3_ws =$min_width / 4;
					$p3_hs =$min_height / 4;
                } else if($width > $height) {//横長の場合
                    $p3_w = $min_width;
                    $p3_h = $height*($min_width/$width);
                    $p3_ws = $min_width / 4;
                    $p3_hs = $height*($min_width/$width) / 4;
                } else if($width < $height) {//縦長の場合
                    $p3_w = $width*($min_height/$height);
                    $p3_h = $min_height;
                    $p3_ws = $width*($min_height/$height) / 4;
                    $p3_hs = $min_height / 4;
                }
                //　画像生成
                $out = ImageCreateTrueColor($p3_w , $p3_h);
                ImageCopyResampled($out, $in,0,0,0,0, $p3_w, $p3_h, $width, $height);
                ImageJPEG($out, $file2);
            } else {
                echo "サイズが幅".$min_width."×高さ".$min_height."以上の画像をご用意ください";
            }
        } else {
            echo "JPG画像をご用意ください";
        }
}
		
# === 現在の月日 ===
$now = date("Y/m/d H:i:s");
$host =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
$nowym = date("Ym");
# === 半角<>を全角に置換 ===
#$title = str_replace('<', '＜', $title);
#$title = str_replace('>', '＞', $title);
#$honbun = str_replace('<', '＜', $honbun);
#$honbun = str_replace('>', '＞', $honbun);
# === 改行処理 ===
#$honbun = str_replace('\n', '<br>', '<br>');
$honbun = preg_replace("/\r\n|\r|\n/",'<br>', $honbun);
# === タイムシリアル ===
$now = time();
	
# === データ書込 ===
$filename = $logdir.$date.$fntail.".dat";	# filename生成

$old_file = fopen($filename,"r");
$tmp_file = fopen('../log/tmp_file.log',"w");

$new_data = $no."<>".$title."<>".$honbun."<>".$now."<>".$start."<>".$expir."<>".$now."<>".$serviname_1."<>".$p1_ws."<>".$p1_hs."<>".$serviname_2."<>".$p2_ws."<>".$p2_hs."<>".$serviname_3."<>".$p3_ws."<>".$p3_hs."<>".$host."<>".$_FILES["pdf_file"]["name"][0]."<>".$_FILES["pdf_file"]["name"][1]."<>".$_FILES["pdf_file"]["name"][2]."<>\n";

fwrite($tmp_file, $new_data);

while (!feof($old_file)){
		$old_data = fgets($old_file);
		if ($old_data==""){break;}
		fwrite($tmp_file, $old_data);
}
fclose($tmp_file);
fclose($old_file);

# == 一時ファイル→保存ファイル
rename ('../log/tmp_file.log',$filename);
print<<<EOM
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<h2>No.$no タイトル：$title</h2>
EOM;
print "<div><p class='p1c'>追加しました。</p></div>";
?>
<br>
<br>
<p class='p1c'><a href="./">最初のページに戻る</a></p>
</body>
</html>
