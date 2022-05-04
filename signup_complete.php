<?php
session_start();

if(!empty($_POST)){

    // 名前バリデーション
    if ($_POST['name'] == '') {
        
        // 空チェック
        $errors['name'] = '名前は必須入力です。';

    }elseif(mb_strlen($_POST['name']) > 20) {

        $errors['name'] = '名前は20文字以内で入力してください。';
    }

    // メールアドレスバリデーション
    if ($_POST['email'] == '') {
        
        //空チェック
        $errors['email'] = 'メールアドレスは必須入力です。';

    }

    // パスワード空チェック
    if ($_POST['password'] == '') {

        $errors['password'] = 'パスワードは必須入力です。';

    }elseif (mb_strlen($_POST['password']) > 20 or mb_strlen($_POST['password']) < 8) {

        // パスワード文字数チェック
        $errors['password'] = 'パスワードは8文字以上20文字以内で入力してください。';
    }elseif ($_POST['password'] != $_POST['password2']){

        $errors['password'] = 'パスワードと再確認が一致しません。';
    }
}

if(isset($errors)){

    $_SESSION['name'] = $errors['name'];
    $_SESSION['email'] = $errors['email'];
    $_SESSION['password'] = $errors['password'];
    header('Location: ./signup_2.php');

}

require_once(ROOT_PATH . "Controllers/PlayerController.php");
$project = new PlayerController();
$user_signup = $project->user_signup_complete();
$user_signup_lang = $project->user_lang_complete();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>応募完了ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header1.php');
        ?>

        <div class="index_7">

            <p>新規登録完了しました。</p>

            <input type="submit" class="" onclick="location.href='/Players/login_1.php'" name="" value="ログインページへ">
            
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>