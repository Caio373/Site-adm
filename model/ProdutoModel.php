<?php 

require_once __DIR__ . '/CategoriaModel.php';

class ProdutoModel {
    private $categoriaModel;
    private $tabela = "produto";
    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar(){
        $query = "SELECT * FROM $this->tabela;";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId($id){
        foreach ($this->produtos as $produto) {
            if ($id == $produto['id']) {
                return $produto;
            }
        } 
        return NULL;
    }

    private function popularProdutosComCategoria($produtos) {
        $categorias = $this->categoriaModel->categorias;
        $produtosPopulados = [];

        foreach ($this->categoriaModel->categorias as $categoria) {
            foreach ($produtos as $produto) {
                if ($categoria['id'] == $produto['categoriaId']) {
                    $produto['categoria'] = $categoria;
                    array_push($produtosPopulados, $produto);
                }
            }
        }
        return $produtosPopulados;
    }

}