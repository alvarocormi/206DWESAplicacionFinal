<title>Alvaro Cordero Miñambres - REST</title>
<div style="display: flex;">
    <div style="margin-top: 50px; margin-left: 50px; max-width: 29%; display: flex; justify-content: center;">
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
        <fieldset class=" nasa">
            <legend>
                <h2>Foto del dia de la nasa</h2>
            </legend>
            <input type="date" name="fecha" value="<?php echo $_SESSION['fecha'] ?>" max=<?php $hoy = date("Y-m-d");
                                                                                                                            echo $hoy; ?>>
            <input type="submit" value="Aceptar" name="nasa">
            <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
            <img src="<?php echo $imagen; ?>" width="300px" height="300px" />
            <hr>
            <p style="margin-top: 20px;"><span style="font-weight: bold;">URL</span>: https://api.nasa.gov/planetary/apod?api_key=rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14&date=$fecha", false, $context</p>
            <p><span style="font-weight: bold;">Parametros:</span> Fecha</p>
            <p><span style="font-weight: bold;">Metodo:</span> GET</p>
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
        <hr>
        <p style="margin-top: 20px;"><span style="font-weight: bold;">URL</span>: https://api.github.com/users/alvarocormi', false, $context</p>
        <p><span style="font-weight: bold;">Parametros:</span> No</p>
        <p><span style="font-weight: bold;">Metodo:</span> GET</p>

    </div>
    <div style="max-width: 33%; margin-top: 50px; margin-left: 150px;">
        <h2>Español -> Ingles</h2>
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
        <textarea cols=" 40" rows="10" style="width: 339px; height: 183px;" name="texto" ><?php echo $_SESSION['texto'] ?></textarea>
            <br>
            <input type="submit" style="margin-top: 10px;" value="Enviar" name="traductor">
            <p><b>Traduccion:</b> <?php !isset($mensajeError) ? print($textTranslator) : print($mensajeError) ?></p>
        </form>
        <hr>
        <p style="margin-top: 20px;"><span style="font-weight: bold;">URL</span>: https://text-translator2.p.rapidapi.com/translate</p>
        <p><span style="font-weight: bold;">Parametros:</span> Languaje, texto</p>
        <p><span style="font-weight: bold;">Metodo:</span> POST</p>

    </div>
</div>

<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input style=" margin-right: 10px; width: 10%; margin-top: 100px; height: 50px; border: 1px solid; background: black; border-radius: 5px; font-size: 18px; color: white; font-weight: 500; cursor: pointer; outline: none; display: block; margin-left: 45%;" type="submit" value="Volver" name="volver">
</form>