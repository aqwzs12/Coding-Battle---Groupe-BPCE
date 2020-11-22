<?php

/*******
 * Read input from STDIN
 * Use echo or print to output your result to STDOUT, use the PHP_EOL constant at the end of each result line.
 * Use:
 *     fwrite(STDERR, "hello, world!" . PHP_EOL);
 * or
 *		error_log("hello, world!" . PHP_EOL);
 * to output debugging information to STDERR
 * ***/

do {
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if ($f !== false) {
        $input[] = $f;
    }
} while ($f !== false);

$n = $input[0];
$s = $input[1];
$l = strlen($s);
$result = "";
for ($i = 0; $i < $l; $i++) {
    if (strlen($result) == $l) break;
    for ($j = $i; $j < $l; $j = $j + $n) {
        $result .= $s{$j};
    }
}

echo $result . PHP_EOL;

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
