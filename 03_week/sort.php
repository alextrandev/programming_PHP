<?php
$a = [3,5,2,6,4,2,6,4,2,3,7,9];
$sortedA = $a;
sort($sortedA);
//print var_dump($sortedA);
$last = count($sortedA) -1;
print "Smallest number is $sortedA[0].";
print "Largest number is $sortedA[$last].";