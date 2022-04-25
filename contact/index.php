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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Bootstrap Javascript(jQuery含む) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <script src="../js/main.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../top_pic/faviconV2.ico" />

    <!-- OGP -->
    <meta property="og:url" content="https://www.kanda-coffee-en.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="神田珈琲園 神田駅北口店" />
    <meta property="og:description" content="神田珈琲園 神田駅北口店　お問い合わせページ" />
    <meta property="og:site_name" content="神田珈琲園 神田駅北口店 | お問い合わせ" />
    <meta property="og:image" content="top_pic/logo.svg" />

    <script>
        $(function() {
            /* 「同意する」チェックイベント */
            $('[type="checkbox"]').on('click', function() {
                if ($('[type="checkbox"]').prop("checked")) {
                    $('[type="submit"]').css('background-color', 'rgb(54, 37, 21)');
                } else {
                    $('[type="submit"]').css('background-color', 'rgb(102, 102, 102)');
                }
            });
            /* 「同意する」がチェックされていない場合submit=false */
            $('[type="submit"]').on('click', function() {
                if ($('[type="submit"]').css('background-color') == 'rgb(102, 102, 102)') {
                    return false;
                }
            });

            $(window).on('load', function() {
                $("input[name='pp']").removeAttr("checked").prop("checked", false).change(); 
            });
        });
    </script>
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
                    <h1><img slt="logo" src="../top_pic/logo.svg"><br>お問い合わせ</h1>
                    <p>ご不明な点などございましたら<br>お気軽にお問い合わせください。</p>
                    <p>※全項目を必ず入力してください。</p>
                </section>
                <form action="confirm.php" method="post" name="form" onsubmit="return validate()">
                    <fieldset>
                        <legend>
                            <label>お名前</label>
                            <br><input type="text" name="name" placeholder="例）山田太郎" value="" required="required">
                        </legend>
                        <legend>
                            <label>ふりがな</label>
                            <br><input type="text" name="furigana" placeholder="例）やまだたろう" value="" pattern="[\u3041-\u3096]*" title="ひらがなで入力してください。" required="required">
                        </legend>
                        <legend>
                            <label>メールアドレス</label>
                            <br><input type="email" name="email" placeholder="例）guest@example.com" value="" pattern="[^/ {2,}/]+[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="正しいメールアドレスを入力してください。" required="required">
                        </legend>
                        <legend>
                            <label>お問い合わせ内容</label>
                            <br><textarea name="content" rows="5" placeholder="お問い合わせ内容を入力" required="required"></textarea>
                        </legend>
                        <legend class="Contact__pp">
                            <a target="_blank" href="https://kanda-coffee-en.shop-pro.jp/?mode=privacy"><label class="Contact__pp--label arrow">個人情報の取り扱いについて</label>
                                <p class="Contact__pp--about">個人情報の取り扱いを<br>お読みになりましたら下記にチェックを<br>入れてください。</p>
                            </a>
                            <br><input type="checkbox" name="pp">
                        </legend>
                    </fieldset>
                    <button class="Contact__btn" type="submit">確認画面へ</button>
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