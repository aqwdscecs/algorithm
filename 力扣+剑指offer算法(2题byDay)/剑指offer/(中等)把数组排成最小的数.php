<?php

function PrintMinNumber($numbers)
{
    // write code here
    usort($numbers, function($a,$b){
       if("$a$b" > "$b$a") return 1;
        return -1;
    });
    return implode("",$numbers);
}
 
//知识点 
// usort的使用
// return 1 表示需要交换
// return -1 表示不需要变换