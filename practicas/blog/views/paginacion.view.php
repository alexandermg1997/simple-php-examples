<?php
global $paginaActual, $totalPaginas;
?>
<div class="mt-1">
    <section class="pagination d-flex justify-content-center">
        <ul>
            <?php if ($paginaActual === 1): ?>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php else: ?>
                <li><a href="?pagina=<?php echo $paginaActual - 1; ?>">&laquo;</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php if ($paginaActual === $i): ?>
                    <li class="active"><a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($paginaActual === $totalPaginas): ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
            <?php else: ?>
                <li><a href="?pagina=<?php echo $paginaActual + 1; ?>">&raquo;</a></li>
            <?php endif; ?>
        </ul>
    </section>
</div>