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
        <title>Ejecutar script insercion datos en tabla DAW208DBDepartamento</title>
    </head>
    <body>
        <header>
            <h1>Eliminacion tabla T02_DEpartamentos Tema 4</h1>
            <h2>Ejecutar script insercion datos en tabla</h2>
        </header>
        <main>
            <article>
                <h3>Inserción de datos en tabla T02_Departamentos DAW208DBDepartamentos</h3>
                <?php
                //Requerimiento de archivo con constantes para la conexión a base de datos.
                require_once '../conf/configuracionDB.php';
                try {
                    // Construcción conexión a base de datos como objeto pasándole las constantes predefinidas.
                    $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                    //Comienzo de la transaccion.
                    $DAW208DBDepartamentos->beginTransaction();
                    //consulta de inserción
                    $sConsultaSqlInsercion = $DAW208DBDepartamentos->prepare(<<<INSERCION
                            insert into T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenNegocio) 
                            values("DAW","Despliegue Aplcaciones Web",1668384061,2000),
                            ("DWC","Desarrollo Web Entorno Cliente",1668384061,1000),
                            ("DWS","Desarrollo Web Entorno Servidor",1668384061,3000),
                            ("DIW","Diseño Interfaces Web",1668384061,4000),
                            ("EIE","Empresa e Iniciativa Emprendedora",1668384061,2);
                            INSERCION);
                    //Ejecución consulta de creación.
                    $sConsultaSqlInsercion->execute();
                    //Si la ejecución no da error, hace commit del query de inserción.
                    $DAW208DBDepartamentos->commit();
                    echo "<h3>Insercion ejecutada con exito</<h3>";
                    $DAW208DBDepartamentos = $miDB->query("select * from T02_Departamento");
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
            <a href="https://github.com/RicardoSantom/208DWESproyectoTema4" target="blank" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../indexProyectoTema4.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema4">Index Proyecto Tema4</a>
        </footer>
    </body>
</html>