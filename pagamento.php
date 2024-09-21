<?php
    include "incs/header.php";
    require_once "admin/src/ClienteDAO.php";

    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->consultarClinete("aaaaaaa@hotmail.com.br");
    $_SESSION['idcliente'] = $cliente['idcliente'];
?>
<main class="container-md">
    <section class="mt-36" id="pag">
        <div class="d-flex justify-content-between">
            <div class="col-md-7 mb-36">
                <img src="img/logo.png" alt="" id="logo">
                <p class="cl-cinza mb-0 fw-bold titulo">Informações Pessoais</p>
                <p class="cl-cinza">Para quem devemos entregar o pedido?</p>
                <form class="row m-auto">
                    <div class="form-floating col-md-12">
                        <p class="cl-cinza">E-mail:
                            <span class="fw-bold"><?=$cliente['email']?></span>
                        </p>
                    </div>
                    <div class="form-floating col-md-12">
                        <p class="cl-cinza">Nome:
                            <span class="fw-bold"><?=$cliente['nome']?></span>
                        </p>
                    </div>
                    <div class="form-floating col-md-12">
                        <p class="cl-cinza">CPF:
                            <span class="fw-bold"><?=$cliente['cpf']?></span>
                        </p>
                    </div>
                </form>
                <p class="cl-cinza mb-0 fw-bold titulo">Informações de Entrega</p>
                <p class="cl-cinza">Para onde devemos entregar o pedido?</p>
                <form class="row m-auto">
                    <div class="form-floating col-md-6">
                        <p class="cl-cinza">Cidade:
                            <span class="fw-bold"><?=$cliente['cidade']?></span>
                        </p>
                    </div>
                    <div class="form-floating col-md-6">
                        <p class="cl-cinza">Estado:
                            <span class="fw-bold"><?=$cliente['estado']?></span>
                        </p>
                    </div>
                    <div class="form-floating col-md-9">
                        <p class="cl-cinza">Endereço:
                            <span class="fw-bold"><?=$cliente['endereco']?></span>
                        </p>
                    </div>
                </form>
                <p class="cl-cinza mb-0 fw-bold titulo">Método de Pagamento</p>
                <p class="cl-cinza">Escolha seu método de pagamento abaixo</p>
                <form class="row m-auto border border-light-subtle">
                    <div class="form-check ml-8 mt-8">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="creditoID">
                        <label class="form-check-label" for="creditoID">
                            Cartão de Crédito
                        </label>
                    </div>
                    <div class="row w-75">
                        <div class="form-floating col-md-12">
                            <input type="text" class="form-control" id="numerocartaoId" placeholder="999">
                            <label for="numerocartaoId" class="cl-cinza">Número do cartão</label>
                        </div>
                        <div class="form-floating col-md-12">
                            <input type="text" class="form-control" id="nomecartaoId" placeholder="999">
                            <label for="nomecartaoId" class="cl-cinza">Nome impresso no cartão</label>
                        </div>
                        <div class="form-floating d-flex col-md-6">
                            <input type="date" class="form-control" id="validadeId" placeholder="9999 9999 9999 9999">
                            <label for="validadeId" class="cl-cinza">Validade</label>
                        </div>
                        <div class="form-floating d-flex text-end col-md-6">
                            <input type="text" class="form-control" id="cvvId" placeholder="999">
                            <label for="cvvId" class="cl-cinza">CVV</label>
                        </div>
                        <div class="form-floating col-md-12">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">1 x de R$ 1499,99 sem juros</option>
                                <option value="2">6 x de R$ 249,99</option>
                                <option selected>12 x de R$ 167,99 sem juros</option>
                            </select>
                            <label for="floatingSelect">Parcelas</label>
                        </div>
                    </div>
                    <div class="form-check ml-8 mt-8">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pixId"
                            checked>
                        <label class="form-check-label" for="pixId">
                            Pix
                        </label>
                    </div>
                    <div class="form-check ml-8">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="boletoId"
                            checked>
                        <label class="form-check-label" for="boletoID">
                            Boleto
                        </label>
                    </div>
                </form>
                    <a href="finalizar-compra.php" class="btn btn-success w-100 mt-36">
                        FINALIZAR COMPRA
                    </a>
            </div>
            <div class="col-md-5 produto-vendido">
                <div class="border border-light-subtle py-36">
                    <?php
                        $produtosDAO = new ProdutosDAO();
                        $total = 0;
                        foreach($carrinho as $i => $item) {
                            $p = $produtosDAO->getProduto($item['idproduto']);
                            $subtotal = $item['quantidade'] * $p['valor'];
                    ?>
                    <div class="w-75 m-auto row g-3">
                        <div class="col-md-2 m-0">
                            <img src="data:image/png;base64,<?=base64_encode($p['imagem'])?>" alt="" class="m-0">
                        </div>
                        <div class="col-md-10 m-0">
                            <p class="m-0 cl-cinza maior d-flex p-0 fw-bold"><?=$p['titulo']?></p>
                            <p class="m-0 cl-cinza p-0"><?=$item['quantidade']?>
                                <span class="float-end">
                                    <?=$subtotal?>
                                </span>
                            </p>
                        </div>
                        <hr>
                    </div>
                    <?php 
                        }
                    ?>
                        <div class="w-75 g-3 m-auto">
                            <p class="cl-cinza m-0">Entrega
                                <span class="text-right cl-cinza m-0 d-block float-end w-auto">
                                    R$10,00
                                </span>
                            </p>
                            <p class="cl-cinza m-0">Total
                                <span class="text-right cl-cinza m-0 d-block float-end p-0 w-auto fw-bold">
                                    R$<?=number_format(($_SESSION['total']+10), 2, ',', '.')?>
                                </span>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
    include "incs/footer.php";
?>