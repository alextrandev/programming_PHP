<?php
$age = 20;
$name = "Alex";
$isStudent = TRUE;
$stringConvertedIsStudent = $isStudent ? 'am' : 'am not';
print var_dump($age,$name,$isStudent);
print "\nMy name is $name, I am $age years old. I $stringConvertedIsStudent a student.\n";