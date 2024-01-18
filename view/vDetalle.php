<title>Detalle- Alvaro Cordero Miñambres</title>
<style>
    body {
        overflow: auto;
        background-image: unset;
    }
</style>
<form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <button style="box-shadow:inset 0px 1px 0px 0px #ffffff; background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%); background-color:#f9f9f9; border-radius:6px; border:1px solid #dcdcdc; display:inline-block; cursor:pointer; color:#666666; font-family:Arial; font-size:15px; font-weight:bold; padding:10px 30px; margin-top: 10px; text-shadow:0px 1px 0px #ffffff;" type="submit" name="volver"  style="background-color: #6b7280;">VOLVER</button>
</form>
<div style="position: absolute; display: block; text-align: start; margin-left: 30px;">
    <?php
    /**
     * @author Alvaro Cordero Miñambres
     * @version 1.0
     * @since 16/01/2024
     * 
     * En este apartado pas a poder comprobar el contenido de las variables de sesion.
     */
    echo '<br><br><h3>Variable <b>$_SERVER</b></h3>';
    foreach ($_SERVER as $key => $value) {
        echo "<b>$key</b>: $value<br>";
    }

    echo '<br><br><h3>Variable <b>$_COOKIE</b></h3>';
    foreach ($_COOKIE as $key => $value) {
        echo "<b>$key</b>: $value<br>";
    }

    if (isset($_SESSION)) {
        echo '<br><br><h3>Variable <b>$_SESSION</b></h3>';
          foreach ($_SESSION as $key => $valor) {
            if ($key === 'usuario' && $valor instanceof Usuario) {
                // Accede a las propiedades o métodos del objeto Usuario para obtener la información deseada
                echo('<pre>');
                var_dump($_SESSION['usuario']);
                echo ('</pre>');
            } else {
                echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
            }
        }
    } else {
        echo '<h3>La variable <b>$_SESSION</b> no está definida</h3>';
    }

    echo '<br><br><h3>Variable <b>$_GET</b></h3>';
    foreach ($_GET as $key => $value) {
        echo "<b>$key</b>: $value<br>";
    }

    echo '<br><br><h3>Variable <b>$_POST</b></h3>';
    foreach ($_POST as $key => $value) {
        echo "$key: $value<br>";
    }

    echo '<br><br><h3>Variable <b>$_FILES</b></h3>';
    foreach ($_FILES as $key => $value) {
        echo "<b>$key</b>: $value<br>";
    }

    echo '<br><br><h3>Variable <b>$_REQUEST</b></h3>';
    foreach ($_REQUEST as $key => $value) {
        echo "<b>$key</b>: $value<br>";
    }

    echo '<br><br><h3>Variable <b>$_ENV</b></h3>';
    foreach ($_ENV as $key => $value) {
        echo "<b>$key</b>: $value<br>";
    }

    echo '<br><br><h3>Variable <b>$GLOBALS</b></h3>';
    echo '<pre>';
    print_r($GLOBALS);
    echo '</pre>';
    phpinfo();
    ?>
</div>
</html>