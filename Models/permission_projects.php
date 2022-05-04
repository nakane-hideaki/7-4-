<?php
require_once(ROOT_PATH . '/Models/Db.php');

class permission_projects extends Db{
    public function __construct($dbh = null){
        parent::__construct($dbh);
    }

    public function projects_application_complete(){

        $sql = 'INSERT INTO permission_projects (permission_project_id, permission_user_id) VALUES (:project_id, :user_id)';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':project_id', $_POST['project_id']);
        $sth->bindValue(':user_id', $_POST['user_id']);
        $sth->execute();

    }

    public function permission_projects(){

        $sql = 'SELECT * FROM permission_projects as pp INNER JOIN projects as p on pp.permission_project_id = p.id INNER JOIN users as u on u.id = pp.permission_user_id WHERE pp.permission_project_id = :project_id';
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':project_id', $_POST['permission_project']);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }
}