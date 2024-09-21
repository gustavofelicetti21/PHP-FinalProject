<?php
    session_start();

    $idproduto = $_REQUEST['idproduto']??null;
    $carrinho = $_SESSION['carrinho']??[];
    $acao = $_REQUEST['acao']??null;

 
    if($acao == "remover") {
        unset($carrinho[$idproduto]);
    } else if($idproduto != null && $acao=="inserir") {
        $existe = false;
        foreach ($carrinho as $i => $item) {
            if($item['idproduto'] == $idproduto) {
                $item['quantidade'] += 1;
                $carrinho[$i] = $item;
                $existe = true;
            }

        }
        if($existe == false) {
            $item['idproduto'] = $idproduto;
            $item['quantidade'] = 1;
            $carrinho[] = $item;
        }
    }

    $_SESSION['carrinho'] = $carrinho;
?>
<!DOCTYPE html />
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <title>Bootstrap</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <script src="./js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js" integrity="sha512-fDGBclS3HUysEBIKooKWFDEWWORoA20n60OwY7OSYgxGEew9s7NgDaPkj7gqQcVXnASPvZAiFW8DiytstdlGtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="./script/script.js"></script>
</head>

<body>
<section id="pre-header" class="w-100 bg-bege">

<p class="cl-verde-escuro m-0 text-center">
    <img src="./img/localizacao.png" alt="">
    Frete Grátis Para Todo o País
</p>
</section>
<header class="bg-verde-escuro py-36">
<div class="container-md d-flex justify-content-between">
    <div class="col-md-2">
        <a class="navbar-brand" href="./index.php">
            <img src="./img/logo2.png" alt="">
        </a>
    </div>
    <div class="col-md-8">
        <nav class="navbar p-0 w-100">
            <div class="container">
                <form class="d-flex m-0 w-100" role="search">
                    <input class="form-control me-2 input" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <img src="img/lupa.png" alt="">
                    </button>
                </form>
            </div>
        </nav>
    </div>
    <div class="acessorios d-flex justify-content-end col-md-2">
        <div>
            <a href="" class="d-flex" id="end">
                <img src="img/caminhao.png" alt="" class="mr-16">
            </a>
        </div>
        <div>
            <buttontype="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight" class="d-flex">
                <img src="img/carrinho.png" alt="" class="mr-16">
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Carrinho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                    </button>
                </div>
                <div class="offcanvas-body text-center">
                    <?php
                        require_once "./admin/src/ProdutosDAO.php";
                        $produtosDAO = new ProdutosDAO();
                        $total = 0;
                        foreach($carrinho as $i => $item) {
                            $p = $produtosDAO->getProduto($item['idproduto']);
                    ?>
                        <div class="produto-cesta w-100 text-start mb-1">
                            <div class="imagem-cesta text-center me-1">
                                <img src="data:image/png;base64,<?=base64_encode($p['imagem'])?>" alt="" id="cestinha">
                            </div>
                            <div class="row">
                                <p class="cl-cinza fw-bold m-0 col-12"><?=$p['titulo']?></p>
                                <p class="cl-cinza float-start col-6 m-0">R$ <?=$p['valor']?></p>
                                <div class="cl-cinza col-6">
                                    <p class="float-end m-0 p-0">
                                        <?=$item['quantidade']?>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="mt-1 d-block float-start">
                                        <a href="?acao=remover&idproduto=<?=$i?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#b3001b" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    </p>
                                    <?php
                                        $subtotal = $item['quantidade'] * $p['valor'];
                                        $total += $subtotal;
                                        $_SESSION['total'] = $total;
                                    ?>
                                    <p class="d-block float-end">
                                        R$ <?=number_format($subtotal, 2, ',', '.')?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="align-self-end">
                        <div class="botao-compra">
                            <p class="fw-bold float-end m-0">
                                <?=number_format($total, 2, ',', '.')?>
                            </p>
                            <a href="pagamento.php?idcliente" class="btn btn-danger w-100 mb-2">
                                Comprar
                            </a>
                        </div>
                    </div>
                    <script>
                        if(window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>
                </div>
            </div>
        </div>
        <div>
        <a href="./login.php">
            <img src="img/login.png" alt="">
        </a>
        </div>
    </div>
</div>
</header>
<section id="navbar-header" class="bg-verde-escuro pt-3">
<div class="container-md d-flex justify-content-center">
    <div class="">
        <a href="">
            <img src="img/cardapio.png" alt="">
        </a>
    </div>
    <div class="mr-36">
        <a href="./index.php" class="cl-br text-decoration-none d-flex">Início</a>
    </div>
    <div class="mr-36">
        <a href="./catalogo.php" class="cl-br text-decoration-none">Catálogo</a>
    </div>
    <div class="">
        <a href="./contato.php" class="cl-br text-decoration-none">Entrar em contato</a>
    </div>
</div>
</section>