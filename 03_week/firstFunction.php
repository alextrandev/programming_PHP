<?php

//function println($line) {
//print $line . "\n";
//}

function println() {
    print "\n";
    }

function greeting($name) {
    print "Hello $name";
}
function doubleNumber($number) {
    if (is_numeric($number)) {
        return 2 * $number;
    } else {
        return 0;
    }
}
greeting("Alex");
println();
print doubleNumber(-7);