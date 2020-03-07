<?php

function LastRemaining_Solution($n, $m)
{
    // write code here
    $queue = new SplQueue();
    
    for ($i=1; $i<=$n; $i++) {
        $queue->enqueue($i);
    }

    $number = 1;
    while ($queue->count()>1) {

        if ($number == ($m)) {
            $queue->dequeue();
            $number = 1;
        }
        $number++;
        $queue->push($queue->dequeue());
    }
    return $queue->bottom();
}


function LastRemaining_Solution($n, $m)
{
    // write code here
    if ($n <= 0) return -1;
    
    $last = 0;
    
    for ($i=2; $i <= $n; $i++){
        $last = ($last + $m) % $i;
    }
    
    return $last;
}