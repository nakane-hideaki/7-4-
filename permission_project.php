<?php
session_start();

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$permission = new PlayerController();
$permission_user = $permission->permission_project();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件承認ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <script>

        function confirm_test() {
            var select = confirm("承認してよろしいですか？");
            return select;
        }

    </script>

    <body>

        <?php
            include ('header2.php');
        ?>

        <div class="permission_users">

            <?php 
                foreach($permission_user as $value){
                ?>

                <form action="permission_complete.php" method="post" class="">

                    <div class="permission">
                        <p>ユーザー名 : <?=$value['name'] ?></p>
                        <input type="hidden" name="permission_user_id" value="<?= $value['permission_user_id'] ?>">
                        <input type="hidden" name="permission_project_id" value="<?= $value['permission_project_id'] ?>">
                        <input type="submit" class="" onclick="return confirm_test()" value="承認">
                    </div>

                </form>

            <?php } ?>
        </div>

        <div class="index_9_input">
            <input type="button" onclick=history.back() class="back" name="" value="前の画面へ戻る">
        </div>


        <?php
            include ('fooder.php');
        ?>

    </body>
</html>