<?php
    include "incs/header.php";
    require_once "./admin/src/ProdutosDAO.php";
    $produtosDAO = new ProdutosDAO();
    $produto = $produtosDAO->getProduto($_GET['idproduto']);

    require_once "./admin/src/CategoriaDAO.php";
    $categoriaDAO = new CategoriaDAO();
    $categoria = $categoriaDAO->getCategoria($produto['idcategoria']);

    require_once "./admin/src/TemaDAO.php";
    $temaDAO = new TemaDAO();
    $tema = $temaDAO->getTema($produto['idtema']);
?>
<main class="container-md">
    <section id="produto" class="mt-36">
        <h4 class="cl-verde-escuro"><?=$produto['titulo']?></h4>
        <div class="row d-flex imagens-lateral">
            <div class="col-md-6 text-center">
                <img src="data:image/png;base64,<?=base64_encode($produto['imagem'])?>" alt="" class="imagem-principal">
            </div>
            <div class="col-md-5">
                <h3 class="m-0 nborder fw-bold cl-cinza">R$<?=$produto['valor']?></h3>
                <p class="m-0 nborder cl-cinza">Vendido e entregue por Geek`s Shopping</p>
                <p class="mb-0 mt-3 nborder cl-cinza"><b>Categoria: </b><?=$categoria?></p>
                <p class="mb-5 mt-0 nborder cl-cinza"><b>Tema: </b><?=$tema?></p>
                <p class="cl-cinza fw-bold text-center mb-5">Pedidos em até 12x com muito juros</p>
                <a href="pagamento.html">
                    <button class="btn btn-danger w-100 mb-1">
                        Comprar
                    </button>
                </a>
                <form action="#" method="POST">
                    <input type="hidden" name="idproduto" value="<?=$produto['idproduto']?>">
                    <input type="hidden" name="acao" value="inserir">
                    <button typpe="submit" class="btn btn-outline-danger w-100 mb-5">
                        Adicionar ao Carrinho
                    </button>
                </form>
                <img src="img/compra-segura.png" alt="" class="w-100">
            </div>
        </div>
    </section>
    <section id="desc" class="text-center">
        <h4 class="cl-cinza mb-36 text-start">Descrição do Produto</h4>
        <p class="cl-cinza text-start m-0"><?=$produto['descricao']?></p>
    </section>
</main>
<?php
    include "incs/footer.php";
?>