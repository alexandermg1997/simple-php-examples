<?php
global $posts;
?>
<div class="container">
    <h2 class="text-center">Panel de administración</h2>
    <?php foreach ($posts as $post): ?>
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-left py-2"><?= $post['titulo']; ?></h5>
                        <img src="<?= $post['thumb'] ?>" alt="Blog" class="img-fluid rounded">
                        <p class="fw-light fst-italic fs-6 text-end mt-1">Fecha de
                            publicación: <?= $post['fecha']; ?></p>
                        <p class="card-text"><?= $post['extracto'] ?></p>
                        <div class="text-center pt-2">
                            <a href="<?= BLOG_CONFIG['url_base']; ?>backend/SingleController.php?id=<?= $post['id']; ?>"
                               class="btn btn-primary">Ver artículo</a>
                            <a href="<?= BLOG_CONFIG['url_base']; ?>backend/EditarController.php?id=<?= $post['id']; ?>"
                               class="btn btn-warning">Modificar artículo</a>
                            <a href="<?= BLOG_CONFIG['url_base']; ?>backend/EliminarController.php?id=<?= $post['id']; ?>"
                               class="btn btn-danger">Eliminar artículo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>