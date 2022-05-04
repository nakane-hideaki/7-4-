<?php
session_start();

if(isset($_POST['project_id'])){

    $_SESSION['project_id'] = $_POST['project_id'];
    
}

$project_id = $_SESSION['project_id'];
$user_id = $_SESSION['flg'];

require_once(ROOT_PATH . "Controllers/PlayerController.php");

$project_talks = new PlayerController();
$talks_message_history = $project_talks->projects_index9();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メッセージ画面</title>
        <link rel="stylesheet" type="text/css" href="/css/base.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
        <script src="/js/jscheck.js"></script>
    </head>

    <!-- コメント -->
    <script>
        $(function(){
            $('#message_send').click(function(){

                $.ajax({

                    url: '/Players/ajax.php',
                    type: 'GET',
                    dataType: 'text',
                    data: {
                        no1: $('#message_box').val(),
                        no2: $('#project_id_flg').val(),
                        no3: $('#user_id_flg').val(),
                    }

                }).done(function(data){

                    /* 通信成功時 */
                    $('.index_9').html(data); //取得したHTMLを<div class="index_9内部に反映">
                    $('#new_message').append('<p>'+data.id+' : '+data.school+' : '+data.skill+'</p>');
                    $('#message_box').val('');
                    
                }).fail(function(data){

                    /* 通信失敗時 */
                    alert('通信失敗！');
                            
                });

            });
        });
    </script>


    <!-- 画像 -->
    <script>
        $(function(){
            $('#image_submit').click(function(){

                var fd = new FormData();
                var fd = new FormData($('#image_send').get(0));
                console.log('test'); 

                $.ajax({

                    url: '/Players/ajax.php',
                    type: 'POST',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'html',

                }).done(function(data){

                    /* 通信成功時 */
                    $('.index_9').html(data); //取得したHTMLを<div class="index_9内部に反映">
                    $('#new_message').append('<p>'+data.id+' : '+data.school+' : '+data.skill+'</p>');
                    $('#image_id_flg').val('');
                    alert('ファイルをアップロードしました。');
                    
                }).fail(function(data){

                    /* 通信失敗時 */
                    alert('通信失敗！');
                            
                });

            });
        });
    </script>



    <body>

        <?php
            include ('header2.php');
        ?>

        <div class="index_9">

            <?php

                foreach($talks_message_history as $value){ 
                    
                    if($user_id == $value['user_id']){

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

                    if($user_id != $value['user_id']){

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


            <div id="new_message">

            </div>

        </div>

        <div class="index_9_message">

            <form action="" method="post" class="">

            <div class="message_box">
                <textarea name="message" placeholder="ここにメッセージを入力" id="message_box" wrap="hard"></textarea>
                <input type="button" name="message_send" id="message_send" class="back" value="送信">

            </div>   
                
                <div class="index_9_input">

                    <input type="hidden" name="" id="project_id_flg" value="<?= $project_id?>">
                    <input type="hidden" name="" id="user_id_flg" value="<?= $user_id?>">
                    
                </div>
                
            </form>
            
            <!-- 写真 -->
            <form action="" method="post" id="image_send" class="image_send_form" enctype="multipart/form-data">
                <label>画像を選択</label>
                <input type="file" name="image_id" id="image_id_flg">
                
                <input type="button" class="image_send_box" name="image_send" id="image_submit" value="送信"></button>
            </form>

            <input type="button" onclick=history.back() class="back" name="" value="前の画面へ戻る">

        </div>

        <?php
            include ('fooder.php');
        ?>

    </body>
</html>