<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログアウト画面</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <div class="logout1"> 

            <p>ログアウトしました。</p>

            <div class="logout2">
                <input type="button" onclick="location.href='/Players/login_1.php'" name="" value="ログイン画面へ戻る">
            </div>

        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>