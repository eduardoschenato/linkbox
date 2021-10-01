<!doctype html>
<html lang="pt-br">
  <?php include("includes/head.php"); ?>
  <body>
    <?php include("includes/menu.php"); ?>
    <header class="container mt-3">
        <div class="row">
            <div class="col-12">
                <a href="link.php" class="btn btn-success float-right">Adicionar</a>
                <h1>Links</h1>
            </div>
        </div>
    </header>
    <section class="container-fluid mt-3">
        <div class="row">
            <?php if(count($links) == 0) { ?>
                <div class="col-10 offset-1 alert alert-info">Nenhum registro encontrado</div>
            <?php } else { ?>
                <?php foreach($links as $link) { ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                        <div class="card">
                            <img src="<?php echo $link->getImagem() ?>" class="card-img-top" alt="Card title">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $link->getTitulo() ?></h5>
                                <span class="badge badge-primary mb-3"><?php echo $link->getNomeCategoria() ?></span>
                                <p class="card-text"><?php echo $link->getDescricao() ?></p>
                                <p class="card-text text-muted">Palavras-chave: <?php echo $link->getPalavrasChave() ?></p>
                                <div class="btn-group">
                                    <a href="<?php echo $link->getLink() ?>" class="btn btn-primary" target="_blank">Abrir</a>
                                    <a href="link.php?id=<?php echo $link->getId() ?>" class="btn btn-success">Editar</a>
                                    <a href="excluirLink.php?id=<?php echo $link->getId() ?>" class="btn btn-danger">Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
    <?php include("includes/scripts.php"); ?>
  </body>
</html>