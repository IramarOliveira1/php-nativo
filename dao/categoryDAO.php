<?php

require_once "../connection/connection.php";

class CategoryDAO { 

    private $connection;

    public function __construct() {

        $this->connection = Connection::getInstance();

    }

    public function createCategoryDAO($campo,$value)
    {
        $query = "INSERT INTO categoria ($campo) VALUES ('$value')";
        $save = $this->connection->exec($query);
        return $save;
    }

    public function retrieveDadosCategoryDAO(){
        $query = $this->connection->query("SELECT * FROM categoria");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteCategoryDAO($id){
        $query = "DELETE FROM categoria WHERE id = $id";
        $resultDelete = $this->connection->exec($query);
        return $resultDelete;
    }

    public function retrieveUpdateCategoryDAO($id){
        $query = $this->connection->query("SELECT * FROM categoria WHERE id = $id");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateCategoryDAO($campo, $id){
        $query = "UPDATE categoria SET $campo WHERE id = $id";
        $resultUpdate = $this->connection->exec($query);
        return $resultUpdate;
    }


}

?>