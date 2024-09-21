<?php
require_once "ConexaoBD.php";

class ClienteDAO {
    public function consultarClinete($email) {
        $conexaoBD = ConexaoBD::conectar();
        $sql = "SELECT * FROM clientes WHERE email='$email'";

        $resultado = $conexaoBD->query($sql);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
?>