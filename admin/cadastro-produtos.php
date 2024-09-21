<?php
require_once "src/ProdutosDAO.php";

$produtoDAO = new ProdutosDAO();
$produtoDAO->cadastrarProduto();

header("location:listar_produtos.php");