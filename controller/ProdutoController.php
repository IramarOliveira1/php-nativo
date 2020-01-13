<?php

    include_once "../dao/ProdutoDAO.php";

class ProdutoController 
{
    private $dao;

    public function __construct() {
        $this->dao = new ProdutoDAO; 
    }

    public function createProduto()
    {
        $arrayCampos = array();
        $arrayValue = array();
        foreach ($_POST as $key => $value) {
            $arrayCampos[] = $key;
            $arrayValue[] = $value;
        }
        $arrayInStringCampos = implode(",", $arrayCampos);

        $arrayInStringValues = implode("','", $arrayValue);

        $result = $this->dao->createProdutoDAO($arrayInStringCampos,$arrayInStringValues);

        return $result;
    }

    public function retrieveDados()
    {
        $returnDados = $this->dao->retrieveDadosDAO();
        return $returnDados;
    }

    public function deleteItens($id)
    {
        $deleteUser = $this->dao->deleteItensDAO($id);
    }

    public function retornarDados($id)
    {
        $retorna = $this->dao->retornaDadosDAO($id);
        return $retorna;
    }
    
    public function updateItens($campos,$id)
    {   
        $sql = '';
        foreach ($campos as $key => $value) {
            $sql = $sql . $key ." = ". "'$value'" ." , ";
        }
        $str = substr_replace($sql, '', -3,-1);
        $updateDados = $this->dao->updateItensDAO($str,$id);
        return $updateDados;
    }

    public function retrieveCategory(){
        $result = $this->dao->retrieveCategoryDAO();
        return $result;   
    }

}

?>