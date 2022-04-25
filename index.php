<!DOCTYPE html>
<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
    <meta charset="utf-8">
    <title>神田珈琲園 神田北口店</title>
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
    <link rel="stylesheet" href="stylesheet/style.css?v=2">
    <link rel="shortcut icon" type="image/x-icon" href="top_pic/faviconV2.ico" />
    <script src="js/main.js"></script>
    <script>
        jQuery(function () {
            var webStorage = function () {
                if (sessionStorage.getItem('access')) {
                } else {
                    sessionStorage.setItem('access', 0);
                    $(".LoadMov").css("display", "block");
                }
            }
            webStorage();
        });
    </script>
    <link rel="icon" href="top_pic/faviconV2.ico">
    <link rel="apple-touch-icon" href="top_pic/faviconV2.png">
    <!-- OGP -->
    <meta property="og:url" content="https://www.kanda-coffee-en.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="神田珈琲園 神田駅北口店" />
    <meta property="og:description" content="神田駅から北口徒歩一分の直火式自家焙煎・ネルドリップのカフェ。1957年に東京神田・国鉄中央線ガード下で開業。" />
    <meta property="og:site_name" content="神田珈琲園 神田駅北口店 | トップページ" />
    <meta property="og:image" content="top_pic/logo.svg" />
</head>

<body id="all">
    <!--ローディングアニメーション-->
    <div class="LoadMov">
        <div class="LoadMov__img">
            <p class="Lmovp">1957</p>
            <p class="btnS btn-border Skip">SKIP</p>
        </div>
    </div>
    <!--神田珈琲園の歴史の写真-->
    <div id="fullOverlay">
        <img class="Ovimg" alt="Overlay" src="">
        <p class="Fexp" id="1957">1957年<br>国鉄ガード下にて開業</p>
        <p class="Fexp" id="1980">1980年</p>
        <p class="Fexp" id="2010">2010年</p>
        <p class="Fexp" id="2022">2022年<br>改装</p>
        <p class="Fab">※タップで戻る</p>
    </div>
    <!--ここから本ページ-->
    <div class="wrap">
        <div class="row mx-auto">
            <header id="header" class="col-lg-2 Head">
                <!--ヘッダー部分読み込み-->
                <script>
                    $(function () {
                        $("#header").load("include/header.html");
                    });
                </script>
            </header>
            <main class="col-lg Container">
                <!--ファーストビュー-->
                <div class="FirstV">
                    <div class="FirstV__container">
                        <p class="Catch1 scroll-fade"><span>一九五七年から神田の地で愛されてきた</span></p>
                        <p class="Catch2 scroll-fade"><span>自家焙煎の珈琲専門店</span></p>
                        <p class="Catch3">Scroll</p>
                    </div>
                </div>
                <!--お知らせ部分-->
                <section class="News">
                    <div class="News__title">
                        <h2 class="News__title--h">お知らせ</h2>
                        <img class="News__title--img" alt="sign" src="top_pic/topic.png">
                    </div>
                    <div class="News__list scroll-fade">
                        <ul class="NList">
<!--iijima-->
<?php
# === ↓設定 ===
$fntail = "cf";			# ログファイル名（末尾2文字)
$logdir = "./news/log/";	# ログ保存ディレクトリ
$ImgDir = "./news/img/";	# ログ保存ディレクトリ
$pdfdir = "./news/pdf/";	# ログ保存ディレクトリ
$numfile = "./news/log/num.dat";# 採番ファイル
$nonews = "準備中";
$pagenews = 4;		# 記事表示件数
# === ↑設定 ===

#=== 日付設定 ===
$today = sprintf("%04d%02d%02d",date("Y"),date("m"),date("d"));	#yyyy/mm/dd
(int)$today_ymn = sprintf("%04d%02d",date("Y"),date("m"));	#yyyymm
$start = sprintf("%04d/%02d/%02d",date("Y"),date("m"),date("d"));#yyyy/mm/dd
(int)$today_ymdn=date("Y")*10000+date("m")*100+date("d");	#yyyymmdd

$i=0;
$count=0;


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

