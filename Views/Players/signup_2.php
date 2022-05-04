<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>新規登録</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header1.php');
        ?>

        <div class="form_2">

            <form action="signup_complete.php" method="post" name="">

                <?php 
                    if(isset($_SESSION['name'])){
                        echo "<p><span>※".$_SESSION['name']."</span></p>";
                    }

                    if(isset($_SESSION['email'])){
                        echo "<p><span>※".$_SESSION['email']."</span></p>";
                    }

                    if(isset($_SESSION['password'])){
                        echo "<p><span>※".$_SESSION['password']."</span></p>";
                    }
                ?>

                <p>
                    <label>ユーザー名：</label>
                    <input type="text" class="form2_input" name="name" placeholder="ここに記入">
                </p>

                <p>
                    <label>メールアドレス：</label>
                    <input type="email" class="form2_input" name="email" placeholder="ここに記入">
                </p>

                <p>
                    <label>パスワード：</label>
                    <input type="password" class="form2_input" name="password" placeholder="ここに記入">
                </p>

                <p>
                    <label>パスワード(確認)：</label>
                    <input type="password" class="form2_input" name="password2" placeholder="ここに記入">
                </p>

                <div class="checkbox3">

                    <p>あなたの使える言語</p>

                    <div class="checkbox3_1">
                        <label><input type="checkbox" name="lang_1" value="1">日本語</label>
                        <label><input type="checkbox" name="lang_2" value="2">英語</label>
                        <label><input type="checkbox" name="lang_3" value="3">中国語</label>
                        <label><input type="checkbox" name="lang_4" value="4">イタリア語</label>
                    </div>

                    <div>
                        <label><input type="checkbox" name="lang_5" value="5">フランス語</label>
                        <label><input type="checkbox" name="lang_6" value="6">ベトナム語</label>
                        <label><input type="checkbox" name="lang_7" value="7">韓国語</label>
                        <label><input type="checkbox" name="lang_8" value="8">タイ語</label>
                    </div>

                    <div>
                        <label><input type="checkbox" name="lang_9" value="9">ポルトガル語</label>
                        <label><input type="checkbox" name="lang_10" value="10">ロシア語</label>
                        <label><input type="checkbox" name="lang_11" value="11">ウクライナ語</label>
                        <label><input type="checkbox" name="lang_12" value="12">ドイツ語</label>
                    </div>

                    <div>
                        <label><input type="checkbox" name="lang_13" value="13">スペイン語</label>
                        <label><input type="checkbox" name="lang_14" value="14">オランダ語</label>
                        <label><input type="checkbox" name="lang_15" value="15">ギリシャ語</label>
                        <label><input type="checkbox" name="lang_16" value="16">ルーマニア語</label>
                    </div>

                    <div class="login2_button">
                        <input type="button" onclick=history.back() class="" value="ログイン画面へ戻る">
                        <input type="submit" class="" name='' value="新規登録する">
                    </div>

                </div>

            </form>
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>

<?php
    $_SESSION = [];
?>