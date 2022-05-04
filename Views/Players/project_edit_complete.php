<?php
session_start();

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project_edit = new PlayerController();
$params = $project_edit->projects_edit_complete();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件編集完了ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <div class="index_7">

            <p>編集完了しました。</p>

            <input type="submit" class="" onclick="location.href='/Players/index_4.php'" name="" value="トップページに戻る">
            
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>