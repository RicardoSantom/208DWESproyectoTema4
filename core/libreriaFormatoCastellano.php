<?php
/**
 * @version 1.0
 * @author Ricardo Santiago Tomé - RicardoSantom en Github https://github.com/RicardoSantom
 * Esta libreria contiene funciones para convertir a castellano fechas actuales, futuras o pasadas.
 */

/**
 * La funcion formatoCastellanoFechaActual no recibe nada
 * establece las variables regionales a España y devuelve una cadena
 * formateada en castellano.
 * @author Ricardo Santiago Tomé
 * @version 1.0
 * @since 01/11/2022
 * @return string Cadena formateada en castellano que contiene fecha y hora actuales.
 */
function formatoCastellanoFechaActual() {
    date_default_timezone_set("Europe/Madrid");
    setlocale(LC_ALL, "es_ES.utf8");
    return $sFechaCastellano = strftime("%A, %d de %B de %G %T");
}

/**
 * La funcion formatoCastellanoFechaActual recibe un objeto DateTime
 * establece las variables regionales a España y devuelve una cadena
 * formateada en castellano.
 * @author Ricardo Santiago Tomé
 * @version 1.0
 * @since 01/11/2022
 * @param $oFechaOrigen DateTime objeto 
 * @param $sumaHora int número de horas a sumar a la hora actual.
 * @param $sumaMinuto int número de minutos a sumar a la hora actual.
 * @param $sumaSegundo int número de segundos a sumar a la hora actual.
 * @param $sumaMes int número de meses a sumar a la hora actual.
 * @param $sumaDia int número de dias a sumar a la hora actual.
 * @param $sumaAnyo int número de años a sumar a la hora actual.
 * @return string Cadena formateada en castellano que contiene fecha y hora resultantes de sumar a la fecha y 
 * hora pasados como parámetros el resto de parámetros recibidos en el método.
 */
function parametrosCastellanosFechaDistinta($oFechaOrigen,$sumaHora,$sumaMinuto,$sumaSegundo,$sumaMes,$sumaDia,$sumaAnyo) {
     date_default_timezone_set("Europe/Madrid");
    setlocale(LC_ALL, "es_ES.utf8");
    $horaActual = $oFechaOrigen->format('H');
    $minutoActual = $oFechaOrigen->format('i');
    $segundoActual = $oFechaOrigen->format('s');
    $mesActual = $oFechaOrigen->format('m');
    $diaActual = $oFechaOrigen->format('d');
    $anyoActual = $oFechaOrigen->format('o');
    return $sFechaCastellano = strftime("%A, %d de %B de %G %T",
            mktime(sumar($horaActual,$sumaHora), sumar($minutoActual,$sumaMinuto),
                    sumar($segundoActual,$sumaSegundo), sumar($mesActual,$sumaMes),
                    sumar($diaActual,$sumaDia), sumar($anyoActual,$sumaAnyo)));
}

//En desarrollo
/*function sumaTimestampCastellano($oFechaOrigen,$marcaDeTiempo) {
     date_default_timezone_set("Europe/Madrid");
    setlocale(LC_ALL, "es_ES.utf8");
    $horaActual = $oFechaOrigen->format('H');
    $minutoActual = $oFechaOrigen->format('i');
    $segundoActual = $oFechaOrigen->format('s');
    $mesActual = $oFechaOrigen->format('m');
    $diaActual = $oFechaOrigen->format('d');
    $anyoActual = $oFechaOrigen->format('o');
    return $sFechaCastellano = strftime("%A, %d de %B de %G %T",
            mktime($horaActual,$minutoActual,
                    restar($segundoActual,$marcaDeTiempo), $mesActual,
                   $diaActual,$anyoActual));
}*/