<?php
require_once "ConexaoBD.php";

class TemaDAO {
    public function getTemas(){
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from tema";
        $resultado = $conexaoBD->query($sql);
        $temas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $temas;
    }

    public function getTema($idtema) {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "select * from tema where idtema='$idtema'";
        $resultado = $conexaoBD->query($sql);
        $tema = $resultado->fetch(PDO::FETCH_ASSOC);
        return $tema['tema'];
    }
}