/*
* Función: pre_hash(str)
* @author: Mendoza Burgos Rubén Andrés
*
* El objetivo de esta función es mandar los datos 'hasheados' antes de que lleguen al servidor.
* El resultado de esta función es un hash de 15 caracteres
*
* */

function pre_hash(str) {
    /*
    * Se crea una serie de arreglos que contienen los caracteres que serán utilizados para
    * el resultado arrojado por la función pre_hash(srt).
    *
    * El último arreglo contiene las longitudes de los arreglos creados anteriormente.
    *
    * */

    array_letters = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
    ];

    array_consonants = [
        'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n',
        'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
    ];

    array_vowels = ['a', 'e', 'i', 'o', 'u'];

    array_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    lengths = [array_letters.length, array_consonants.length, array_vowels.length, array_numbers.length];

    /*
    * Se generan los primeros caracteres haciendo uso de números random y la superficie de
    * Dinamarca (en kilómetros). Se genera una semilla con el uso del string que pasa como parámetro
    * a la función. Se lleva a cabo la suma de los números ASCII del string.
    *
    * */

    function random(seed) {
        var x = Math.sin(seed++) * 10000;
        return x - Math.floor(x);
    }

    function ascii_sum(str) {
        sum = 0;
        splited_str = str.split('');
        for (i = 0; i < splited_str.length; i++) {
            sum += splited_str[i].charCodeAt(0);
        }
        return sum;
    }

    DEN_SURF = 43094;

    // Obtenemos el número rándom usando la superficie de Dinamarca y la suma de los números ascii
    c1 = random(DEN_SURF * ascii_sum(str)) * 10;
    console.log(c1, ' ', ascii_sum(str));
}