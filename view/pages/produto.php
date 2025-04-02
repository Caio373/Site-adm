<?php
    require_once __DIR__ . '/../../config/env.php';
    require_once __DIR__ . '/../../model/ProdutoModel.php';
    require_once __DIR__ . '/../../model/CategoriaModel.php';

    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->listar();

    if (isset($_GET['id'])) {
        $modo = 'EDICAO';
        $artigoModel = new ProdutoModel();
        $produto = $artigoModel->buscarPorId($_GET['id']);
    } else {
        $modo = 'CRIACAO';
        $produto = [
            'nome' => '',
            'descricao' => '',
            'categoria' => '',
            'preco' => "",
        ];
    }
      

?>

<?php require_once __DIR__ . '/../components/head.php'; ?>

<body class="container-adm">
    <?php require_once __DIR__ . '/../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Produtos >> <?= $modo == 'EDICAO' ? 'Editar ' . $produto['id'] : 'Criar' ?></h3>

        <div class="container">
            <form class="form" method="POST" action="">
                <div class="form-content">
                    <input name="id" type="hidden" value="<?= $produto['id'] ?>">

                    <div class="input-group">
                        <label for="categoriaId">Categoria</label>
                        <select name="categoriaId" required>
                            <option value=""></option>
                            <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?= $categoria['id'] ?>"
                                <?= $produto['categoriaId'] == $categoria['id'] ? 'selected' : '' ?>>
                                <?= $categoria['nome'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="Nome">Nome</label>
                        <input name="Nome" type="text" value="<?= $produto['nome'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="Descricao">Descrição</label>
                        <textarea name="descricao" rows="30" required><?= $produto['descricao'] ?></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'pages/produtos.php' ?>">
                        <button class="btn" type="button">
                            Cancelar
                        </button>
                    </a>
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </main>

    <?php require_once __DIR__ . '/../components/footer.php'; ?>

    <script src="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_JS'] ?>main.js"></script>
</body>

</html>