<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>退会ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <div class="index_14">

            <p>退会ボタン押した後、アカウントの情報が<br>完全に削除されてしまいます。<br>本当に退会してもよろしいでしょうか？</p>

            <form action="logout_15.php" method="post" name="" class="logout_form">
                <input type="hidden" value="<?= $user_id_delete['flg']?>">
                <input type="button" class="" onclick=history.back() name="" value="前のページに戻る">
                <input type="submit" class="" name="user_id_delete" value="退会する">
            </form>

        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>