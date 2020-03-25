<?php
 
function ReverseSentence($str)
{
    // write code here
    return implode(' ', array_reverse(explode(' ', $str)));
}