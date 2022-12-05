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
        <title>Ejercicio 06 Tema 4</title>
    </head>
    <body>
        <header>
            <h1>Ejercicios Proyecto Tema 4</h1>
            <h2>Ejercicio 06.php</h2>
        </header>
        <main>
            <article>
                <h3>Enunciado: Pagina web que cargue registros en la tabla Departamento desde un array departamentos nuevos
                            utilizando una consulta preparada.</h3>
                <?php
                //Requerimiento de archivo con constantes para la conexión a base de datos.
                require_once '../conf/configuracionDB.php';
                //Objeto dateTime con la fecha actual.
                $oFechaDevuelta = new DateTime();
                //Inicialización y valores para el array que insertará tres filas en la tabla T02_Departamento
                $aDepartamentosNuevos = [
                    ['T02_CodDepartamento' => 'JAV',
                        'T02_DescDepartamento' => 'Departamento lenguaje de programación Java',
                        'T02_FechaCreacionDepartamento' => 1668963975,
                        'T02_VolumenNegocio' => 5000.50,
                        'T02_FechaBajaDepartamento' => null],
                    ['T02_CodDepartamento' => 'PHP',
                        'T02_DescDepartamento' => 'Departamento lenguaje de programación PHP',
                        'T02_FechaCreacionDepartamento' => 1668963975,
                        'T02_VolumenNegocio' => 5000.50,
                        'T02_FechaBajaDepartamento' => null],
                    ['T02_CodDepartamento' => 'JSC',
                        'T02_DescDepartamento' => 'Departamento lenguaje de programación JavaScript',
                        'T02_FechaCreacionDepartamento' => 1668963975,
                        'T02_VolumenNegocio' => 5000.50,
                        'T02_FechaBajaDepartamento' => null]
                ];

                try {
                    //Conexión a base de datos
                    $DAW208DBDepartamentos = new PDO(DSN, NOMBREUSUARIO, PASSWORD);
                    //Preparación query de inserción
                    $sConsultaSqlInsercion = <<<INSERCION
                            INSERT INTO T02_Departamento(T02_CodDepartamento,
                                T02_DescDepartamento,
                                T02_FechaCreacionDepartamento,
                                T02_VolumenNegocio) 
                             VALUES 
                                (:T02_CodDepartamento,
                                :T02_DescDepartamento,
                                :T02_FechaCreacionDepartamento,
                                :T02_VolumenNegocio);
                            INSERCION;
                    $DAW208DBDepartamentos->beginTransaction();
                    // Preparación de la sentencia.
                    $oConsultaPreparada = $DAW208DBDepartamentos->prepare($sConsultaSqlInsercion);
                    //Recorrido de array departamentos y guardado en nuevo array con los valores asociados.
                    foreach ($aDepartamentosNuevos as $aDepartamento) {
                        $aDatosDepartamentos = [
                            ':T02_CodDepartamento' => $aDepartamento['T02_CodDepartamento'],
                            ':T02_DescDepartamento' => $aDepartamento['T02_DescDepartamento'],
                            ':T02_FechaCreacionDepartamento' => $aDepartamento['T02_FechaCreacionDepartamento'],
                            ':T02_VolumenNegocio' => $aDepartamento['T02_VolumenNegocio']
                        ];

                        $oConsultaPreparada->execute($aDatosDepartamentos);
                    }
                    //Si la ejecución no da error, hace commit del query de inserción.
                    $DAW208DBDepartamentos->commit();
                    //Impresión de tabla con los valores previos y si la inserción ha sido exitosa, también con los nuevos.
                    //Variable string para creación de la consulta, solo contiene el query como texto.
                    $sConsultaSqlDeSeleccion = $DAW208DBDepartamentos->query('SELECT * FROM T02_Departamento');
                    ?>
                    <article id="articulo2">
                        <table id="tablaConsulta">
                            <caption></caption>
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
                            $registroObjeto = $sConsultaSqlDeSeleccion->fetch(PDO::FETCH_OBJ);
                            while ($registroObjeto != null) {
                                ?>
                                <tbody><tr>
                                        <?php
                                        //Recorrido de la fila cargada
                                        foreach ($registroObjeto as $clave => $valor) {
                                            //Si estamos en el campo de la fecha de creación, la mostramos como fecha
                                            if ($clave == 'T02_FechaCreacionDepartamento') {
                                                //Conversión de timestamp a fecha para mostrar resultado en tabla
                                                $oFechaDevuelta->setTimestamp($valor);
                                                //$sFechaFormateada es un string que guarda el objeto DateTime con formato.
                                                $sFechaFormateada = $oFechaDevuelta->format('d-m-Y');
                                                echo "<td>" . $sFechaFormateada . "</td>";
                                            } else {
                                                if ($valor == null) {
                                                    echo '<td>null</td>';
                                                } else {
                                                    echo "<td>$valor</td>";
                                                }
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                    //Cargado de una nueva fila para que el bucle while pueda evaluar si
                                    //se cumple la condición de permanencia o no.
                                    $registroObjeto = $sConsultaSqlDeSeleccion->fetch(PDO::FETCH_OBJ);
                                }
                                ?>
                            </tbody></table>
                        <?php
                    } catch (PDOException $excepcion) {
                        //Si se detecta aunque solo se aun error, vuelve al estado anterior al beginTransaction,
                        //por lo tanto, no efectúa ningúna inserción en la tabla a menos que pueda realizarlas todas correctamente.
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