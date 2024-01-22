<title>Alvaro Cordero Miñambres - REST</title>
<div style="position: absolute; top: 32%; left: 50%; transform: translate(-50%, -50%);">
    <div style="width: 100%; height: 440px; text-align: justify; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word;">
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
        <fieldset class=" nasa">
            <legend>
                <h2>Foto del dia de la nasa</h2>
            </legend>
            <input type="date" name="fecha" max=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
            <input type="submit" value="Aceptar" name="nasa" >
            <p><b>Descripcion:</b> <?php echo $explicacion; ?></p>
            <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
            <img src="<?php echo $imagen; ?>" width="300px" height="300px" />
            </fieldset>
            <input style=" margin-right: 10px; margin-top: 45px; width: 25%; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none;" type="submit" value="Volver" name="volver">
        </form>
    </div>
</div>
</html>