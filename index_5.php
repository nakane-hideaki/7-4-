<?php
session_cache_expire(0);
session_cache_limiter('private_no_expire');
session_start();

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project = new PlayerController();
$projects = $project->projects_index5();


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件一覧</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <input type="button" onclick=history.back() class="back" name="" value="前の画面へ戻る">

            <!-- ここにPHPで検索した案件を入れる -->

        <?php 
        foreach($projects as $value){
        ?>

            <form action="index_6.php" method="post" class="">

                <div class="latest_title2">
                    <p><?=$value['title'] ?></p>

                    <div class="project_top">
                        <p><?=$value['before_name'] ?></p>
                        <p>➡︎</p>
                        <p><?=$value['after_name'] ?></p>
                    </div>

                    <input type="hidden" name="project_id" value="<?= $value['id'];?>">
                    <input type="submit" value="詳細を見る">
                </div>

            </form>


        <?php } ?>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>