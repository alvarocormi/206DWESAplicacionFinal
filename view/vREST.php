<title>Alvaro Cordero Miñambres - REST</title>
<div style="position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%); box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);">
    <div style="width: 400px; height: 440px; background-color: white; text-align: center; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 5px; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075)">
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ">
        <fieldset class=" nasa">
            <legend>Foto del dia de la nasa</legend>
            <p><b>Descripcion:</b> <?php echo $explicacion; ?></p>
            <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
            <img src="<?php echo $imagen; ?>" width="400px" />
            </fieldset>

        </form>
    </div>
</div>
</div>

</html>