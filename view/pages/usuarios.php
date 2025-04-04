<?php

require_once __DIR__ . '/../../config/env.php';
require_once __DIR__ . '/../../model/ProdutoModel.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';

$usuarioModel = new UsuarioModel();
$usuarios = $usuarioModel->listar();
?>


<!-- <h1>Produtos</h1> -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>

    <link rel="stylesheet" href="/site-adm/view/assets/css/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>

<?php require_once __DIR__ . '/../components/navbar.php'; ?>

<?php require_once __DIR__ . '/../components/sidebar.php'; ?>

<main>
    <h1>Usuarios</h1>
    <table class="table">
        <!-- <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Preço</th>
        </thead> -->

        <?php foreach ($usuarios as $usuario) { ?>

            <tr class="produto">
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['nome'] ?></td>
                <td><?php echo $usuario['email'] ?></td>
                <td><?php echo $usuario['telefone'] ?></td>
                <td><?php echo $usuario['data_nascimento'] ?></td>
                <td><?php echo $usuario['cpf'] ?></td>
                <td>
                    <!-- METHODS - Get / Post -->
                    <form action="visualizar.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
                        <button>
                            <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'pages/usuario.php?id=' . $item['id'] ?>">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </a>
                        </button>
                    </form>

                    <form action="cadastro.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
                        <button>
                            <a href="">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </a>
                        </button>
                    </form>

                    <form action="excluir.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
                        <button onclick="return confirm('Tem certeza que deseja excluir o filme?')">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>

<?php require_once __DIR__ . '/../components/footer.php'; ?>