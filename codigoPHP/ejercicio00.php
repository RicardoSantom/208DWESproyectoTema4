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
        <title>Ejercicio 01 PDO Tema4</title>
        <!-- Última actualización 13/11/2022 -->
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio 01.php</h2>
        </header>
        <main>
            <article>
                <h3>Enunciado: Conexión a la base de datos con la cuenta usuario y tratamiento de errores</h3>
                <?php
                $host_name = 'db5010845912.hosting-data.io';
                $database = 'dbs9174079';
                $user_name = 'dbu1353928';
                $password = 'daw2_Sauces';
                $dbh = null;
                try {
                    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
                } catch (PDOException $e) {
                    echo "Error!:" . $e->getMessage() . "<br/>";
                    die();
                }
                ?>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="../../../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom" target="blank" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../indexProyectoTema4.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema4">Index Proyecto Tema4</a>
        </footer>
    </body>
</html>
<?php
$host_name = 'db5010845754.hosting-data.io';
$database = 'dbs9173955';
$user_name = 'dbu2895102';
$password = '<Introduzca aquí su contraseña.>';
$dbh = null;
try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
    echo "Error!:" . $e->getMessage() . "<br/>";
    die();
}
?>
