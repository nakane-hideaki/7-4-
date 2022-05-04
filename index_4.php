<?php
session_start();

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project = new PlayerController();
$projects = $project->projects_index4();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>トップページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <form action="index_5.php" method="post" class="form_toppage" name="">
            <label>案件検索</label>
            <input type="text" name="lang_word" class="form_toppage2" placeholder="ここに言語を入力" value="">
            <input type="submit" class="form_toppage3" value="検索">
        </form>

        <div class="toppage">
            <p>最新の案件一覧</p>

            <!-- ここにPHPで最新案件を入れる -->
            
            

            <?php 
            foreach($projects as $value){
            ?>

            <form action="index_6.php" method="post" class="">

                <div class="latest_title">
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

        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>