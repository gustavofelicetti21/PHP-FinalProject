<?php
    include "incs/header.php";
?>
<main class="container-md">
    <section class="my-36 mt-36">
        <h3 class="mb-36 text-center cl-verde-escuro">Cadastre-se</h3>

            <div class="bg-br py-36 ">
                <form class="row g-3 m-auto cadastro">
                    <h4 class="cl-verde-escuro">Dados Pessoais</h4>
                    <div class="col-md-12">
                        <label for="nomeId" class="form-label cl-verde-escuro">Nome Completo</label>
                        <input type="text" class="form-control cl-verde-escuro" id="nomeId">
                    </div>
                    <div class="col-md-6">
                        <label for="cpfId" class="form-label cl-verde-escuro">CPF</label>
                        <input type="cpf" class="form-control cl-verde-escuro" id="cpfId" name="">
                    </div>
                    <div class="col-md-6">
                        <label for="dataId" class="form-label cl-verde-escuro">Data de Nascimento</label>
                        <input type="date" class="form-control cl-verde-escuro" id="dataId" name="">
                    </div>
                    <div class="col-md-6">
                        <label for="emailId" class="form-label cl-verde-escuro">E-mail</label>
                        <input type="email" class="form-control cl-verde-escuro" id="emailId" name="">
                    </div>
                    <div class="col-md-6">
                        <label for="senhaId" class="form-label cl-verde-escuro">Senha</label>
                        <input type="password" class="form-control cl-verde-escuro" id="senhaId" name="senha">
                    </div>
                    <h4 cl-verde-escuro>Endereço</h4>
                    <div class="col-md-4">
                        <label for="cepId" class="form-label cl-verde-escuro">CEP</label>
                        <input type="text" class="form-control cl-verde-escuro" id="cepId" name="">
                    </div>
                    <div class="col-md-6">
                        <label for="cidadeId" class="form-label cl-verde-escuro">Cidade</label>
                        <input type="text" class="form-control cl-verde-escuro" id="cidadeId" name="">
                    </div>
                    <div class="col-md-2">
                        <label for="estadoId" class="form-label cl-verde-escuro">Estado</label>
                        <select class="form-select cl-verde-escuro" id="estadoId">
                            <option selected>UF</option>
                            <option value="1">PR</option>
                            <option value="2">SC</option>
                            <option value="3">RS</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="bairroId" class="form-label cl-verde-escuro">Bairro</label>
                        <input type="text" class="form-control cl-verde-escuro" id="bairroId" name="">
                    </div>
                    <div class="col-md-6">
                        <label for="ruaId" class="form-label cl-verde-escuro">Rua</label>
                        <input type="text" class="form-control cl-verde-escuro" id="ruaId" name="">
                    </div>
                    <div class="col-md-2 mb-36">
                        <label for="numeroId" class="form-label cl-verde-escuro">Número</label>
                        <input type="text" class="form-control cl-verde-escuro" id="numeroId" name="">
                    </div>
                    <div class="col-md-12 my-3 text-center">
                        <button class="btn btn-outline-danger">
                            Cancelar
                        </button>
                        <button class="btn btn-danger">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
    </section>
</main>
<?php
    include "incs/footer.php";
?>