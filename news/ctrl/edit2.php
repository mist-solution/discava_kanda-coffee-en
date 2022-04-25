<!doctype html>
<?php
	ini_set('memory_limit', '256M');
	ini_set('date.timezone', 'Asia/Tokyo');
	require_once("wn_lib.php");
		$no = $_POST['no'];
		$indate = $_POST['indate'];
#		print "-".$_POST['filename']."-";	# filename取得
		$filename = $_POST['filename'];	# filename取得

		$serviname_1 = $_POST['serviname_1'];
		$serviname_2 = $_POST['serviname_2'];
		$serviname_3 = $_POST['serviname_3'];

		$servpname_1 = $_POST['servpname_1'];
		$servpname_2 = $_POST['servpname_2'];
		$servpname_3 = $_POST['servpname_3'];
#echo $servpname_3."++";

		$start = $_POST['start'];
		$expir = $_POST['expir'];

		$title = $_POST['title'];
		$honbun = $_POST['honbun'];

if ($_FILES["img_file"]["name"][0]){
		$serviname_1 = $_FILES["img_file"]["name"][0];
} else {
		$serviname_1 = $_POST['serviname_1'];
}
if ($_FILES["img_file"]["name"][1]){
		$serviname_2 = $_FILES["img_file"]["name"][1];
} else {
		$serviname_2 = $_POST['serviname_2'];
}
if ($_FILES["img_file"]["name"][2]){
		$serviname_3 = $_FILES["img_file"]["name"][2];
} else {
		$serviname_3 = $_POST['serviname_3'];
}

		$p1_ws = $_POST['p1_ws'];
		$p2_ws = $_POST['p2_ws'];
		$p3_ws = $_POST['p3_ws'];
		$p1_hs = $_POST['p1_hs'];
		$p2_hs = $_POST['p2_hs'];
		$p3_hs = $_POST['p3_hs'];

$nowdate = time();

$date = date("Ym",time());
(int)$todayn=date("Y",$nowdate)*10000 + date("m",$nowdate)*100 + date("d",$nowdate);
$editd = time();

# ... 表示終了日付 1桁は頭に0 ...
$expym[] =  explode("/",$expir);
if ($expir){
	if ($expir == "-"){
		$expir == "-";
	} else {
#		$expym[] = split("/",$in{'expir'});
#		$expir = sprintf("%4d",$expym[0])."/".sprintf("%02d",$expym[1])."/".sprintf("%02d",$expym[2]);
	}
} else {
	$expir = "-";
}
if ($_POST['pdfdel1'] != ""){
#    $q = $_POST["pdfdel1"];
#    echo 'チェック1：' . $q . '<br>';
	unlink ($pdfdir.$servpname_1);
	$servpname_1 = "";
}

if ($_POST['pdfdel2'] != "") {
#    $q = $_POST["pdfdel1"];
#    echo 'チェック1：' . $q . '<br>';
	unlink ($pdfdir.$servpname_2);
	$servpname_2= "";
} else {
#    echo '1チェックされていません。<br>';
}
if ($_POST['pdfdel3'] != "") {
#    $q = $_POST["pdfdel1"];
#    echo 'チェック1：' . $q . '<br>';
	unlink ($pdfdir.$servpname_3);
	$servpname_3 = "";
} else {
#    echo '1チェックされていません。<br>';
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
print $_FILES["pdf_file"]["name"][0];
print<<<EOM
既に同一ファイル名のPDFがあります。<br>同一ファイル名のPDFはアップロード出来ません。(1)<br>
<p class='p1c red'>修正・編集を中止しました。</p>
<br>
<br>
<p class='p1c'><a href="javascript:history.back();">編集ページに戻る</a></p>
<br>
<p class='p1c'><a href="files.php">ファイル一覧に戻る</a></p>
</body>
</html>
EOM;
exit;
	}
if  (($_FILES["pdf_file"]["name"][0]) != ""){
if($servpname_1){unlink ($pdfdir.$servpname_1);};

	//一時ファイルができているか（アップロードされているか）チェック
	
#	if (file_exists($pdfdir.$servpname_1)){
#		unlink ($pdfdir.$servpname_1);
#	}
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
<br>
<p class='p1c'><a href="files.php">ファイル一覧に戻る</a></p>
</body>
</html>
EOM;
exit;
	}
