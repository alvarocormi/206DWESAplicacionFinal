<title>Mantenimiento Preguntas - Alvaro Cordero Miñambres</title>
<div class="formulario">
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-check-inline">
        <div>
            <label for="DescPregunta" style="margin-top: 5px;">Pregunta: </label>
            <input type="text" id="descPregunta" name="descPregunta" value="<?php echo $_SESSION['criterioBusquedaPreguntas']['descripcionBuscada'] ?? ''; ?>">
            <input type="submit" value="Buscar" name="buscarPreguntaPorDesc">
            <?php echo ($aErrores['DescPregunta'] != null ? "<span style='color:red'>" . $aErrores['DescPregunta'] . "</span>" : null); ?>
            <div class="botonsMTO">
                <input type="submit" value="Cancelar" name="salirPreguntas">
            </div>
        </div>
    </form>
</div>
<div class="tablas">
    <?php

    //Creamos una tabla en la que imprimiremos el nombre del atributo y el valor del mismo.
    // Se crea una tabla para imprimir las tuplas
    echo "<table class='table table-bordered'><thead><tr><th>Codigo</th><th>Descripcion</th><th>FechaAlta</th><th>Respuesta</th><th>Autor</th><th>Valor</th><th>FechaBaja</th><th><-T-></th></tr></thead><tbody>";

    // Se instancia un objeto tipo PDO que almacena cada fila de la consulta
    foreach ($aPreguntasVista as $aPregunta) {
        echo "<tr>";
        //Recorrido de la fila cargada
        echo ("<td>" . $aPregunta['codPregunta'] . "</td>");
        echo ("<td>" . $aPregunta['descPregunta'] . "</td>");
        echo ("<td>" . $aPregunta['fechaAltaPregunta'] . "</td>");
        echo ("<td>" . $aPregunta['respuestaPregunta'] . "</td>");
        echo ("<td>" . $aPregunta['autorRespuesta'] . "</td>");
        echo ("<td>" . $aPregunta['valorRespuesta'] . "</td>");
        echo ("<td>" . $aPregunta['fechaBajaRespuesta'] . "</td>");
        // Formulario para editar
        echo ("<td>");
        if (empty($aPregunta['fechaBajaRespuesta'])) {
            echo ("<form method='post'>");
            echo ("<input type='hidden' name='cConsultarModificarPregunta' value='" . $aPregunta['codPregunta'] . "'>");
            echo ("<button type='submit'><img src='webroot/img/consultarModificarDepartamento.png' alt='EDIT'></button>");
            echo ("</form>");
        }
        echo ("</td>");
        echo "</tr>";
    }
    echo "</tbody></table>";

    ?>
</div>