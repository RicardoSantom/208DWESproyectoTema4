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
        <title>Ejercicio 02 MySQLI</title>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio 02MySQLI.php</h2>
        </header>
        <main>
            <article>
                <h3>Enunciado: Mostrar el contenido de la tabla Departamento y el número de registros.</h3>
                <?php
                //Inclusión de fichero conexión base de datos
                require_once '../conf/configuracionDBMySQLI.php';
                /* Para tratamiento de errores en atributo PDO::ATTR_ERRMODE le establezco que lance una PDOException
                 * con PDO::ERRMODE_EXCEPTION).
                 */
                try {
                    // Construcción de base de datos como objeto pasándole los atributos anteriormente inicializados.
                    $miDB = new mysqli();
                    $miDB->connect(EQUIPO, USUARIO, PASSWORD, BASEDEDATOS);
                    //Si todo a ido bien:
                    //Informo del éxito de la conexíón
                    echo "Conexión establecida";
                    //Creación de la consulta que contiene el query a ejecutar en lenguaje sql.
                    $consultaSQLDeSeleccion = $miDB->query("select * from T02_Departamento");
                    //Carga de una fila (de manera anticipada) sobre la variable "registroObjeto"
                    $registroObjeto = $consultaSQLDeSeleccion->fetch_object();
                    //Mostrado del número de registros
                    printf("<h5>Número de registros: %s</h5><br>", $consultaSQLDeSeleccion->num_rows);
                    //Creación de la tabla para mostrar los datos
                    echo "<table><thead><tr><th>T02_CodDepartamento</th><th>T02_DescDepartamento</th><th>T02_FechaCreacionDepartamento</th>"
                    . "<th>T02_VolumenNegocio</th><th>T02_FechaBajaDepartamento</th></thead>";
                    //Bucle para ir cargando cada fila
                    while ($registroObjeto != null) {
                        echo "<tr>";
                        //variable para devolver timestamp en formato fecha
                        $oFechaTimesTamp = new DateTime();
                        //Guardo en ella el timestamp que devuelve el objeto en su iteración gracias a fetch_object()
                        $oFechaTimesTamp->setTimestamp($registroObjeto->T02_FechaCreacionDepartamento);
                        //Y lo guardo en una variable de tipo cadena par poder mostrarlo.
                        $sFechaFormateada=$oFechaTimesTamp->format('d/m/Y H:i:s T');
                        //Recorrido de la fila cargada
                        foreach ($registroObjeto as $clave => $valor) {
                            if ($valor != null) {
                                if ($clave == 'T02_FechaCreacionDepartamento') {
                                    echo "<td>$sFechaFormateada</td>";
                                } else {
                                    echo "<td>$valor</td>";
                                }
                            } else {
                                echo"<td>null</td>";
                            }
                        }
                        echo "</tr>";
                        //Carga de una nueva fila al final del bucle
                        $registroObjeto = $consultaSQLDeSeleccion->fetch_object();
                    }
                    echo "<table>";
                } catch (mysqli_sql_exceptionn $excepcion) {
                    //Si no ha funcionado, impresión de los errores ocurridos
                    echo 'Error: ' . $excepcion->getMessage();
                } finally {
                    //Haya ido todo bien o mal, acabo con un cerrado de la base de datos.
                    $miDB->close();
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