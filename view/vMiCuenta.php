<title>MiCuenta- Alvaro Cordero Miñambres</title>
<div class="center" style="position: absolute; top: 48%; left: 50%; transform: translate(-50%, -50%);  border-radius: 5px; width: 550px; background: white; box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05); height: 750px;">
    <h1 style="text-align: center; padding: 20px 0; font-size: 32px; color: black; font-weight: 500; border-bottom: 1px solid silver;">Mi Cuenta</h1>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin-bottom: 20px; padding: 0 40px; box-sizing: border-box;">
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="usuario" name="T01_CodUsuario" value="<?php echo ($aVMiCuenta['codigoUsuarioActual']); ?>" disabled style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: lightgrey; color: white; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Usuario: </label>
        </div>
        <div class="txt_field" id="rayaLogin" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="password" id="contrasena" name="T01_Password" value="<?php echo ($aVMiCuenta['contraseñaUsuarioActual']); ?>" disabled style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none; background: lightgrey; color: white;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Password: </label>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="usuario" name="T01_DescUsuario" value="<?php echo (isset($_REQUEST['T01_DescUsuario']) ? $_REQUEST['T01_DescUsuario'] : $aVMiCuenta['descripcionUsuarioActual']); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Descripcion: </label>
        </div>

        <div class="txt_field" id="rayaLogin" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="contrasena" name="nConexionesUsuarioAEditar" value="<?php echo ($aVMiCuenta['nConexionesUsuarioActual']); ?>" disabled style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none; background: lightgrey; color: white;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Numero Conexiones: </label>
        </div>
        <?php if ($aVMiCuenta['fechaHoraUltimaConexionAnteriorUsuarioActual'] > 1) { ?>
            <div class="txt_field" id="rayaLogin" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
                <input type="text" id="fecha" name="fechaHoraUltimaConexionAnteriorUsuarioAEditar" value="<?php echo ($aVMiCuenta['fechaHoraUltimaConexionAnteriorUsuarioActual']) ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none; background: lightgrey; color: white;" disabled>
                <span class="raya"></span>
                <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Fecha Hora Ultima Conexion: </label>
            </div>
        <?php } ?>
        <p style="color: red; position: absolute; bottom: 85px; left: 28%"><?php echo (!empty($aErrores["T01_CodUsuario"]) ? $aErrores["T01_CodUsuario"] : ''); ?></p>
        <div class="botons" style="display: flex; padding-top: 5px">
            <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none;" type="submit" value="Eliminar Usuario" name="eliminarUsuario">
            <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: #bf1515; border-radius: 5px; font-size: 18px; color: #e9f4fb; font-weight: 400; cursor: pointer; outline: none;" type="submit" value="Cancelar" name="cancelar">
        </div>
        <div class="botons" style="display: flex; padding-top: 15px">
            <input style=" margin-right: 10px;  width: 100%; height: 50px; border: 1px solid; background: white; border-radius: 5px; font-size: 18px; color: black; font-weight: 400; cursor: pointer; outline: none;" type="submit" value="Confirmar Cambios" name="confirmarCambios">
        </div>
        <div class="botons" style="display: flex; padding-top: 15px">
            <input style=" margin-right: 10px;  width: 100%; height: 50px; border: 1px solid; background: white; border-radius: 5px; font-size: 18px; color: black; font-weight: 400; cursor: pointer; outline: none;" type="submit" value="Cambiar Contraseña" name="cambiarContraseña">
        </div>
    </form>
</div>

</html>