<?php  
    require_once "../controller/ProdutoController.php";
    require_once "nav.php" ;
    require_once "index.php";
    
    $returnDados = new ProdutoController();    
    $dadosCategory = $returnDados->retrieveCategory();

    if (isset($_GET['update'])) {
        $getUrl = $_GET['update'];
        $updateDados =  $returnDados->retornarDados($getUrl);
    }

    if (isset($_POST['nome'])) {
        if (isset($_GET['update'])) {
            $updateDados = $_POST;
            $returnDados->updateItens($updateDados,$getUrl);
            header("Location: product.php");
        }else {
            $returnDados->createProduto();
            header("Location: product.php");
        }
    }
?>
<div class="container">
    <form action="" method="POST">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?php if(isset($updateDados)){echo $updateDados['nome'];}?>" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" class="form-control" name="preco" id="preco" value="<?php if(isset($updateDados)){echo $updateDados['preco'];}?>" required>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php if(isset($updateDados)){ echo $updateDados['quantidade'];}?>" required>
        </div>
        <div class="form-group">
            <select name="categoria_id" class="form-control" id="categoria_id" required>
                <option value="">SELECIONE</option>
                <?php  
                    foreach ($dadosCategory as $value) {
                        $selected = $value['id'] == $updateDados['categoria_id'] ? 'selected' : '';
                        echo '<option value="'.$value["id"].'" '.$selected.'>' .$value['nome'].'</option>';
                    }
                ?>
            </select>
        </div>
        <input type="submit" class="btn btn-outline-primary" value="<?php if(isset($updateDados)){ echo 'Atualizar'; }else{ echo 'Cadastrar';}  ?>"> 
    </form>
</div>