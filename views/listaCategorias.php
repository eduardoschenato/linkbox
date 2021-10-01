<!doctype html>
<html lang="pt-br">
  <?php include("includes/head.php"); ?>
  <body>
    <?php include("includes/menu.php"); ?>
    <header class="container mt-3">
        <div class="row">
            <div class="col-12">
                <a href="categoria.php" class="btn btn-success float-right">Adicionar</a>
                <h1>Categorias</h1>
            </div>
        </div>
    </header>
    <section class="container mt-3">
        <div class="row">
            <div class="col-12">
                <?php if(count($categorias) == 0) { ?>
                    <div class="col-12 alert alert-info">Nenhum registro encontrado</div>
                <?php } else { ?>
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                        <?php foreach($categorias as $categoria){ ?>
                            <tr>
                                <td><?php echo $categoria->getId() ?></td>
                                <td><?php echo $categoria->getNome() ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="categoria.php?id=<?php echo $categoria->getId() ?>" class="btn btn-primary">Editar</a>
                                        <a href="excluirCategoria.php?id=<?php echo $categoria->getId() ?>" class="btn btn-danger">Excluir</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
    <?php include("includes/scripts.php"); ?>
  </body>
</html>