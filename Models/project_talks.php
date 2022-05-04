<?php
require_once(ROOT_PATH . '/Models/Db.php');

class project_talks extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function projects_talks(){

        $project_id = $_SESSION['project_id'];

        $sql = 'SELECT * FROM project_talks WHERE project_id = :project_id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':project_id', $project_id);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public function projects_talks_update(){

        $sql2 =  'SELECT id FROM projects ORDER BY id DESC LIMIT 1'; 
        $sth2 = $this->dbh->prepare($sql2);
        $sth2->execute();
        $project_id = $sth2->fetchAll();


        $project_id_int = intval($project_id['0']['id']);

        $sql3 = 'INSERT INTO project_talks(id, project_id, user_id, talk, send_datetime) VALUES (default,:project_id,default,default,default)';
        $sth3 = $this->dbh->prepare($sql3);
        $sth3->bindValue(':project_id', $project_id_int);
        $sth3->execute();
    }

}