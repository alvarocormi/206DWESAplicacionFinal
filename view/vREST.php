<title>Alvaro Cordero Miñambres - REST</title>
<div style="display: flex;">
    <div style="margin-top: 50px; margin-left: 50px; max-width: 45%; display: flex; justify-content: center;">
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
        <fieldset class=" nasa">
            <legend>
                <h2>Foto del dia de la nasa</h2>
            </legend>
            <input type="date" name="fecha" value="<?php date("Y-m-d"); ?>" max=<?php $hoy = date("Y-m-d");
                                                                                echo $hoy; ?>>
            <input type="submit" value="Aceptar" name="nasa">
            <p><b>Descripcion:</b> <?php echo $explicacion; ?></p>
            <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
            <img src="<?php echo $imagen; ?>" width="300px" height="300px" />
            </fieldset>
        </form>
    </div>
    <div style="max-width: 50%; margin-top: 50px; margin-left: 150px;">
        <h2>Uso de la API Github</h2>
        <img src="<?php echo $avatar_url; ?>" width="150px" />
        <p><b>Nombre:</b> <?php echo $name; ?></p>
        <p><b>Descripcion:</b> <?php echo $bio; ?></p>
        <p><b>Company:</b> <?php echo $company; ?></p>
        <p><b>Repositorios:</b> <?php echo $public_repos; ?></p>

    </div>
</div>
<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input style=" margin-right: 10px; margin-top: 65px; width: 10%; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none; display: block; margin-left: 45%;" type="submit" value="Volver" name="volver">
</form>