<?php
/* Write a function called isAdult,
which will return true if age is equal or over 18. other wise false
*/

function isAdult($age) {
    //$return = (bool);
    //$convertedReturn = $return ? 'true' : 'false';
    if (is_numeric($age)) {
if ($age >= 18) {
    $return = TRUE;
    //$convertedReturn = $return ? 'true' : 'false';
    //return $convertedReturn;
} else {
    $return = FALSE;
    //$convertedReturn = $return ? 'true' : 'false';
    //return $convertedReturn;
}
    } else {
    $return = FALSE;
    //$convertedReturn = $return ? 'true' : 'false';
    //return $convertedReturn;
    }
    $convertedReturn = $return ? 'true' : 'false';
    return print $convertedReturn."\n";
}

//examples:
isAdult(25); //true
isAdult(-2); //false
isAdult(12); //true
isAdult(12345678); //true
isAdult('abc'); //false
isAdult('30'); //true