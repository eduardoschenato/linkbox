<!doctype html>
<html lang="pt-br">
  <?php include("includes/head.php"); ?>
  <body>
    <?php include("includes/menu.php"); ?>
    <header class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1>Categorias</h1>
            </div>
        </div>
    </header>
    <section class="container mt-3">
        <div class="row">
            <div class="col-12">
                <form action="salvarCategoria.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $categoria->getId(); ?>">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $categoria->getNome(); ?>">
                        </div>
                    </div>
                    <div class="btn-group float-right">
                        <a href="categorias.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
    <?php include("includes/scripts.php"); ?>
  </body>
</html>