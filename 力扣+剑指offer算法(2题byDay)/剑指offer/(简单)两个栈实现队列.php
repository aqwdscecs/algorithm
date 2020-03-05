<?php

$stack1 = new SplStack();
$stack2 = new SplStack();


function mypush($node)
{
    // write code here
    global $stack1;
    global $stack2;
    
    $stack1->push($node);
}
function mypop()
{
    // write code here
    global $stack1;
    global $stack2;
    if($stack2->isEmpty()){
        while(!$stack1->isEmpty()){
            $stack2->push($stack1->pop());
        }  
    }
    return $stack2->pop();
}