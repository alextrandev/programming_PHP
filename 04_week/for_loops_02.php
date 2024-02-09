<?php

$num1 = 2;
$num2 = 15;
$sum = 0;
$string = "";

for($i=$num1; $i <= $num2; $i++) {
 $sum += $i;
if($i != $num2) {
    $string .= $i . " + ";
} else {
    $string .= $i . " = " . $sum;
}
}
print $string;