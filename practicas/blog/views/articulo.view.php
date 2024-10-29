<?php
global $post
?>
<div class="container">
    <?php if (isset($post)): ?>
        <div class="row mt-4">
            <div class="col-12 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-left py-2"><?= $post['titulo']; ?></h5>
                        <img src="<?= $post['thumb'] ?>" alt="Blog" class="img-fluid">
                        <p class="fw-light fst-italic fs-6 text-end mt-1">Fecha de
                            publicación: <?= $post['fecha']; ?></p>
                        <p class="card-text"><?= $post['texto'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>