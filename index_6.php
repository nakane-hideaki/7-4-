<?php
session_start();

$user_id = $_SESSION['flg'];

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project = new PlayerController();
$projects = $project->projects_index6();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件詳細</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <script>

        function confirm_test() {
            var select = confirm("応募してよろしいですか？");
            return select;
        }

    </script>

    <body>

        <?php
            include ('header2.php');
        ?>

        <form action="index_7.php" method="post" name="" class="form_index6">
            <input type="hidden" name="project_id" value="<?= $projects[0]['id'] ?>">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">

            <p><?= $projects['0']['title'] ?></p>

            <p><?= $projects['0']['before_name']. "➡︎". $projects['0']['after_name']?></p>

            <div class="form_index6_project">
                <p>依頼内容詳細<br><?= $projects['0']['content'] ?></p>
            </div>

            <div class="index_6_input">
                <input type="button" onclick=history.back() class="back" name="" value="前の画面へ戻る">
                <input type="submit" name="" onclick="return confirm_test()" class="back" value="応募する">
            </div>

        </form>

            <!-- ここにPHPで検索した案件を入れる -->

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>