<?php
require_once(ROOT_PATH . '/Models/Db.php');

class after_languages extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function after_lang(){

        $sql = 'SELECT * FROM after_languages ORDER BY id ASC';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }


}