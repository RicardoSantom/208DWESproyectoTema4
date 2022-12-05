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
        <title>Ejercicio 04 Tema 4</title>
        <style>
            *{
                margin: 0 auto;
                padding: 0;
                box-sizing: border-box;
            }
            main{
                position:relative;
                margin-bottom: 1rem;
                width: 100%;
                min-height: 1100px;
            }
            .formBuscar{
                width: 80%;
                position: absolute;
                margin-top: 20px;
                margin-bottom: 20px;
                padding-bottom: 20px;
                left: 10px;
            }
            .formBuscar fieldset{
                position: absolute;
                height: 6rem;
                width: 44rem;
                background-color: #f4f1ed ;
                color: firebrick;
                border-color: darkgoldenrod;
                border: 9px groove (internal value);
                border-radius: 7px;
                top: 0;
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
            .formBuscar input{
                position: absolute;
                left: 5%;
                line-height: 1rem;
                top: 1rem;
            }
            .formBuscar p{
                font-size: 12px;
                width: 16rem;
                position: absolute;
                left: 18rem;
                padding-top: 20px;
            }
            legend{
                color: darkblue;
                font-weight: bold;
                text-align:right;
            }
            #botonBuscar{
                background-color: lightsteelblue;
                width: 6rem;
                height: 2rem;
                position:absolute;
                right: -75%;
            }
            td{
                width: 100%;
            }
            td:first-child{
                text-align: center;
                color: #00006A;
            }
            .tablaConsulta{
                position: absolute;
                margin-top: 8rem;
                width: 97%;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio 04.php</h2>
        </header>
        <main>
            <?php
            //Incluir fichero configuración conexión DB
            require_once '../conf/configuracionDB.php';
            //Incluir libreria de validacion
            require_once '../core/validacionFormularios.php';
            //Objeto dateTime con la fecha actual.
            $oFechaDevuelta = new DateTime();
            /*
             * La siguiente variable comprueba si se han producido errores o no,
             * la inicializo a true, este valor cambiará en caso de que haya errores.
             */
            $entradaOK = true;
            //El siguiente array inicia 4 campos, uno por cada columna de la tabla T02_Departamento.
            $aErrores = [
                'T02_DescDepartamento' => ''
            ];
            //y el array de respuestas con los mismos campos;
            $aRespuestas = [
                'T02_DescDepartamento' => null
            ];
            if (!empty($_REQUEST['Buscar'])) {
                //Validación del patrón introducido por el usuario.
                $aErrores['T02_DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T02_DescDepartamento'], 30, 0, 0);
                //Comprobar si algun campo del array de errores ha sido rellenado
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
                    } else {
                        //Asigno valor al array de respuestas con  el patrón introducido por el usuario.
                        $aRespuestas['T02_DescDepartamento'] = $_REQUEST['T02_DescDepartamento'];
                    }
                }
            } else {
                
            }
            ?>
            <form name = "ejercicio04" class = "formBuscar" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
                <fieldset id = "fieldsetBuscar">
                    <legend>Patrón a buscar en descripción departamento</legend>
                    <label for = "T02_DescDepartamento"></label>
                    <input type = "text" name = "T02_DescDepartamento" placeholder = "Máximo 30 caracteres" value = "<?php echo $_REQUEST['T02_DescDepartamento'] ?? '' ?>"/>
                    <p><?php echo '<span style="color: red;">' . $aErrores['T02_DescDepartamento'] . '</span>' ?>;
                    </p>
                    <input type = "submit" name = "Buscar" value = "Buscar" id = "botonBuscar"/>
                </fieldset>
            </form>
            <?php
            //Realizo la conexion
            try {
                //Hago la conexion con la base de datos
                $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                // Establezco el atributo para la aparicion de errores con ATTR_ERRMODE y le pongo que cuando haya un error se lance una excepcion con ERRMODE_EXCEPTION
                //Creacion de la consulta que pide los datos de los departamentos cuya descripción coincida
                //con el patrón introducido por el usuario.
                $consultaSQLDeSeleccion = $DAW208DBDepartamentos->query("SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%{$aRespuestas['T02_DescDepartamento']}%';");
                ?>

                <?php
                //Si la consulta devuelve algun registro muestro el resultado.
                if ($consultaSQLDeSeleccion->rowCount() > 0) {
                    printf("<h3>Número de registros coincidentes con el patrón: %s %s", $consultaSQLDeSeleccion->rowCount(), "</h3>");
                    ?>
                    <article>
                        <table class="tablaConsulta">
                            <thead>
                                <tr>
                                    <th>T02_CodDepartamento</th>
                                    <th>T02_DescDepartamento</th>
                                    <th>T02_FechaCreaciónDepartamento</th>
                                    <th>T02_VolumenNegocio</th>
                                    <th>T02_FechaBajaDepartamento</th>
                                </tr>
                            </thead>
                            <?php
                            //$registroObjeto es la variable en la que se pre-carga el resultado de la consulta
                            //muy útil para ejecutarla aquí como lectura anticipada del bucle while.
                            $registroObjeto = $consultaSQLDeSeleccion->fetch(PDO::FETCH_OBJ);
                            while ($registroObjeto != null) {
                                ?>
                                <tbody>
                                    <tr><?php
                                        //Recorrido de la fila cargada
                                        foreach ($registroObjeto as $clave => $valor) {
                                            if ($clave == 'T02_FechaCreacionDepartamento') {
                                                $oFechaDevuelta->setTimestamp($valor);
                                                $fechaFormateada = $oFechaDevuelta->format('d-m-Y');
                                                echo "<td>" . $fechaFormateada . "</td>";
                                                //Conversión de timestamp a fecha para mostrar resultado en tabla
                                                // y guardar el valor como entero en BD
                                            } else {
                                                echo "<td>$valor</td>";
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                    //Cargado de una nueva fila para que el bucle while pueda evaluar si
                                    //se cumple la condición de permanencia o no.
                                    $registroObjeto = $consultaSQLDeSeleccion->fetch(PDO::FETCH_OBJ);
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php } else {
                        ?>
                        <table class='tablaConsulta'>
                            <caption>No hay registros que coincidan con el patrón buscado.</caption>
                            <thead>
                                <tr>
                                    <th>T02_CodDepartamento</th>
                                    <th>T02_DescDepartamento</th>
                                    <th>T02_FechaCreaciónDepartamento</th>
                                    <th>T02_VolumenNegocio</th>
                                    <th>T02_FechaBajaDepartamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='color:transparent;'>''</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php }
                    ?>
                    <?php
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
            <a href="https://github.com/RicardoSantom" target="blank" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../indexProyectoTema4.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema4">Index Proyecto Tema4</a>
        </footer>
    </body>
</html>

