<?php
    require_once __DIR__ . '/../../config/env.php';
    require_once __DIR__ . '/../../model/ProdutoModel.php';
    require_once __DIR__ . '/../../model/CategoriaModel.php';

    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->listar();      

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>

    <link rel="stylesheet" href="/site-adm/view/assets/css/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <?php require_once __DIR__ . '/../components/navbar.php'; ?>

    <?php require_once __DIR__ . '/../components/sidebar.php'; ?>


    <main>


        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria) { ?>
                    <tr>
                        <td><?php echo $categoria['id'] ?></td>
                        <td><?php echo $categoria['nome'] ?></td>
                        <td><?php echo $categoria['descricao'] ?></td>
                        <td>
                            <!-- METHODS - Get / Post -->
                
                            <form action="categoria.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $categoria['id'] ?>">
                                <button>
                                    <a href="">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                    </a>
                                </button>
                            </form>

                            <form action="categoria_excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $categoria['id'] ?>">
                                <button onclick="return confirm('Tem certeza que deseja excluir o filme?')">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>

</body>

</html>