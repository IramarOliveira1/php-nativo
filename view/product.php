<?php
    require_once "../controller/ProdutoController.php";
    require_once "nav.php";
    require_once "index.php";

    $returnDados = new ProdutoController(); 
    $valores = $returnDados->retrieveDados();

?>
 <div class="container">
    <a href="newProduct.php" class="btn btn-outline-info mb-5">Cadastrar Novo Produto</a>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($valores as $value){ ?>
                <tr>
                    <td> <?php echo $value["id"]; ?> </td>
                    <td> <?php echo $value["nome"]; ?> </td>
                    <td> <?php echo $value["preco"]; ?> </td>
                    <td> <?php echo $value["quantidade"]; ?> </td>
                    <td> <?php echo $value["categoriaNome"]?> </td>
                    <td> <a class="btn btn-sm btn-outline-primary" href="newProduct.php?update=<?php echo $value['id'] ?>">Atualizar</a> </td>
                    <td> <a class="btn btn-sm btn-outline-danger" href="product.php?id=<?php echo $value['id'] ?>">Deletar</a></td>
                </tr>
            <?php } ?>
            <?php 
                if (isset($_GET['id'])) {
                    $getUrl = $_GET['id'];
                    $returnDados->deleteItens($getUrl);
                    header("Location: product.php");
                }
            ?>
        </tbody>
    </table>
</div>

    