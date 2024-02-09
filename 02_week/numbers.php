<?php
$number = 52;
print is_numeric($number) ? 'yes' : 'no';
print "\n";
print is_int($number) ? 'yes' : 'no'."\n";
//print (int)$number +5;
print "\n";
$remainder = (int)$number % 10;
print $remainder;