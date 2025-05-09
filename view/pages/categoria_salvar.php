<?php

require_once __DIR__ . '/../../config/env.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $categoriaModel = new CategoriaModel();

    if (empty($_POST['id'])) {
        $salvou = $categoriaModel->criar($_POST['nome']);
    } else {
        $salvou = $categoriaModel->editar([
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao']
        ]);
    }

    if ($salvou) {
        header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'categorias.php');    
    } else {
        echo "ERRO";
    }

} else {
    header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'categorias.php');
}