<?php
session_start();

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project_request = new PlayerController();
$params = $project_request->projects_index11();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件依頼ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <script>

        function confirm_test() {
            var select = confirm("案件投稿してよろしいですか？");
            return select;
        }

    </script>

    <body>

        <?php
            include ('header2.php');
        ?>

        <form action="project_request_complete.php" method="post" class="index_11_form">

            <p>
                <label>案件タイトル入力</label>
                <input type="text" class="index_11_title_input" name="project_title" placeholder="ここに入力">
            </p>

            <p>
                <label>翻訳種類入力</label>

                <select name="before_lang">
                    
                    <?php 
                        foreach($params['before_lang'] as $value){
                    ?>

                    <option value="<?= $value['id']?>"><?= $value['before_name']?></option>

                    <?php }?>

                </select>

                <label>➡︎</label>

                <select name="after_lang">
                    
                    <?php 
                        foreach($params['after_lang'] as $value){
                    ?>

                    <option value="<?= $value['id']?>"><?= $value['after_name']?></option>

                    <?php }?>

                </select>

            </p>

            <p>依頼内容詳細</p>

                <textarea name="project_content" class="" wrap="hard"></textarea>

            <div class="index_11_input">
                <input type="button" onclick=history.back() class="back" name="" value="前の画面へ戻る">
                <input type="submit" name="" class="back" onclick="return confirm_test()" value="投稿する">
            </div>

        </form>
      
        <?php
            include ('fooder.php');
        ?>

    </body>
</html>