<?php
    require_once "ConexaoBD.php";

    class CompraDAO {
        public function cadastrarCompra($dados) {
            $conexaoBD = ConexaoBD::conectar();
            $idcliente = $dados['idcliente'];
            $valorTotal = $dados['total'];
            $dataCompra = date('Y-m-d');
            $prazoEntrega = date('Y-m-d', strtotime("+1 month", strtotime($dataCompra)));
            $frete = 10;

            $sql = "INSERT INTO COMPRAS (idcliente, valorTotal, dataCompra, prazoEntrega, frete) VALUE ('$idcliente', '$valorTotal', '$dataCompra', '$prazoEntrega', '$frete')";
            $conexaoBD->exec($sql);
        }
    }
?>