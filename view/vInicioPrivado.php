<title>Alvaro Cordero Miñambres - Progama</title>
<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);">
    <div style="width: 400px; height: 560px; background-color: white; text-align: center; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 5px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075)">
        <div style="color: black; padding: 15px; flex: 1 1 auto; padding: 1.25rem;">
            <h5 style="font-size: 1.7rem; font-weight: bold; margin-bottom: 0.75rem; font-weight: 500;"><?php echo ("$bienvenida") ?></h5>
            <hr>
            <p style="font-size: 18px; margin-top: 20px; margin-bottom: 1rem;"><?php echo ("$numConexiones") ?><?php echo ("<br>$ultimaConexion") ?></p>
            <form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="botons" style="display: flex; padding-top: 30px">
                    <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none;" type="submit" value="Detalle" name="detalle">
                    <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: red; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none;" type="submit" value="Cerrar sesion" name="cerrarSesion">
                </div>
                <div class="botons">
                <input style=" margin-right: 10px;  width: 100%; height: 50px; border: 1px solid; background: white; border-radius: 5px; font-size: 18px; color: black; font-weight: 500; cursor: pointer; outline: none; margin-top: 10px;" type="submit" value="Editar Perfil" name="editarPerfil">
                </div>
                <div class="botons">
                <input style=" margin-right: 10px;  width: 100%; height: 50px; border: 1px solid; background: white; border-radius: 5px; font-size: 18px; color: black; font-weight: 500; cursor: pointer; outline: none; margin-top: 10px;" type="submit" value="REST" name="rest">
                </div>
                <div class="botons">
                <input style=" margin-right: 10px;  width: 100%; height: 50px; border: 1px solid; background: white; border-radius: 5px; font-size: 18px; color: black; font-weight: 500; cursor: pointer; outline: none; margin-top: 10px;" type="submit" value="Mto.Departamentos" name="mtoDepartamentos">
                <input style=" margin-right: 10px;  width: 100%; height: 50px; border: 1px solid; background: white; border-radius: 5px; font-size: 18px; color: black; font-weight: 500; cursor: pointer; outline: none; margin-top: 10px;" type="submit" value="Mto.Preguntas" name="mtoPreguntas">
                </div>
            </form>
        </div>
    </div>
</div>
</html>