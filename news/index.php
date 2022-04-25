<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>神田珈琲園 神田北口店 | お知らせ</title>
    <meta name="description" content="神田駅から北口徒歩一分の直火式自家焙煎・ネルドリップのカフェ。1957年に東京神田・国鉄中央線ガード下で開業。">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DISCaVa.net">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        crossorigin="anonymous">
    <!-- Bootstrap Javascript(jQuery含む) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/style.css?V=2">
    <script src="../js/main.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="top_pic/faviconV2.ico" />
    <!-- OGP -->
    <meta property="og:url" content="https://www.kanda-coffee-en.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="神田珈琲園 神田駅北口店" />
    <meta property="og:description" content="神田珈琲園からのお知らせ" />
    <meta property="og:site_name" content="神田珈琲園 神田駅北口店 | お知らせ" />
    <meta property="og:image" content="top_pic/logo.svg" />
<style>
.NewsBox__exp img{
	width: 100%;
	max-width: 700px;
}
.NewsBox__exp a{
	display:block;
}
.NewsBox__exp > a{
	width: 33%;
	padding-left:3%;
}
.NewsBox__exp{
	display:flex;
	flex-wrap:wrap;
}
.NewsBox__exp > p{
	width:100%;
	padding:2%;
}
.Newses{
	font-family:"YuMincho","Yu Mincho";
}
.Kamih__p{
	font-size:.8em;
	color:#101010;
	margin:0;
}
</style>
<!-- lightbox css -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css">
<!-- lightbox js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</head>

<body id="all">
    <div class="wrap">
        <div class="row mx-auto">
            <header id="header" class="col-lg-2 Head">
                <script>
                    $(function () {
                        $("#header").load("../include/header2.html");
                    });
                </script>
            </header>
            <main class="col-lg Container">
                <div class="Nwrap">
                    <section class="Newses">
                        <div class="Newses__title">
                            <img src="news_pic/Nmidasi.png" alt="Nmidasi">
                            <h2 class="Kamih">お知らせ</h2>
							<p class="Kamih__p">※画像はタップで拡大できます。</p>
                        </div>
<?php
# iijima
# === ↓設定 ===
$fntail = "cf";			# ログファイル名（末尾2文字)
$logdir = "./log/";	# ログ保存ディレクトリ
$ImgDir = "./img/";	# ログ保存ディレクトリ
$pdfdir = "./pdf/";	# ログ保存ディレクトリ
$numfile = "./log/num.dat";# 採番ファイル
$nonews = "準備中";
$pagenews = 10;		# 記事表示件数
# === ↑設定 ===

#=== GETパラメータ取得（id指定あり） ===
$id = filter_input(INPUT_GET, 'id');
if (mb_eregi("[^0-9]",$pid)){
	print "idの指定に異常";
	print "</body>\n</html>\n";
	exit;
}

#=== 日付設定 ===
$today = sprintf("%04d%02d%02d",date("Y"),date("m"),date("d"));	#yyyy/mm/dd
(int)$today_ymn = sprintf("%04d%02d",date("Y"),date("m"));	#yyyymm
$start = sprintf("%04d/%02d/%02d",date("Y"),date("m"),date("d"));#yyyy/mm/dd
(int)$today_ymdn=date("Y")*10000+date("m")*100+date("d");	#yyyymmdd

$i=0;
$count=0;