# === 記事日付とタイトル表示 ===
		$logary[2] = mb_ereg_replace("http?s?:[\/\.\=\&\?a-zA-Z0-9_~\-#]*","<a href='\\0'>\\0</a>",$logary[2]);
		print "<a href='news/index.php?id=$logary[3]'><li><span class='NList__date'>$logary[4]</span><br>\n";
		print "<p class='NList__title'>$logary[1]</p>\n";
		print "</li></a>\n";

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
?>
                       </ul>
                    </div>
                </section>
                <!--神田珈琲園のはじまり-->
                <div class="Hwrap">
                    <section class="History">
                        <div class="HistoryAbout">
                            <div class="HistoryAbout__title">
                                <img alt="history1" src="top_pic/History1.svg">
                                <h2>神田珈琲園のはじまり</h2>
                            </div>
                            <p>神田珈琲園は昭和３３年頃<br class="br__sp">現在の場所に美人喫茶とし<br class="br__sp">オープンしました。
                            </p>
                            <p>その後、昭和４０年代に<br class="br__sp">個性的な喫茶店が主流と<br class="br__sp">なっていくのにともない、<br
                                    class="br__sp">神田珈琲園も美人喫茶から<br class="br__sp">直火焙煎の珈琲専門店に<br
                                    class="br__sp">リニューアルし、<br class="br__sp">現在に至っております。
                            </p>
                            <span class="HistoryAbout__exp">
                                <p>※画像タップで拡大</p>
                            </span>
                            <span class="HistoryAbout__exp--sp">
                                <p>※横スクロールで各年代を表示</p>
                            </span>
                        </div>
                        <div class="History__img">
                            <img class="Hrela" alt="history" src="top_pic/hist.svg">
                            <img class="Himg" id="1957" src="top_pic/1957.jpeg" alt="1957">
                            <img class="Himg" id="1980" src="top_pic/1980.jpeg" alt="1980">
                            <img class="Himg" id="2010" src="top_pic/2010.jpeg" alt="2010">
                            <img class="Himg" id="2022" src="top_pic/2022.jpeg" alt="2022">
                        </div>
                        <div class="History__cul">
                            <ul class="Hslider">
                                <li class="Hslider__li">
                                    <img src="top_pic/1957.jpeg" alt="1957">
                                    <p>1957年</p>
                                </li>
                                <li class="Hslider__li">
                                    <img src="top_pic/1980.jpeg" alt="1980">
                                    <p>1980年</p>
                                </li>
                                <li class="Hslider__li">
                                    <img src="top_pic/2010.jpeg" alt="2010">
                                    <p>2010年</p>
                                </li>
                                <li class="Hslider__li">
                                    <img src="top_pic/2022.jpeg" alt="2022">
                                    <p>2022年</p>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <!--看板部分-->
                <div class="Sign">
                    <img class="Sign__icon" alt="coffee-icon" src="top_pic/coffee-en.svg">
                </div>
                <!--おすすめメニュー-->
                <section class="Menu">
                    <div class="Menu__title">
                        <img alt="hukidashi" src="top_pic/hukidshi.svg">
                        <h2>おすすめメニュー</h2>
                    </div>
                    <div class="Menu__list">
                        <div class="Recom">
                            <p class="Recom__title Recom__title--1">珈琲園ブレンド</p>
                            <p class="Recom__about Recom__about--1"><img alt="coffee-icon" src="top_pic/coffee-icon.svg"
                                    class="Recom__about--icon">おかわり自由の看板商品</p>
                            <img class="Recom__img" alt="kanda-coffee" src="top_pic/kanda-coffee.png">
                            <p class="Recom__value Recom__value--1">500円(税込)</p>
                        </div>
                        <div class="Recom">
                            <p class="Recom__title Recom__title--2">でかオーレ</p>
                            <p class="Recom__about Recom__about--2"><img alt="cup-icon" class="Recom__about--icon"
                                    src="top_pic/cup.svg">とにかく<span class="Recom__about--big">大</span>きい</p>
                            <img class="Recom__img" alt="dekaore" src="top_pic/dekaore.png">
                            <p class="Recom__value Recom__value--2">620円(税込)</p>
                        </div>
                    </div>
                    <div class="MenuEg">
                        <ul class="MenuEg__list">
                            <li>ケーキセット</li>
                            <li>ドリンク</li>
                            <li>紅茶</li>
                            <li>珈琲アラカルト</li>
                            <li class="MenuEg__list--last">メインメニュー</li>
                        </ul>
                        <a href="menu.html">
                            <p class="MenuEg__btn">メニューを見る</p>
                        </a>
                        <p class="MenuEg__p">種類豊富な珈琲はもちろんセットの軽食や、美味しいケーキもございます。</p>
                    </div>
                </section>
                <!--通販-->
                <section class="KandaDeli">
                    <div class="KandaDeli__title">
                        <img alt="KandaDeli" src="top_pic/home-kanda.svg">
                        <h2>お家で神田珈琲</h2>
                    </div>
                    <div class="KandaDeli__loop">
                        <ul class="LoopSlide">
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                        </ul>
                        <ul class="LoopSlide">
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                        </ul>
                        <ul class="LoopSlide">
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                            <li class="LoopSlide__content"></li>
                        </ul>
                        <p>こだわりの豆を、<br>
                            お家で楽しめます。<br>
                            オリジナルグッズも販売中！</p>
                    </div>
                    <div class="KandaDeli__del">
                    <a target="_blank" href="https://kanda-coffee-en.shop-pro.jp/"><p class="KandaDeli__btn">Online<span>
                            </span>Shop</p></a>
                    </div>
                </section>
                <!--ギャラリー-->
                <section class="KandaGallery">
                    <h2 class="KandaGallery__h2">ギャラリー</h2>
                    <img alt="Gallery" class="KandaGallery__img" src="top_pic/Gallery2.png">
                    <p class="KandaGallery__about">
                        当店２階には、絵画・写真・イラスト等を展示できる展示スペース（ギャラリー）がございます。<br><br>当店展示スペースは、１４日を１単位とする「年間２６枠制」となっております。
                        <br>（年末年始は短縮日程あり）
                    </p>
                    <a href="gallery.html">
                        <p class="KandaGallery__btn">出店希望の方はこちら</p>
                    </a>
                </section>
                <!--店舗情報-->
                <section class="ShopAbout">
                    <div class="ShopAbout__title">
                        <h2>店舗情報</h2>
                    </div>
                    <div class="ShopAbout__info">
                        <dl class="ShopInfo">
                            <dt class="ShopInfo__title">住所</dt>
                            <dd class="ShopInfo__about">〒101-0044<br>東京都千代田区鍛冶町2-13-12<br><a target="_blank"
                                    href="https://goo.gl/maps/rEHGU6YPbPNTgUDG8">（地図を見る<img alt="map"
                                        src="top_pic/Map_icon.svg">）</a></dd>
                            <dt class="ShopInfo__title">電話</dt>
                            <dd class="ShopInfo__about">03-3252-7608</dd>
                        </dl>
                    </div>
                    <div class="ShopAbout__Twi">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d207126.92305714442!2d139.493911081295!3d35.791139361166444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f0.1!3m3!1m2!1s0x60188c01845276df%3A0xced9675484a667e4!2z56We55Sw54-I55Cy5ZySIOelnueUsOWMl-WPo-W6lw!5e0!3m2!1sja!2sjp!4v1647221833516!5m2!1sja!2sjp"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <a class="twitter-timeline" data-width="100%" data-height="500"
                            href="https://twitter.com/kanda_coffee_en?ref_src=twsrc%5Etfw">Tweets by kanda_coffee_en</a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </section>
                <p class="pagetop">
                    <!--ページ上部へ読み込み-->
                    <script>
                        $(function () {
                            $(".pagetop").load("include/pagetop.html");
                        });
                    </script>
                </p>
                <!--通販はこちら-->
                <a href="https://kanda-coffee-en.shop-pro.jp/" id="kotira"><img src="top_pic/top_kan.png"></a>
            </main>
        </div>
    </div>
    <footer class="footer" id="footer">
        <!--フッター読み込み-->
        <script>
            $(function () {
                $("#footer").load("include/footer.html");
            });
        </script>
    </footer>
</body>

</html>