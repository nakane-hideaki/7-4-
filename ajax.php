<?php
session_start();

// DB接続
require_once (ROOT_PATH .'/Views/Players/db1.php');
$pdo = get_pdo();

if(isset($_FILES['image_id'])){
    // アップロードされたファイルをディレクトリ内に保存
    $file_ext = pathinfo($_FILES['image_id']['name']); //画像ファイルの拡張子取得　.pngなど
    $time = date("YmdHis"); //日付の形式指定
    $file_name = $time.$file_ext['filename'].".".$file_ext['extension']; //ファイル名を日付に変更
    $file_path = "img/".$file_name; //$file_path = 保存先の名前に変更
    $tmp_file = $_FILES['image_id']['tmp_name']; //一時的に保存されているパスを変数にする
    $result = move_uploaded_file($tmp_file, $file_path); //第一引数に移動前のパス　第二引数に移動先のパス move_uploaded_file = 保存メソッド

    // 添付したファイル名をデータベースに登録
    $sql3 = 'INSERT INTO project_talks (id, project_id, user_id, send_datetime, image) VALUES (default, :project_id, :user_id, now(), :image)';
    $sth3 = $pdo->prepare($sql3);
    $sth3->bindValue(':project_id', $_SESSION['project_id']);
    $sth3->bindValue(':user_id', $_SESSION['flg']);
    $sth3->bindValue(':image', $file_name);
    $sth3->execute();
    $talks2 = $sth3->fetchAll();
    // var_dump($file_ext);
    // // データベースに保存
    // $sql3 = 'INSERT INTO images (image_name, image_type, image_content, image_size, created_at, image_user_id, image_project_id) 
    // VALUES(:image_name, :image_type, :image_content, :image_size, now(), :image_user_id, :image_project_id)';
    // $sth3 = $pdo->prepare($sql3);
    // $sth3->bindValue(':image_name', $_FILES['image_id']['name']);
    // $sth3->bindValue(':image_type', $_FILES['image_id']['type']);
    // $sth3->bindValue(':image_content', $_FILES['image_id']['tmp_name']);
    // $sth3->bindValue(':image_size', $_FILES['image_id']['size']);
    // $sth3->bindValue(':image_user_id', $_SESSION['flg']);
    // $sth3->bindValue(':image_project_id', $_SESSION['project_id']);
    // $sth3->execute();
    // $image_upload = $sth3->fetchAll();
}

if(isset($_GET['no1'],$_GET['no2'],$_GET['no3'])){
    
    $sql = 'INSERT INTO project_talks(id, project_id, user_id, talk, send_datetime) VALUES (default, :project_id, :user_id, :talk, now())';
    $sth = $pdo->prepare($sql);
    $sth->bindValue(':project_id', $_GET['no2']);
    $sth->bindValue(':user_id', $_GET['no3']);
    $sth->bindValue(':talk', $_GET['no1']);
    $sth->execute();
    $talks = $sth->fetchAll();
    
}elseif($_FILES){

}else{
    echo '失敗';
}

$sql2  = 'SELECT * FROM project_talks WHERE project_id = :project_id';
$sth2 = $pdo->prepare($sql2);
$sth2->bindValue(':project_id', $_SESSION['project_id']);
$sth2->execute();
$talks_message = $sth2->fetchAll();

?>
<!-- ここからhtmlで表示 -->
<?php

    foreach($talks_message as $value){ 
        
        if($_SESSION['flg'] == $value['user_id']){

            if($value['image'] == null){
                $class_name = "my_id";
                echo '<div class="my_id">';
                echo $value['talk'];
                echo '</div>';
            }else{
                $class_name = "my_id";
                echo '<div class="my_id_image">';
                echo '<a href="/img/'.$value['image'].'" data-lightbox="group"><img src="/img/'.$value['image'].'" height="100px" width="100px"></a>';
                echo '</div>';
            }
        }

        if($_SESSION['flg'] != $value['user_id']){
            
            if($value['image'] == null){
                $class_name = "my_id";
                echo '<div class="you_id">';
                echo $value['talk'];
                echo '</div>';
            }else{
                $class_name = "my_id";
                echo '<div class="you_id_image">';
                echo '<a href="/img/'.$value['image'].'" data-lightbox="group"><img src="/img/'.$value['image'].'" height="100px" width="100px"></a>';
                echo '</div>';
            }
        }


    } 
?>
