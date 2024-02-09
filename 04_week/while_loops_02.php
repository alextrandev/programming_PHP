<?php
$string = "";
for ($i=2;$i<100;$i += 2) {
    $string .= $i . " " . (100-$i) . " ";
}

print $string;