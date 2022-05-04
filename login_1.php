<?php
session_start();

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$user = new PlayerController();
$users = $user->login();

if(!empty($_POST)){

    if ($_POST['email'] == '') {
        
        // メールアドレス空チェック
        $errors['email'] = 'メールアドレスは必須入力です。';

    }elseif (empty($users['login']['email'])) {

        // メールアドレス正しいかチェック
        $errors['email_or_password'] = 'Eメールアドレスまたはパスワードが間違っています。';
    }

    // パスワード空チェック
    if ($_POST['password'] == '') {

        $errors['password'] = 'パスワードは必須入力です。';

    }elseif (empty($users['login']['password'])) {

        // メールアドレス正しいかチェック
        $errors['email_or_password'] = 'Eメールアドレスまたはパスワードが間違っています。';
    }
}


// ログイン機能
if(isset($users['login']['user_type'])) {

    if($users['login']['user_type'] == 1){
        $_SESSION['flg'] = $users['login']['id'];
        header("Location: ./index_4.php");
    }elseif($users['login']['user_type'] != 1){
        $_SESSION['flg'] = $users['login']['id'];;
        header("Location: ./index_4.php");
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログインページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header1.php');
        ?>

        <div class="form_1">

            <form action="" method="post" name="">

                <?php 
                    if(isset($errors['email_or_password'])){
                        echo "<p><span>※".$errors['email_or_password']."</span></p>";
                    }

                    if(isset($errors['email'])){
                        echo "<p><span>※".$errors['email']."</span></p>";
                    }

                    if(isset($errors['password'])){
                        echo "<p><span>※".$errors['password']."</span></p>";
                    }
                ?>
                <p>
                    <label>メールアドレス：</label>
                    <input type="email" class="form1_input" name="email" placeholder="ここに記入" value="<?= (htmlspecialchars($_SESSION['email'] ?? ''));?>">
                </p>

                <p>
                    <label>パスワード：</label>
                    <input type="password" class="form1_input" name="password" placeholder="ここに記入" value="<?= (htmlspecialchars($_SESSION['password'] ?? ''));?>">
                </p>

                <div class="login1_button">
                    <input type="button" onclick="location.href='/Players/password_reset_3.php'" class="" value="パスワード忘れた方">
                    <input type="button" onclick="location.href='/Players/signup_2.php'" class="" value="新規登録する">
                    <input type="submit" class="" name='' value="ログインする">
                </div>

            </form>
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>