<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>神田珈琲園 神田北口店 | お問い合わせ</title>
    <meta name="description" content="神田珈琲店 神田駅北口店 お問い合わせページ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DISCaVa.net">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Bootstrap Javascript(jQuery含む) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    <style></style>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <script src="../js/main.js"></script>
    <script>
        $(function() {
            /* 「同意する」チェックイベント */
            $('[type="checkbox"]').on('click', function(){
                if($('[type="checkbox"]').prop("checked")){
                    $('[type="submit"]').css('background-color', 'rgb(54, 37, 21)');
                } else {
                    $('[type="submit"]').css('background-color', 'rgb(102, 102, 102)');
                }
            });
            /* 「同意する」がチェックされていない場合submit=false */
            $('[type="submit"]').on('click', function(){
                    if ($('[type="submit"]').css('background-color') == 'rgb(102, 102, 102)') {
                        return false;
                    }
                });
            });
    </script>
</head>
<body>
<div class="wrap">
    <div class="row mx-auto">
    <header id="header" class="col-lg-2 Head"> 
            <div class="HeadSP">
                <div class="HeadSP__fixed">
                    <a href="../index.html"><img class="HeadSP__logo" src="../top_pic/logo.svg"></a>
                    <p class="HeadSP__text">神田駅北口店</p>
                    <p class="HeadSP__text"><img alt="tel" src="../top_pic/tel.svg">03-3252-7608</p>
                </div>
                <div class="HeadSP__btn" id="Hbtn" >
                    <div class="HeadSP__btn--hm">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="Hum">
                    <div class="Hum__logo">
                        <a href="index.html"><img alt="logo" src="../top_pic/logo.svg"></a>
                    </div>
                    <p class="Hum__shop">神田駅東口店</p>
                    <ul class="HumMenu">
                            <a href="../index.html"><li class="HumMenu__list">トップページ</li></a>
                            <a href="../about.html"><li class="HumMenu__list">当店について</li></a>
                            <a href="../menu.html"><li class="HumMenu__list">メニュー</li></a>
                            <a href="../gallery.html"><li class="HumMenu__list">ギャラリー</li></a>
                            <a href="index.php"><li class="HumMenu__list">お問い合わせ</li></a>
                            <li class="HumMenu__list--last"><a>オンラインショップ</a></li>
                    </ul>
                    <ul class="HeadSPIcon">
                        <li><a href="https://twitter.com/kanda_coffee_en"><img alt="twi_icon" src="../top_pic/twi_icon2.svg"></a></li>
                        <li><a href="https://www.instagram.com/kanda_coffee_en/"><img alt="inst_icon" src="../top_pic/inst_icon2.svg"></a></li>
                    </ul>
                    <p class="Hum__time">【営業時間】</p>
                    <dl class="Order">
                        <dt class="Order__day">平日　</dt><dd class="Order__time">7:00〜22:00</dd>
                        <dt class="Order__day--last">※ラストオーダーは21:45</dt>
                        <dt class="Order__day">土曜日</dt><dd class="Order__time">8:00〜18:00</dd>
                        <dt class="Order__day">日曜日</dt><dd class="Order__time">9:00〜18:00</dd>
                    </dl>    
                    <p class="Hum__tel">【TEL】</p>
                    <p class="Hum__tel"><a href="tel:03-3252-7608">03-3252-7608</a></p>
                </div>
            </div>
            <div class="Head__fixed">
                <a href="index.html"><img class="Head__logo" src="../top_pic/logo1.png" alt="珈琲園サイドロゴ"></a>
                <h1 class="Head__title">神田駅北口店</h1>
                <nav class="HeadNav">
                    <ul class="SideMenu">
                        <a href="../ndex.html"><li class="SideMenu__list">トップページ</li></a>
                        <a href="../about.html"><li class="SideMenu__list">当店について</li></a>
                        <a href="../menu.html"><li class="SideMenu__list">メニュー</li></a>
                        <a href="../gallery.html"><li class="SideMenu__list">ギャラリー</li></a>
                        <a href="index.php"><li class="SideMenu__list">お問い合わせ</li></a>
                        <li class="SideMenu__list--last"><img alt="outide" src="../top_pic/outi.svg"><br><a>オンラインショップ</a></li>
                    </ul>
                </nav>
                <ul class="HeadIcon">
                    <li><a href="https://twitter.com/kanda_coffee_en"><img alt="twi_icon" src="../top_pic/twi_icon.svg"></a></li>
                    <li><a href="https://www.instagram.com/kanda_coffee_en/"><img alt="inst_icon" src="../top_pic/inst_icon.svg"></a></li>
                </ul>
                <p>【営業時間】</p>
                <dl class="Order">
                    <dt class="Order__day">平日　</dt><dd class="Order__time">7:00〜22:00</dd>
                    <dt class="Order__day--last">※ラストオーダーは21:45</dt>
                    <dt class="Order__day">土曜日</dt><dd class="Order__time">8:00〜18:00</dd>
                    <dt class="Order__day">日曜日</dt><dd class="Order__time">9:00〜18:00</dd>
                </dl>
            </div> 
            <script>
                //$(function () {
                       // $("#header").load("include/header.html");
                //});
            </script>
        </header>        
        <main class="col-lg Container">
            <section class="Contact">
                <h1><img slt="logo" src="../top_pic/logo.svg"><br>お問い合わせ</h1>
                <p>ご不明な点などございましたら<br>お気軽にお問い合わせください。</p>
                <p>※項目は必ず入力してください。</p>
            </section>
            <form action="confirm.php" method="post" name="form" onsubmit="return validate()">
                <fieldset>
                    <legend>
                        <label>お名前</label>
                        <br><input type="text" name="name" placeholder="例）山田太郎" value="" >
                    </legend>
                    <legend>
                        <label>ふりがな</label>
                        <br><input type="text" name="furigana" placeholder="例）やまだたろう" value="">
                    </legend>
                    <legend>
                        <label>メールアドレス</label>
                        <br><input type="email" name="email" placeholder="例）guest@example.com" value="" required="required">
                    </legend>
                    <legend>
                        <label>お問い合わせ内容</label>
                        <br><textarea name="content" rows="5" placeholder="お問合せ内容を入力" required="required"></textarea>
                    </legend>
                    <legend class="Contact__pp">
                        <label class="Contact__pp--label arrow">個人情報の取り扱いについて</label>
                        <p class="Contact__pp--about">上記個人情報の取り扱いを<br>お読みになりましたら下記にチェックを<br>入れてください。</p>
                        <br><input type="checkbox" name="pp">
                    </legend>
                </fieldset>
                <button class="Contact__btn" type="submit">確認画面へ</button>
            </form>
        </main>
    </div>
