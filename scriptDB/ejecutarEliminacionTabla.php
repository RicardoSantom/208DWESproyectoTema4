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
        <title>Ejecutar script eliminacion tabla</title>
    </head>
    <body>
        <header>
            <h1>Eliminacion tabla T02_DEpartamentos Tema 4</h1>
            <h2>Ejecutar script eliminacion tabla</h2>
        </header>
        <main>
            <article>
                <h3>eliminación de tablas en DB DAW208DBDepartamentos</h3>
                <?php
                try {
                    //Requerimiento de archivo con constantes para la conexión a base de datos.
                    require_once '../conf/configuracionDB.php';
                    // Construcción conexión a base de datos como objeto pasándole las constantes predefinidas.
                    $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                    //consulta de inserción
                    $sConsultaSqlEliminacion = <<<ELIMINACION
                             drop table if exists T02_Departamento;
                            ELIMINACION;
                    //Comienzo de la transaccion.
                    $DAW208DBDepartamentos->beginTransaction();
                    //Ejecución consulta de creación.
                    $DAW208DBDepartamentos->exec($sConsultaSqlEliminacion);
                    //Si la ejecución no da error, hace commit del query de inserción.
                    $DAW208DBDepartamentos->commit();
                     echo "<h3>Insercion ejecutada con exito</<h3>";
                    $resultadoDepartamentos = $miDB->query("select * from T02_Departamento");
                } catch (PDOException $excepcion) {
                    //Si se detecta aunque solo se aun error, vuelve al estado anterior al beginTransaction.
                    $DAW208DBDepartamentos->rollBack();
                    //Si no ha funcionado, impresión de los errores ocurridos
                    echo 'Error: ' . $excepcion->getMessage();
                    echo'Código de error: ' . $excepcion->getCode();
                } finally {
                    //Haya ido todo bien o mal, acabo con un cerrado de la base de datos.
                    unset($DAW208DBDepartamentos);
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