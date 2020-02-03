<?php
    require_once "nav.php";
    require_once "index.php";
    require_once "../controller/categoryController.php";

    $category = new CategoryController;

    if (isset($_GET['update'])) {
        $getId = $_GET['update'];
        $returnCategory = $category->retrieveUpdateCategory($getId);
    }

    if (isset($_POST['nome'])) {
        if ($_GET['update']) {
            $saveUpdate = $_POST;
            $category->updateCategory($saveUpdate,$getId);
            header("Location:category.php");
        }else {
            $category->createCategory();
            header("Location:category.php");
        }
        
    }

       
?>

    <div class="container">
        <form  method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php if(isset($returnCategory)){echo $returnCategory['nome'];}?>" required>
            </div>
            <input type="submit" class="btn btn-outline-success" value="<?php if(isset($returnCategory)){echo"Atualizar"; }else{echo"Cadastar"; }?>">
        </form>
    </div>