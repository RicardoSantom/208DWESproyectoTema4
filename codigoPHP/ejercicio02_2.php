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
        <title>Ejercicio 02 PDO Tema4</title>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio 02.php</h2>
        </header>
        <main>
            <article>
                <h3>Enunciado: Mostrar el contenido de la tabla Departamento y el número de registros.</h3>
                <?php
                /**
                 * Ejercicio 02.pdo
                 * Mostrar el contenido de la tabla Departamento y el número de registros.
                 * @author Ricardo Santiago Tomé - RicardoSantom en Github <https://github.com/RicardoSantom>
                 * @version 1.0 PDO
                 * @since 08/11/2022
                 * Última modificación: 14/11/2022
                 */
                try {
                    require_once '../conf/configuracionDB.php';
                    // Construcción de conexión a base de datos como objeto pasándole los atributos anteriormente inicializados.
                    $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                    //Si todo a ido bien:
                    //Informo del éxito de la conexíón
                    echo 'Conexión establecida<br>';
                    //Variable string para creación de la consulta, solo contiene el query como texto.
                    $resultadoConsulta = $DAW208DBDepartamentos->query('select * from T02_Departamento');
                    //Mostrado del número de registros
                    printf("<h5>Número de registros: %s</h5><br>", $resultadoConsulta->rowCount());
                    //$registroObjeto es la variable en la que se pre-carga el resultado de la consulta
                    //muy útil para ejecutarla aquí como lectura anticpada del bucle while.
                    $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                    //Objeto dateTime con la fecha actual. Modificaré este valor en cada vuelta en el bucle 
                    //for each para mostrar los datos de cada fila.
                    $oFechaDevuelta = new DateTime();
                    //Mientras la fila cargada no sea null se ejecuta el bucle while
                    //Creación de la tabla para mostrar los datos
                    echo "<table><thead><tr><th>T02_CodDepartamento</th><th>T02_DescDepartamento</th><th>T02_FechaCreaciónDepartamento</th>"
                    . "<th>T02_VolumenNegocio</th><th>T02_FechaBajaDepartamento</th></tr></thead><tbody>";
                    while ($registroObjeto != null) {
                        echo "<tr>";
                        //Recorrido de la fila cargada
                        foreach ($registroObjeto as $clave => $valor) {
                            if ($clave == 'T02_FechaCreacionDepartamento') {
                                $oFechaDevuelta->setTimestamp($valor);
                                $fechaFormateada = $oFechaDevuelta->format('d-m-Y');
                                echo "<td>" . $fechaFormateada . "</td>";
                                //Conversión de timestamp a fecha para mostrar resultado en tabla y guardar el valor como entero en BD
                            } else {
                                echo "<td>$valor</td>";
                            }
                        }
                        echo "</tr>";
                        //Cargado de una nueva fila para que el bucle while pueda evaluar si
                        //se cumple la condición de permanencia o no.
                        $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                    }
                    echo "</tbody></table>";
                } catch (PDOException $excepcion) {
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