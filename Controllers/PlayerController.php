<?php
require_once(ROOT_PATH .'/Models/users.php');
require_once(ROOT_PATH .'/Models/user_languges.php');
require_once(ROOT_PATH .'/Models/user_reviews.php');
require_once(ROOT_PATH .'/Models/languages.php');
require_once(ROOT_PATH .'/Models/after_languages.php');
require_once(ROOT_PATH .'/Models/before_languages.php');
require_once(ROOT_PATH .'/Models/projects.php');
require_once(ROOT_PATH .'/Models/project_talks.php');
require_once(ROOT_PATH .'/Models/permission_projects.php');
require_once(ROOT_PATH .'/Models/Db.php');

class PlayerController{
    private $request;  //リクエストパラメータ(GET,POST)
    private $users;  
    private $user_languges;  
    private $user_reviews;  
    private $languages;  
    private $after_languages;  
    private $before_languages;  
    private $projects;  
    private $permission_projects;  
    private $project_talks;
    private $Db; //DBモデル
    private $dbh; //DBモデル
    

    public function __construct(){
        // リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        //モデルオブジェクトの生成
        $this->users = new users();
        $this->user_languges = new user_languges();
        $this->user_reviews = new user_reviews();
        $this->languages = new languages();
        $this->after_languages = new after_languages();
        $this->before_languages = new before_languages();
        $this->projects = new projects();
        $this->project_talks = new project_talks();
        $this->permission_projects = new permission_projects();
        $this->Db = new Db();

        //別モデルと連携
        $this->dbh = $this->Db->get_db_handler();
        
    }

    // ログイン認証
    public function login(){
        if(isset($this->request['post'])){

        $login = $this->users->user_login();
        $params = [
            'login' => $login,
        ];
        return $params;
        }
    }

    // index_4最新案件6件表示
    public function projects_index4(){
        $project = $this->projects->projects_top6();
        return $project;
    }

    // index_5案件検索
    public function projects_index5(){
        $project = $this->projects->projects_search();
        return $project;
    }

    // index_6案件詳細
    public function projects_index6(){
        $project = $this->projects->projects_details();
        return $project;
    }

    // index_7案件応募完了
    public function projects_index7(){
        $project = $this->permission_projects->projects_application_complete($this->request['post']);
    }

    // index_8マイページ
    public function projects_index8(){
        $project = $this->projects->projects_mypage();
        return $project;
    }

    // index_9トーク画面
    public function projects_index9(){
        $talks_message_history = $this->project_talks->projects_talks();
        return $talks_message_history;
    }

    // index_11案件依頼
    public function projects_index11(){

        $after_lang = $this->after_languages->after_lang();
        $before_lang = $this->before_languages->before_lang();
        $params = [
            'after_lang' => $after_lang,
            'before_lang' => $before_lang,
        ];
        return $params;
    }

    // project_request_complete案件応募完了
    public function projects_request_complete(){
        $project_request = $this->projects->projects_request_complete($this->request['post']);
    }

    public function projects_talks_update_complete(){
        $project_talks_update = $this->project_talks->projects_talks_update($this->request['post']);
    }

    // signup_complete新規登録
    public function user_signup_complete(){
        $user_signup_complete = $this->users->user_signup($this->request['post']);
    }
    public function user_lang_complete(){
        $user_lang_complete = $this->user_languges->user_lang_insert($this->request['post']);
    }

    // projects_delete案件削除
    public function projects_delete(){
        $project_delete = $this->projects->projects_delete($this->request['post']);
    }

    //project_edit案件編集
    public function projects_edit(){
        $project_edit = $this->projects->projects_edit();
        return $project_edit;
    }
    
    // project_edit_complete編集完了
    public function projects_edit_complete(){
        $project_edit_complete = $this->projects->projects_delete_complete($this->request['post']);
    }

    //permission_project案件承認
    public function permission_project(){
        $permission_project = $this->permission_projects->permission_projects();
        return $permission_project;
    }

    // permission_complete編集完了
    public function permission_complete(){
        $permission_complete = $this->projects->permission_project_complete($this->request['post']);
    }











    // リセット画面でのメールアドレス認証
    public function password_reset_send(){
        if(isset($this->request['post']['email']) && isset($this->request['post']['password'])){
            $email = $_POST['email'];

            $sql = 'SELECT * FROM users WHERE email = :email';
            $sth = $this->dbh->prepare($sql);
            $sth->bindParam(':email', $email);
            $sth->execute();
            $result = $sth->fetch();
            
            $params = [
            'login' => $result,
            ];
            return $params;
        }
    }

}