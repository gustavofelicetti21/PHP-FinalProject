<?php
require_once "ConexaoBD.php";

class CategoriaDAO {
    public function getCategorias(){
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from categorias";
        $resultado = $conexaoBD->query($sql);
        $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $categorias;
    }

    public function getCategoria($idcategoria) {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from categorias where idcategoria='$idcategoria'";
        $resultado = $conexaoBD->query($sql);
        $categoria = $resultado->fetch(PDO::FETCH_ASSOC);
        return $categoria['categoria'];
    }
}