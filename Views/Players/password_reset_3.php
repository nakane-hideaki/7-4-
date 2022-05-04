<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>パスワードリセット</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header1.php');
        ?>

        <div class="form_3">

            <form action="send.php" method="post" name="">
                <p>
                    <label>メールアドレス：</label>
                    <input type="email" class="form3_input" name="email" placeholder="ここに記入">
                <div class="login3_button">
                    <input type="button" onclick=history.back() class="" value="ログイン画面へ戻る">
                    <input type="submit" class="" name='' value="メール送信">
                </div>

            </form>
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>