<title>EditarDepartamento- Alvaro Cordero Miñambres</title>
<div class="center" style="position: absolute; top: 48%; left: 50%; transform: translate(-50%, -50%);  border-radius: 5px; width: 500px; background: white; box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05); height: 780px;">
    <h1 style="text-align: center; padding: 20px 0; font-size: 32px; color: black; font-weight: 500; border-bottom: 1px solid silver;">Editar</h1>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin-bottom: 20px; padding: 0 40px; box-sizing: border-box;">
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="usuario" name="codPreguntaAEditar" value="<?php echo ($codPreguntaAEditar); ?>" disabled style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: lightgrey; color: white; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Codigo: </label>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="T08_DescPregunta" name="T08_DescPregunta" value="<?php echo (isset($_REQUEST['T08_DescPregunta']) ? $_REQUEST['T08_DescPregunta'] : $descripcionPreguntaAEditar); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Descripcion: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_DescPregunta"]) ? $aErrores["T08_DescPregunta"] : ''); ?></p>
        </div>
        <div class="txt_field" id="rayaLogin" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="fechaAltaPreguntaAEditar" name="fechaAltaPreguntaAEditar" value="<?php echo ($fechaAltaPreguntaAEditar); ?>" disabled style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none; background: lightgrey; color: white;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Fecha Alta: </label>
        </div>
        <div class="txt_field" id="rayaLogin" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="T08_Respuesta" name="T08_Respuesta" value="<?php echo ($respuestaAEditar); ?>" disabled style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none; background: lightgrey; color: white;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Respuesta: </label>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="T08_Valor" name="T08_Valor" value="<?php echo (isset($_REQUEST['T08_Valor']) ? $_REQUEST['T08_Valor'] : $valorAEditar); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;"> Valor: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_Valor"]) ? $aErrores["T08_Valor"] : ''); ?></p>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="T08_AutorRespuesta" name="T08_AutorRespuesta" value="<?php echo (isset($_REQUEST['T08_AutorRespuesta']) ? $_REQUEST['T08_AutorRespuesta'] : $autorRespuestaAEditar); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;"> Autor: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_AutorRespuesta"]) ? $aErrores["T08_AutorRespuesta"] : ''); ?></p>

        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="T08_FechaBaja" name="T08_FechaBaja" value="<?php echo ($fechaBajaPreguntaAEditar); ?>" disabled style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none; background: lightgrey; color: white;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;"> FechaBaja: </label>
        </div>
        <div class="botons" style="display: flex; padding-top: 5px">
            <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 400; cursor: pointer; outline: none;" type="submit" value="Confirmar" name="confirmarCambiosEditar">
            <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: #bf1515; border-radius: 5px; font-size: 18px; color: #e9f4fb; font-weight: 400; cursor: pointer; outline: none;" type="submit" value="Cancelar" name="cancelarEditar">
        </div>
    </form>
</div>

</html>