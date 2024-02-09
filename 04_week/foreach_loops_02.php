<?php

$countries_and_capitals = array(
    "United States" => "Washington, D.C.",
    "United Kingdom" => "London",
    "France" => "Paris",
    "Germany" => "Berlin",
    "Italy" => "Rome",
    "Canada" => "Ottawa",
    "Japan" => "Tokyo",
    "Australia" => "Canberra",
    "Brazil" => "Brasília",
    "India" => "New Delhi"
);

foreach ($countries_and_capitals as $country => $capital) {
    print "The capital of $country is $capital\n";
}