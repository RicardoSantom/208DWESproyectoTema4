<?php

/**
 * Versión 1.0 realizada por David Aparicio Sir, versión 1.1 implementada
 * por Ricardo Santiago Tomé */
/**
 * Esta librería contiene funciones para realizar operaciones matemáticas básicas
 * con dos operandos.
 *   */

/**
 * Función sumar recibe dos sumandos como parámetro y devuelve el resultado
 * de la suma de estos dos sumandos  
 *
 * @author David Aparicio Sir y Ricardo Santiago Tomé
 * @since 21/10/2022
 * @version 1.1
 * @param int $primerSumando Valor del primer sumando.
 * @param int $segundoSumando Valor del segundo sumando.
 * @return int Resultado de la suma de $primerSumando más $segundoSumando
 */
function sumar($primerSumando, $segundoSumando) {
    return $primerSumando + $segundoSumando;
}

/**
 * Función restar recibe dos operandos como parámetro y devuelve el resultado
 * de restar al primer operando el valor del segundo operando */
function restar($primerOperando, $segundoOperando) {
    return $primerOperando - $segundoOperando;
}

/**
 * Función multiplicar recibe dos operandos como parámetro y devuelve 
 * el producto de ambos operandos */
function multiplicar($primerOperando, $segundoOperando) {
    return $primerOperando * $segundoOperando;
}

/**
 * Función dividir recibe dos operandos como parámetro y devuelve el resultado
 * de dividir el primer operando entre el valor del segundo operando */
function dividir($primerOperando, $segundoOperando) {
    return $primerOperando / $segundoOperando;
}

/**
 * Función modulo recibe dos operandos como parámetro y devuelve el resultado
 * de la división del primer operando entre el valor del segundo operando */
function modulo($primerOperando, $segundoOperando) {
    return $primerOperando % $segundoOperando;
}

/**
 * Función potenciar recibe dos operandos como parámetro y devuelve
 * el  resultado de elevar el primer operando a la potencia del segundo operando */
function potenciar($primerOperando, $segundoOperando) {
    return $primerOperando ** $segundoOperando;
}

/**
 * Función maximoComunDivisor recibe dos operandos como parámetro y devuelve
 * el número resultante, es  el mayor número entero que los divide sin dejar resto.  */
function maximoComunDivisor($primerOperando, $segundoOperando) {
    while (($primerOperando % $segundoOperando) != 0) {
        $operandoComodin = $segundoOperando;
        $segundoOperando = $primerOperando % $segundoOperando;
        $primerOperando = $operandoComodin;
    }
    return $segundoOperando;
}

/**
 * Función minimoComunMultiplo recibe dos operandos como parámetro y devuelve
 * el menor de los múltiplos comunes de ambos operandos. */
function minimoComunMultiplo($primerOperando, $segundoOperando) {
    return ($primerOperando * $segundoOperando) / maximoComunDivisor($primerOperando, $segundoOperando);
}
