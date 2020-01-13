<?php

require_once "../dao/categoryDAO.php";

class CategoryController 
{
    
    private $dao;

    public function __construct() {
        $this->dao = new CategoryDAO;
    }

    public function createCategory(){
        $arrayCampo = array();
        $arrayValue = array();
        foreach ($_POST as $key => $value) {
            $arrayCampo[] = $key;
            $arrayValue[] = $value;
        }
        $arrayCampoInString = implode("''",$arrayCampo);
        $arrayValueInString = implode("",$arrayValue);
        $resultSave = $this->dao->createCategoryDAO($arrayCampoInString,$arrayValueInString);        
    }

    public function retrieveDadosCategory(){
        $returnCategory = $this->dao->retrieveDadosCategoryDAO();
        return $returnCategory;
    }

    public function deleteCategory($id){
        $deleteCategory = $this->dao->deleteCategoryDAO($id);
        return $deleteCategory;
    }

    public function retrieveUpdateCategory($id){
        $retrieveUpdateCategory = $this->dao->retrieveUpdateCategoryDAO($id);
        return $retrieveUpdateCategory;
    }

    public function updateCategory($campos, $id){
        $sql = '';
        foreach ($campos as $key => $value) {
            $sql = $sql . $key ." = ". "'$value'" ." , ";
        }
        $str = substr_replace($sql, '', -3,-1);
        $updateDados = $this->dao->updateCategoryDAO($str,$id);
        return $updateDados;
    }



}

?>