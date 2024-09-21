<?php
    include "incs/header.php";
?>
<main class="container-md">
<div class="mt-36 d-block float-start w-100">
    <h3 class="mb-36 text-center cl-verde-escuro">Catálogo</h3>
</div>
<div class="text-center">

<div class="row">
<?php
    require_once "admin/src/ProdutosDAO.php";
    $produtosDAO = new ProdutosDAO();
    $produtos = $produtosDAO->listarProdutos();
  
    foreach ($produtos as $produto) {
?>
<div class="col">
    <div class="card mb-3" style="width: 18rem;">
        <img width="100%" src="data:image/png;base64,<?=base64_encode($produto['imagem'])?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title cl-cinza"><?=$produto['titulo']?></h5>
            <p class="card-text cl-cinza">R$<?=$produto['valor']?></p>
            <a href="produto.php?idproduto=<?=$produto['idproduto']?>" class="btn btn-primary">Comprar</a>
        </div>
    </div>
</div>
<?php
    }
?>
</div>
</main>
<?php
    include "incs/footer.php";
?>