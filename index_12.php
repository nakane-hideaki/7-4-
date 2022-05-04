<?php
session_start();

$project_id = $_POST['project_edit'];

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project_edit = new PlayerController();
$params = $project_edit->projects_index11();
$projects3 = $project_edit->projects_edit();



// // languagesテーブル情報取得
// $sql = 'SELECT p.id, p.title, p.content, bl.before_name, al.after_name FROM projects as p INNER JOIN after_languages as al on al.id = p.after_lang_id INNER JOIN before_languages as bl on bl.id = p.before_lang_id WHERE p.id = :id';
// $sth = $pdo->prepare($sql);
// $params = [
//     ':id' => $project_id
// ];
// $sth->execute($params);
// $projects3 = $sth->fetchAll();

// // 翻訳前言語選択
// $sql = 'SELECT * FROM before_languages ORDER BY id ASC';
// $sth = $pdo->prepare($sql);
// $sth->execute();
// $projects = $sth->fetchAll();

// $sql2 = 'SELECT * FROM after_languages ORDER BY id ASC';
// $sth2 = $pdo->prepare($sql2);
// $sth2->execute();
// $projects2 = $sth2->fetchAll();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>案件依頼編集ページ</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <body>

        <?php
            include ('header2.php');
        ?>

        <form action="project_edit_complete.php" method="post" class="index_11_form">
            <input type="hidden" name="project_id" value="<?= $project_id; ?>">

            <p>
                <label>案件タイトル編集</label>
                <input type="text" class="index_11_title_input" name="project_title" placeholder="ここに入力" value="<?= $projects3['0']['title']?>">
            </p>

            <p>
                <label>翻訳種類編集</label>

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

            <p>依頼内容詳細編集</p>

                <textarea name="project_content" class="" wrap="hard"><?= $projects3['0']['content']?></textarea>

            <div class="index_11_input">
                <input type="button" onclick=history.back() class="back" name="" value="前の画面へ戻る">
                <input type="submit" name="" class="back" value="編集する">
            </div>

        </form>
      
        <?php
            include ('fooder.php');
        ?>

    </body>
</html>