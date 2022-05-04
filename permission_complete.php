<?php
session_start();

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$permission_project = new PlayerController();
$params = $permission_project->permission_complete();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>承認完了ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <div class="index_7">

            <p>承認完了しました。</p>

            <input type="submit" class="" onclick="location.href='/Players/index_8.php'" name="" value="マイページに戻る">
            
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>