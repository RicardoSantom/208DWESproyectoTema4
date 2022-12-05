<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="webroot/css/estilos.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Index Proyecto Tema4</title>
    </head>
    <body>
        <header>
            <h1>Desarrollo Aplicaciones Web Entorno Servidor</h1>
            <h2>Proyecto Tema 4</h2>
        </header>
        <main>
            <table id="tablaScript">
                <caption>Mostrar script DAW208DBDepartamentos</caption>
                <thead>
                    <tr>
                        <th>scripts Entorno de desarrollo</th>
                        <th>Mostrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>scripts.~ </span>BorraDAW208DBDepartamentos.sql.</td>
                        <td><a href="mostrarcodigo/BorraDAW208DBDepartamentos.php">Mostrar</a></td>
                    </tr>
                    <tr>
                        <td><span>scripts.~ </span>CreaDAW208DBDepartamentos.sql.</td>
                        <td><a href="mostrarcodigo/CreaDAW208DBDepartamentos.php">Mostrar</a></td>
                    </tr>
                    <tr>
                        <td><span>scripts.~ </span>CargaInicialDAW208DBDepartamentos.sql.</td>
                        <td><a href="mostrarcodigo/CargaInicialDAW208DBDepartamentos.php">Mostrar</a></td>
                    </tr>
                </tbody>
            </table>
            <table id="tablaEjercicios">
                <caption>Ejercicios prácticos PHP</caption>
                <thead>
                    <tr>
                        <th>Enunciado</th>
                        <th colspan="4">PDO</th>
                        <th colspan="2">MYSQLI</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th colspan="2" style="text-shadow:2px 2px  4px #00006a;"><span>DESARROLLO</span></th>
                        <th colspan="2" style="text-shadow:2px 2px  4px #00006a;"><span>EXPLOTACIÓN</span></th>
                        <th colspan="2" style="text-shadow:2px 2px  4px #00006a;"><span>DESARROLLO</span></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Ejecutar</th>
                        <th>Mostrar</th>
                        <th>Ejecutar</th>
                        <th>Mostrar</th>
                        <th>Ejecutar</th>
                        <th>Mostrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>01.~ </span>Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                        <td><a href="codigoPHP/ejercicio01.php">Ejecutar</a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio01.php">Mostrar</a></td>
                        <td></td>
                        <td></td>
                        <td><a href="codigoPHP/ejercicio01MySQLi.php"></a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio01MySQLi.php"></a></td>
                    </tr>
                    <tr>
                        <td><span>02.~</span> Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                        <td><a href="codigoPHP/ejercicio02.php">Ejecutar</a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio02.php">Mostrar</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>03.~</span> Formulario para añadir un departamento a la tabla Departamento con validación de entrada y
                            control de errores</td>
                        <td><a href="codigoPHP/ejercicio03.php">Ejecutar</a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio03.php">Mostrar</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>04.~</span> Formulario de búsqueda de departamentos por descripción (por una parte del campo
                            DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).
                        </td>
                        <td><a href="codigoPHP/ejercicio04.php"></a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio04.php"></a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>05.~</span> Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                            insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.
                        </td>
                        <td><a href="codigoPHP/ejercicio05.php"></a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio05.php"></a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>06.~</span> Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
                            utilizando una consulta preparada.</td>
                        <td><a href="codigoPHP/ejercicio06.php"></a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio06.php"></a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>07.~</span> Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
                            Departamento de nuestra base de datos.</td>
                        <td><a href="codigoPHP/ejercicio07.php"></a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio07.php"></a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>08.~</span> Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                            fichero departamento.xml..</td>
                        <td><a href="codigoPHP/ejercicio07.php"></a></td>
                        <td><a href="mostrarcodigo/mostrarEjercicio07.php"></a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span>00.~</span> Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                            fichero departamento.xml..</td>
                        <td><a href="codigoPHP/ejercicio07.php">Ejecutar</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                     <tr>
                        <td><span>fundacional.~</span></td>
                        <td><a href="codigoPHP/fundacional.php">Ejecutar</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES.<a href="../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé </a>© Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom" target="blank"  class="enlaces" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../208DWESproyectoDWES/index.php" id="enlaceSecundario" title="Enlace a Index DWES">Index DWES</a>
        </footer>
    </body>
</html>

