<?php
ini_set('display_errors', 1);
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
    $subject = "［神田珈琲園］お問い合わせ内容の確認";
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

    $fromName = "田中";
    $fromEmail = "t_tanaka@discava.net";
    $header = "From: " . mb_encode_mimeheader($fromName) . "<{$fromEmail}>";

    mb_send_mail($email, $subject, $body, $header, $fromEmail);

    $body = <<< EOM
        {$name}　様からのお問い合わせです。



        【 お名前 】 
        {$name}

        【 ふりがな 】 
        {$furigana}

        【 メール 】 
        {$email}

        【 内容 】 
        {$content}
        

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
    <title>神田珈琲園 神田北口店 | お問い合わせ確認</title>
    <meta name="description" content="神田珈琲店 神田駅北口店 お問い合わせページ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DISCaVa.net">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Bootstrap Javascript(jQuery含む) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style></style>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <script src="../js/main.js"></script>
    <!-- OGP -->
    <meta property="og:url" content="https://www.kanda-coffee-en.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="神田珈琲園 神田駅北口店" />
    <meta property="og:description" content="神田駅から北口徒歩一分の直火式自家焙煎・ネルドリップのカフェ。1957年に東京神田・国鉄中央線ガード下で開業。" />
    <meta property="og:site_name" content="神田珈琲園 神田駅北口店 | 問い合わせ確認" />
    <meta property="og:image" content="top_pic/logo.svg" />

</head>

<body>
    <div class="wrap">
        <div class="row mx-auto">
            <header id="header" class="col-lg-2 Head">
                <script>
                    $(function() {
                        $("#header").load("../include/header2.html");
                    });
                </script>
            </header>
            <main class="col-lg Container">
                <section class="Contact">
                    <h1><img slt="logo" src="../top_pic/logo.svg"><br>お問い合わせ内容確認</h1>
                    <p>入力いただいた内容は以下の通りです。<br>誤りがないかご確認ください。<br>特にメールアドレスに関しては、<br>誤りがありますとご返信できません。<br>必ずご確認いただきますようお願い申し上げます。</p>
                </section>
                <form action="confirm.php" method="post" name="form" onsubmit="return validate()">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="furigana" value="<?php echo $furigana; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="content" value="<?php echo $content; ?>">
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
                            <label>お問い合わせ内容</label>
                            <br>
                            <p class="Confirm__p"><?php echo $content; ?></p>
                        </legend>
                    </fieldset>
                    <input class="Contact__btn--2" type="button" value="内容を修正する" onclick="history.back(-1)">
                    <button class="Contact__btn2" type="submit" name="submit">送信する</button>
                </form>
                <p class="pagetop">
                    <script>
                        $(function() {
                            $(".pagetop").load("../include/pagetop.html");
                        });
                    </script>
                </p>

            </main>
        </div>
    </div>
    <footer class="footer" id="footer">
        <script>
            $(function() {
                $("#footer").load("../include/footer2.html");
            });
        </script>
    </footer>
</body>

</html>