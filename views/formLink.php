<!doctype html>
<html lang="pt-br">
  <?php include("includes/head.php"); ?>
  <body>
    <?php include("includes/menu.php"); ?>
    <header class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h1>Links</h1>
            </div>
        </div>
    </header>
    <section class="container mt-3">
        <div class="row">
            <div class="col-12">
                <form action="salvarLink.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $link->getId(); ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link" value="<?php echo $link->getLink(); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_categoria">Categoria</label>
                            <select id="id_categoria" name="id_categoria" class="form-control">
                                <option value="">Selecione</option>
                                <?php foreach($categorias as $categoria){ ?>
                                    <option 
                                        value="<?php echo $categoria->getId() ?>" 
                                        <?php echo ($categoria->getId() == $link->getIdCategoria()) ? "selected" : "" ?>
                                    >
                                        <?php echo $categoria->getNome() ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group float-right">
                        <a href="links.php" class="btn btn-secondary">Cancelar</a>
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