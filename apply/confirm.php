<?php
ini_set('display_errors', 1);
// フォームのボタンが押されたら
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータを各変数に格納
    $name = $_POST["name"];
    $furigana = $_POST["furigana"];
    $email = $_POST["email"];
    $zipCode1  = $_POST["zipCode1"];
    $zipCode2  = $_POST["zipCode2"];
    $address1  = $_POST["address1"];
    $address2  = $_POST["address2"];
    $pp  = $_POST["pp"];
}

if (isset($_POST["submit"])) {
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    $subject = "［神田珈琲園］申込書申請内容の確認";
    $body = <<< EOM
        {$name}　様

        申請ありがとうございます。
        以下の申請内容を、メールにて確認させていただきました。

        ===================================================
        【 お名前 】 
        {$name}

        【 ふりがな 】 
        {$furigana}

        【 メール 】 
        {$email}

        【 住所 】 
        {$zipCode1}ー{$zipCode2}
        {$address1}
        {$address2}
        ===================================================

        内容を確認のうえ、回答させて頂きます。
        しばらくお待ちください。
    EOM;

    $fromName = "盛盛盛";
    $fromEmail = "hl_sheng@mistnet.co.jp";
    $header = "From: " . mb_encode_mimeheader($fromName) . "<{$fromEmail}>";

    mb_send_mail($email, $subject, $body, $header, $fromEmail);

    $body = <<< EOM
        {$name}　様からの申込書です。
       


        【 お名前 】 
        {$name}

        【 ふりがな 】 
        {$furigana}

        【 メール 】 
        {$email}

        【 住所 】 
        {$zipCode1}ー{$zipCode2}
        {$address1}
        {$address2}
        

        
    EOM;
    if (mb_send_mail($fromEmail, $subject, $body, $header, $email)) {
        header("Location: thanks.php");
    } else {
        header("Location: ../index.html");
    }

    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>神田珈琲園 神田北口店 | 申込書申請確認</title>
    <meta name="description" content="神田珈琲店 神田駅北口店 申込書申請確認">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DISCaVa.net">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Bootstrap Javascript(jQuery含む) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style></style>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <script src="../js/main.js"></script>
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
                    <div class="HeadSP__btn" id="Hbtn">
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
                            <a href="../index.html">
                                <li class="HumMenu__list">トップページ</li>
                            </a>
                            <a href="../about.html">
                                <li class="HumMenu__list">当店について</li>
                            </a>
                            <a href="../menu.html">
                                <li class="HumMenu__list">メニュー</li>
                            </a>
                            <a href="../gallery.html">
                                <li class="HumMenu__list">ギャラリー</li>
                            </a>
                            <a href="index.php">
                                <li class="HumMenu__list">お問い合わせ</li>
                            </a>
                            <li class="HumMenu__list--last"><a>オンラインショップ</a></li>
                        </ul>
                        <ul class="HeadSPIcon">
                            <li><a href="https://twitter.com/kanda_coffee_en"><img alt="twi_icon" src="../top_pic/twi_icon2.svg"></a></li>
                            <li><a href="https://www.instagram.com/kanda_coffee_en/"><img alt="inst_icon" src="../top_pic/inst_icon2.svg"></a></li>
                        </ul>
                        <p class="Hum__time">【営業時間】</p>
                        <dl class="Order">
                            <dt class="Order__day">平日　</dt>
                            <dd class="Order__time">7:00〜22:00</dd>
                            <dt class="Order__day--last">※ラストオーダーは21:45</dt>
                            <dt class="Order__day">土曜日</dt>
                            <dd class="Order__time">8:00〜18:00</dd>
                            <dt class="Order__day">日曜日</dt>
                            <dd class="Order__time">9:00〜18:00</dd>
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
                            <a href="../index.html">
                                <li class="SideMenu__list">トップページ</li>
                            </a>
                            <a href="../about.html">
                                <li class="SideMenu__list">当店について</li>
                            </a>
                            <a href="../menu.html">
                                <li class="SideMenu__list">メニュー</li>
                            </a>
                            <a href="../gallery.html">
                                <li class="SideMenu__list">ギャラリー</li>
                            </a>
                            <a href="index.php">
                                <li class="SideMenu__list">お問い合わせ</li>
                            </a>
                            <li class="SideMenu__list--last"><img alt="outide" src="../top_pic/outi.svg"><br><a>オンラインショップ</a></li>
                        </ul>
                    </nav>
                    <ul class="HeadIcon">
                        <li><a href="https://twitter.com/kanda_coffee_en"><img alt="twi_icon" src="../top_pic/twi_icon.svg"></a></li>
                        <li><a href="https://www.instagram.com/kanda_coffee_en/"><img alt="inst_icon" src="../top_pic/inst_icon.svg"></a></li>
                    </ul>
                    <p>【営業時間】</p>
                    <dl class="Order">
                        <dt class="Order__day">平日　</dt>
                        <dd class="Order__time">7:00〜22:00</dd>
                        <dt class="Order__day--last">※ラストオーダーは21:45</dt>
                        <dt class="Order__day">土曜日</dt>
                        <dd class="Order__time">8:00〜18:00</dd>
                        <dt class="Order__day">日曜日</dt>
                        <dd class="Order__time">9:00〜18:00</dd>
                    </dl>
                </div>
            </header>
            <main class="col-lg Container">
                <section class="Apply">
                    <h1><img slt="logo" src="../top_pic/logo.svg"><br>申込書申請内容確認</h1>
                    <p>入力いただいた内容は以下の通りです。<br>
                        誤りがないかご確認ください。<br>
                        特にメールアドレスに関しては、<br>
                        誤りがありますとご返信できません。<br>
                        必ずご確認いただきますようお願い申し上げます。</p>
                </section>
                <form action="confirm.php" method="post" name="form" onsubmit="return validate()">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="furigana" value="<?php echo $furigana; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="zipCode1" value="<?php echo $zipCode2; ?>">
                    <input type="hidden" name="zipCode2" value="<?php echo $zipCode2; ?>">
                    <input type="hidden" name="address1" value="<?php echo $address1; ?>">
                    <input type="hidden" name="address2" value="<?php echo $address2; ?>">
                    <input type="hidden" name="pp" value="<?php echo $pp; ?>">
                    <fieldset>
                        <legend>
                            <label>お名前</label>
                            <br>
                            <p class="Confirm__p"><?php echo $name; ?></p>
                        </legend>
                        <legend>
                            <label>ふりがな</label>
                            <br>
                            <p class="Confirm__p"><?php echo $furigana; ?></p>
                        </legend>
                        <legend>
                            <label>メールアドレス</label>
                            <br>
                            <p class="Confirm__p"><?php echo $email; ?></p>
                        </legend>
                        <legend>
                            <label>住所</label>
                            <br>
                            <p class="Confirm__p"><?php echo $zipCode1; ?>ー<?php echo $zipCode2; ?></p>
                            <p class="Confirm__p"><?php echo $address1; ?></p>
                            <p class="Confirm__p"><?php echo $address2; ?></p>
                        </legend>
                    </fieldset>
                    <input class="Apply__btn--2" type="button" value="内容を修正する" onclick="history.back(-1)">
                    <button class="Apply__btn" type="submit" name="submit">送信する</button>
                </form>
            </main>
        </div>
    </div>
    <footer class="footer">
        <ul class="footerUl">
            <a>
                <li class="footerUl_li">会社情報</li>
            </a>
            <a>
                <li class="footerUl_li">個人情報の取り扱いについて</li>
            </a>
        </ul>
        <div class="SpFooter">
            <ul class="FooterMenu">
                <a href="../index.html">
                    <li>トップページ</li>
                </a>
                <a href="../menu.html">
                    <li>メニュー</li>
                </a>
                <a href="">
                    <li>オンラインショップ</li>
                </a>
                <a href="../about.html">
                    <li>当店について</li>
                </a>
                <a href="../gallery.html">
                    <li>ギャラリー</li>
                </a>
                <a href="index.php">
                    <li>お問い合わせ</li>
                </a>
            </ul>
            <a>
                <p>個人情報の取り扱いについて</p>
            </a>
            <ul class="FooterIcon">
                <li class="FooterIcon__li"><a href="https://twitter.com/kanda_coffee_en"><img alt="twi_iconF" src="../top_pic/twi_icon.svg"></li></a>
                <li class="FooterIcon__li"><a href="https://twitter.com/kanda_coffee_en"><img class="FooterIcon__li--left" alt="inst_iconF" src="../top_pic/inst_icon.svg"></li></a>
            </ul>
        </div>
        <p class="Copy">©2022 神田珈琲園, All Rights Reserved.</p>
    </footer>
</body>

</html>