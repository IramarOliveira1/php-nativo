<?php
    require_once "nav.php";
    require_once "index.php";
    require_once "../controller/categoryController.php";

    $category = new CategoryController;

    $categoryResult = $category->retrieveDadosCategory();

?>

<div class="container">
    <a href="newCategory.php" class="btn btn-outline-dark mb-5">Cadastrar Categoria</a>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categoryResult as $value) { ?>
            <tr>
                <td><?php echo $value['id']?></td>
                <td><?php echo $value['nome']?></td>
                <td><a href="newCategory.php?update=<?php echo $value['id'] ?>" class="btn btn-outline-primary btn-sm">Atualizar</a></td>
                <td><a href="category.php?id=<?php echo $value['id'] ?>" class="btn btn-outline-danger btn-sm">Deletar</a></td>
            </tr>
           <?php  } ?> 
           <?php
                if (isset($_GET['id'])) {
                    $getId = $_GET['id'];
                    $category->deleteCategory($getId);
                    header("Location:category.php");
                }
           ?>
        </tbody>
    </table>
</div>