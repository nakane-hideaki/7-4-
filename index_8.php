<?php
session_start();

$user_id = $_SESSION['flg'];

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project = new PlayerController();
$projects = $project->projects_index8();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>マイページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>

        <script>
            function multipleaction(u){
            var f = document.querySelector("form");
            var a = f.setAttribute("action", u);
            document.querySelector("form").submit();
            }
        </script>

        <script>

            function confirm_test() {
                var select = confirm("本当に削除してよろしいですか？");
                return select;
            }

        </script>

    </head>

    <body>

        <?php
            include ('header3.php');
        ?>

        <div class="toppage">

            <!-- ここにPHPを入れる -->
            

            <form method="post">
            
                <?php 
                    foreach($projects as $value){
                ?>


                <div class="index_8_title">
                    <p><?=$value['title'] ?></p>
                    <input type="hidden" name="" value="<?= $value['id'];?>">

                    <!-- 承認状況によって表示 翻訳者IDがある場合はメッセージ画面 ない場合は承認画面へ -->
                    <?php if(!empty($value['translator_user_id'])){?>
                    <button type="submit" onclick="multipleaction('/Players/index_9.php')" name="project_id" value="<?= $value['id'];?>">メッセージ画面</button>
                    <?php }elseif($user_id == $value['client_user_id']){?>
                    <button type="submit" onclick="multipleaction('/Players/permission_project.php')" name="permission_project" value="<?= $value['id'];?>">承認画面</button>
                    <?php } ?>

                    <!-- 権限によって表示(管理者or投稿者のみ) -->
                    <?php if($user_id == 1 or $user_id == $value['client_user_id']){?>
                        <button type="submit" onclick="multipleaction('/Players/index_12.php')" name="project_edit" value="<?= $value['id'];?>">編集</button>
                        <button type="submit" onclick="multipleaction('/Players/delete.php');return confirm_test()" name="project_id_delete" value="<?= $value['id'];?>">削除</button>
                    <?php }?>
                </div>

                
                <?php } ?>


                    <button type="button" class="index_8_button_mypage" onclick="multipleaction('/Players/index_13.php')">アカウント情報編集</button>

                    <div class="form_index_8">

                        <button type="button" onclick=history.back()>前の画面へ戻る</button>
                        <button type="button" onclick="multipleaction('/Players/index_14.php')">退会する</button>

                    </div>

            </form>

        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>

<?php 
$user_id_delete['flg'] = [];
?>