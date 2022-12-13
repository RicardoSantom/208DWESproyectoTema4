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
        <title>Ejecutar script creación tabla</title>
    </head>
    <body>
        <header>
            <h1>Creación DB Tema 4</h1>
            <h2>Ejecutar script creación tabla T02_Departamentos</h2>
        </header>
        <main>
            <article>
                <h3>Creación de tablas en DB DAW208DBDepartamentos</h3>
                <?php
                //Requerimiento de archivo con constantes para la conexión a base de datos.
                require_once '../conf/configuracionDB.php';
                try {
                    // Construcción conexión a base de datos como objeto pasándole las constantes predefinidas.
                    $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                    $sConsultaSqlCreacion = $DAW208DBDepartamentos->prepare(<<<CREACION
                            CREATE TABLE IF NOT EXISTS T02_Departamento(T02_CodDepartamento char(3) primary key,
                                T02_DescDepartamento varchar(255) not null, 
                                T02_FechaCreacionDepartamento int not null,
                                T02_VolumenNegocio float not null,
                                T02_FechaBajaDepartamento int null
                                )engine=Innodb;
                            CREACION);
                    //Comienzo de la transaccion.
                    $DAW208DBDepartamentos->beginTransaction();
                    //Si la ejecución no da error, hace commit del query de inserción.
                    $DAW208DBDepartamentos->commit();
                    $sConsultaSqlCreacion->execute(); //Ejecuto la consulta
                    if ($sConsultaSqlCreacion) {
                        echo "<h3>Creacion ejecutada con exito</<h3>";
                        $resultadoDepartamentos = $miDB->query("select * from T02_Departamento");
                    }
                } catch (PDOException $excepcion) { //Código que se ejecutará si se produce alguna excepción
                    ////Si se detecta aunque solo se aun error, vuelve al estado anterior al beginTransaction.
                    $DAW208DBDepartamentos->rollBack();
                    //Almacenamos el código del error de la excepción en la variable $errorExcepcion
                    $errorExcep = $excepcion->getCode();
                    //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
                    $mensajeExcep = $excepcion->getMessage();

                    echo "<span style='color: red;'>Error: </span>" . $mensajeExcep . "<br>"; //Mostramos el mensaje de la excepción
                    echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
                } finally {
                    // Cierre de la conexión.
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