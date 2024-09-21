<?php
    include "incs/header.php";
?>
<main class="container-md">
    <section class="my-36" id="login">
        <h3 class="mb-36 text-center cl-verde-escuro">Login</h3>

            <div class="bg-br py-36 ">
                <form class="row g-3 m-auto cadastro">
                    <h4 class="cl-verde-escuro">Digite seus dados:</h4>
                    <div class="col-md-12">
                        <label for="userId" class="form-label cl-verde-escuro">Usuário/e-mail</label>
                        <input type="text" class="form-control cl-verde-escuro" id="userId">
                    </div>
                    <div class="col-md-12">
                        <label for="senhaId" class="form-label cl-verde-escuro">Senha</label>
                        <input type="password" class="form-control cl-verde-escuro" id="senhaId" name="">
                        <p class="m-0">
                            <a href="./cadastro.php">Não tem uma conta? Cadastre-se aqui.</a>
                        </p>
                        <a href="">Esqueci minha senha</a>
                    </div>
                    <div class="col-md-12 text-end">
                        <button class="btn btn-danger" id="entrar">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
    </section>
</main>
<?php
    include "incs/footer.php";
?>