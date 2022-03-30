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
    <script  src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <script src="../js/main.js"></script>
        <!-- OGP -->
        <meta property="og:url" content="https://www.kanda-coffee-en.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="神田珈琲園 神田駅北口店" />
    <meta property="og:description" content="神田駅から北口徒歩一分の直火式自家焙煎・ネルドリップのカフェ。1957年に東京神田・国鉄中央線ガード下で開業。" />
    <meta property="og:site_name" content="神田珈琲園 神田駅北口店 | お問い合わせ" />
    <meta property="og:image" content="top_pic/logo.svg" />

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
        <script>
            $(function () {
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
                        <a target="_blank" href="https://kanda-coffee-en.shop-pro.jp/?mode=privacy"><label class="Contact__pp--label arrow">個人情報の取り扱いについて</label></a>
                        <p class="Contact__pp--about">上記個人情報の取り扱いを<br>お読みになりましたら下記にチェックを<br>入れてください。</p>
                        <br><input type="checkbox" name="pp">
                    </legend>
                </fieldset>
                <button class="Contact__btn" type="submit">確認画面へ</button>
            </form>
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