<title>Alvaro Cordero Miñambres - REST</title>
<div style="display: flex;">
    <div style="margin-top: 50px; margin-left: 50px; max-width: 33%; display: flex; justify-content: center;">
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
        <fieldset class=" nasa">
            <legend>
                <h2>Foto del dia de la nasa</h2>
            </legend>
            <input type="date" name="fecha"  value="<?php echo isset($_SESSION['fecha']) ? $_SESSION['fecha'] : "" ?>" max=<?php $hoy = date("Y-m-d");
                                                                                echo $hoy; ?>>
            <input type="submit" value="Aceptar" name="nasa">
            <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
            <img src="<?php echo $imagen; ?>" width="300px" height="300px" />
            </fieldset>
        </form>
    </div>
    <div style="max-width: 33%; margin-top: 50px; margin-left: 150px;">
        <h2>Uso de la API Github</h2>
        <img src="<?php echo $avatar_url; ?>" width="150px" />
        <p><b>Nombre:</b> <?php echo $name; ?></p>
        <p><b>Descripcion:</b> <?php echo $bio; ?></p>
        <p><b>Company:</b> <?php echo $company; ?></p>
        <p><b>Repositorios:</b> <?php echo $public_repos; ?></p>

    </div>
    <div style="max-width: 33%; margin-top: 50px; margin-left: 150px;">
        <h2>TextTranslator</h2>
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
        <textarea cols=" 40" rows="10" style="width: 339px; height: 183px;" name="texto"  value="<?php echo isset($_SESSION['texto']) ? $_SESSION['texto'] : "" ?>"></textarea>
            <input type="submit" value="Enviar" name="traductor">
            <p><b>Traduccion:</b> <?php  !isset($textTranslator) ? " " :print($textTranslator) ?></p>
        </form>
    </div>
</div>
<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input style=" margin-right: 10px; width: 10%; margin-top: 300px; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none; display: block; margin-left: 45%;" type="submit" value="Volver" name="volver">
</form>