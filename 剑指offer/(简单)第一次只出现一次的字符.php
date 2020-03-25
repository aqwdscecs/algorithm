<?php

//题目描述:在一个字符串(0<=字符串长度<=10000，全部由字母组成)中找到第一个只出现一次的字符,并返回它的位置, 如果没有则返回 -1（需要区分大小写）.

//运行时间：12ms
//占用内存：3068k


//思路：小于 两次遍历 大于 一次遍历 的复杂度
//先是遍历一次  统计字符
//然后顺序遍历统计的数组 count为1的直接返回
//时间复杂度O(2n) 空间复杂度O(n)
function FirstNotRepeatingChar($str)
{
    // write code here
    $len = strlen($str);
    if (!$len) return -1;
    $arr = [];

    for($i=0; $i < $len; $i++) {
        if (isset($arr[$str[$i]])) {
            //如果已经出现一次这个字符  直接
            $arr[$str[$i]]['count']++;
        } else {
            //存下下标
            $arr[$str[$i]]['index'] = $i;
            $arr[$str[$i]]['count'] = 1;
        }
    }
    for($ptr=current($arr), $i=0;  $i < count($arr); $i++) {
        if ($ptr['count'] == 1) return $ptr['index'];
        $ptr = next($arr);
    }
    return -1;
}
 

