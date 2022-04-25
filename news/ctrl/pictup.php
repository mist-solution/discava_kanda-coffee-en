<!doctype html>
<?php
mb_regex_encoding('UTF-8');
mb_internal_encoding ('UTF-8'); 
	require_once("./wn_lib.php");

	$no = $_GET['no'];
	$img = $_GET['img'];
	$title = $_GET['title'];
	$w = $_GET['w'];
	$h = $_GET['h'];
	$pict_w = $w * $pictx;
	$pict_h = $h * $pictx;
?>

<!-- 画面出力 -->
<!doctype html>
<html dir="ltr" lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<link href="../../shinrin.css" rel="stylesheet">

<?php
print "<title>$title</title>";
?>
<style>
* {
  box-sizing: border-box;
}

.hutei {
  position: relative;
  flex-grow: 1;
}
.inner {
	display: flex;
	position: absolute;
	width: 100%;
	height: 100%;
	align-items: center;
	justify-content: center;
	background: #fff;  
}
img {
	display: block;
}

.flex {
  display: flex;
  flex-direction: column;
  height: 700px;
/*  border: 5px solid pink;*/
}

.static1 {
  flex-shrink: 0;
  height: 45px;
	background: #efe;
}
.static2 {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
  flex-shrink: 0;
  height: 45px;
}
h3 {
	background:#efe;
	border-bottom:solid 1px #9b9;
	background-image: url("../../img/i_donguri.png");
	background-size: 30px 30px;
	background-repeat: no-repeat;
	padding: 0 0 0 45px;
}
	
</style>
</head>
<body>
<?php
print <<<EOM
<div class="flex">
	<div class="static1"><h3>$title</h3></div>
	<div class="hutei">
	<div class="inner"><img src="$img" "width=$pict_w" "height=$pict_h"></div>
	</div>
	<div class="static2" style="background:#eee;text-align:center;">
	<form>
	<input type="button" name="close" value="閉じる" onClick="window.close()" >
	</form>
</div>
EOM;
?>
</body>
</html>
