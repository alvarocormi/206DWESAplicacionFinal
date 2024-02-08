<title>Mantenimiento Departamentos - Alvaro Cordero Miñambres</title>
<div class="formulario">
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-check-inline">
        <div>
            <label for="DescDepartamento" style="margin-top: 5px;">Departamento: </label>
            <input type="text" id="DescDepartamento" name="DescDepartamento" value="<?php echo $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? ''; ?>">
            <input type="submit" value="Buscar" name="buscarDepartamentoPorDesc">
            <?php echo ($aErrores['DescDepartamento'] != null ? "<span style='color:red'>" . $aErrores['DescDepartamento'] . "</span>" : null); ?>
            <div class="botonsMTO">
                <input type="submit" value="Cancelar" name="salirDepartamentos">
            </div>
        </div>
    </form>
</div>
<div class="tablas">
    <?php

    //Creamos una tabla en la que imprimiremos el nombre del atributo y el valor del mismo.
    // Se crea una tabla para imprimir las tuplas
    echo "<table class='table table-bordered'><thead><tr><th>Codigo</th><th>Descripcion</th><th>FechaCreacion</th><th>VolumenNegocio</th><th>FechaBaja</th><th><-T-></th></tr></thead><tbody>";

    // Se instancia un objeto tipo PDO que almacena cada fila de la consulta
    foreach ($aDepartamentosVista as $aDepartamento) {
        echo "<tr>";
        //Recorrido de la fila cargada
        echo ("<td>" . $aDepartamento['codDepartamento'] . "</td>");
        echo ("<td>" . $aDepartamento['descDepartamento'] . "</td>");
        echo ("<td>" . $aDepartamento['fechaCreacionDep'] . "</td>");
        echo ("<td>" . $aDepartamento['volumenDeNegocio'] . "</td>");
        echo ("<td>" . $aDepartamento['fechaBajaDep'] . "</td>");
        // Formulario para editar
        echo ("<td>");
        if (empty($aDepartamento['fechaBajaDep'])) {
            echo ("<form method='post'>");
            echo ("<input type='hidden' name='cConsultarModificarDepartamento' value='" . $aDepartamento['codDepartamento'] . "'>");
            echo ("<button type='submit'><img src='webroot/img/consultarModificarDepartamento.png' alt='EDIT'></button>");
            echo ("</form>");
        }
        echo ("</td>");
        echo "</tr>";
    }
    echo "</tbody></table>";

    ?>
</div>