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
        <title>Ejercicio fundacional</title>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio fundacional.php</h2>
        </header>
        <main>
            <article>
                <h3>Enunciado: Enunciado: Conexión a la base de datos con la cuenta usuario</h3>
                <?php
//Tragen Sie hier Ihre Datenbankinformationen ein und den Namen der Backup-Datei
                $mysqlDatabaseName = 'dbs9174079';
                $mysqlUserName = 'dbu1353928';
                $mysqlPassword = 'daw2_Sauces';
                $mysqlHostName = 'db5010845912.hosting-data.io';
                $mysqlImportFilename = 'CreaDAW1.sql';

//Por favor, no haga ningún cambio en los siguientes puntos
//Importación de la base de datos y salida del status
                $command = 'mysql -h' . $mysqlHostName . ' -u' . $mysqlUserName . ' --password="' . $mysqlPassword . '" ' . $mysqlDatabaseName . ' < ' . $mysqlImportFilename;
                exec($command, $output, $worked);
                switch ($worked) {
                    case 0:
                        echo 'Los datos del archivo <b>' . $mysqlImportFilename . '</b> se han importado correctamente a la base de datos <b>' . $mysqlDatabaseName . '</b>';
                        break;
                    case 1:
                        echo 'Se ha producido un error durante la importación. Por favor, compruebe si el archivo está en la misma carpeta que este script. Compruebe también los siguientes datos de nuevo: <br/><br/><table><tr><td>Nombre de la base de datos MySQL:</td><td><b>' . $mysqlDatabaseName . '</b></td></tr><tr><td>Nombre de usuario MySQL:</td><td><b>' . $mysqlUserName . '</b></td></tr><tr><td>Contraseña MySQL:</td><td><b>NOTSHOWN</b></td></tr><tr><td>Nombre de host MySQL:</td><td><b>' . $mysqlHostName . '</b></td></tr><tr><td>Nombre de archivo de la importación de MySQL:</td><td><b>' . $mysqlImportFilename . '</b></td></tr></table>';
                        break;
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
            <a href="../indexProyectoTema3.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema3">Index Proyecto Tema3</a>
        </footer>
    </body>
</html>