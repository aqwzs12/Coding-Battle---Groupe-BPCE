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

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);

$result = [];
for($i = 1 ; $i < count($input) ; $i++ ) {
    $exploder = explode(' ',$input[$i]);
    $result[$exploder[1]][] = $exploder[0];
}

foreach($result as $k => $v) {
    if(count($v) == 1) {
        echo $v[0] . PHP_EOL ;
    }
}

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>