if (($_FILES["pdf_file"]["name"][1])){
if($servpname_2){unlink ($pdfdir.$servpname_2);};
	if (file_exists($_FILES["pdf_file"]["tmp_name"][1])){
		$path = $_FILES['pdf_file']['tmp_name'][1];
		$mime = shell_exec('file -bi '.escapeshellcmd($path));
		$mime = trim($mime);
		$mime = preg_replace("/ [^ ]*/", "", $mime);
	//ファイルのMINEタイプをチェック
	if ($mime == "application/pdf;"){ // windowsではコメントアウト
#			if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"][1],"../pdf/".$_FILES["pdf_file"]["name"][1])){
			if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"][1],$pdfdir.$_FILES["pdf_file"]["name"][1])){
				print "修正成功";
			} else {
				print $_FILES["pdf_file"]["tmp_name"][1]." - ".$pdfdir.$_FILES["pdf_file"]["name"][1]."修正失敗";
			}
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
<br>
<p class='p1c'><a href="files.php">ファイル一覧に戻る</a></p>
</body>
</html>
EOM;
exit;
	}
if (($_FILES["pdf_file"]["name"][2])){
	//一時ファイルができているか（アップロードされているか）チェック
if($servpname_3){unlink ($pdfdir.$servpname_3);};
#	if (file_exists($pdfdir.$servpname_3)){
#		unlink ($pdfdir.$servpname_3);
#	}
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


# ==画像削除指定の場合、削除
if ($_POST['p1_del'] == 1){
	unlink ($ImgDir.$serviname_1);
	$serviname_1 = "";
	$p1_ws = "";
	$p1_hs = "";
}

#echo $_POST['p2_del']."bw<br>";
if ($_POST['p2_del'] == 1){
	unlink ($ImgDir.$serviname_2);
	$serviname_2 = "";
	$p2_w = "";
	$p2_h = "";
}
if ($_POST['p3_del'] == 1){
	unlink ($ImgDir.$serviname_3);
	$serviname_3 = "";
	$p3_w = "";
	$p3_h = "";
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
} else {
	 //　ファイルがアップロードされていなければ何もしない
#		$serviname_1."は変化なし
}
// Jpeg2 //
    if (is_uploaded_file($_FILES["img_file"]["tmp_name"][1])) {
        $file3 = $_FILES["img_file"]["tmp_name"][1]; // 元画像ファイル
        $file4 = "../img/".$no."p_2.jpg"; // 画像保存先のパス
 		$serviname_2 = $no."p_2.jpg"; // 画像保存先のパス
       $in = ImageCreateFromJPEG($file3); // 元画像ファイル読み込み
        $width = ImageSx($in); // 画像の幅を取得
        $height = ImageSy($in); // 画像の高さを取得
        $image_type = exif_imagetype($file3); // 画像タイプ判定用

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
                ImageJPEG($out, $file4);
            } else {
                echo "サイズが幅".$min_width."×高さ".$min_height."以上の画像をご用意ください";
            }
        } else {
            echo "JPG画像をご用意ください";
        }
} else {
	 //　ファイルがアップロードされていなければ何もしない	
#		$serviname_2."は変化なし
}
// Jpeg3 //
//一時ファイルができているか（アップロードされているか）チェック
    if (is_uploaded_file($_FILES["img_file"]["tmp_name"][2])) {
        $file1 = $_FILES["img_file"]["tmp_name"][2]; // 元画像ファイル
        $file2 = "../img/".$no."p_3.jpg"; // 画像保存先のパス
		$serviname_3 = $no."p_3.jpg"; // 画像保存先のパス
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
} else {
	 //　ファイルがアップロードされていなければ何もしない
#		$serviname_3."は変化なし
}

# === 現在の月日 ===
#$now = date("Y/m/d H:i:s");
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
#$now = time();

# print "(1)".$serviname_1."<br>"."(2)".$serviname_2."<br>"."(3)".$serviname_3;
# === データ書込 ===
$new_data = $no."<>".$title."<>".$honbun."<>".$indate."<>".$start."<>".$expir."<>".$editd."<>".$serviname_1."<>".$p1_ws."<>".$p1_hs."<>".$serviname_2."<>".$p2_ws."<>".$p2_hs."<>".$serviname_3."<>".$p3_ws."<>".$p3_hs."<>".$host."<>".$servpname_1."<>".$servpname_2."<>".$servpname_3."<>\n";

#print $data;

$old_file = fopen($filename,"r");
$tmp_file = fopen('../log/tmp_file.log',"w");

while (!feof($old_file)){
		$old_data = fgets($old_file);
		if ($old_data==""){break;}
		
		$chk_data = explode("<>",$old_data);
		$old_no = $chk_data[0];


	if ($no == $old_no){
		fwrite($tmp_file, $new_data);
	} else {
		fwrite($tmp_file, $old_data);
	}
}
fclose($tmp_file);
fclose($old_file);

# == 一時ファイル→保存ファイル
rename ('../log/tmp_file.log',$filename);
#unlink ('../log/tmp_file.log');

print<<<EOM
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<link href="../../cfe.css" rel="stylesheet">
<link href="ctrl.css" rel="stylesheet">
</head>
<body>
<h2>No.$no タイトル：$title</h2>
<p class='p1c'>修正・編集しました。</p>
<br>
<p class='p1c'><a href="./">最初のページに戻る</a></p>
EOM;
?>
</body>
</html>
