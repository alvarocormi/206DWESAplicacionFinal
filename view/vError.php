<title>Error Page</title>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold">ERROR</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Ha ocurrido un error en la aplicacion!!.</p>
        <p class="lead">
            <?php echo "CODIGO: " . $codError ?>
        </p>
        <p class="lead">
            <?php echo "DESCRIPCION:" . $descError ?>
        </p>
        <p class="lead">
            <?php echo "ARCHIVO:" . $archivoError ?>
        </p>
        <p class="lead">
            <?php echo "LINEA:" . $lineaError ?>
        </p>
        <form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button type='submit' class="btn btn-primary" name='salir' style='font-size: 20px; padding-left: 15px; padding-right: 15px;'>Salir</button>
        </form>
    </div>
</div>