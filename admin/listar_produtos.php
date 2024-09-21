<?php
require_once "src/ProdutosDAO.php";
require_once "src/CategoriaDAO.php";
require_once "src/TemaDAO.php";
include "menu.php";
?>

<div class="container w-75">
  <h4 class="text-center py-4">Lista de Produtos</h4>
  <table class="table">
    <tr>
      <th>Título</th>
      <th>Valor</th>
      <th>Categoria</th>
      <th>Tema</th>
      <th>Remover/Editar</th>
    </tr>
  <?php
    $categoriaDAO = new CategoriaDAO();
    $temaDAO = new TemaDAO();
    $produtosDAO = new ProdutosDAO();
    $produtos = $produtosDAO->listarProdutos();
  
    foreach ($produtos as $produto) {
  ?>
    <tr>
      <td><?=$produto['titulo']?></td>
      <td><?=$produto['valor']?></td>
      <td><?=$categoriaDAO->getCategoria($produto['idcategoria'])?></td>
      <td><?=$temaDAO->getTema($produto['idtema'])?></td>
      <td>
        <a href="remover-produto.php?idproduto=<?=$produto['idproduto']?>" class="btn btn-danger">Remover</a>
        <a href="form-edicao.php?idproduto=<?=$produto['idproduto']?>" class="btn btn-success">Editar</a>
      </td>
    </tr>
  <?php
    }
  ?>
  </table>
</div>

<?php
  include "rodape.php";
?>