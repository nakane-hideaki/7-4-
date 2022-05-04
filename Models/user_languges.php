<?php
require_once(ROOT_PATH . '/Models/Db.php');

class user_languges extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function user_lang_insert(){

        $sql = 'SELECT * FROM users ORDER BY id DESC LIMIT 1';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        // var_dump($result);

        if(isset($_POST['lang_1'])){
            $sql1 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth1 = $this->dbh->prepare($sql1);
            $sth1->bindValue(':user_id', $result[0]['id']);
            $sth1->bindValue(':lang_id', $_POST['lang_1']);
            $sth1->execute();
        }

        if(isset($_POST['lang_2'])){
            $sql2 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth2 = $this->dbh->prepare($sql2);
            $sth2->bindValue(':user_id', $result[0]['id']);
            $sth2->bindValue(':lang_id', $_POST['lang_2']);
            $sth2->execute();
        }

        if(isset($_POST['lang_3'])){
            $sql3 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth3 = $this->dbh->prepare($sql3);
            $sth3->bindValue(':user_id', $result[0]['id']);
            $sth3->bindValue(':lang_id', $_POST['lang_3']);
            $sth3->execute();
        }

        if(isset($_POST['lang_4'])){
            $sql4 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth4 = $this->dbh->prepare($sql4);
            $sth4->bindValue(':user_id', $result[0]['id']);
            $sth4->bindValue(':lang_id', $_POST['lang_4']);
            $sth4->execute();
        }
        
        if(isset($_POST['lang_5'])){
            $sql5 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth5 = $this->dbh->prepare($sql5);
            $sth5->bindValue(':user_id', $result[0]['id']);
            $sth5->bindValue(':lang_id', $_POST['lang_5']);
            $sth5->execute();
        }
        
        if(isset($_POST['lang_6'])){
            $sql6 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth6 = $this->dbh->prepare($sql6);
            $sth6->bindValue(':user_id', $result[0]['id']);
            $sth6->bindValue(':lang_id', $_POST['lang_6']);
            $sth6->execute();
        }
        
        if(isset($_POST['lang_7'])){
            $sql7 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth7 = $this->dbh->prepare($sql7);
            $sth7->bindValue(':user_id', $result[0]['id']);
            $sth7->bindValue(':lang_id', $_POST['lang_7']);
            $sth7->execute();
        }
        
        if(isset($_POST['lang_8'])){
            $sql8 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth8 = $this->dbh->prepare($sql8);
            $sth8->bindValue(':user_id', $result[0]['id']);
            $sth8->bindValue(':lang_id', $_POST['lang_8']);
            $sth8->execute();
        }
        
        if(isset($_POST['lang_9'])){
            $sql9 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth9 = $this->dbh->prepare($sql9);
            $sth9->bindValue(':user_id', $result[0]['id']);
            $sth9->bindValue(':lang_id', $_POST['lang_9']);
            $sth9->execute();
        }
        
        if(isset($_POST['lang_10'])){
            $sql10 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth10 = $this->dbh->prepare($sql10);
            $sth10->bindValue(':user_id', $result[0]['id']);
            $sth10->bindValue(':lang_id', $_POST['lang_10']);
            $sth10->execute();
        }
        
        if(isset($_POST['lang_11'])){
            $sql11 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth11 = $this->dbh->prepare($sql11);
            $sth11->bindValue(':user_id', $result[0]['id']);
            $sth11->bindValue(':lang_id', $_POST['lang_11']);
            $sth11->execute();
        }
        
        if(isset($_POST['lang_12'])){
            $sql12 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth12 = $this->dbh->prepare($sql12);
            $sth12->bindValue(':user_id', $result[0]['id']);
            $sth12->bindValue(':lang_id', $_POST['lang_12']);
            $sth12->execute();
        }
        
        if(isset($_POST['lang_13'])){
            $sql13 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth13 = $this->dbh->prepare($sql13);
            $sth13->bindValue(':user_id', $result[0]['id']);
            $sth13->bindValue(':lang_id', $_POST['lang_13']);
            $sth13->execute();
        }
        
        if(isset($_POST['lang_14'])){
            $sql14 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth14 = $this->dbh->prepare($sql14);
            $sth14->bindValue(':user_id', $result[0]['id']);
            $sth14->bindValue(':lang_id', $_POST['lang_14']);
            $sth14->execute();
        }
        
        if(isset($_POST['lang_15'])){
            $sql15 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth15 = $this->dbh->prepare($sql15);
            $sth15->bindValue(':user_id', $result[0]['id']);
            $sth15->bindValue(':lang_id', $_POST['lang_15']);
            $sth15->execute();
        }
        
        if(isset($_POST['lang_16'])){
            $sql16 = 'INSERT INTO user_languges (user_id, lang_id) VALUES (:user_id, :lang_id)';
            $sth16 = $this->dbh->prepare($sql16);
            $sth16->bindValue(':user_id', $result[0]['id']);
            $sth16->bindValue(':lang_id', $_POST['lang_16']);
            $sth16->execute();
        }
    }


}