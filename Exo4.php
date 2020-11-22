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
function decale($s,$n) {
    $l = strlen($s);
    $res = '';
    for($i = 0 ; $i < $l ; $i++ ){
        $e = (ord($s{$i}) + $n - 97) % 26 ;
        $res .= chr($e + 96 + 1);
    }
    return $res;
}


$queue = [];
$l = $input[1];
$ll = $input[2];
$n = strlen($l);
for($i = 0 ; $i < $n;$i++ ) {
    $res = "";
    for($j= $i ; $j < $i+$n ;$j++) {
        $res .= $l{$j%$n};
    }
    for($o=0 ; $o < 26 ; $o++) {
        $queue[] = decale($res,$o);
    }
    
}


$max_match = 0 ;
$index_max_match = -1 ;

foreach($queue as $k => $v) {
$count = 0;
for($i = 0 ; $i < $n ; $i++) {
    if($v{$i} == $ll{$i}){
        $count++;
    }
}
if($count > $max_match) {
    $max_match = $count ;
    $index_max_match = $k;
}

}

echo($queue[$index_max_match] . PHP_EOL);

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>