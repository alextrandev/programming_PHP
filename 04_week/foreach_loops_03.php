<?php

$fruits = array("Apple", "Banana", "Poisonous Berry", "Strawberry", "Grapes");

print "Today we will eat...\n";
foreach ($fruits as $fruit) {
    $fruitLowerCase = strtolower($fruit);
 if (str_contains($fruitLowerCase,'oisonous')) {
    print "Hold on a minutes! $fruit is dangerous!"; 
    break;
}  else {
    print "$fruit...\n";
 }
}