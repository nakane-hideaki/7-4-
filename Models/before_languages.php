<?php
require_once(ROOT_PATH . '/Models/Db.php');

class before_languages extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function before_lang(){

        $sql = 'SELECT * FROM before_languages ORDER BY id ASC';
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }
}