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
        <title>Ejercicio 01 MySQLI</title>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio 01MySQLI.php</h2>
        </header>
        <main>
            <article>
                <h3>Enunciado:  Conexión a la base de datos con la cuenta usuario y tratamiento de errores</h3>
                <?php
                /**
                 * Ejercicio 01 MySQLi.
                 * Conexión a la base de datos con la cuenta usuario y tratamiento de errores
                 * @author Ricardo Santiago Tomé - RicardoSantom en Github https://github.com/RicardoSantom
                 * @version 1.0
                 * @since 09/11/2022
                 * Última modificación: 10/11/2022
                 */
                //Inclusión de fichero conexión base de datos
                require_once '../conf/configuracionDBMySQLI.php';
                //Establecimiento de la conexión
                try {
                    $miDB = new mysqli();
                    $miDB->connect(EQUIPO, USUARIO, PASSWORD, BASEDEDATOS);
                    //Si todo a ido bien:
                    //Informo del éxito de la conexíón
                    echo"<h5>Conexión principal establecida con éxito</h5>";
                } catch (mysqli_sql_exception $excepcionMysqli) {
                    echo $excepcionMysqli->getMessage();
                } finally {
                    //Imprescindible cerrar la conexión al finalizar.
                    $miDB->close();
                }
                //A continuación,establezco conexión con datos erroneos para comprobar mensajes de errores.    
                //En esta ocasión inserto los valores diréctamente.
                
                    
                try {
                    $miDB2 = new mysqli(EQUIPO, USUARIO, 'passwordErroneo', BASEDEDATOS);
                } catch (mysqli_sql_exception $excepcionMysqli) {
                    echo"<h5>Mensaje de error de la conexión erronea de prueba</h5>";
                    echo $excepcionMysqli->getMessage();
                } finally {
                    //Imprescindible cerrar la conexión al finalizar.
                    //$miDB2->close();
                    //Pero no la cierro porque no existe.
                }
                ?>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="../../../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom/208DWESproyectoTema4" target="blank" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../indexProyectoTema4.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema4">Index Proyecto Tema4</a>
        </footer>
    </body>
</html>