</div>
<footer class="footer">
    <ul class="footerUl">
        <a><li class="footerUl_li">会社情報</li></a>
        <a><li class="footerUl_li">個人情報の取り扱いについて</li></a>
    </ul>
    <div class="SpFooter">
        <ul class="FooterMenu">
            <a href="../index.html"><li>トップページ</li></a>
            <a href="../menu.html"><li>メニュー</li></a>
            <a href=""><li>オンラインショップ</li></a>
            <a href="../about.html"><li>当店について</li></a>
            <a href="../gallery.html"><li>ギャラリー</li></a>
            <a href="index.php"><li>お問い合わせ</li></a>
        </ul>
        <a><p>個人情報の取り扱いについて</p></a>
        <ul class="FooterIcon">
            <li class="FooterIcon__li"><a href="https://twitter.com/kanda_coffee_en"><img alt="twi_iconF" src="../top_pic/twi_icon.svg"></li></a>
            <li class="FooterIcon__li"><a href="https://twitter.com/kanda_coffee_en"><img class="FooterIcon__li--left" alt="inst_iconF" src="../top_pic/inst_icon.svg"></li></a>
        </ul>
    </div>
    <p class="Copy">©2022 神田珈琲園, All Rights Reserved.</p>
</footer>
</body>
</html>