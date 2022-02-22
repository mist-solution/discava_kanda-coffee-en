<?php 
    // フォームのボタンが押されたら
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームから送信されたデータを各変数に格納
        $name = $_POST["name"];
        $furigana = $_POST["furigana"];
        $email = $_POST["email"];
        $content  = $_POST["content"];
        $pp  = $_POST["pp"];
    }

    if (isset($_POST["submit"])) {
            mb_language("ja");
            mb_internal_encoding("UTF-8");
            $subject = "［自動送信］お問い合わせ内容の確認";
        $body = <<< EOM
        {$name}　様

        お問い合わせありがとうございます。
        以下のお問い合わせ内容を、メールにて確認させていただきました。

        ===================================================
        【 お名前 】 
        {$name}

        【 ふりがな 】 
        {$furigana}

        【 メール 】 
        {$email}

        【 内容 】 
        {$content}
        ===================================================

        内容を確認のうえ、回答させて頂きます。
        しばらくお待ちください。
        EOM;
        
        $fromEmail = "titan114514@gmail.com";
        $fromName = "田中";
        $pfrom = "-f titan114514@gmail.com";
        $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";
        mb_send_mail($email, $subject, $body, $header, $pfrom);
        header( "Location: thanks.php" ) ;
        exit;
    }
?>

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
</head>
<body>
<div class="wrap">
    <div class="row mx-auto">
        <header class="col-lg-2 Head">  
            <div class="HeadSP">
                <a href="../index.html"><img class="HeadSP__logo" src="../top_pic/logo.svg"></a>
                <p class="HeadSP__text">神田駅北口店</p>
                <p class="HeadSP__text"><img alt="tel" src="../top_pic/tel.svg">03-3252-7608</p>
                <div class="HeadSP__btn">
                    <div class="HeadSP__btn--hm" id="Hbtn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="Head__fixed">
                <img class="Head__logo" src="../top_pic/logo1.png" alt="珈琲園サイドロゴ">
                <h1 class="Head__title">神田駅北口店</h1>
                <nav class="HeadNav">
                    <ul class="SideMenu">
                        <a href="../index.html"><li class="SideMenu__list">トップページ</li></a>
                        <li class="SideMenu__list"><a>当店について</a></li>
                        <li class="SideMenu__list"><a>メニュー</a></li>
                        <li class="SideMenu__list"><a>ギャラリー</a></li>
                        <li class="SideMenu__list"><a>お問い合わせ</a></li>
                        <li class="SideMenu__list--last"><img alt="outide" src="../top_pic/outi.svg"><br><a>オンラインショップ</a></li>
                    </ul>
                </nav>
                <ul class="HeadIcon">
                    <li><a><img alt="twi_icon" src="../top_pic/twi_icon.svg"></a></li>
                    <li><a><img alt="inst_icon" src="../top_pic/inst_icon.svg"></a></li>
                </ul>
                <p>【営業時間】</p>
                <dl class="Order">
                    <dt class="Order__day">平日</dt><dd class="Order__time">7:00〜22:00</dd>
                    <dt class="Order__day--last">※ラストオーダーは21:45</dt>
                    <dt class="Order__day">土曜日</dt><dd class="Order__time">8:00〜18:00</dd>
                    <dt class="Order__day">日曜日</dt><dd class="Order__time">9:00〜18:00</dd>
                </dl>
            </div>
        </header>
        <main class="col-lg Container">
            <section class="Contact">
                <h1><img slt="logo" src="../top_pic/logo.svg"><br>お問い合わせ内容確認</h1>
                <p>入力いただいた内容は以下の通りです。<br>誤りがないかご確認ください。<br>特にメールアドレスに関しては、<br>誤りがありますとご返信できません。<br>必ずご確認いただきますようお願い申し上げます。</p>
            </section>
            <form action="confirm.php" method="post" name="form" onsubmit="return validate()">
                <fieldset>
                    <legend>
                        <label>お名前</label>
                        <br><p class="Confirm__p"><?php echo $name; ?></p>
                    </legend>
                    <legend>
                        <label>ふりがな</label>
                        <br><p class="Confirm__p"><?php echo $furigana; ?></p>
                    </legend>
                    <legend>
                        <label>メールアドレス</label>
                        <br><p class="Confirm__p"><?php echo $email; ?></p>
                    </legend>
                    <legend>
                        <label>お問い合わせ内容</label>
                        <br><p class="Confirm__p"><?php echo $content; ?></p>
                    </legend>
                </fieldset>
                <input class="Contact__btn--2" type="button" value="内容を修正する" onclick="history.back(-1)">
                <button class="Contact__btn" type="submit" name="submit">送信する</button>
            </form>
        </main>
    </div>
</div>
<footer>
    
</footer>
</body>
</html>