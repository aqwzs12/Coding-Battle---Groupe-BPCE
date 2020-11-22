<?php

include '../vendor/autoload.php';
/*******
 * Read input from STDIN
 * Use echo or print to output your result to STDOUT, use the PHP_EOL constant at the end of each result line.
 * Use:
 *     fwrite(STDERR, "hello, world!" . PHP_EOL);
 * or
 *		error_log("hello, world!" . PHP_EOL);
 * to output debugging information to STDERR
 * ***/
////////////////////////////////////////////
$file = file_get_contents('./Exo5.txt'); //
$input = explode("\r\n", $file); /////////
/////////////////////////////////////////
$M = []; ///////////////////////////////
///////////////////////////////////////
$n = explode(' ', $input[0])[0]; /////
$m = explode(' ', $input[0])[1]; ////
$a = explode(' ', $input[0])[2]; ///
///////////////////////////////////
$distances = []; /////////////////
/////////////////////////////////
for ($i = 1; $i <= $n; $i++) {
    $distances[$i] = PHP_INT_MAX;
}

for ($i = 1; $i < count($input); $i++) {
    $exploder = explode(' ', $input[$i]);
    $M[$exploder[0]][$exploder[1]] = 1;
    $M[$exploder[1]][$exploder[0]] = 1;
}

for ($i = 1; $i <= $n; $i++) {
    $distances = gofor($a, $i, $M, 0, $distances, $a);
}

////////////////////////
$index = -1;///////////
$max = PHP_INT_MIN;///
/////////////////////

foreach ($distances as $k => $v) {
    if ($max < $v) {
        $max = $v;
    }
}

foreach ($distances as $k => $v) {
    if ($v == $max)
        echo $k . ' ';
}

////////////////
echo PHP_EOL;//
//////////////

/**
 * Processing ... 
 */
function gofor($start, $end, $M, $count, $distances, $last)
{
    unset($M[$last][$start]);

    if ($start == $end) {
        $distances[$end] = min($distances[$end], $count);
        return $distances;
    }

    foreach ($M[$start] as $k => $v) {
        $a = $M[$start][$k];
        unset($M[$start][$k]);
        $distances = gofor($k, $end, $M, $count + $v, $distances, $start);
    }

    return $distances;
}



function dijkstra() {

}

function


/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
