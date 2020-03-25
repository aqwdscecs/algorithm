<?php


//O(32) 稳定计算
function NumberOf1($n)
{
    // write code here
    $count = 0;
    
    $index = 0;
    while ($index < 32) {
        if ($n & (1<<$index)){
            $count++;
        }
        $index++;
    }
    return $count;
}

//出现几次n  O(m)    /*m为1出现的次数*/
function NumberOf1($n)
{
    $count = 0;
    //如果小于0
    if ($n < 0) {
        $count++;
        //最高位置0
        $n = $n & 0x7FFFFFFF;
    }

    while ($n != 0) {
        $count++;
        $n = $n & ($n-1);
    }

    return $count;
}

