<?php

require_once "../connection/connection.php";

class ProdutoDAO 
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    public function createProdutoDAO($campos, $valores)
    {
        $query = "INSERT INTO produto ($campos) VALUES ('$valores')";
        $save = $this->connection->exec($query);
        return $save;
    }

    public function retrieveDadosDAO()
    {    
        $query = $this->connection->query("SELECT produto.id,produto.nome,produto.preco,produto.quantidade,
         c.nome AS categoriaNome FROM produto INNER JOIN categoria AS c ON c.id = produto.categoria_id");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteItensDAO($id)
    {
        $query = "DELETE FROM produto WHERE id = $id ";
        $delete = $this->connection->exec($query);
        return $delete;
    }

    public function retornaDadosDAO($id)
    {
        $query = $this->connection->query("SELECT * FROM produto  WHERE id = $id");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateItensDAO($campos,$id)
    {
        $query = "UPDATE produto SET $campos WHERE id = $id";
        $save = $this->connection->exec($query);
        return $save ;
    }

    public function retrieveCategoryDAO(){
        $query = $this->connection->query("SELECT * FROM categoria");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;   
    }

}

?>