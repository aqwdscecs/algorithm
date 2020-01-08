<?php
 
function IsPopOrder($pushV, $popV)
{
    $stack = new splStack();
    if (!count($pushV) || !count($popV)) {
        return false;
    }
    $len = count($pushV);
    for ($i = 0, $j = 0; $i < $len; $i++) {
        $stack->push($pushV[$i]);
        while ($j < $len && $stack->top() == $popV[$j]) {
            $stack->pop();
            $j++;
        }
    }
    return $stack->isEmpty();
}