<?php
require_once "src/ProdutosDAO.php";

$produtoDAO = new ProdutosDAO();
$produtoDAO->editarProduto($_POST['idproduto']);
header("Location:listar_produtos.php");
?>