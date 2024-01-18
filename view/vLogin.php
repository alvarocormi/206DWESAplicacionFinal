<title>Login- Alvaro Cordero Miñambres</title>
</head>
<title>Tu Título Aquí</title>
<body>
    <div class="center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 400px; background: white; border-radius: 10px; box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);">
        <h1 style="text-align: center; padding: 20px 0; font-size: 32px; color: black; font-weight: bold; border-bottom: 1px solid silver;">Login</h1>
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin-bottom: 20px; padding: 0 40px; box-sizing: border-box;">
            <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
                <input type="text" id="usuario" name="usuario" value="<?php echo (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none;">
                <span class="raya"></span>
                <label style="position: absolute; top: -19px; left: 5px; color: #2691d9;  font-size: 17px;">Usuario: </label>
            </div>
            <div class="txt_field" style="position: relative; border-bottom: 2px solid #adadad; margin: 40px 0;">
                <input type="password" id="contrasena" name="contrasena" value="<?php echo (isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : ''); ?>" style="width: 100%; padding: 0 5px; height: 40px; font-size: 16px; border: none; background: none; outline: none;">
                <span class="raya"></span>
                <label style="position: absolute; top: -19px; left: 5px; color: #2691d9;  font-size: 17px;">Password: </label>
            </div>
            <p style="color: red; position: absolute; bottom: 90px; left: 28%"><?php echo (!empty($aErrores["usuario"]) ? $aErrores["usuario"] : ''); ?></p>
            <div class="botons" style="display: flex; padding-top: 25px">
                <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: #2691d9; border-radius: 25px; font-size: 18px; color: #e9f4fb; font-weight: 700; cursor: pointer; outline: none;" type="submit" value="Iniciar Sesion" name="enviar">
                <input style=" margin-right: 10px;  width: 50%; height: 50px; border: 1px solid; background: #bf1515; border-radius: 25px; font-size: 18px; color: #e9f4fb; font-weight: 700; cursor: pointer; outline: none;" type="submit" value="Cancelar" name="cancelar">
            </div>
        </form>
    </div>
</body>
</html>