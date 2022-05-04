<?php

if(empty($_GET['csrf_token'])){
    exit('不正なリクエストです');
}

// DB接続
require_once (ROOT_PATH .'/Views/Players/db1.php');
$pdo = get_pdo();

// トークン認証
$sql = 'SELECT * FROM users WHERE password_reset_token = :password_reset_token';
$sth = $pdo->prepare($sql);
$sth->bindValue(':password_reset_token', $_GET['csrf_token'], \PDO::PARAM_STR);
$sth->execute();
$user = $sth->fetchAll();

if(empty($user)){
    exit('不正なリクエストです');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>パスワード再設定</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header1.php');
        ?>

        <div class="form_password_resetting">

            <form action="password_resetting_complete.php" method="post" name="">

                    <p><label>パスワード再設定：</label>
                    <input type="password" class="form_password_resetting_input" name="password_reset1" placeholder="ここに記入"></p>

                    <p><label>パスワード再設定(確認)：</label>
                    <input type="password" class="form_password_resetting_input" name="password_reset2" placeholder="ここに記入"></p>

                    <input type="hidden" class="form_password_resetting_input" name="password_reset_token" value="<?= $_GET['csrf_token']?>">

                <div class="form_password_resetting_button">
                    <input type="submit" class="" name='' value="変更する">
                </div>

            </form>
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>