<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Iconos-->
    <link rel="shortcut icon" href="../webroot/img/palma.png" type="image/x-icon" />
    <!-- CSS -->
    <link rel="stylesheet" href="./webroot/css/boostrap.css" />
    <link rel="stylesheet" href="./webroot/css/style.css" />
    <!-- JS -->
    <script src="webroot\js\bootstrap.js"></script>
</head>

<body>
    <header>
        <ul>
            <li>
                <ul>
                    <li>
                        <form method="post" action="">
                            <button type="submit" name="spain" value="es" style="margin-right: 10px;" class="btnIdioma" tabindex="0">
                                ESPAÑOL
                            </button>
                            <button type="submit" name="english" value="en" class="btnIdioma" tabindex="0">
                                ENGLISH
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <li class="title">
                <a href="#">APPFINAL</a>
            </li>
            <li>
                <form method="post" action="index.php">
                    <button type="submit" name="login" class="btnLogin">
                        LOGIN
                        <svg version="1.1" viewBox="0 0 40 40" class="svg-icon svg-fill" style="width: 40px; height: 40px; padding-left: 0;">
                            <path pid="0" d="M28.627 27.761V28a.8.8 0 11-1.6 0v-.238c0-.3-.11-.577-.282-.707-1.559-1.182-3.924-1.833-6.66-1.833s-5.103.651-6.66 1.833c-.171.13-.283.407-.283.707V28a.8.8 0 11-1.598 0v-.238c0-.807.34-1.547.913-1.982 1.836-1.39 4.544-2.157 7.627-2.157 3.085 0 5.793.766 7.628 2.157.573.435.915 1.175.915 1.982M15.902 16.59a4.208 4.208 0 014.595-3.769 4.209 4.209 0 013.77 4.596 4.178 4.178 0 01-1.518 2.836 4.179 4.179 0 01-3.08.933 4.183 4.183 0 01-2.836-1.517 4.182 4.182 0 01-.931-3.079m3.61 6.188a5.81 5.81 0 006.345-5.204 5.762 5.762 0 00-1.287-4.25 5.768 5.768 0 00-3.916-2.095 5.755 5.755 0 00-4.25 1.288 5.764 5.764 0 00-2.095 3.916 5.761 5.761 0 001.288 4.25 5.758 5.758 0 003.915 2.095" _fill="#000" fill-rule="nonzero"></path>
                        </svg>
                    </button>
                </form>
            </li>

        </ul>
    </header>
    <main>
        <?php require_once $aVistas[$_SESSION['paginaEnCurso']]; ?>
    </main>
</body>
<footer class="d-flex flex-wrap justify-content-sm-between align-items-center my-2">
    <div class="col-md-5 d-flex align-items-center gap-3" style="margin-left: 45px; font-size: 0.84rem; text-transform: uppercase;">
        <a class="mb-3 mb-md-0 text-body-primary" style="padding-right: 15px;" href="https://europa.eu/europass/eportfolio/api/eprofile/shared-profile/%C3%A1lvaro+-cordero+mi%C3%B1ambres/321e79ba-b041-4a91-85a0-77f730100e49?view=html" target="_blank">CURRICULUM</a>
        <a class="mb-3 mb-md-0 text-body-primary" style="padding-right: 15px;" href="https://www.bershka.com/es/h-man.html" target="_blank">IMITACION</a>
        <a class="mb-3 mb-md-0 text-body-secondary" style="padding-right: 15px;" href="\206DWESAplicacionFinal\doc\230129DiagramaDeCasosDeUso.pdf" target="_blank">Uso</a>
        <a class="mb-3 mb-md-0 text-body-secondary" href="\206DWESAplicacionFinal\doc\230129CatalogoDeRequisitos.pdf" target="_blank">Requisitos<a>
        <a class="mb-3 mb-md-0 text-body-secondary" href="\206DWESAplicacionFinal\doc\ModeloFisicoDeDatos.pdf" target="_blank">Datos<a>
        <a class="mb-3 mb-md-0 text-body-secondary" href="\206DWESAplicacionFinal\doc\230129EstandarDesarrolloDAWyEstructuraAlmacenamientoDWES.pdf" target="_blank">Almacenamiento<a>
        <a class="mb-3 mb-md-0 text-body-secondary" href="\206DWESAplicacionFinal\doc\220111UsoDeLaSessionParaLaAplicación.pdf" target="_blank">Sesion<a>
        <a class="mb-3 mb-md-0 text-body-secondary" href="\206DWESAplicacionFinal\doc\index.html" target="_blank">PhpDoc<a>
        <a class="mb-3 mb-md-0 text-body-secondary" href="\206DWESAplicacionFinal\doc\RSS.xml" target="_blank">RSS<a>

    </div>
    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex" style="margin-right: 45px;">
        <li class="ms-3">
            <a class="text-body-secondary" href="../../index.html">©Alvaro Cordero</a>
        </li>
        <li class="ms-3">
            <a class="text-body-secondary" href="https://github.com/alvarocormi/206DWESAplicacionFinal" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#737373" class="bi bi-github" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                </svg>
            </a>
        </li>
        <li class="ms-3">
            <a class="text-body-secondary" href="https://www.linkedin.com/in/%C3%A1lvaro-cordero-mi%C3%B1ambres-2a1893233/" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#737373" class="bi bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                </svg>
            </a>
        </li>
    </ul>
</footer>


</html>