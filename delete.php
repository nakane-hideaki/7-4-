<?php
session_start();

$project_id = $_POST['project_id_delete'];

if(empty($project_id)){
    header("Location: ./index_8.php");
}

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project = new PlayerController();
$delete = $project->projects_delete();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件削除完了ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <div class="index_7">

            <p>削除完了しました。</p>

            <input type="submit" class="" onclick="location.href='/Players/index_4.php'" name="" value="トップページに戻る">
            
        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>