<?php
require_once(ROOT_PATH . '/Models/Db.php');

class projects extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }


    public function projects_top6(){

        $sql = 'SELECT p.id, p.title, bl.before_name, al.after_name FROM projects as p ';
        $sql .= 'INNER JOIN after_languages as al on al.id = p.after_lang_id INNER JOIN ';
        $sql .= 'before_languages as bl on bl.id = p.before_lang_id ORDER BY id DESC LIMIT 6';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public function projects_search(){

        if($_POST['lang_word']){
            $_SESSION['lang_word'] = $_POST['lang_word'];
        }

        $sql = 'SELECT p.id, p.title, bl.before_name, al.after_name FROM projects as p ';
        $sql .= 'INNER JOIN before_languages as bl on bl.id = p.before_lang_id ';
        $sql .= 'INNER JOIN after_languages as al on al.id = p.after_lang_id WHERE bl.before_name ';
        $sql.= 'LIKE :keyword or al.after_name LIKE :keyword'; 
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':keyword', '%'.$_SESSION['lang_word'].'%');
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function projects_details(){

        if(!empty($_POST)){

            // ポスト情報定義
            $project_id = $_POST['project_id'];

            // projectsテーブル情報取得
            $sql = 'SELECT p.id, p.title, p.content, bl.before_name, al.after_name FROM projects as p ';
            $sql .= 'INNER JOIN after_languages as al on al.id = p.after_lang_id ';
            $sql .= 'INNER JOIN before_languages as bl on bl.id = p.before_lang_id WHERE p.id = :id';
            $sth = $this->dbh->prepare($sql);
            $params = [
                ':id' => $project_id
            ];
            $sth->execute($params);
            $result = $sth->fetchAll();

            return $result;
        }
    }

    public function projects_mypage(){

        $user_id = $_SESSION['flg'];

        // projectsテーブル情報取得
        if($user_id == 1){
            // 管理者権限全て表示
            $sql = 'SELECT * FROM projects';
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll();

            return $result;
        }else{
            // 依頼者or翻訳者によって表示
            $sql = 'SELECT * FROM projects WHERE client_user_id = :key_id or translator_user_id = :key_id';
            $sth = $this->dbh->prepare($sql);
            $sth->bindValue(':key_id', $user_id);
            $sth->execute();
            $result = $sth->fetchAll();
            
            return $result;
        }
    }

    public function projects_request_complete(){
        $project_title = $_POST['project_title'];
        $before_lang = $_POST['before_lang'];
        $after_lang = $_POST['after_lang'];
        $project_content = $_POST['project_content'];
        $client_user_id = $_SESSION['flg'];

        // 案件投稿INSERT情報取得
        $sql = 'INSERT INTO projects (id, title, content, client_user_id, translator_user_id, before_lang_id, after_lang_id, review_point, review_comment, request_datetime) ';
        $sql .= 'VALUES (default, :title, :content, :client_user_id, default, :before_lang_id, :after_lang_id, default, default, default)';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':title', $project_title);
        $sth->bindValue(':content', $project_content);
        $sth->bindValue(':client_user_id', $client_user_id);
        $sth->bindValue(':before_lang_id', $before_lang);
        $sth->bindValue(':after_lang_id', $after_lang);
        $sth->execute();

    }

    public function projects_delete(){

        $project_id = $_POST['project_id_delete'];

        $sql = 'DELETE FROM projects WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':id', $project_id);
        $sth->execute();

    }

    public function projects_edit(){

        $project_id = $_POST['project_edit'];

        // languagesテーブル情報取得
        $sql = 'SELECT p.id, p.title, p.content, bl.before_name, al.after_name FROM projects as p INNER JOIN after_languages as al on al.id = p.after_lang_id INNER JOIN before_languages as bl on bl.id = p.before_lang_id WHERE p.id = :id';
        $sth = $this->dbh->prepare($sql);
        $params = [
            ':id' => $project_id
        ];
        $sth->execute($params);
        $result = $sth->fetchAll();
        
        return $result;
    }

    public function projects_delete_complete(){

        $sql = 'UPDATE projects SET title = :title, content = :content, before_lang_id = :before_lang_id, after_lang_id = :after_lang_id WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':title', $_POST['project_title']);
        $sth->bindValue(':content', $_POST['project_content']);
        $sth->bindValue(':before_lang_id', $_POST['before_lang']);
        $sth->bindValue(':after_lang_id', $_POST['after_lang']);
        $sth->bindValue(':id', $_POST['project_id']);
        $sth->execute();
    }

    public function permission_project_complete(){

        $sql = 'UPDATE projects SET translator_user_id = :translator_user_id WHERE id = :id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':translator_user_id', $_POST['permission_user_id']);
        $sth->bindValue(':id', $_POST['permission_project_id']);
        $sth->execute();
    }
}