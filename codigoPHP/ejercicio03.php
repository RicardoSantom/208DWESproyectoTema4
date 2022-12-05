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
        <title>Ejercicio 03 PDO Tema4</title>
        <style>
            *{
                margin: 0 auto;
                padding: 0;
                box-sizing: border-box;
            }
            main{
                position:relative;
                margin-bottom: 1rem;
            }
            form{
                width: 50%;
            }
            fieldset{
                position: relative;
                height: 5.20rem;
                background-color: #f4f1ed ;
                color: firebrick;
                border-color: darkgoldenrod;
                border: 9px groove (internal value);
                border-radius: 7px;
            }
            #obligatorio,#opcional{
                width: 35.1%;
                position: relative;
                height: 25rem;
                padding: 0.5rem ;
                margin: 0 auto 1rem auto;
                display: inline-block;
                left: 14.75%;
            }
            #obligatorio input{
                background-color: #ccffcc;
            }
            #opcional input{
                background-color: #ff9999;
            }
            input{
                position: absolute;
                left: 10%;
                line-height: 1.25rem;
                top: 1rem;
            }
            textarea{
                position: absolute;
                left: 10%;
                max-height: 50px;
                max-width: 400px;
            }
            form p{
                display: inline-flex;
                font-size: 12px;
                width: 12rem;
                position: absolute;
                right: 0;
            }
            #divMostrarDatos{
                padding-top: 3em;
            }
            legend{
                color: darkblue;
                font-weight: bold;
                text-align:right;
            }
            #botones{
                background-color: #CCB3AF;
                position: absolute;
                width: 50%;
                left: 25%;
                margin-top: 0.5rem;
            }
            #botonEnviar,#botonReset{
                width:150px;
                height:50px;
                margin: 1em 1em 1em 0;
            }
            #botonEnviar{
                background-color:lightgreen;
                position: absolute;
                left: 42.5%;
                margin: 0 auto;
            }
            #botonReset{
                background-color:red;
            }
            .fieldsetInternos{
                background-color: #f6f7f8;
            }
            td{
                width: 50%;
            }
            td:first-child{
                text-align: center;
                color: #00006A;
            }

        </style>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio 03.php</h2>
        </header>
        <main>
            <article>
                <h3>Alta de departamento</h3>
                <?php
                //Incluir libreria de validacion
                require_once '../core/validacionFormularios.php';
                //Declaración de constantes e inicialización con los valores correctos para ubuntu server casa
                define('DSN', 'mysql:host=192.168.20.19;dbname=DAW208DBDepartamentos');
                define('NOMBREUSUARIO', 'usuarioDAW208DBDepartamentos');
                define('PASSWORD', 'paso');
                /*
                 * La siguiente variable comprueba si se han producido errores o no,
                 * la inicializo a true, este valor cambiará en caso de que haya errores.
                 */
                $entradaOK = true;
                //El siguiente array inicia 4 campos, uno por cada columna de la tabla T02_Departamento.
                $aErrores = [
                    'T02_CodDepartamento' => '',
                    'T02_DescDepartamento' => '',
                    'T02_FechaCreacionDepartamento' => '',
                    'T02_VolumenNegocio' => '',
                    'T02_FechaBajaDepartamento' => null
                ];
                //y el array de respuestas con los mismos campos;
                $aRespuestas = [
                    'T02_CodDepartamento' => null,
                    'T02_DescDepartamento' => null,
                    'T02_FechaCreacionDepartamento' => null,
                    'T02_VolumenNegocio' => null,
                    'T02_FechaBajaDepartamento' => null
                ];
                /*
                 * En el siguiente bloque de código. se comprueba si se ha pulsado el botón Enviar.
                 * Esta comprobación la realiza viendo si el contenido de $_REQUEST (variable global
                 * donde queda guardado el contenido del botón enviar) está vacío o no. Si no está vacío
                 * rellena con el valor del input rellenado por el usuario.
                 */
                if (!empty($_REQUEST['Enviar'])) {
                    //Validación del codigo de departamento introducido por el usuario.
                    $aErrores['T02_CodDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T02_CodDepartamento'], 3, 1, 1);
                    /*
                     * A continuación, mediante un condicional if compruebo si el código introducido es nulo o no.
                     * Si es Nulo mostraré el array de errores, si es válido, intentaré la conexión.
                     */
                    if ($aErrores['T02_CodDepartamento'] == null) {
                        /*
                         * Si estamos aquí es que no ha sido nulo, es decir, el código es válido y en consecuencia
                         *  podemos intentar la conexión con la base de datos en el siguiente bloque de código dentro del try.
                         */
                        try {
                            /*
                             * Declaración de variables e inicialización con los valores correctos 
                             * para entorno de desarrollo virtualizado Ubuntu server en clase.
                             * define('DSN', 'mysql:host=192.168.3.207;dbname=DAW208DBDepartamentos');
                             * define('NOMBREUSUARIO', 'usuarioDAW208DBDepartamentos');
                             * define('PASSWORD', 'paso');
                             */
                            /*
                             * Declaración de variables e inicialización con los valores correctos 
                             * para entorno de desarrollo virtualizado Ubuntu server en casa.
                             * define('DSN', 'mysql:host=192.168.1.77;dbname=DAW208DBDepartamentos');
                             * define('NOMBREUSUARIO', 'usuarioDAW208DBDepartamentos');
                             * define('PASSWORD', 'paso');
                             */
                            // Construcción conexión a base de datos como objeto pasándole las constantes predefinidas.
                            $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                            //$consultaSqlCodigo guarda la ejecución del query sobre la base de datos.
                            $consultaSqlCodigo = $DAW208DBDepartamentos->query("SELECT T02_CodDepartamento  FROM T02_Departamento WHERE T02_CodDepartamento='{$_REQUEST['T02_CodDepartamento']}'");
                            /*
                             * Dejo comentada la consulta preparada y posteriormente ejecutada.
                             * /
                             * //Preparación de la consulta. 
                              $resultadoConsulta = $DAW208DBDepartamentos->prepare($sConsulta);
                              //Ejecución de la consulta
                              $resultadoConsulta->execute(); */

                            /*
                             * Compruebo si el valor que devuelve la consulta es mayor que 0, si es mayor que 0, el codigo de departamento ya existe
                             * en nuestra tabla, por lo tanto, no se puede introducir de nuevo este departamento.
                             */
                            if ($consultaSqlCodigo->rowCount() > 0) {
                                //Registro del error en el array de errores junto con mensaje a mostrar.
                                $aErrores['T02_CodDepartamento'] = "El codigo de departamento introducido ya existe.";
                            }
                        } catch (PDOException $excepcion) {
                            /*
                             * Si no ha funcionado, impresión de los errores ocurridos
                             */
                            //Primero el codigo de error correspondiente, que guardo en la variable $codigoErrorException
                            $codigoErrorExcepcion = $excepcion->getCode();
                            //Y a continuación el mensaje. Lo guardo enla variable &mensajeErrorException
                            $mensajeErrorException = $excepcion->getMessage();
                            //Muestro las variables guardadas con su código y mensaje correspondiente.
                            printf("<p>Código de error:<span style='color: red'> %s %s", $codigoErrorException, "</span></p>");
                            printf("<p>Descripción error:<span style='color: red'> %s %s", $mensajeErrorException, "</span></p>");
                        } finally {
                            //Haya ido todo bien o mal, acabo con un cerrado de la base de datos.
                            unset($DAW208DBDepartamentos);
                        }
                        /*
                         * En las línea anteriores se ha cerrado el bloque de código try-catch-finnally que comprueba si el usuario
                         * ha enviado el formulario, a continuación comprueba si los valores introducidos para el código del usuario se ajustan
                         * a los parámetros especificados y en caso de si ajustarse, es decir el contenido del array de errores para este campo es nulo;
                         * intenta la conexión con la base de datos, lanza la consulta de selección para comprobar que el valor pasado por el usuario
                         * como código no 
                         * 
                         */
                    }
                    //El campoT02_CodDepartamento ya ha sido comprobado en el try anterior; compruebo a continuacion el resto de campos.
                    //Comprobar si el campo T02_DescDepartamento se ajusta a tamaños máximo y mínimo y si son carácteres alfabéticos.
                    $aErrores['T02_DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T02_DescDepartamento'], 255, 0, 1);
                    //Comprobar si el campo T02_FechaCreacionDepartamento es un entero y si su valor se comprende entre el valor máximo de un entero de 32 bit y 1.
                    $aErrores['T02_FechaCreacionDepartamento'] = validacionFormularios::validarFecha($_REQUEST['T02_FechaCreacionDepartamento'], '01/01/2200', '01/01/1900', 1);
                    //Comprobar si T02_VolumenNegocio es un float
                    $aErrores['T02_VolumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['T02_VolumenNegocio'], 100000, 0, 1);
                    /*
                     * La tabla tiene un campo más(T02_FechaBajaDepartamento) que no será incluido en el inserto de datos
                     * pues no recibirá valor hasta que sea dado de baja el departamento y aquí lo estoy creando.
                     */
                    //Comprobar si algun campo del array de errores ha sido rellenado recorriendo el array con un bucle for each
                    foreach ($aErrores as $clave => $error) {
                        /* Con condicional if compruebo si el elemento $error en algún punto de la iteración ha tenido valor,
                         * o lo que es lo mismo, si en algún momento su valor ha sido diferente de null que era el valor
                         * que tenía por defecto; de ser que si tiene contenido en algún momento, es que ha detectado al menos
                         * un error y entrará dentro del condicional if.
                         * 
                         */
                        if ($error != null) {
                            /*
                             * En caso de error, limpio el campo dándole el valor de cadena vacía.
                             */
                            $_REQUEST[$clave] = '';
                            /*
                             * La entrada ya es erronea, por lo tanto, el booleano $entradaOK toma el valor de false;
                             */
                            $entradaOK = false;
                        }
                    }
                    /*
                     * El siguiente else es la alternativa al if que evalua si el usuario ha presionado el botón enviar.
                     * Si no lo ha enviado, pone el booleando $entradaOK a false.
                     */
                } else {
                    $entradaOK = false;
                }
                /*
                 * Si el booleano $entradaOK no ha cambiado de valor desde su valor inicial a true es que no ha habido errores,
                 * que el usuario ha presionado el botón enviar y por tanto, podremos pasar los valores de los input del form
                 * al array de respuestas.
                 */
                if ($entradaOK) {
                    //Asigno valor al array de respuestas con cada uno de los valores pasado por el usuario.
                    $aRespuestas['T02_CodDepartamento'] = $_REQUEST['T02_CodDepartamento'];
                    $aRespuestas['T02_DescDepartamento'] = $_REQUEST['T02_DescDepartamento'];
                    $aRespuestas['T02_FechaCreacionDepartamento'] = $_REQUEST['T02_FechaCreacionDepartamento'];
                    $aRespuestas['T02_VolumenNegocio'] = $_REQUEST['T02_VolumenNegocio'];
                    //Creación de objeto DateTime con valor del input T02_FechaCreacionDepartamento
                    $oFechaCreacionDepartamento = new DateTime($aRespuestas['T02_FechaCreacionDepartamento'], new DateTimeZone("Europe/Madrid"));
                    //Guardando en variable de tipo entero el valor timestamp de la fecha anterior
                    $enteroFechaInsertada = date_timestamp_get($oFechaCreacionDepartamento);
                    echo "<table><tbody><caption>Tabla de datos</caption><tr>";
                    foreach ($aRespuestas as $clave => $valor) {
                        printf('<td>%s</td><td>%s %s', $clave, $valor, '</td>');
                        echo "</tr>";
                    }
                    echo "</tbody></table>";

                    try {
                        //Nueva conexion con la base de datos
                        $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                        //consulta de inserción
                        $consultaSqlInsercion = <<<CONSULTA
                            INSERT INTO T02_Departamento(T02_CodDepartamento,
                                T02_DescDepartamento,
                                T02_FechaCreacionDepartamento,
                                T02_VolumenNegocio) 
                             VALUES 
                                (:T02_CodDepartamento,
                                :T02_DescDepartamento,
                                :T02_FechaCreacionDepartamento,
                                :T02_VolumenNegocio);
                            CONSULTA;
                        //bindeo de parámetros
                        $ejecutarInsercion = $DAW208DBDepartamentos->prepare($consultaSqlInsercion);
                        $ejecutarInsercion->bindParam(':T02_CodDepartamento', $aRespuestas['T02_CodDepartamento']);
                        $ejecutarInsercion->bindParam(':T02_DescDepartamento', $aRespuestas['T02_DescDepartamento']);
                        $ejecutarInsercion->bindParam(':T02_FechaCreacionDepartamento', $enteroFechaInsertada);
                        $ejecutarInsercion->bindParam(':T02_VolumenNegocio', $aRespuestas['T02_VolumenNegocio']);
                        $ejecutarInsercion->execute();
                        // Para visualizar si los datos han sido corréctamente introducidos,los muestro
                        $consultaSQLDeSeleccion = $DAW208DBDepartamentos->query('select * from T02_Departamento');
                        //Mostrado del número de registros
                        printf("<h5>Número de registros: %s</h5><br>", $consultaSQLDeSeleccion->rowCount());
                        //$registroObjeto es la variable en la que se pre-carga el resultado de la consulta
                        //muy útil para ejecutarla aquí como lectura anticipada del bucle while.
                        $registroObjeto = $consultaSQLDeSeleccion->fetch(PDO::FETCH_OBJ);
                        //Objeto dateTime con la fecha actual. Modificaré este valor en cada vuelta en el bucle 
                        //for each para mostrar los datos de cada fila.
                        $oFechaDevuelta = new DateTime();
                        //Mientras la fila cargada no sea null se ejecuta el bucle while
                        //Creación de la tabla para mostrar los datos
                        echo "<table><thead><tr><th>T02_CodDepartamento</th><th>T02_DescDepartamento</th>"
                        . "<th>T02_FechaCreaciónDepartamento</th><th>VolumenNegocio</th><th>T02_FechaBajaDepartamento</th></tr></thead><tbody>";
                        while ($registroObjeto != null) {
                            echo "<tr>";
                            //Recorrido de la fila cargada
                            foreach ($registroObjeto as $clave => $valor) {
                                if ($clave == 'T02_FechaCreacionDepartamento') {
                                    $oFechaDevuelta->setTimestamp($valor);
                                    $fechaFormateada = $oFechaDevuelta->format('Y-m-d H:i:s');
                                    echo "<td>" . $fechaFormateada . "</td>";
                                    //Conversión de timestamp a fecha para mostrar resultado en tabla y guardar el valor como entero en BD
                                } else {

                                    echo "<td>$valor</td>";
                                }
                            }
                            echo "</tr>";
                            //Cargado de una nueva fila para que el bucle while pueda evaluar si
                            //se cumple la condición de permanencia o no.
                            $registroObjeto = $consultaSQLDeSeleccion->fetch(PDO::FETCH_OBJ);
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
                } else {
                    /*
                     * Si ha la variable entradaOK está a false, se ejecutará este else para mostrar el formulario
                     * y que el usuario pueda intentar ingresar los campos correctamente.
                     */
                    ?>
                    <form name="ejercicio03" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <h3>Formulario para creación de nuevo departamento</h3>
                        <fieldset id="primerFieldset">
                            <legend>Código</legend>
                            <label for="T02_CodDepartamento"></label>
                            <input type="text" id="T02_CodDepartamento" name="T02_CodDepartamento" placeholder="3 caracteres" value="<?php echo $_REQUEST['T02_CodDepartamento'] ?? '' ?>">
                            <p><?php echo '<span style="color: red;">' . $aErrores['T02_CodDepartamento'] . '</span>'; ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Descripción</legend>
                            <label for="T02_DescDepartamento"></label>
                            <textarea wrap="soft" name = "T02_DescDepartamento" placeholder="Máximo 255 caracteres" cols="50" rows="3" value = "<?php echo $_REQUEST['T02_DescDepartamento'] ?? '' ?>"></textarea>
                            <p><?php echo '<span style="color: red;">' . $aErrores['T02_DescDepartamento'] . '</span>'; ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Fecha creación</legend>
                            <label for="T02_FechaCreacionDepartamento"></label>
                            <input type = "datetime"  name = "T02_FechaCreacionDepartamento" value = "<?php echo $_REQUEST['T02_FechaCreacionDepartamento'] ?? '' ?>"/>    
                            <p><?php echo '<span style="color: red;">' . $aErrores['T02_FechaCreacionDepartamento'] . '</span>'; ?></p>
                        </fieldset>
                        <fieldset>
                            <legend>Volumen de negocio</legend>
                            <label for="T02_VolumenNegocio"></label>
                            <input type = "text"  name = "T02_VolumenNegocio" value = "<?php echo $_REQUEST['T02_VolumenNegocio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['T02_VolumenNegocio'] . '</span>'; ?></p>
                        </fieldset>
                        <fieldset id="botones">
                            <div  id="botonEnviarBotonReset">
                                <input type="submit" name="Enviar" value="Enviar" id="botonEnviar"/>
                            </div>
                        </fieldset>
                    </form>
                    <?php } ?>
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