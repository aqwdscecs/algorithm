<?php

function movingCount($threshold, $rows, $cols)
{
    // write code here
    $visited = [];
    return countingSteps($threshold,$rows,$cols,0,0,$visited);
}

function countingSteps($limit, $rows, $cols, $r, $c, $visited)
{
    if ($r < 0 || $r >= $rows || $c < 0 || $c >= $cols
              || (isset($visited[$r][$c]) && $visited[$r][$c])
              || bitSum($r, $c) > $limit)  
        return 0;
        
    $visited[$r][$c] = 1;

    return countingSteps($limit,$rows,$cols,$r - 1,$c,$visited)
         + countingSteps($limit,$rows,$cols,$r,$c - 1,$visited)
         + countingSteps($limit,$rows,$cols,$r + 1,$c,$visited)
         + countingSteps($limit,$rows,$cols,$r,$c + 1,$visited)
         + 1;
}

function bitSum($t1, $t2){
        $count = 0;
        while ($t1 != 0){
            $count += $t1 % 10;
            $t = intval($t1/10);
        }
        while ($t2 != 0){
            $count += $t2 % 10;
            $t2 = intval($t2/10);
        }
        return  $count;
    }