<?php

// DB接続
require_once (ROOT_PATH .'/Views/Players/db1.php');
$pdo = get_pdo();

// トークン認証
$sql = 'SELECT * FROM users WHERE password_reset_token = :password_reset_token';
$sth = $pdo->prepare($sql);
$sth->bindValue(':password_reset_token', $_POST['password_reset_token'], \PDO::PARAM_STR);
$sth->execute();
$user = $sth->fetchAll();

if(empty($user)){
    exit('不正なリクエストです');
}

// パスワードをアップデート
$sql1 = 'UPDATE users SET password = :password WHERE password_reset_token = :password_reset_token';
$sth1 = $pdo->prepare($sql1);
$params = [
    ':password_reset_token' => $_POST['password_reset_token'],
    ':password' => $_POST['password_reset1'],
];
$sth1->execute($params);
$user2 = $sth1->fetch(\PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>パスワード変更完了画面</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header1.php');
        ?>

        <p class="password_complete">パスワード変更完了しました。</p>

        <div class="logout2">
            <input type="button" onclick="location.href='/Players/login_1.php'" name="" value="ログイン画面へ戻る">
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>