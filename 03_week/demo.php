<?php
//$cars = ['Volvo','BMW','Toyota'];
//print $cars[1]."\n";
//$cars[1]='Ford';
//print var_dump($cars);
//
//$words = [];
//$words[13] = 'Business'; 
//$words[24] ='College';
//$words['Helsinki'] = 'helsinki';
//
//overwrited above code
//
//$words = [
//1=>'A',
//2=>'B',
//3=>'C'
//];
//print var_dump($words);
//

$words = [
1=>'A',
2=>'B',
3=>'C'
];
unset($words[2]); //can unset anything
print var_dump($words);
