<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="../webroot/css/estilosPlantilla.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Tratamiento.php</title>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 3</h1>
            <h2>Tratamiento.php</h2>
            <h3>Enunciado: Construir formulario para recoger una cuestionario realizado a una persona<br>
                y enviarlo a una página Tratamiento.php para que muestre las preguntas y las respuestas recogidas</h3>
        </header>
        <p style="margin: 6em 6em"><?php
            $inputNombreApellidosUsuario = $_REQUEST['nombreApellidosUsuario'];
            $inputPesoUsuario = $_REQUEST['pesoUsuario'];
            $floatPesoUsuario = floatval($inputPesoUsuario);
            print_r("Nombre: $inputNombreApellidosUsuario<br>");
            print_r("Su peso es: " . number_format($floatPesoUsuario, 3, '.', '') . " gramos");
            ?></p>
        <footer>
            <p>2022-23  IES LOS SAUCES. Ricardo Santiago Tomé © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom" target="blank"  class="enlaces" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">&#xE87C;</span></a>
            <a href="../../../index.html" id="enlaceprincipal" title="Enlace a Index Principal">Página principal</a>
        </footer>
    </body>
</html>
