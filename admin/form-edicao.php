<?php
  include "menu.php";
  require_once "src/ProdutosDAO.php";

  $produtosDAO = new ProdutosDAO();
  $produto = $produtosDAO->getProduto($_GET['idproduto']);
?>

<div class="container w-75">
  <form action="edicao-produto.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idproduto" value="<?=$produto['idproduto']?>">
    <h3 class="text-center my-4">Edição de Produtos</h3>
    <div class="form-floating my-3">
      <input type="text" class="form-control" id="textID" placeholder="text" name="titulo" value="<?=$produto['titulo']?>" required>
      <label for="floatingInput">Título</label>
    </div>
    <div class="row my-3">
      <div class="col-6">
        <input type="file" class="form-control h-100" id="imagemID" name="imagem">
      </div>
      <div class="form-floating col-6">
        <input type="text" class="form-control" id="valorID" placeholder="text" name="valor" value="<?=$produto['valor']?>" required>
        <label for="floatingInput">Valor</label>
      </div>
    </div>
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" id="descricaoID" name="descricao" required><?=$produto['descricao']?></textarea>
      <label for="descricaoID">Descrição</label>
    </div>
    <div class="row align-items-start mt-3">
      <div class="col-6">
        <div>
          <label class="form-label">Categoria</label>
          <select name="idcategoria" class="form-select" required>
            <option value="">Selecione</option>
            <?php
              require_once "src/CategoriaDAO.php";
              $categoriaDAO = new CategoriaDAO();
              $categorias = $categoriaDAO -> getCategorias();

              foreach ($categorias as $categoria) {
                if($categoria['idcategoria'] == $produto['idcategoria']) {
                  $selected = "SELECTED";
                } else{
                  $selected = "";
                }
            ?>
              <option <?=$selected?> value="<?=$categoria['idcategoria']?>"><?=$categoria['categoria']?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <div class="mt-3">
          <label class="form-label">Tema</label>
          <select name="idtema" class="form-select" required>
            <option value="">Selecione</option>
            <?php
              require_once "src/temaDAO.php";
              $temaDAO = new TemaDAO();
              $temas = $temaDAO -> getTemas();

              foreach ($temas as $tema) {
                if($tema['idtema'] == $produto['idtema']) {
                  $selected = "SELECTED";
                } else{
                  $selected = "";
                }
            ?>
              <option <?=$selected?> value="<?=$tema['idtema']?>"><?=$tema['tema']?></option>
            <?php
              }
            ?>
          </select>
        </div>
      </div>
      <div class="col-6">
        <p class="mb-1">Valor Final</p>
        <?php
            if ($produto['promocao']==1) {
          ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" id="normal" name="promocao">
              <label class="form-check-label" for="normal">
                Preço Normal
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="1" id="promocao" name="promocao" checked>
              <label class="form-check-label" for="promocao">
                Promoção
              </label>
            </div>
          <?php 
            }
            else {
          ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="0" id="normal" name="promocao" checked>
              <label class="form-check-label" for="normal">
                Preço Normal
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="1" id="promocao" name="promocao">
              <label class="form-check-label" for="promocao">
                Promoção
              </label>
            </div>
          <?php
            }
          ?>
          
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3 float-end">Atualizar</button>
  </form>
</div>

<?php
  include "rodape.php";
?>