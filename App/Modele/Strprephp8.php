<?php

/*
 * Function str_starts_with ne fonctionne pas avant php8 
 * Crédit : Paul Phillips https://www.php.net/manual/en/function.str-starts-with.php
 */

class Strprephp8{
    
    public static function str_starts_with ( $haystack, $needle ) {
  return strpos( $haystack , $needle ) === 0; //récupère la position de la $needle dans la $haystack et vérifie si elle est a la première position
}

}