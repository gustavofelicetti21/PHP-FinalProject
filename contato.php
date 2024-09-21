<?php
    include "incs/header.php";
?>
<main class="container-md">
    <section id="contato" class="my-36">
        <h4 class="cl-verde-escuro text-center mb-36">Entrar em Contato</h4>
        <div class="bg-br py-36 ">
            <form class="row g-3 m-auto cadastro">
                <h3 class="cl-cinza">Reclame Aqui</h2>
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="nomeId" placeholder="Password">
                        <label for="nomeId" class="cl-cinza">Seu nome</label>
                    </div>
                    <div class="form-floating mb-3 col-md-6">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput" class="cl-cinza">Seu e-mail</label>
                    </div>
                    <div class="col-md-12" id="reclamacao">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nomeId" placeholder="Password">
                            <label for="nomeId" class="cl-cinza">Sua mensagem</label>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-danger my-3">
                            Enviar Mensagem
                        </button>
                    </div>
            </form>
        </div>
    </section>
</main>
<?php
    include "incs/footer.php";
?>