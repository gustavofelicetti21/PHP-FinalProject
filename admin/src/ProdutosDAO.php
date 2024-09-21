<?php
require_once "ConexaoBD.php";
require_once "funcoes.php";

class ProdutosDAO {
    public function cadastrarProduto() {
        $titulo = addslashes($_POST["titulo"]);
        $valor = $_POST["valor"];
        $descricao = addslashes($_POST["descricao"]);
        $categoria = $_POST["idcategoria"];
        $tema = $_POST["idtema"];
        $promocao = $_POST["promocao"];
        $imagem = pegarImagem($_FILES);

        $sql = "INSERT INTO PRODUTOS (TITULO, VALOR, DESCRICAO, IMAGEM, PROMOCAO, IDCATEGORIA, IDTEMA) VALUES ('$titulo', '$valor', '$descricao', '$imagem', '$promocao', '$categoria', '$tema')";

        $conexaoBD = ConexaoBD::conectar();
        $conexaoBD->exec($sql);
    }

    public function listarProdutos() {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from produtos";
        $resultado = $conexaoBD->query($sql);
        $produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $produtos;
    }

    public function removerProduto($idproduto){
        $conexaoBD = ConexaoBD::conectar();
        $sql = "delete from produtos where idproduto=$idproduto";
        $conexaoBD->exec($sql);
    }

    public function getProduto($idproduto) {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from produtos where idproduto=$idproduto";
        $resultado = $conexaoBD->query($sql);
        $produto = $resultado->fetch(PDO::FETCH_ASSOC);
        return $produto;
    }

    public function editarProduto($idproduto) {
        $titulo = addslashes($_POST["titulo"]);
        $valor = $_POST["valor"];
        $descricao = addslashes($_POST["descricao"]);
        $categoria = $_POST["idcategoria"];
        $tema = $_POST["idtema"];
        $promocao = $_POST["promocao"];
        if ($_FILES['imagem']['size']==0){
            $sqlImagem="";
        } else {
            $imagem = pegarImagem($_FILES);
            $sqlImagem="imagem= '{$imagem}',";
        }

        $conexaoBD = ConexaoBD::conectar();
        $sql = "update produtos set titulo='$titulo', valor='$valor', descricao='$descricao', {$sqlImagem} promocao='$promocao', idcategoria='$categoria', idtema='$tema' where idproduto=$idproduto";
        $conexaoBD->exec($sql);
    }

    public function listarPromocao() {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from produtos where promocao=1";
        $resultado = $conexaoBD->query($sql);
        $produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $produtos;
    }

    public function produtoCategoria($idcategoria) {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "SELECT * FROM geeksshopping.produtos where idcategoria=$idcategoria;";
        $resultado = $conexaoBD->query($sql);
        $produto = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $produto;
    }

    public function produtoTema($idtema) {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from produtos where idtema=$idtema";
        $resultado = $conexaoBD->query($sql);
        $produto = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $produto;
    }
}