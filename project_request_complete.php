<?php
session_start();

$client_user_id = $_SESSION['flg'];
 
require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project = new PlayerController();
$project->projects_request_complete();
$project->projects_talks_update_complete();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件投稿完了ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <div class="index_7">

            <p>投稿完了しました。</p>

            <input type="submit" class="" onclick="location.href='/Players/index_4.php'" name="" value="トップページに戻る">
            
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>