# === ログ一覧を取得 ===
$bfilename = glob($logdir."??????".$fntail.".dat");
rsort ($bfilename);
# === 表示 ===
	if ($id == ""){

# === id指定なし→$pagenewsで設定した件数まで表示

while ($count <= $pagenews){
# === ログファイル名を取得 ===
	$logfile = fopen($bfilename[$i],"r");
	while (!feof($logfile)){
		$log = fgets($logfile);
		if ($log==""){break;}			# === ログ終端なら中止
		$logary = explode("<>",$log);
	if ($logary[0]=='No'){continue;}	# === ヘッダ

# === 記事表示 ===
		$logary[2] = mb_ereg_replace("http?s?:[\/\.\=\&\?a-zA-Z0-9_~\-#]*","<a href='\\0'>\\0</a>",$logary[2]);
		print "<div class='NewsBox'>\n";
		print "<div class='NewsBox__title'>\n";
		print "<h3>$logary[1]</h3>\n";
		print "<p>$logary[4]</p>\n";
		print "</div>\n";
		print "<div class='NewsBox__exp'>\n";
		print "<p>$logary[2]</p>\n";
		print "</div>\n";
		print "</div>\n";# newsboxここまで

if ($logary[7] || $logary[10] || $logary[13]){
	if ($logary[7]){
		$img = $ImgDir.$logary[7];
		print "<a href='$img' data-lightbox='img-group' data-title='画像01' data-alt='' ><img src='$img'></a>";
	}
	if ($logary[10]){
		$img = $ImgDir.$logary[10];
		print "<a href='$img' data-lightbox='img-group' data-title='画像02' data-alt='' ><img src='$img'></a>";
	}
	if ($logary[13]){
		$img = $ImgDir.$logary[13];
		print "<a href='$img' data-lightbox='img-group' data-title='画像03' data-alt='' ><img src='$img'></a>";
	}
	}
		$count++;
		if ($count >= $pagenews){break;}
	}
	fclose($logfile);
	$i++;
	if ($count >= $pagenews){break;}
	if (!file_exists($bfilename[$i])){
		break;
	}
		}
} else {
# === id指定あり→１件表示
while ($count == 0){
# === ログファイル名を取得 ===
	$logfile = fopen($bfilename[$i],"r");
	while (!feof($logfile)){
		$log = fgets($logfile);
		if ($log==""){break;}		# === ログ終端なら中止
		$logary = explode("<>",$log);
	if ($logary[3]!=$id){continue;}	# === id相違なら次へ

# === 記事表示 ===
		$logary[2] = mb_ereg_replace("http?s?:[\/\.\=\&\?a-zA-Z0-9_~\-#]*","<a href='\\0'>\\0</a>",$logary[2]);
		print "<div class='NewsBox'>\n";
		print "<div class='NewsBox__title'>\n";
		print "<h3>$logary[1]</h3>\n";
		print "<p>$logary[4]</p>\n";
		print "</div>\n";
		print "<div class='NewsBox__exp'>\n";
		print "<p>$logary[2]</p>\n";

if ($logary[7] || $logary[10] || $logary[13]){
	if ($logary[7]){
		$img = $ImgDir.$logary[7];
		print "<a href='$img' data-lightbox='img-group' data-title='画像01' data-alt='' ><img src='$img'></a>";
	}
	if ($logary[10]){
		$img = $ImgDir.$logary[10];
		print "<a href='$img' data-lightbox='img-group' data-title='画像02' data-alt='' ><img src='$img'></a>";
	}
	if ($logary[13]){
		$img = $ImgDir.$logary[13];
		print "<a href='$img' data-lightbox='img-group' data-title='画像03' data-alt='' ><img src='$img'></a>";
	}
}

		print "</div>\n";
		print "</div>\n";# newsboxここまで

		$count++;
		if ($count >= $pagenews){break;}
	}
	fclose($logfile);
	$i++;
	if ($count >= $pagenews){break;}
	if (!file_exists($bfilename[$i])){
		break;
	}
		}
	}

print "</section>\n";
print "<section class='NewsAll'>";
print "<h2>お知らせ一覧</h2>";
print "<p class='tyui'>※スクロールで表示</p>";
print "<div class='NewsList'>\n";
# === ログ一覧を取得 ===
$i=0;
$count=0;
$bfilename = glob($logdir."??????".$fntail.".dat");
rsort ($bfilename);
# === 表示 ===
while ($count <= $pagenews){
# === ログファイル名を取得 ===
	$logfile = fopen($bfilename[$i],"r");
	while (!feof($logfile)){
		$log = fgets($logfile);
		if ($log==""){break;}			# === ログ終端なら中止
		$logary = explode("<>",$log);
	if ($logary[0]=='No'){continue;}	# === ヘッダ

# === 記事表示 ===
		$logary[2] = mb_ereg_replace("http?s?:[\/\.\=\&\?a-zA-Z0-9_~\-#]*","<a href='\\0'>\\0</a>",$logary[2]);
		print "<div class='NewsList__box'>\n";
		print "<div class='newsdate'>$logary[4]</div>\n";
		print "<div class='newssammary'><a href='index.php?id=$logary[3]'>$logary[1]</a></div>\n";
		print "</div>\n";

		$count++;
		if ($count >= $pagenews){break;}
	}
	fclose($logfile);
	$i++;
	if ($count >= $pagenews){break;}
	if (!file_exists($bfilename[$i])){
		break;
	}
}
		print "</div>\n";# newsboxここまで
?>
			</section>
                </div>
                <p class="pagetop">
                    <script>
                        $(function () {
                            $(".pagetop").load("../include/pagetop.html");
                        });
                    </script>
                </p>
            </main>
        </div>
    </div>
    <footer class="footer" id="footer">
        <script>
            $(function () {
                $("#footer").load("../include/footer2.html");
            });
        </script>
    </footer>

</body>

</html>