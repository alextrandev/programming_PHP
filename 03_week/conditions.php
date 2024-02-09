<?php
$age = 19;
$nationality = 'Finnish';
if ($age <18) {
    print "Can not vote \n";
} else {
    if ($nationality !== 'Finnish') {
    print "Can not vote \n";
} else {
    print "Can vote \n";
}
}