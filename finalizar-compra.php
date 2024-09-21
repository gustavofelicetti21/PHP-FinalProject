<?php
    include "incs/header.php";
    require_once "admin/src/CompraDAO.php";

    $compraDAO = new CompraDAO();
    $compraDAO->cadastrarCompra($_SESSION);
    session_destroy();
?>
<main class="container-md">
    <section class="my-36">
        <div class="container w-75 text-center mx-auto p-3 border rounded-3 bg-light">
            <img src="https://nirvana.ind.br/site/themes/nirvana/img/check-success.png" alt="" width="8%">
            <h4 class="my-3">Compra concluída com sucesso!</h4>
        </div>
    </section>
</main>
<?php
    include "incs/footer.php";
?>