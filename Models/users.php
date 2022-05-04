<?php
require_once(ROOT_PATH . '/Models/Db.php');

class users extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }


    public function user_login(){

        if(!empty($_POST)){
            $email = $_POST['email'];
            $password = $_POST['password'];
        

            $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
            $sth = $this->dbh->prepare($sql);
            $sth->bindParam(':email', $email);
            $sth->bindParam(':password', $password);
            $sth->execute();
            $result = $sth->fetch();
            
            return $result;

        }
    }

    public function user_signup(){

        $sql_user_signup = 'INSERT INTO users(id, name, email, password, user_type, password_reset_token) VALUES (default, :name, :email, :password, 0, null)';
        $sth_user_signup = $this->dbh->prepare($sql_user_signup);
        $sth_user_signup->bindValue(':name', $_POST['name']);
        $sth_user_signup->bindValue(':email', $_POST['email']);
        $sth_user_signup->bindValue(':password', $_POST['password']);
        $sth_user_signup->execute();
    }


}
