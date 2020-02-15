<?php

//题目描述：
// 输入一个字符串,按字典序打印出该字符串中字符的所有排列。例如输入字符串abc,则打印出由字符a,b,c所能排列出来的所有字符串abc,acb,bac,bca,cab和cba。

//回溯法 DFS
//注意结果需要按照字典排序返回 最后多了一个sort
function Permutation($str)
{
    $len = strlen($str);
    if ($len < 1) return array();
    
    $retArr = [];
    
    dfs($len, $str, $retArr, 0);

    sort($retArr);
    return $retArr;
}

function dfs($len, $str, &$retArr, $first)
{
    if ($first == $len){
        $retArr[] = $str;
        
        return ;
    }
    for($i=$first; $i<$len; $i++) {
        if ($str[$i] == $str[$first] && $i != $first) continue;
        swap($str, $i, $first);
        dfs($len, $str, $retArr, $first+1);
        swap($str, $i, $first);
    }
}

function swap(&$str, $value1, $value2)
{
    $tmp = $str[$value1];
    $str[$value1] = $str[$value2];
    $str[$value2] = $tmp;
}