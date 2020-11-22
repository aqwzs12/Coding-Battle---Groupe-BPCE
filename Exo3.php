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
  
 function convert($a) {
     $exploder = explode(':',$a);
     return $exploder[0]*60 + $exploder[1];
 }

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);

$result = [];

for($i = 0 ; $i <= 1440 ; $i++ ) {
    $result[$i] = 0 ;
}

for($i = 1 ; $i < count($input) ; $i++) {
    fwrite(STDERR, $input[$i] . PHP_EOL);
    $exploder = explode('-',$input[$i]);
    $start = convert($exploder[0]);
    $end = convert($exploder[1]);
    if ($end < $start) {
        $end += count($result);
    }
    for($j=$start ; $j <= $end ; $j++) {
        $result[$j%count($result)] = 1 ;
    }
}

// Find the result
$count = 0;
$max_count = 0;
$start = -1 ;
$end = -1;
for($i = 0 ; $i <= 2*count($result) ; $i++ ) {
    if($result[$i%count($result)] == 1 ) {
        if($count> $max_count) {
            $end = $i%count($result) -1;
            $start = $i - $count;
            $max_count = $count ;
        }
        $count = 0;
        
    }else {
        $count++;
    }
}

if($max_count != 0) {
    $start =  sprintf("%'02d",floor($start/60)).':'.sprintf("%'02d",($start%60)) ;
    
    if ($end == -1) {
        $end = 1439;
    }
    $end = sprintf("%'02d",floor($end/60)).':'.sprintf("%'02d",($end%60));
    echo $start.'-'.$end.PHP_EOL;
}else{
    echo "IMPOSSIBLE".PHP_EOL;
}
fwrite(STDERR, "hello, world!" . PHP_EOL);


/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
