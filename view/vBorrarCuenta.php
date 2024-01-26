<title>Alvaro Cordero Miñambres - BorrarCuenta</title>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);">
    <div style="width: 450px; height: 320px; background-color: white; text-align: center; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 5px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075)">
        <div style="color: black; padding: 15px; flex: 1 1 auto; padding: 1.25rem;">
        <img src="webroot/img/vBorrarCuenta-icono.svg" class="img-fluid" alt="Icono Eliminar Usuario" style="margin-bottom: 10px;">
        <h2>¿ Estas seguro ?</h2>
            <form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="botons" style="display: flex; padding-top: 60px">
                    <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none;" type="submit" value="Cancelar" name="salirBorrarCuenta">
                    <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: red; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none;" type="submit" value="Eliminar Usuario" name="eliminarUsuario">
                </div>
            </form>
        </div>
    </div>
</div>
</html>