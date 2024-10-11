<?php
global $resultados, $numeroDePaginas, $pagina;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paginacion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="contenedor">
    <h1>Articulos</h1>
    <section class="articulos">
        <ul>
            <?php foreach ($resultados as $articulo): ?>
                <li><?php echo $articulo['id'] . ' - ' . $articulo['titulo'] . ' - ' . $articulo['descripcion'] . ' - ' . $articulo['precio'] . ' - ' . $articulo['stock']; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="paginacion">
        <ul>
            <?php if ($pagina === 1): ?>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php else: ?>
                <li><a href="?pagina=<?php echo $pagina - 1; ?>">&laquo;</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $numeroDePaginas; $i++): ?>
                <?php if ($pagina === $i): ?>
                    <li class="active"><a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($pagina === $numeroDePaginas): ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
            <?php else: ?>
                <li><a href="?pagina=<?php echo $pagina + 1; ?>">&raquo;</a></li>
            <?php endif; ?>
        </ul>
    </section>
</div>
</body>
</html>