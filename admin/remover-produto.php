<?php
require_once "src/ProdutosDAO.php";

$produtoDAO = new ProdutosDAO();
$produtoDAO->removerProduto($_GET['idproduto']);
header("Location:listar_produtos.php");
?>