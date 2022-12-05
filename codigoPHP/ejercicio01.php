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
        <!-- Última actualización 04/12/2022 -->
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
                /**
                 * Ejercicio 01 .
                 * Conexión a la base de datos con la cuenta usuario y tratamiento de errores
                 * @author Ricardo Santiago Tomé - RicardoSantom en Github <https://github.com/RicardoSantom>
                 * @version 1.0 PDO
                 * @since 06/11/2022
                 * Última modificación: 04/12/2022
                 */
                /* Instrucción para Ubuntu server para instalar el driver de mysql.
                 * sudo apt install php8.1-mysql
                 */

                try {
                   require_once '../conf/configuracionDB.php';
                    $miDB = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                    //Listar los atributos que se van a mostrar
                    $aAtributos = [
                        "AUTOCOMMIT",
                        "ERRMODE",
                        "CASE",
                        "CLIENT_VERSION",
                        "CONNECTION_STATUS",
                        "ORACLE_NULLS",
                        "PERSISTENT",
                        "SERVER_INFO",
                        "SERVER_VERSION",
                            //los siguientes atributos dan error de compatibilidad de driver,
                            //"TIMEOUT",
                            //"PREFETCH"
                    ];
                    //Controlador mysql instalado
                    //echo "Atributo PDO::ATTR_DRIVER_NAME: ".$miDB->getAttribute(PDO::PDO::ATTR_DRIVER_NAME);
                    //Mostrado de lista de atributos.
                    echo '<table><caption>Listado de atributos de la conexion</caption><thead><tr><th>Identificador atributo</th><th>Valor</th></tr></thead><tbody>';
                    foreach ($aAtributos as $valor) {
                        echo '<tr>';
                        printf('<td>PDO::ATTR_%s</td>', $valor);
                        echo'<td>';
                        printf('%s', $miDB->getAttribute(constant("PDO::ATTR_$valor")));
                        echo '</td></tr>';
                    }
                    echo '</tbody></table>';
                    printf('%sLos atributos %s y %s dan error de compatibilidad de driver:%s', '<p>', 'TIMEOUT', 'PREFETCH', '</p>');
                    //Si todo a ido bien:
                    //Informo del éxito de la conexíón
                    echo "<p>Conexión establecida</p>";
                    //impresión de valores de los atributos (variables).
                    echo "<p>El atributo ATTR_ERRMODE tiene el valor por defecto: " . $miDB->getAttribute(PDO::ATTR_ERRMODE) . "</p>";
                    //Cambio atributo ATTR_ERRMODE por defecto. No es necesario, queda aquí para registrar como se hace
                    //El valor por defecto ya es este.
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    /* echo "Atributo ATTR_DRIVER_NAME: ".$miDB->getAttribute(PDO::ATTR_DRIVER_NAME);
                      echo '<br>';
                      echo "Atributo ATTR_ERRMODE después de cambiarlo: ".$miDB->getAttribute(PDO::ATTR_ERRMODE);
                      echo "<br>";
                      echo "Atributo ERRMODE_SILENT:".$miDB->getAttribute(PDO::ERRMODE_SILENT);
                      echo "<br>"; */
                } catch (PDOException $excepcion) {
                    //Si no ha funcionado, impresión de los errores ocurridos
                    echo '<h5>Se han encontrado los siguientes errores.</h5>';
                    echo 'Error: ' . $excepcion->getMessage();
                    echo'Código de error: ' . $excepcion->getCode();
                } finally {
                    //Haya ido todo bien o mal, acabo con un cerrado de la base de datos.
                    unset($miDB);
                }
                //A continuación,establezco conexión con datos erroneos para comprobar mensajes de errores.

                try {
                    ////Nótese que en esta ocasión no declaro ni inicializo variables con los valores para la
                    //conexión, le paso estos datos diréctamente como cadena al constructor de la nueva DB.
                    $miDB2 = new PDO('mysql:host=192.168.20.19;dbname=DAW208DBErrores', 'usuarioError', 'pasoErroneo');
                    //Si todo a ido bien (no va a ser el caso).
                    //Informo del éxito de la conexíón
                    echo "Conexión establecida";
                    foreach ($aAtributos as $valor) {
                        echo "PDO::ATTR_$valor";
                        echo $miDB->getAttribute(constant("PDO::ATTR_$valor")) . "/n";
                        echo "<br>";
                    }
                } catch (PDOException $excepcion) {
                    //Si no ha funcionado, impresión de los errores ocurridos
                    echo '<h5>Se han encontrado los siguientes errores.</h5>';
                    echo '<p>Este error se muestra porque se está estableciendo una <span style="color:red;">conexión erronea de prueba.</span></p>';
                    echo '<p>Error: ' . $excepcion->getMessage() . '</p>';
                    echo'<p>Código de error: ' . $excepcion->getCode() . '</p>';
                } finally {
                    //Cerrado base de datos.
                    unset($miDB2);
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