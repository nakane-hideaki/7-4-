<?php
session_start();

// トークン生成
$csrf_token = bin2hex(random_bytes(32));

// POSTメールアドレスのチェック
if(empty($_POST['email'])){
    exit('不正なリクエストです');
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// DB接続
require_once (ROOT_PATH .'/Views/Players/db1.php');
$pdo = get_pdo();

// メールアドレス認証
$sql = 'SELECT * FROM users WHERE email = :email';
$sth = $pdo->prepare($sql);
$sth->bindValue(':email', $email, \PDO::PARAM_STR);
$sth->execute();
$user = $sth->fetch(\PDO::FETCH_OBJ);


// トークンカラムをアップデート
$sql1 = 'UPDATE users SET password_reset_token = :password_reset_token WHERE email = :email';
$sth1 = $pdo->prepare($sql1);
$params = [
    ':password_reset_token' => $csrf_token,
    ':email' => $_POST['email'],
];
$sth1->execute($params);
$user2 = $sth1->fetch(\PDO::FETCH_OBJ);

?>

<?php 
//ここでメールアドレスの認証とurlの作成データベースにトークンをインサートする

// http://localhost/password resetting.php?csrf token={$csrf_token}

// メール送信
mb_language('Japanese');
mb_internal_encoding('UTF-8');

$url = "http://localhost:8888/Players/password_restting.php?csrf_token=${csrf_token}";

$subject =  'パスワードリセット用URLをお送りします';

$body = <<<EOD
        24時間以内に下記URLへアクセスし、パスワードの変更を完了してください。
        {$url}
        EOD;

        $headers = "From : hide09721@gmail.com\n";
        $headers .= "Content-Type : text/plain";

        $isSent = mb_send_mail($email, $subject, $body, $headers);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メール送信完了しました</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header1.php');
        ?>

        <div class="password_send">
            <p>メール送信完了しました。</p>
            <input type="button" onclick="location.href='/Players/login_1.php'" name="" value="ログイン画面へ戻る">
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>