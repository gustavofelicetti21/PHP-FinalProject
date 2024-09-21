<?php
    include "incs/header.php";
    require_once "./admin/src/ProdutosDAO.php";
?>
<main>
    <section id="banner" class="mb-36">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/banner-black-friday.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/frete-gratis-banner.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section id="categorias" class="pb-36">
        <div class="container-md p-0">
            <div class="row auto-slider text-center">
                <?php
                    require_once "./admin/src/TemaDAO.php";
                    require_once "./admin/src/CategoriaDAO.php";

                    $categoriaDAO = new CategoriaDAO();
                    $categorias = $categoriaDAO->getCategorias();

                    $temaDAO = new TemaDAO();
                    $temas = $temaDAO->getTemas();

                    foreach ($categorias as $categoria) {
                ?>
                    <div class="col-2">
                        <a href="categorias.php?idcategoria=<?=$categoria['idcategoria']?>">
                            <img src="data:image/png;base64,<?=base64_encode($categoria['imagem'])?>" alt="" class="ms-3">
                        </a>
                        <p class="m-0">
                            <a href="categorias.php?idcategoria=<?=$categoria['idcategoria']?>" class="text-decoration-none cl-cinza"><?=$categoria['categoria']?></a>
                        </p>
                    </div>
                <?php
                    }
                    foreach ($temas as $tema) {
                ?>
                    <div class="col-2">
                        <a href="temas.php?idcategoria=<?=$tema['idtema']?>">
                            <img src="data:image/png;base64,<?=base64_encode($tema['imagem'])?>" alt="" class="ms-3">
                        </a>
                        <p class="m-0">
                            <a href="temas.php?idcategoria=<?=$categoria['idcategoria']?>" class="text-decoration-none cl-cinza"><?=$tema['tema']?></a>
                        </p>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <section id="mais-vendidos" class="mb-36">
        <div class="container-md d-block">
            <p class="cl-cinza tw-bold" id="vendido">Mais Vendidos</p>
            <div class="row js-slider slider">
                <?php
                    $produtosDAO = new ProdutosDAO();
                    $produtos = $produtosDAO->listarProdutos();
                  
                    foreach ($produtos as $produto) {
                ?>
                    <div class="col">
                        <div class="card text-center" style="width: 18rem;">
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
        </div>
    </section>
    <section id="banner-2" class="mb-36">
        <div class="container-md">
            <img src="img/lancamento-harry-potter.png" alt="" class="w-100">
        </div>
    </section>
    <section id="mais-vendidos" class="mb-36">
        <div class="container-md">
            <p class="cl-cinza" id="vendido">Produtos em Destaque</p>
            <div class="container-md text-center">
                <div class="row js-slider slider">
                    <?php
                        $produtosDAO = new ProdutosDAO();
                        $produtos = $produtosDAO->listarProdutos();
                    
                        foreach ($produtos as $produto) {
                    ?>
                        <div class="col">
                            <div class="card text-center" style="width: 18rem;">
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
            </div>
        </div>
    </section>
    <section id="hot" class="">
        <div class="container-md w-100 fundo">
            <h3 class="mb-36">HOT🔥</h3>
            <div class="row js-slider slider">
                    <?php
                        $produtosDAO = new ProdutosDAO();
                        $produtos = $produtosDAO->listarPromocao();
                    
                        foreach ($produtos as $produto) {
                    ?>
                        <div class="col">
                            <div class="card text-center" style="width: 18rem;">
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
        </div>
    </section>
</main>
<?php
    include "incs/footer.php";
?>