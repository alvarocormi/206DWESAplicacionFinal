<title>AltaPregunta- Alvaro Cordero Miñambres</title>
<div class="center" style="position: absolute; top: 48%; left: 50%; transform: translate(-50%, -50%);  border-radius: 5px; width: 450px; background: white; box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05); height: 680px;">
    <h1 style="text-align: center; padding: 20px 0; font-size: 32px; color: black; font-weight: 500; border-bottom: 1px solid silver;">Añadir Pregunta</h1>
    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin-bottom: 20px; padding: 0 40px; box-sizing: border-box;">
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="codPregunta" name="codPregunta" value="<?php echo (isset($_REQUEST['codPregunta']) ? $_REQUEST['codPregunta'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Codigo: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_CodPregunta"]) ? $aErrores["T08_CodPregunta"] : ''); ?></p>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="descPregunta" name="descPregunta" value="<?php echo (isset($_REQUEST['descPregunta']) ? $_REQUEST['descPregunta'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Descripcion: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_DescPregunta"]) ? $aErrores["T08_DescPregunta"] : ''); ?></p>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="fechaAlta" name="fechaAlta" value="<?php echo (isset($_REQUEST['fechaAlta']) ? $_REQUEST['fechaAlta'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Fecha Alta: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_FechaAlta"]) ? $aErrores["T08_FechaAlta"] : ''); ?></p>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="respuesta" name="respuesta" value="<?php echo (isset($_REQUEST['respuesta']) ? $_REQUEST['respuesta'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Respuesta: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_Respuesta"]) ? $aErrores["T08_Respuesta"] : ''); ?></p>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="autor" name="autor" value="<?php echo (isset($_REQUEST['autor']) ? $_REQUEST['autor'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Autor: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_AutorRespuesta"]) ? $aErrores["T08_AutorRespuesta"] : ''); ?></p>
        </div>
        <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
            <input type="text" id="valor" name="valor" value="<?php echo (isset($_REQUEST['valor']) ? $_REQUEST['valor'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; color: black; outline: none;">
            <span class="raya"></span>
            <label style="position: absolute; top: -19px; left: 5px; color: #212529BF;  font-size: 17px;">Valor: </label>
            <p class="error"><?php echo (!empty($aErrores["T08_Valor"]) ? $aErrores["T08_Valor"] : ''); ?></p>
        </div>
        <div class="botons" style="display: flex; padding-top: 5px">
            <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 400; cursor: pointer; outline: none;" type="submit" value="Añadir" name="añadirPregunta">
            <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: #bf1515; border-radius: 5px; font-size: 18px; color: #e9f4fb; font-weight: 400; cursor: pointer; outline: none;" type="submit" value="Cancelar" name="cancelarAñadirPregunta">
        </div>
    </form>
</div>

</html>